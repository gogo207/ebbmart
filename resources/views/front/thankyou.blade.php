@extends('front.layout.master')
@section('title','Thankyou | ')
@section('body')
<style>
    .contact-box-custom {
       padding: 50px;
    min-height: 320px;
    background-image: linear-gradient(90deg, #d7d7c0, #fffe16);
    text-align: center;
    font-family: cursive;
}

</style>
<div class="body-content">
    <div class="container-fluid">
        <div class="contact-page">
            <div class="row">
               
                <div class="col-md-6 offset-md-3 ">
                    <div class="contact-box-custom">
                        <h1 style="font-size:6rem"> <span style="color:#0404bf">Thank </span> <span style="color:#ff58cd">You</span></h1>
                        <h4 class="mt-5 mb-5">Your Query Successfully Submitted!</h4>
                        <a href="https://growthpartner4u.com/ebobmart" class="btn btn-lg btn-primary">Back to Homepage</a>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
 
@endsection