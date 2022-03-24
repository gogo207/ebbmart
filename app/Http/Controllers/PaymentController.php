<?php
namespace App\Http\Controllers;


use App\FailedTranscations;
use App\SellerPlans;
use App\User;
use Auth;
use Crypt;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use net\authorize\api\controller as AnetController;
use net\authorize\api\contract\v1 as AnetAPI;
 
class PaymentController extends Controller
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this
            ->_api_context
            ->setConfig($paypal_conf['settings']);
    }

    public function payWithpaypal(Request $request)
    {
        $payout = Crypt::decrypt($request->amount);
        $payout = round($payout, 2);

        require_once 'price.php';

        $cart_table = Auth::user()->cart;
        $total = 0;

        foreach ($cart_table as $key => $cart) {

            if ($cart->product->tax_r != null && $cart->product->tax == 0) {

                if ($cart->ori_offer_price != 0) {
                    //get per product tax amount
                    $p = 100;
                    $taxrate_db = $cart->product->tax_r;
                    $vp = $p + $taxrate_db;
                    $taxAmnt = $cart->product->offer_price / $vp * $taxrate_db;
                    $taxAmnt = sprintf("%.2f", $taxAmnt);
                    $price = ($cart->ori_offer_price - $taxAmnt) * $cart->qty;

                } else {

                    $p = 100;
                    $taxrate_db = $cart->product->tax_r;
                    $vp = $p + $taxrate_db;
                    $taxAmnt = $cart->product->price / $vp * $taxrate_db;

                    $taxAmnt = sprintf("%.2f", $taxAmnt);

                    $price = ($cart->ori_price - $taxAmnt) * $cart->qty;
                }

            } else {

                if ($cart->semi_total != 0) {

                    $price = $cart->semi_total;

                } else {

                    $price = $cart->price_total;

                }
            }

            $total = $total + $price;

        }

        $total = sprintf("%.2f",$total*$conversion_rate);

        if (round($request->actualtotal, 2) != $total) {

            notify()->error('Payment has been modifed !','Please try again !');
            return redirect(route('order.review'));

        }

        $setcurrency = Session::get('currency')['id'];

        if($setcurrency == 'INR' && env('PAYPAL_MODE') == 'sandbox'){

            notify()->error('INR is not supported in paypal sandbox mode try with other currency !','Currency not supported !');
            return redirect(route('order.review'));

        }

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1')
        /** item name **/
            ->setCurrency($setcurrency)->setQuantity(1)
            ->setPrice($payout);
        /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array(
            $item_1,
        ));
        $amount = new Amount();
        $amount->setCurrency($setcurrency)->setTotal($payout);
        $transaction = new Transaction();
        $transaction->setAmount($amount)->setItemList($item_list)->setDescription('Payment for order');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status'))
            ->setCancelUrl(route('order.review'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)->setRedirectUrls($redirect_urls)->setTransactions(array(
            $transaction,
        ));

        try
        {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {

                notify()->error('Connection timeout !');
                $failedTranscations = new FailedTranscations;
                $failedTranscations->order_id = $order_id;
                $failedTranscations->txn_id = 'PAYPAL_FAILED_' . str_rand(5);
                $failedTranscations->user_id = Auth::user()->id;
                $failedTranscations->save();
                return redirect(route('order.review'));
            } else {

                notify()->error('Some error occur, Sorry for inconvenient');
                $failedTranscations = new FailedTranscations;
                $failedTranscations->order_id = $order_id;
                $failedTranscations->txn_id = 'PAYPAL_FAILED_' . str_rand(5);
                $failedTranscations->user_id = Auth::user()->id;
                $failedTranscations->save();

                return redirect(route('order.review'));
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        notify()->error('Unknown error occurred !');
        return redirect(route('order.review'));
    }

    public function getPaymentStatus(Request $request)
    {

        require_once 'price.php';

        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        $hc = decrypt(Session::get('handlingcharge'));
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');

        if (empty($request->get('PayerID')) || empty($request->get('token'))) {
            Session::flash('failure', 'Payment failed !');

            $failedTranscations = new FailedTranscations;
            $failedTranscations->order_id = $order_id;
            $failedTranscations->txn_id = 'PAYPAL_FAILED_' . str_rand(5);
            $failedTranscations->user_id = Auth::user()->id;
            $failedTranscations->save();
            $sentfromlastpage = 0;

            return view('front.checkout', compact('sentfromlastpage', 'conversion_rate'));
        }

      

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->get('PayerID'));
        /**Execute the payment **/
        $response = $payment->execute($execution, $this->_api_context);

        $order_id = uniqid();
        $user = Auth::user();

        if ($response->getState() == 'approved') {

            $transactions = $payment->getTransactions();
            $relatedResources = $transactions[0]->getRelatedResources();
            $sale = $relatedResources[0]->getSale();
            $saleId = $sale->getId();
            $payment_status = 'yes';

            $checkout = new PlaceOrderController;

            return $checkout->placeorder($payment_id,'Paypal',session()->get('order_id'),$payment_status,$saleId);

            
            /*End*/

        } else {
            notify()->error("Payment Failed !");
            $sentfromlastpage = 0;
            $failedTranscations = new FailedTranscations;
            $failedTranscations->order_id = $order_id;
            $failedTranscations->txn_id = 'PAYPAL_FAILED_' . Str::uuid();
            $failedTranscations->user_id = Auth::user()->id;
            $failedTranscations->save();
            return redirect(route('order.review'));
        }

    }

     public function pay_authorizenet(Request $request) {
         require_once 'price.php';
         //dd($request->all());
         $plan = SellerPlans::firstWhere('unique_id',Crypt::decrypt($request->planid));
         $amount = $request->amount;
         
         return view('payment/pay_authorizenet',compact('conversion_rate','amount','plan'));
    }


    public function handleonlinepay(Request $request) {
        //dd($request->all());
        $input = $request->input();
        
        /* Create a merchantAuthenticationType object with authentication details
          retrieved from the constants file */
        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
        $merchantAuthentication->setName(env('MERCHANT_LOGIN_ID'));
        $merchantAuthentication->setTransactionKey(env('MERCHANT_TRANSACTION_KEY'));

        // Set the transaction's refId
        $refId = 'ref' . time();
        $cardNumber = preg_replace('/\s+/', '', $input['cardNumber']);
        
        // Create the payment data for a credit card
        $creditCard = new AnetAPI\CreditCardType();
        $creditCard->setCardNumber($cardNumber);
        $creditCard->setExpirationDate($input['expiration-year'] . "-" .$input['expiration-month']);
        $creditCard->setCardCode($input['cvv']);

        // Add the payment data to a paymentType object
        $paymentOne = new AnetAPI\PaymentType();
        $paymentOne->setCreditCard($creditCard);

        // Create a TransactionRequestType object and add the previous objects to it
        $transactionRequestType = new AnetAPI\TransactionRequestType();
        $transactionRequestType->setTransactionType("authCaptureTransaction");
        $transactionRequestType->setAmount($input['amount']);
        $transactionRequestType->setPayment($paymentOne);

        // Assemble the complete transaction request
        $requests = new AnetAPI\CreateTransactionRequest();
        $requests->setMerchantAuthentication($merchantAuthentication);
        $requests->setRefId($refId);
        $requests->setTransactionRequest($transactionRequestType);

        // Create the controller and get the response
        $controller = new AnetController\CreateTransactionController($requests);
        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
 
        if ($response != null) {
         // dd($response->getMessages()->getResultCode());
            // Check to see if the API request was successfully received and acted upon
            if ($response->getMessages()->getResultCode() == "Ok") {
                // Since the API request was successful, look for a transaction response
                // and parse it to display the results of authorizing the card
                $tresponse = $response->getTransactionResponse();
 //dd($tresponse);
                 if ($tresponse != null && $tresponse->getMessages() != null) {
 
//                    echo " Successfully created transaction with Transaction ID: " . $tresponse->getTransId() . "\n";
//                    echo " Transaction Response Code: " . $tresponse->getResponseCode() . "\n";
//                    echo " Message Code: " . $tresponse->getMessages()[0]->getCode() . "\n";
//                    echo " Auth Code: " . $tresponse->getAuthCode() . "\n";
//                    echo " Description: " . $tresponse->getMessages()[0]->getDescription() . "\n";

                    $message_text = $tresponse->getMessages()[0]->getDescription().", Transaction ID: " . $tresponse->getTransId();
                    $msg_type = "success_msg";    
                     
                     try{
                        
                        $data=array(
                            'plan_id'=>$input['plan_id'],
                            'user_id'=>auth()->user()->id,
                            'txn_id'=>$tresponse->getTransId(),
                            'method'=>"By Vendor",
                            'end_date'=>date('Y-m-d h:i:s',strtotime('+1 year')),
                            'original_amount'=>$input['amount'],
                            'paid_amount'=>$input['amount'],
                            'paid_currency'=>"USD",
                            'status'=>"1",
                        );
                        
                        DB::table('seller_subscriptions')->insert($data);
                          User::where('id', auth()->user()->id)
                        ->update(['subs_id' => $input['plan_id']]); 
                        return \Redirect::route('thankyou');
                     }catch(\Throwable $th){
                       echo $th;
                    // return redirect()->back()->with($msg_type, 'Query Error');
                  
                     }

                  
                  
               
                 } else {
                    $message_text = 'There were some issue with the payment. Please try again later.';
                    $msg_type = "error_msg";                                    

                    if ($tresponse->getErrors() != null) {
                        $message_text = $tresponse->getErrors()[0]->getErrorText();
                        $msg_type = "error_msg";                                    
                    }
                }
                // Or, print errors if the API request wasn't successful
            } else {

                $message_text = 'There were some issue with the payment. Please try again later.';
                $msg_type = "error_msg";                                    

                $tresponse = $response->getTransactionResponse();
                
//dd($tresponse);
                if ($tresponse != null && $tresponse->getErrors() != null) {
                    $message_text = $tresponse->getErrors()[0]->getErrorText();
                    $msg_type = "error_msg";                    
                } else {
                    $message_text = $response->getMessages()->getMessage()[0]->getText();
                    $msg_type = "error_msg";
                }                
            }
        } else {
            $message_text = "No response returned";
            $msg_type = "error_msg";
        }
   
// return \Redirect::route('response.authorizenet')->with($msg_type, $message_text);
        return redirect()->back()->with($msg_type, $message_text);
    }

public function response_authorizenet(Request $request){
   require_once 'price.php'; 
 
    return view('payment/response_authorizenet',compact('conversion_rate'));
}

}
