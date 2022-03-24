@extends('front.layout.master')
@section('title',"Resources | ")
@section('body')
<style>
    .why-con-main {
    display: flex;
    margin-bottom: 10px;
}
.main-reso {
    background-color: #ddd;
    padding: 10px;
    border-radius: 5px;
    width: 20%;
    margin: 0 8px;
}
.why-con-m {
    margin-right: 0px;
    margin-bottom: 20px;
        margin-top: 30px;
}
.why-con {
    width: 80px;
    background-color: #002abf;
    text-align: center;
    height: 80px;
    border-radius: 50%;
    font-size: 18px;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: auto;
}
.why-con-sm {
    font-size: 16px !important;
    margin: 0 0 30px 0 !important;
}
.why-con-sm {
    font-size: 18px;
    color: #000;
    margin: 0 0 0px 0;
    font-weight: 500;
    text-align: center;
}
@media(max-width :768px){
    .why-con-main {
    display: block;
}
    .main-reso {
    width: 100%;
    margin: 0 8px 10px;
}
}
</style>
<div class="checkout-box faq-page">
    <h3>New to sourcing on eBobmart.com</h3>
    <p>Find everything you need in one place. From finding ready-to-ship products or a partner to customize the product you want, all the way through to ensuring quality and shipping your order to its final destination.
    </p>
	<!--<h4>{{ __('staticwords.Resources') }}</h4>-->
	<hr>
	<div class="row">
		<div class="col-md-12 ">
              <div class="why-con-main">
                                <div class="main-reso">
                  <div class="why-con-m">
                    <div class="why-con">Step 1</div>
                  </div>
                  <div class="why-con-sm">Find products and sellers</div>
                </div>
                                <div class="main-reso">
                  <div class="why-con-m">
                    <div class="why-con">Step 2</div>
                  </div>
                  <div class="why-con-sm">Connect with sellers</div>
                </div>
                                <div class="main-reso">
                  <div class="why-con-m">
                    <div class="why-con">Step 3</div>
                  </div>
                  <div class="why-con-sm">Place and protect order</div>
                </div>
                                <div class="main-reso">
                  <div class="why-con-m">
                    <div class="why-con">Step 4</div>
                  </div>
                  <div class="why-con-sm">Pay on eBobmart.com</div>
                </div>
                                <div class="main-reso">
                  <div class="why-con-m">
                    <div class="why-con">Step 5</div>
                  </div>
                  <div class="why-con-sm">Ship and receive your goods</div>
                </div>
                    
              </div>
            </div>
	</div>
</div>
@endsection