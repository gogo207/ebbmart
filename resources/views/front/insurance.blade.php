@extends('front.layout.master')
@section('title','Insurance| ')
@section('body')
<style>
    .radio.form-check label {
    padding: 0px 10px;
}
.radio.form-check input {
    margin: 0px 5px;
}
</style>
<div class="body-content">
    <div class="container-fluid">
        <div class="contact-page">
            <div class="row">

                <div class="col-md-8 contact-form">
                    <form action="{{ route('get.insurance') }}" method="POST" novalidate class="form">
                        @csrf
                    <div class="row">
                       
                        <div class="col-md-12 text-center">
                            <h2>{{ __('staticwords.DiscoveryForm') }}</h2>
                        </div>
                         <div class="col-md-12 contact-title">
                                <input  name="decisionmakername"  type="text"
                                    class=" form-control unicase-form-control text-input  @error('decisionmakername') 'is-invalid' @enderror"
                                    id="decisionmakername" value="{{ old('decisionmakername') }}">

                               @error('decisionmakername')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            <h4>COMPANY DETAILS</h4>
                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <label>{{ __('staticwords.CompanyName') }}: <span
                                        class="text-danger">*</span></label>
                                <input  name="companyname" type="text" required
                                    class="@error('companyname') 'is-invalid' @enderror form-control unicase-form-control text-input"
                                    id="companyname" value="{{ old('companyname') }}">


                                @error('companyname')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                          <div class="col-md-3">
                            <div class="form-group ">
                                <label class="info-title" for="typeofbusiness">{{ __('staticwords.Typeofbusiness') }}: <span
                                        class="text-danger">*</span></label>
                                <input  name="typeofbusiness"  type="text" required
                                    class="@error('typeofbusiness') 'is-invalid' @enderror form-control unicase-form-control text-input"
                                    id="typeofbusiness" value="{{ old('typeofbusiness') }}">


                                @error('typeofbusiness')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">

                            <div class="form-group ">
                                <label class="info-title" for="email">{{ __('staticwords.eaddress') }}
                                    <span class="text-danger">*</span></label>
                                <input  name="email" type="email" required
                                    class="@error('email') 'is-invalid' @enderror form-control unicase-form-control text-input"
                                    id="email" value="{{ old('email') }}">

                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div> 
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="info-title" for="mobile">{{ __('staticwords.Mobile') }}: <span
                                        class="text-danger">*</span></label>
                                <input  name="mobile"  type="number" required
                                    class="@error('mobile') 'is-invalid' @enderror form-control unicase-form-control text-input"
                                    id="mobile" value="{{ old('mobile') }}">


                                @error('mobile')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">

                            <div class="form-group ">
                                <label class="info-title" for="address">{{ __('staticwords.Address') }}
                                    <span class="text-danger">*</span></label>
                                <input  name="address" type="address" required
                                    class="@error('address') 'is-invalid' @enderror form-control unicase-form-control text-input"
                                    id="address" value="{{ old('address') }}">

                                @error('address')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                        </div> 
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="info-title" for="city">{{ __('staticwords.City') }}: <span
                                        class="text-danger">*</span></label>
                                <input  name="city"  type="text" required
                                    class="@error('city') 'is-invalid' @enderror form-control unicase-form-control text-input"
                                    id="city" value="{{ old('city') }}">


                                @error('city')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="info-title" for="state">{{ __('staticwords.State') }}: <span
                                        class="text-danger">*</span></label>
                                <input  name="state"  type="text" required
                                    class="@error('state') 'is-invalid' @enderror form-control unicase-form-control text-input"
                                    id="state" value="{{ old('state') }}">


                                @error('state')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="info-title" for="zipcode">{{ __('staticwords.Zipcode') }}: <span
                                        class="text-danger">*</span></label>
                                <input  name="zipcode"  type="text" required
                                    class="@error('zipcode') 'is-invalid' @enderror form-control unicase-form-control text-input"
                                    id="zipcode" value="{{ old('zipcode') }}">

                                @error('zipcode')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-12">
                            <h6>Number of Employees</h6>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="info-title" for="full_time">Full-time</label>
                                <input  name="full_time"  type="text"
                                    class=" form-control unicase-form-control text-input"
                                    id="full_time" value="{{ old('full_time') }}">

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="info-title" for="part_time">Part-time</label>
                                <input  name="part_time"  type="text"
                                    class="form-control unicase-form-control text-input"
                                    id="part_time" value="{{ old('part_time') }}">

                               
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="info-title" for="remote">Remote</label>
                                <input  name="remote"  type="text"
                                    class="form-control unicase-form-control text-input"
                                    id="remote" value="{{ old('remote') }}">

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="info-title" for="freelancer">1099</label>
                                <input  name="freelancer"  type="text"
                                    class=" form-control unicase-form-control text-input"
                                    id="freelancer" value="{{ old('freelancer') }}">

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="info-title" for="payrollfrequency">{{ __('staticwords.PayrollFrequency') }}: <span
                                        class="text-danger">*</span></label>
                                <input  name="payrollfrequency"  type="text"
                                    class="form-control unicase-form-control text-input @error('payrollfrequency') 'is-invalid' @enderror"
                                    id="payrollfrequency" value="{{ old('payrollfrequency') }}">
                                @error('payrollfrequency')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="info-title" for="payrollcompany ">{{ __('staticwords.PayrollCompany') }}: <span
                                        class="text-danger">*</span></label>
                                <input  name="payrollcompany"  type="text"
                                    class=" form-control unicase-form-control text-input  @error('payrollcompany') 'is-invalid' @enderror"
                                    id="payrollcompany" value="{{ old('payrollcompany') }}">

                                @error('payrollcompany')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="info-title" for="decisionmakername ">{{ __('staticwords.DecisionMakerName') }}: <span
                                        class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group ">
                                <label class="info-title" for="contactpersonname ">{{ __('staticwords.ContactPersonName') }}: <span
                                        class="text-danger">*</span></label>
                                <input  name="contactpersonname"  type="text"
                                    class=" form-control unicase-form-control text-input  @error('contactpersonname') 'is-invalid' @enderror"
                                    id="contactpersonname" value="{{ old('contactpersonname') }}">

                                @error('contactpersonname')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="info-title" for="typicalday">Tell me what a typical day looks like at your 
                                company (blue/white collar, job duties,shifts,busiest day of the week, etc.)</label>
                                <textarea rows="5" cols="30" name="typicalday" 
                                    class="form-control  unicase-form-control"
                                    id="typicalday">{{ old('typicalday') }}</textarea>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="info-title" for="demographics">Tell me about the demographics of your
                                workforce (age, gender, family status, average income, primary language, activity level, etc.)</label>
                                <textarea rows="5" cols="30" name="demographics" 
                                    class="form-control @error('demographics') 'is-invalid' @enderror unicase-form-control"
                                    id="demographics">{{ old('demographics') }}</textarea>


                                @error('demographics')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-12 contact-title">
                            <h4>CORE BENEFITS </h4>
                        </div>
                        <div class="col-md-12">
                            
                            <div class="radio  form-check pl-0">
                                 <label class="info-title pl-0">Do you offer your employees core benefits? </label>
                                <label>
                                   <input type="radio" name="core_benefits" value="yes">Yes
                                </label>
                                <label>
                                   <input type="radio" name="core_benefits" value="No">No
                                </label>
                             </div>
                        </div>
                        <div class="main-box1">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="info-title" for="brokername">Broker Name</label>
                                            <input  name="brokername"  type="text"
                                                class="form-control unicase-form-control text-input"
                                                id="brokername" value="{{ old('brokername') }}">
            
            
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="medical_insurance" type="checkbox" name="medical_insurance" value="" onchange="medicalinsurance()"/>
                                        <label class="info-title pl-0">Medical Insurance </label>
                                    </div>
                                    
                                    <div class="box1">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6> What portion of the premium do you pay?</h6>
                                                </div>
                                                
                                                 <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="info-title" for="premium_employee">Employee</label>
                                                        <input  name="premium_employee"  type="text"
                                                            class="form-control unicase-form-control text-input"
                                                            id="premium_employee" value="{{ old('premium_employee') }}">
                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="info-title" for="premium_family">Family</label>
                                                        <input  name="premium_family"  type="text"
                                                            class=" form-control unicase-form-control text-input"
                                                            id="premium_family" value="{{ old('premium_family') }}">
                        
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <h6> What is the deductible?</h6>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="info-title" for="deductible_employee">Employee</label>
                                                        <input  name="deductible_employee"  type="text"
                                                            class=" form-control unicase-form-control text-input"
                                                            id="deductible_employee" value="{{ old('deductible_employee') }}">
                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group ">
                                                        <label class="info-title" for="deductible_family">Family</label>
                                                        <input  name="deductible_family"  type="text"
                                                            class=" form-control unicase-form-control text-input"
                                                            id="deductible_family" value="{{ old('deductible_family') }}">
                        
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group ">
                                                        <label class="info-title" for="copay">What is the copay?
                                                            <span class="text-danger">*</span></label>
                                                        <textarea rows="2" cols="30" name="copay" 
                                                            class="form-control @error('copay') 'is-invalid' @enderror unicase-form-control"
                                                            id="copay">{{ old('copay') }}</textarea>
                        
                        
                                                        @error('copay')
                                                        <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-md-12">
                                        <input  type="checkbox" name="vision" value="" />
                                        <label class="info-title pl-0">Vision</label>
                                    </div>
                                      <div class="col-md-12">
                                        <input  type="checkbox" name="life_insurance" value="" />
                                        <label class="info-title pl-0">Life Insurance</label>
                                    </div>
                                     <div class="col-md-12">
                                        <input  type="checkbox" name="dental" value="" />
                                        <label class="info-title pl-0">Dental</label>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="info-title" for="benefits_enrolled">How are benefits enrolled?</label>
                                            <textarea rows="2" name="benefits_enrolled" 
                                                class="form-control @error('benefits_enrolled') 'is-invalid' @enderror unicase-form-control"
                                                id="benefits_enrolled">{{ old('benefits_enrolled') }}</textarea>
            
            
                                            @error('benefits_enrolled')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="info-title" for="open_enrollment">What is the open enrollment date?</label>
                                            <textarea rows="2" name="open_enrollment" 
                                                class="form-control @error('open_enrollment') 'is-invalid' @enderror unicase-form-control"
                                                id="open_enrollment">{{ old('open_enrollment') }}</textarea>
            
            
                                            @error('open_enrollment')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-box2">
                            <div class="col-md-12">
                                <div class="row">
                                     <div class="col-md-12">
                                        <input  type="checkbox" name="pop" value="" />
                                        <label class="info-title pl-0">Premium-only Plan Year Dates</label>
                                    </div>
                                     <div class="col-md-12">
                                        <input  type="checkbox" name="mr" value="" />
                                        <label class="info-title pl-0">Medical Reimbursements</label>
                                    </div>
                                     <div class="col-md-12">
                                        <input  type="checkbox" name="dcr" value="" />
                                        <label class="info-title pl-0">Dependent Care Reimbursements</label>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="info-title" for="pre_taxing">Do you pay a fee for pre-taxing services?</label>
                                            <textarea rows="2" name="pre_taxing" 
                                                class="form-control @error('pre_taxing') 'is-invalid' @enderror unicase-form-control"
                                                id="pre_taxing">{{ old('pre_taxing') }}</textarea>
            
            
                                            @error('pre_taxing')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="info-title" for="plan_documents">Do you have access to plan documents?</label>
                                            <textarea rows="2" name="plan_documents" 
                                                class="form-control @error('plan_documents') 'is-invalid' @enderror unicase-form-control"
                                                id="plan_documents">{{ old('plan_documents') }}</textarea>
            
            
                                            @error('plan_documents')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                 </div>
                            </div>
                        </div> 
                        <div class="col-md-12 contact-title">
                            <h4>VOLUNTARY AND OTHER BENEFITS </h4>
                        </div>
                        <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input  type="checkbox" name="ltd" value="" />
                                        <label class="info-title pl-0">Long-Term Disability</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input  type="checkbox" name="std" value="" />
                                        <label class="info-title pl-0"> Short-Term Disability</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input  type="checkbox" name="accident" value="" />
                                        <label class="info-title pl-0">Accident</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input  type="checkbox" name="sh" value="" />
                                        <label class="info-title pl-0">Supplemental Health</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input  type="checkbox" name="cc" value="" />
                                        <label class="info-title pl-0">Cancer/Critical Care</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input  type="checkbox" name="hsa" value="" />
                                        <label class="info-title pl-0">Health Savings Account </label>
                                    </div>
                                    <div class="col-md-6">
                                        <input  type="checkbox" name="leave_type" value="" />
                                        <label class="info-title pl-0">Vacation/Sick Leave</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input  type="checkbox" name="profit_sharing" value="" />
                                        <label class="info-title pl-0">401(k)</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input  type="checkbox" name="wellness_programs" value="" />
                                        <label class="info-title pl-0">Wellness Programs</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input  type="checkbox" name="benefit_bank" value="" />
                                        <label class="info-title pl-0">Benefit Bank</label>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                    <label class="info-title" for="benefits_decisions">How are benefits decisions made in your company?</label>
                                    <textarea rows="2" name="benefits_decisions" 
                                        class="form-control @error('benefits_decisions') 'is-invalid' @enderror unicase-form-control"
                                        id="benefits_decisions">{{ old('benefits_decisions') }}</textarea>
    
    
                                    @error('benefits_decisions')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                    <label class="info-title" for="annual_enrollment"> How are your annual enrollments currently communicated?</label>
                                    <textarea rows="2" name="annual_enrollment" 
                                        class="form-control @error('annual_enrollment') 'is-invalid' @enderror unicase-form-control"
                                        id="annual_enrollment">{{ old('annual_enrollment') }}</textarea>
    
    
                                    @error('annual_enrollment')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                    <label class="info-title" for="benefits_nco"> Is there a benefit that your employees have asked for that you are not currently offering?</label>
                                    <textarea rows="2" name="benefits_nco" 
                                        class="form-control @error('benefits_nco') 'is-invalid' @enderror unicase-form-control"
                                        id="benefits_nco">{{ old('benefits_nco') }}</textarea>
    
    
                                    @error('benefits_nco')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                    <label class="info-title" for="change_benefits_offering">What would you NOT change about your benefits offering?</label>
                                    <textarea rows="2" name="change_benefits_offering" 
                                        class="form-control @error('change_benefits_offering') 'is-invalid' @enderror unicase-form-control"
                                        id="change_benefits_offering">{{ old('change_benefits_offering') }}</textarea>
    
    
                                    @error('change_benefits_offering')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                    <label class="info-title" for="mpri">Over the past 3–5 years, have you experienced medical plan rate increases?</label>
                                    <textarea rows="2" name="mpri" 
                                        class="form-control @error('mpri') 'is-invalid' @enderror unicase-form-control"
                                        id="mpri">{{ old('mpri') }}</textarea>
    
    
                                    @error('mpri')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                    <label class="info-title" for="feel_employees">Do you feel employees understand and appreciate your investment in their benefits? </label>
                                    <textarea rows="2" name="feel_employees" 
                                        class="form-control @error('feel_employees') 'is-invalid' @enderror unicase-form-control"
                                        id="feel_employees">{{ old('feel_employees') }}</textarea>
    
    
                                    @error('feel_employees')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                
                            </div>
                        </div>
                         <div class="col-md-12 contact-title">
                            <h4>UNBENEFITED QUESTIONS </h4>
                        </div>
                        <div class="col-md-12">
                            
                            <div class="radio  form-check pl-0">
                                 <label class="info-title pl-0">Have you ever offered benefits to your employees? </label>
                                <label>
                                   <input type="radio" name="offered_benefits" value="yes">Yes
                                </label>
                                <label>
                                   <input type="radio" name="offered_benefits" value="No">No
                                </label>
                             </div>
                        </div>
                        <div class="offer-main-box1">
                            <div class="col-md-12">
                                <div class="row">
                                
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="info-title" for="like_employees">What did that look like for your employees?</label>
                                            <textarea rows="2" name="like_employees" 
                                                class="form-control @error('like_employees') 'is-invalid' @enderror unicase-form-control"
                                                id="like_employees">{{ old('like_employees') }}</textarea>
            
            
                                            @error('like_employees')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="info-title" for="didnot_work">Why do you think it didn’t work out?</label>
                                            <textarea rows="2" name="didnot_work" 
                                                class="form-control @error('didnot_work') 'is-invalid' @enderror unicase-form-control"
                                                id="didnot_work">{{ old('didnot_work') }}</textarea>
            
            
                                            @error('didnot_work')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="info-title" for="willing_to_invest">What were you willing to invest in the program?</label>
                                            <textarea rows="2" name="willing_to_invest" 
                                                class="form-control @error('willing_to_invest') 'is-invalid' @enderror unicase-form-control"
                                                id="willing_to_invest">{{ old('willing_to_invest') }}</textarea>
            
            
                                            @error('willing_to_invest')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="offer-main-box2">
                            <div class="col-md-12">
                                <div class="row">
                                   
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <label class="info-title" for="offering_any_benefits">What do you feel has kept you from offering any benefits?</label>
                                            <textarea rows="2" name="offering_any_benefits" 
                                                class="form-control @error('offering_any_benefits') 'is-invalid' @enderror unicase-form-control"
                                                id="offering_any_benefits">{{ old('offering_any_benefits') }}</textarea>
            
            
                                            @error('offering_any_benefits')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                 </div>
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group ">
                                    <label class="info-title" for="ahr_talent">What separates you from other companies in your
                                    industry when it comes to attracting, hiring and retaining talent? </label>
                                    <textarea rows="2" name="ahr_talent" 
                                        class="form-control @error('ahr_talent') 'is-invalid' @enderror unicase-form-control"
                                        id="ahr_talent">{{ old('ahr_talent') }}</textarea>
    
    
                                    @error('ahr_talent')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group ">
                                    <label class="info-title" for="benefits_decisions">Who are your competitors? Do you know what they offer? </label>
                                    <textarea rows="2" name="competitors" 
                                        class="form-control @error('competitors') 'is-invalid' @enderror unicase-form-control"
                                        id="competitors">{{ old('competitors') }}</textarea>
    
    
                                    @error('competitors')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group ">
                                    <label class="info-title" for="employees_fd"> If one of your employees was in financial distress, would he/she come to you for assistance?
                                    </label>
                                    <textarea rows="2" name="employees_fd" 
                                        class="form-control @error('employees_fd') 'is-invalid' @enderror unicase-form-control"
                                        id="employees_fd">{{ old('employees_fd') }}</textarea>
    
    
                                    @error('employees_fd')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                
                            </div>
                        </div>
                         <div class="col-md-12">
                            <div class="form-group ">
                                    <label class="info-title" for="comp_claims">Do you feel your company experiences an abnormal amount of workers’ comp claims?</label>
                                    <textarea rows="2" name="comp_claims" 
                                        class="form-control @error('comp_claims') 'is-invalid' @enderror unicase-form-control"
                                        id="comp_claims">{{ old('comp_claims') }}</textarea>
    
    
                                    @error('comp_claims')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                
                            </div>
                        </div>
                        
                        <div class="col-md-12 contact-title">
                            <h4>ADDITIONAL NOTES </h4>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group ">
                                <label class="info-title" for="additional_notes">{{ __('staticwords.Note') }}
                                    <span class="text-danger">*</span></label>
                                <textarea rows="5" cols="30" name="additional_notes" 
                                    class="form-control @error('additional_notes') 'is-invalid' @enderror unicase-form-control"
                                    id="additional_notes">{{ old('additional_notes') }}</textarea>


                                @error('additional_notes')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 outer-bottom-small m-t-20">
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Send
                                Message</button>
                        </div>

                    </form>

                    </div>
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
                <div class="col-md-6 offset-md-3">
                     <div class="row"> 
                         <div class=" col-md-6 m-auto">
                            <a href="https://calendly.com" target="_blank" rel="noopener noreferrer" class="text-white"> 
                                 <div class="schedule-class"> 
                                   <h4>Schedule Meeting</h4>
                                    <p>(please fill out discovery form before schedule)</p>
                                </div>
                            </a>
                            <!-- <div class="casual-class col-md-6"> -->
                            <!--     <h4>Casual Call Meeting</h4>-->
                            <!--</div>-->
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
$(".box1").hide();
   $(document).ready(function() {
       
        
        $(".main-box1").hide();
        $(".main-box2").hide();
        $("input[name$='core_benefits']").click(function() {
            var test = $(this).val();
            // alert(test);
            if(test == "yes"){
               $(".main-box1").show();
                $(".main-box2").hide();
            }else{
                 $(".main-box2").show();
                  $(".main-box1").hide();
            }
           
        });
    });
      $(document).ready(function() {
       
        
        $(".offer-main-box1").hide();
        $(".offer-main-box2").hide();
        $("input[name$='offered_benefits']").click(function() {
            var test = $(this).val();
            // alert(test);
            if(test == "yes"){
               $(".offer-main-box1").show();
                $(".offer-main-box2").hide();
            }else{
                 $(".offer-main-box2").show();
                  $(".offer-main-box1").hide();
            }
           
        });
    });
    function medicalinsurance()
    {
        if($('.medical_insurance').is(":checked"))   
            $(".box1").show();
        else
            $(".box1").hide();
    }
    
   
</script>
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