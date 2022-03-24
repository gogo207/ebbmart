<?php

namespace App\Http\Controllers;

use App\Genral;
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ContactController extends Controller
{
    public function index(Request $request){
        require_once ('price.php');
        $settings = Genral::first();
        return view('front.contactus',compact('conversion_rate','settings'));
    }

    public function getConnect(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'mobile' => 'required',
            'message' => 'required',
            'subject' => 'required'
        ]);
        
        try{
            // $email = $request->input('email');
            $data=array(
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                 'mobile'=>$request->input('mobile'),
                'message'=>$request->input('message'),
                'subject'=>$request->input('subject'),
            );
            
            DB::table('contact_enquiry')->insert($data);
            
            // $mail = Genral::first();
            // Mail::to($email)->send(new Contact($request));
            // notify()->success('Message sent successfully !');
            // return back();
            return redirect('/thankyou');

        }catch(\Exception $e){
            return back()->with($e->getMessage());
            // echo "some mistAKE";
        }

    }
    public function thankyou(Request $request){
        require_once ('price.php');
        $settings = Genral::first();
        return view('front.thankyou',compact('conversion_rate','settings'));
    }
    public function insurance(Request $request){
        require_once ('price.php');
        $settings = Genral::first();
        return view('front.insurance',compact('conversion_rate','settings'));
    }

    public function getInsurance(Request $request){

        $request->validate([
            'companyname' => 'required',
            'email' => 'email|required',
            'typeofbusiness' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'payrollfrequency' => 'required',
            'payrollcompany' => 'required',
            'decisionmakername' => 'required',
            'contactpersonname' => 'required',
            'additional_notes' => 'required'
        ]);
        
        try{
            
            $data=array(
                'companyname'=>$request->input('companyname'),
                'email'=>$request->input('email'),
                'typeofbusiness'=>$request->input('typeofbusiness'),
                'mobile'=>$request->input('mobile'),
                'address'=>$request->input('address'),
                'city'=>$request->input('city'),
                'state'=>$request->input('state'),
                'zipcode'=>$request->input('zipcode'),
                
                 'full_time'=>$request->input('full_time'),
                'part_time'=>$request->input('part_time'),
                'remote'=>$request->input('remote'),
                'freelancer'=>$request->input('freelancer'),
                'payrollfrequency'=>$request->input('payrollfrequency'),
                'payrollcompany'=>$request->input('payrollcompany'),
                'decisionmakername'=>$request->input('decisionmakername'),
                'contactpersonname'=>$request->input('contactpersonname'),
                
                 'typicalday'=>$request->input('typicalday'),
                'demographics'=>$request->input('demographics'),
                'core_benefits'=>$request->input('core_benefits'),
                'brokername'=>$request->input('brokername'),
                'medical_insurance'=>$request->input('medical_insurance'),
                'premium_employee'=>$request->input('premium_employee'),
                'premium_family'=>$request->input('premium_family'),
                'deductible_employee'=>$request->input('deductible_employee'),
                
                 'deductible_family'=>$request->input('deductible_family'),
                'copay'=>$request->input('copay'),
                'vision'=>$request->input('vision'),
                'life_insurance'=>$request->input('life_insurance'),
                'dental'=>$request->input('dental'),
                'benefits_enrolled'=>$request->input('benefits_enrolled'),
                'open_enrollment'=>$request->input('open_enrollment'),
                'pop'=>$request->input('pop'),
                
                 'mr'=>$request->input('mr'),
                'dcr'=>$request->input('dcr'),
                'pre_taxing'=>$request->input('pre_taxing'),
                'plan_documents'=>$request->input('plan_documents'),
                'ltd'=>$request->input('ltd'),
                'std'=>$request->input('std'),
                'accident'=>$request->input('accident'),
                'sh'=>$request->input('sh'),
                
                 'cc'=>$request->input('cc'),
                'hsa'=>$request->input('hsa'),
                'leave_type'=>$request->input('leave_type'),
                'profit_sharing'=>$request->input('profit_sharing'),
                'wellness_programs'=>$request->input('wellness_programs'),
                'benefit_bank'=>$request->input('benefit_bank'),
                'benefits_decisions'=>$request->input('benefits_decisions'),
                'annual_enrollment'=>$request->input('annual_enrollment'),
                
                 'benefits_nco'=>$request->input('benefits_nco'),
                'change_benefits_offering'=>$request->input('change_benefits_offering'),
                'mpri'=>$request->input('mpri'),
                'feel_employees'=>$request->input('feel_employees'),
                'offered_benefits'=>$request->input('offered_benefits'),
                'like_employees'=>$request->input('like_employees'),
                'didnot_work'=>$request->input('didnot_work'),
                'willing_to_invest'=>$request->input('willing_to_invest'),
                
                 'offering_any_benefits'=>$request->input('offering_any_benefits'),
                'ahr_talent'=>$request->input('ahr_talent'),
                'competitors'=>$request->input('competitors'),
                'employees_fd'=>$request->input('employees_fd'),
                'comp_claims'=>$request->input('comp_claims'),
                'additional_notes'=>$request->input('additional_notes')
            );
            
            DB::table('discovery_enquiries')->insert($data);
            return redirect('/thankyou');
            // $mail = Genral::first();
            // Mail::to($mail->email)->send(new Contact($request));
            // notify()->success('Message sent successfully !');
            // return back();

        }catch(\Exception $e){
            // return back()->with($e->getMessage());
            echo "<pre>" ;
            echo $e ;
            
        }

    }
    
     public function helpcenter(Request $request){
        require_once ('price.php');
        $settings = Genral::first();
        return view('front.helpcenter',compact('conversion_rate','settings'));
    }
     public function learningcenter(Request $request){
        require_once ('price.php');
        $settings = Genral::first();
        return view('front.learningcenter',compact('conversion_rate','settings'));
    }
    public function reportabuse(Request $request){
        require_once ('price.php');
        $settings = Genral::first();
        return view('front.reportabuse',compact('conversion_rate','settings'));
    }
    public function resources(Request $request){
        require_once ('price.php');
        $settings = Genral::first();
        return view('front.resources',compact('conversion_rate','settings'));
    }

    public function getReportabuse(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'mobile' => 'required',
            'message' => 'required',
             'fileattach'=>'required|mimes:jpg,JPG,png,PNG,jpeg,JPEG,pdf,PDF,doc,DOC,docx,DOCX',
        ]);
        
        
            $image=$request->file('fileattach');
            $ext=$image->extension();
            $file=time().'.'.$ext;
            $image->storeAs('/public/admin/report',$file);
            $data=array(
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                 'mobile'=>$request->input('mobile'),
                'message'=>$request->input('message'),
                'fileattach'=>$file,
            );
            
            DB::table('report_abuse')->insert($data);
            return redirect('/thankyou');


    }
    
    public function disputeform(Request $request){
        require_once ('price.php');
        $settings = Genral::first();
        return view('front.disputeform',compact('conversion_rate','settings'));
    }

    public function getDisputeform(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'mobile' => 'required',
            'dispute_reason' => 'required',
            'share_link' => 'required',
            'message' => 'required',
             'fileattach'=>'required|mimes:jpg,JPG,png,PNG,jpeg,JPEG,pdf,PDF,doc,DOC,docx,DOCX',
        ]);
        
        
            $image=$request->file('fileattach');
            $ext=$image->extension();
            $file=time().'.'.$ext;
            $image->storeAs('/public/admin/dispute',$file);
            $data=array(
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                 'mobile'=>$request->input('mobile'),
                 'dispute_reason' => $request->input('dispute_reason'),
                 'share_link' => $request->input('share_link'),
                'message'=>$request->input('message'),
                'fileattach'=>$file,
            );
            
            DB::table('dispute')->insert($data);
            return redirect('/thankyou');


    }
    
    public function feedbackform(Request $request){
        require_once ('price.php');
        $settings = Genral::first();
        return view('front.feedbackform',compact('conversion_rate','settings'));
    }

    public function getFeedbackform(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'mobile' => 'required',
            'feedback_about' => 'required',
            'share_link' => 'required',
            'message' => 'required',
        ]);
        
            $data=array(
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                 'mobile'=>$request->input('mobile'),
                 'feedback_about' => $request->input('feedback_about'),
                 'share_link' => $request->input('share_link'),
                'message'=>$request->input('message'),
            );
            
            DB::table('feedback')->insert($data);
            return redirect('/thankyou');


    }
    
    public function leaveyourcomment(Request $request){
        require_once ('price.php');
        $settings = Genral::first();
        $data["comments"]=DB::table('tbl_comments')->where('is_active',"1")->get();
        return view('front.leaveyourcomment',$data,compact('conversion_rate','settings'));
    }

    public function getLeaveyourcomment(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'message' => 'required',
        ]);
        
            $data=array(
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'message'=>$request->input('message'),
            );
            
            DB::table('tbl_comments')->insert($data);
            return redirect('/thankyou');


    }
    
    public function view()
    {
        $contacts = DB::table('contact_enquiry')->select()->get();
            
             return view("admin.contact.index",compact("contacts"));
    }
    
    
    public function destroy($id)
    {
        $cat = DB::table('contact_enquiry')->where('id', $id)->delete();
        
         if($value){
            session()->flash("deleted","Review Has Been Deleted");
            return back();
         }
    }
    
    
}
