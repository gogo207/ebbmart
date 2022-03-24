@extends("front/layout.master")
@php
$sellerac = App\Store::where('user_id','=', $user->id)->first();
@endphp
@section('title',__('staticwords.ManageAccount').' | ')
@section("body")

<div class="container-fluid">

    <div class="row">
        <div class="col-md-12 col-xl-3">

            @include('user.sidebar')

        </div>


        <div class="col-md-12 col-xl-9">

            <div class="bg-white2">

                <h4 class="user_m2">{{ __('staticwords.MyAccount') }}</h5>
                    <hr>
                    
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form class="row g-3 needs-validation" style="line-height:28px" method="POST" action="{{ url('food_add') }}" novalidate>
                        
                         @csrf
                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Restaurant</label>
                            <input type="text" class="form-control" id="validationCustom01" value="{{ old('restaurant') }}" name="restaurant" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="float-left">{{ __('staticwords.Country') }}: <small class="text-danger">*</small></label>
                                <select title="Please select country" required name="country_id" class="@error('country_id') is-invalid @enderror form-control select2" id="country_id">
                                    <option value="">{{ __('staticwords.PleaseChooseCountry') }}</option> @foreach($country as
                                    $c)
                                    <?php
                                    $iso3 = $c->country;

                                    $country_name = DB::table('allcountry')->where('iso3', $iso3)->first();
                                    ?>
                                    <option value="{{$country_name->id}}" /> {{$country_name->nicename}} </option> @endforeach
                                </select>
                                <div class="errorTxt"></div>
                                @error('country_id')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                       
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="float-left">{{ __('staticwords.State') }} <small class="text-danger">*</small></label>
                                <select title="Please select state" required name="state_id" class="@error('state_id') is-invalid @enderror form-control select2" id="upload_id">
                                    <option value="">{{ __('staticwords.PleaseChooseState') }}</option>
                                </select>
                                <div class="errorTxt"></div>
                                @error('state_id')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                         <div class="col-md-4">

                            <div class="form-group">
                                <label class="float-left">{{ __('staticwords.City') }} <small class="text-danger">*</small></label>
                                <select title="Please select city" required name="city_id" id="city_id" class="@error('city_id') is-invalid @enderror form-control select2">
                                    <option value="">{{ __('staticwords.PleaseChooseCity') }}</option>
                                </select>
                                <div class="errorTxt"></div>
                                @error('city_id')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="validationCustom05" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="validationCustom05" value="{{ old('zip') }}"  name="zip" required>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>

                        <div class="mb-3 col-12">
                            <label for="formFileSm" class="form-label">Choose File </label>
                            <label class="form-check-label pull-right mr-4" for="eula">
                                    <b><a href="{{url('show/disclaimer') }}">Disclaimer</a></b>
                            </label>
                            <input class="form-control form-control-mdm" name="fileattach" value="{{ old('fileattach') }}"  id="formFileSm" type="file">
                        </div>

                        <div class="col-12">
                            <label for="validationCustom05" class="form-label">Discrption Restaurant</label>
                            <textarea name="description" rows="4"   class="form-control">{{ old('description') }}</textarea>
                        </div>

                        <div class="col-12"> 
                            <label for="validationCustom05"  class="form-label">Cuisine</label>
                            <input type="text" class="form-control" value="{{ old('cuisine') }}"  name="cuisine" required>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="eula" id="eula" required>
                                    <label class="form-check-label" for="eula">
                                        <b>{{ __('I agree to ') }}<a href="{{url('show/terms-and-condition') }}">{{ __('Terms and Conditions') }}</a></b>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary mt-3" type="submit">Submit</button>
                        </div>
                    </form>
            </div>
        </div>

    </div>

</div>

<!-- Change password Modal -->
<div class="z-index99 modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ __('staticwords.ChangePassword') }} ?</h5>
            </div>
            <div class="modal-body">
                <form id="form1" action="{{ route('pass.update',$user->id) }}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group eyeCy">


                        <label class="font-weight-bold" for="confirm">{{ __('staticwords.Oldpassword') }}:</label>
                        <input required="" type="password" class="form-control @error('old_password') is-invalid @enderror" placeholder="{{ __('staticwords.Enteroldpassword') }}" name="old_password" id="old_password" />

                        <span toggle="#old_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                        @error('old_password')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>



                    <div class="form-group eyeCy">
                        <label class="font-weight-bold" for="password">{{ __('staticwords.EnterPassword') }}:</label>
                        <input required="" id="password" min="6" max="255" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('staticwords.EnterPassword') }}" name="password" minlength="8" />

                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                        @error('password')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror


                    </div>



                    <div class="form-group eyeCy">


                        <label class="font-weight-bold" for="confirm">{{ __('staticwords.ConfirmPassword') }}:</label>
                        <input required="" id="confirm_password" type="password" class="form-control" placeholder="{{ __('staticwords.re-enter-password') }}" name="password_confirmation" minlength="8" />

                        <span toggle="#confirm_password" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                        <p id="message"></p>
                    </div>


                    <button @if(env('DEMO_LOCK')==0) type="submit" @else title="disabled" title="This action is disabled in demo !" @endif id="test" class="btn btn-md btn-success"><i class="fa fa-save"></i> {{ __('staticwords.SaveChanges') }}</button>
                    <button id="btn_reset" data-dismiss="modal" class="btn btn-danger btn-md" type="reset">X
                        {{ __('staticwords.Cancel') }}</button>
                </form>

            </div>

        </div>
    </div>
</div>

@endsection

@section('script')

<script src="{{ url('js/profile.js') }}"></script>
<script>
    var baseUrl = "<?= url('/') ?>";
</script>
<script src="{{ url('js/ajaxlocationlist.js') }}"></script>

@endsection