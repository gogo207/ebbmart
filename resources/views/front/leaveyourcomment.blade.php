@extends('front.layout.master')
@section('title','Leave your Comment | ')
@section('body')
<style>
    .comment-inner {
    background: #eee;
    padding: 20px;
    border-radius: 5px;
    margin-bottom: 20px;
}
.comment-inner p{
    font-size: 16px;
    margin-bottom: 0px;
}
.comment-box1 img {
    height: 50px;
    margin-right: 15px;
}
.comment-box2 {
    padding-top: 5px;
}
</style>
<div class="body-content">
    <div class="container-fluid">
        <div class="contact-page">
            <div class="row">

               
                <div class="col-md-8 contact-form">
                    <form action="{{ route('get.leaveyourcomment') }}" method="POST" novalidate class="form" enctype='multipart/form-data'>
                        @csrf
                        <div class="row">
                           
                            <div class="col-md-12 contact-title">
                                <h4>{{ __('staticwords.LeaveYourComment') }}</h4>
                            </div>
                            <div class="col-md-6">
    
                                <div class="form-group">
                                    <label>{{ __('staticwords.YourName') }}: <span
                                            class="text-danger">*</span></label>
                                    <input required name="name" type="text"
                                        class="@error('name') 'is-invalid' @enderror form-control unicase-form-control text-input"
                                        id="name" value="{{ old('name') }}"
                                        placeholder="{{ __('staticwords.EnterYourName') }}">
    
    
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
    
                                <div class="form-group ">
                                    <label class="info-title" for="email">{{ __('staticwords.eaddress') }}
                                        <span class="text-danger">*</span></label>
                                    <input required name="email" type="email"
                                        class="@error('email') 'is-invalid' @enderror form-control unicase-form-control text-input"
                                        id="email" value="{{ old('email') }}"
                                        placeholder="{{ __('staticwords.Enteryouremailaddress') }}">
    
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group ">
                                    <label class="info-title" for="message">{{ __('staticwords.Message') }}
                                        <span class="text-danger">*</span></label>
                                    <textarea rows="5" cols="30" name="message" required
                                        placeholder="{{ __('staticwords.PleaseEnterMessage') }}"
                                        class="form-control @error('message') 'is-invalid' @enderror unicase-form-control"
                                        id="message">{{ old('message') }}</textarea>
    
    
                                    @error('message')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 outer-bottom-small m-t-20">
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Send
                                    Message</button>
                            </div>
                        </div>
                    </form>

                    
                </div>

                <div class="col-md-4 contact-info">
                    <div class="contact-title">
                        <h4>{{ __('staticwords.Information') }}</h4>
                    </div>
                    <div class="clearfix p-1">
                        <span class="contact-i"><i class="fa fa-map-marker"></i></span>
                        <span class="contact-span">{{ $settings['address'] }}</span>
                    </div>
                    <div class="clearfix p-1">
                        <span class="contact-i"><i class="fa fa-mobile"></i></span>
                        <span class="contact-span"><a href="tel:{{ $settings['mobile'] }}">{{ $settings['mobile'] }}</a></span>
                    </div>
                    <div class="clearfix p-1">
                        <span class="contact-i"><i class="fa fa-envelope"></i></span>
                        <span class="contact-span"><a href="mail:{{ $settings['email'] }}">{{ $settings['email'] }}</a></span>
                    </div>
                </div>
                
                <div class="col-md-12 comment-box">
                    <h3>Comments</h3>
                    <hr>
                    @foreach($comments as $comment) 
                    <div class="comment-inner">
                        <div class="comment-box1">
                             <img  src="{{url('images/user.png')}}" alt="icon">
                        </div>
                        <div class="comment-box2">
                            <h5>{{$comment->name}}</h5>
                            <p>{{$comment->message}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
     // Example starter JavaScript for disabling form submissions if there are invalid fields
     (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('form');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
            
        }, false);
        
        });
    }, false);
    })();
</script>  
@endsection