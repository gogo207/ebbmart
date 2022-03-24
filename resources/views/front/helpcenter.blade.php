@extends('front.layout.master')
@section('title','Help Center | ')
@section('body')
<style>
    .contact-box-custom {
    padding: 50px;
    min-height: 320px;
    background: #eee;
    text-align: center;
}
.contact-box-custom h4 {
    color: #00f;
    font-size: 30px;
}
.contact-box-custom i {
    font-size: 40px;
    margin-bottom: 20px;
}
</style>
<div class="body-content">
    <div class="container-fluid">
        <div class="contact-page">
            <div class="row">
               
                <div class="col-md-12 text-center">
                    <h2>We’re Standing by to help!</h2>
                    <p>Get in touch with us by using the methods given below.</p>
                </div>
                <div class="col-md-4">
                    <div class="contact-box-custom">
                        <i class="fa fa-envelope-o"></i>
                        <h4>Mail Us</h4>
                        <p>help@ebobmart.com</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-box-custom">
                        <i class="fa fa-clock-o"></i>
                        <h4>Operation Hours</h4>
                        <p>Mon-Fri: 08:00AM to 05:00 PM CDT<br/>
                            Sat: 09:00AM to 12:00 Noon<br/>
                            Sun: Closed<br/>
                            
                            Store: Online<br/>
                            Open 24 Hours, 365/366 Days
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-box-custom">
                        <i class="fa fa-phone"></i>
                        <h4>Call Us</h4>
                        <p>Phone Numbers +1-847-809-5340<br/>
                            TOLL FREE: +1-877-746-4364<br/>
                            +1-877-RING-EMI
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
 
@endsection