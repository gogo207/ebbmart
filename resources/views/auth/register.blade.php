@extends("front/layout.master")
@section('title','Register |')
@section("body")
@php
require_once(base_path().'/app/Http/Controllers/price.php');
@endphp
@section('stylesheet')
<style>
    .select2-selection__rendered {
        line-height: 38px !important;
    }

    .select2-container .select2-selection--single {
        height: 38px !important;
    }

    .select2-selection__arrow {
        height: 34px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        text-align: center;
    }
    .select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #eee;
    border-radius: 4px;
    height:45px !important;
    }
    .body-content .sign-in-page form .form-group span {
        color:inherit !important;
    }
    .select2-container--default .select2-results>.select2-results__options{
        max-height:fit-content !important;
    }
</style>
@endsection
@php
   if(isset($selected_language) && $selected_language->rtl_available == 1){
        $class = 'offset-md-0 col-11 m-auto';
   }else{
       $class = 'offset-md-0 col-11 m-auto';
   }
@endphp
<div class="body-content">
    <div class="container">
        <div class="sign-in-page bg-light" style="padding:20px !important">
            <div class="row mt-3">
                <div class="col-md-6 font-size-18 ">
                                <h4 class="checkout-subtitle text-center mb-3">{{ __('staticwords.vendormembership') }}</h4>
                    <p class="text-justify">All! come join your www.ebobmart.com . It's a Portal, here you can create your web pages for goods and services for buying & selling worldwide in this Global- Marketplace! You can also get weekly Monthly, yearly financial reports for annual tax and financial statements!</p>
    
                    <p class="text-justify">You can also save on domain name FEES!</p>
                    
                    <p class="text-justify">eBobmart.com staff is available for any help that you may need! Your are not alone by yourself, we are here to help you all the way & Always!</p>
                    
                    <p class="text-justify">The On-line all Vendors (small & Large), Farmers, Small business vendors, Multi- Millionaires professionals. These vendors and users can get their monthly or yearly "Goods, SERVICES, Selling, and Buying Reports, for your account(s) book keeping required by any agencies of you!.</p>
                    
                    <p class="text-justify">The services can be digitial music, TV, radios streaming content / programs _eLearning Lectures etc." <br>
                    
                    Best Regards, <br>
                    
                    Thank you.<br>
                    
                    <a href="http://eBobmart.com">http://eBobmart.com</a>/</p>
                </div>
   
            <div class="col-md-6 m-auto font-size-18 bg-light ">
            <h4 class="checkout-subtitle text-center">{{ __('staticwords.Createanewaccount') }}</h4>

            <form class="form outer-top-xs" role="form" method="POST" action="{{ route('register') }}" novalidate>
                @csrf
                <!-- create a new account -->

                <div class="row">

                    <div class="{{ $class }} ">
                        <p class="text-success">{{ __('Quick Sign up with') }} :</p>
                        <div class="social-btn text-center">

                            @if($configs->fb_login_enable=='1')
                                <a href="{{ route('sociallogin','facebook') }}" class="btn btn-primary btn-lg"><i class="fa fa-facebook"></i> Facebook</a>
                            @endif

                            @if($configs->twitter_enable == 1)
                                <a href="{{ route('sociallogin','twitter') }}" class="btn bg-twitter btn-lg"><i class="fa fa-twitter"></i> Twitter</a>
                            @endif

                            @if($configs->google_login_enable=='1')
                                <a href="{{ route('sociallogin','google') }}" class="btn btn-danger btn-lg"><i class="fa fa-google"></i> Google</a>
                            @endif
                            
                            @if($configs->amazon_enable=='1')
                                <a href="{{ route('sociallogin','amazon') }}" class="btn btn-warning btn-lg"><i class="fa fa-amazon"></i> Amazon</a>
                            @endif

                            @if(env('ENABLE_GITLAB') == 1 )
                                <a href="{{ route('sociallogin','gitlab') }}" class="btn bg-dark btn-lg"><i class="fa fa-gitlab"></i> Gitlab</a>
                            @endif

                            @if($configs->linkedin_enable=='1')
                                <a href="{{ route('sociallogin','linkedin') }}" class="btn bg-primary btn-lg"><i class="fa fa-linkedin"></i> Linkedin</a>
                            @endif

                            
                        </div>
                        
                        <div class="or-seperator"><b>or</b></div>

                    </div>


                    <div class="{{  $class }} ">
                        <div class="form-group">
                            <label class="info-title"
                                for="exampleInputEmail0">{{ __('staticwords.Username') }}<span>*</span></label>
                            <input required name="username" type="text" value="{{ old('username') }}"
                                class="form-control unicase-form-control text-input{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                id="username exampleInputEmail0"> @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span> @endif

                        </div>
                    </div>
                    <div class="{{  $class }} ">
                        <div class="form-group">
                            <label class="info-title"
                                for="exampleInputEmail1">{{ __('staticwords.Name') }}<span>*</span></label>
                            <input required name="name" type="text" value="{{ old('name') }}"
                                class="form-control unicase-form-control text-input{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                id="name exampleInputEmail1"> @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span> @endif

                           
                        </div>
                    </div>

                    <div class="{{ $class }} ">
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">{{ __('staticwords.eaddress') }}
                                <span>*</span></label>
                            <input required value="{{ old('email') }}" type="email"
                                class="form-control unicase-form-control text-input {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                id="email exampleInputEmail2" name="email" required autofocus>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback"
                                role="alert"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                            <div class="d-flex mt-2">
                                <input type='text' name="" placeholder="Verification Code" class="form-control unicase-form-control text-input w-50">
                                <a href="#" class="btn btn-danger ml-3" style="line-height:30px">Resend Code</a>
                            </div>
                        </div>
                    </div>

                    @if($genrals_settings->otp_enable == 0)
                    
                    <div class="{{  $class }} ">
                       
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail3">{{ __('staticwords.MobileNo') }} {{__("staticwords.WithPhoneCode")}}
                                <span>*</span></label>
                                <div class="row no-gutters">
                                    <div class="col-md-3">
                                        <div class="input-group-prepend">
                                            <select required class="form-control select2" name="phonecode" id="phonecode exampleInputEmail4">
                                                <option>Phone Code</option>
                                                @foreach(App\Allcountry::select('phonecode','iso3')->get() as $code)
                                                <option value="{{ $code->phonecode }}">{{ $code->iso3 }} +{{ $code->phonecode }}</option>
                                                
                                                @endforeach
            
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <input required pattern="[0-9]+" title="{{ __('Please enter valid mobile no') }}."
                                        value="{{ old('mobile') }}" type="text"
                                        class="form-control unicase-form-control text-input{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" id="phone" required>
                                    </div>
                                </div>
                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    @endif

                    @if($genrals_settings->otp_enable == 1)
                    <div class="{{  $class }} ">
                        <label class="info-title" for="exampleInputEmail4">{{ __('staticwords.MobileNo') }}
                            <span>*</span></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <select required class="form-control select2" name="phonecode" id="phonecode exampleInputEmail4">

                                    @foreach(App\Allcountry::select('phonecode','nicename')->get() as $code)
                                    <optgroup label="{{ $code->nicename }}">
                                        <option {{ old('phonecode') == $code->phonecode ? "selected" : "" }}
                                            value="{{ $code->phonecode }}">{{ $code->phonecode }}</option>
                                    </optgroup>
                                    @endforeach

                                </select>
                            </div>
                            <input required pattern="[0-9]+" title="{{ __('Please enter valid mobile no') }}."
                                value="{{ old('mobile') }}" type="text"
                                class="form-control {{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile"
                                id="phone" required>
                            @error('mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <p class="text-danger error"></p>
                        <p class="text-success success"></p>
                    </div>


                    @endif

                    <div class="{{  $class }} ">
                        <div class="form-group">
                            <label class="info-title" for="store">{{ __('staticwords.Storename') }} /Company Name
                                <span>*</span></label>
                            <input required type="text" id="store"
                                class="form-control unicase-form-control text-input {{ $errors->has('storename') ? ' is-invalid' : '' }}"
                                name="storename" required> @if ($errors->has('storename'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('storename') }}</strong>
                            </span> @endif
                            <small>i.e. eBob's Mart, LLC.</small>
                        </div>
                        
                    </div>
                    <div class="{{  $class }}  mt-2">
                        <div class="form-group">
                            <label class="info-title" for="password">{{ __('staticwords.EnterPassword') }}
                                <span>*</span></label>
                            <input required type="password" id="password"
                                class="form-control unicase-form-control text-input {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                name="password" required> @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span> @endif
                        </div>
                    </div>

                    <div class="{{  $class }} ">
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail5">{{ __('staticwords.ConfirmPassword') }}
                                <span>*</span></label>
                            <input required type="password" name="password_confirmation" id="password-confirm exampleInputEmail5"
                                class="form-control unicase-form-control text-input" required />

                           

                        </div>
                    </div>
                    
                    @if($aff_system->enable_affilate == 1)
                        <div class="{{  $class }} ">
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail6">{{ __('staticwords.ReferCode') }}
                                </label>
                                <input value="{{ app('request')->input('refercode') ?? old('refercode') }}" type="text" name="refer_code" class="{{ $errors->has('refercode') ? ' is-invalid' : '' }} form-control unicase-form-control text-input" id="exampleInputEmail6" required />

                                @if ($errors->has('refercode'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('refercode') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
                    @endif


                    @if($genrals_settings->captcha_enable == 1)

                    <div class="{{  $class }} ">
                        <div class="form-group">
                            {!! no_captcha()->display() !!}
                        </div>

                        @error('g-recaptcha-response')
                        <p class="text-danger"><b>{{ $message }}</b></p>
                        @enderror
                    </div>

                    @endif
                    <div class="{{  $class }} ">
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="eula" id="eula" required>
                                <label class="form-check-label" for="eula">
                                    <b>{{ __('I agree to ') }}<a href="{{url('show/terms-and-condition') }}">{{ __('Terms and Conditions') }}</a></b>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="{{  $class }} ">
                        <button type="submit"
                            class="register btn-upper btn btn-primary checkout-page-button">{{ __('staticwords.Register') }}</button>
                        <a class="float-right"
                            href="{{ route('login') }}">{{ __('Already have account login here?') }}</a>
                    </div>


                </div>

                @php
                  $userterm = App\TermsSettings::firstWhere('key','user-register-term');
                @endphp

                <div id="eulaModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5 class="modal-title" id="my-modal-title">{{ $userterm['title'] }}</h5>
                                
                            </div>
                            <div class="modal-body">
                                <div style="overflow: scroll;max-height:500px">
                                
                                    {!! $userterm['description'] !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            </div></div>
        </div>
    </div>
</div>
<!-- /.body-content -->
@endsection
@section('script')
<script>
    "use strict";

    var baseurl = "<?= url('/') ?>";
    $(document).ready(function () {
        $('.select2').select2({
            height: '100px'
        });
    });
</script>
<script src="{{ url('js/ajaxlocationlist.js') }}"></script>
@if($genrals_settings->captcha_enable == 1)
{!! no_captcha()->script() !!}
@endif
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
            }else{
                $('.register').html('<i class="fa fa-circle-o-notch fa-spin fa-fw"></i> {{ __('staticwords.Register') }}');
            }
            form.classList.add('was-validated');
            
        }, false);
        
        });
    }, false);
    })();
</script>
@endsection