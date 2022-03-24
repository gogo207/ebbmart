@extends("admin/layouts.master")
@section('title','All Discovery | ')
@section("body")

   <div class="box" >
       <div class="box-header">
            <h3 class="box-title">
                Discovery Form
            </h3>
        </div>
           <div class="panel-heading">
      
            </div>
             <?php $i=1;
          $review_t = 0;
          $price_t = 0;
          $value_t = 0;
          $sub_total = 0;
        //   $count =  count($discoverys);
          ?>
        <div class="box-body">
            <table id="full_detail_table" class="width100 table table-bordered table-striped">
            
                  <tr>
                <td colspan="4"><h3>COMPANY DETAILS</h3></td>
            </tr>
           
            <tr>
                <th>Company Name</th>
                <td>{{ $discoverys->companyname }}</td>
                <th>Type of Business</th>
                <td>{{ $discoverys->typeofbusiness }}</td>
            </tr>
            <tr>
                <th>Email address</th>
                <td>{{ $discoverys->email }}</td>
                <th>Mobile:</th>
                <td>{{ $discoverys->mobile }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $discoverys->address }}</td>
                <th>City</th>
                <td>{{ $discoverys->city}}</td>
            </tr>
            <tr>
                <th>State</th>
                <td>{{ $discoverys->state }}</td>
                <th>Zipcode</th>
                <td>{{ $discoverys->zipcode }}</td>
            </tr>
            
              <tr>
                <td colspan="4"><h3>Number of Employees</h3></td>
            </tr>
           
            <tr>
                <th>Full-time</th>
                <td>{{ $discoverys->full_time }}</td>
                <th>Part-time</th>
                <td>{{ $discoverys->part_time }}</td>
            </tr>
            <tr>
                <th>Remote</th>
                <td>{{ $discoverys->remote }}</td>
                <th>1099</th>
                <td>{{ $discoverys->freelancer }}</td>
            </tr>
            <tr>
                <th>Payroll Frequency</th>
                <td>{{ $discoverys->payrollfrequency }}</td>
                <th>Payroll Company</th>
                <td>{{ $discoverys->payrollcompany }}</td>
            </tr>
            <tr>
                <th>Decision Maker Name</th>
                <td>{{ $discoverys->decisionmakername }}</td>
                <th>Contact Person Name</th>
                <td>{{ $discoverys->contactpersonname }}</td>
            </tr>
            
            <tr>
                <th colspan="2">Tell me what a typical day looks like at your company (blue/white collar, job duties,shifts,busiest day of the week, etc.)</th>
                <td>{{ $discoverys->typicalday }}</td>
              
            </tr>
            
            <tr>
                <th colspan="2">Tell me about the demographics of your workforce (age, gender, family status, average income, primary language, activity level, etc.)</th>
                <td>{{ $discoverys->demographics }}</td>
            </tr>
            
            
            
            <tr>
                <td colspan="4"><h3>CORE BENEFITS</h3></td>
            </tr>
           

           
           
            <tr>
                <th colspan="3">Do you offer your employees core benefits?</th>
                <td>{{ $discoverys->core_benefits ?? 'No Reply'  }}</td>
                
            </tr>
            @if( $discoverys->core_benefits == 'yes')
            <tr>
                <th>Broker Name</th>
                <td>{{ $discoverys->brokername }}</td>
                <th>Medical Insurance </th>
                <td>{{ $discoverys->medical_insurance }}</td>
            </tr>
            
            <tr>
                <th>Vision <span class="pl-5"> {{ $discoverys->vision }} </span></th>
            
                <th colspan="2">Life Insurance <span class="pl-5"> {{ $discoverys->life_insurance }} </span></th>
                <th> Dental <span class="pl-5"> {{ $discoverys->dental }} </span></th>
            </tr>
            
            <tr>
                <th>How are benefits enrolled?</th>
                <td>{{ $discoverys->benefits_enrolled }}</td>
                <th>What is the open enrollment date?</th>
                <td>{{ $discoverys->open_enrollment }}</td>
            </tr>
            
            
            @endif
            
             @if( $discoverys->core_benefits == 'no')
            <tr>
                <th> Premium-only Plan Year Dates</th>
                <td>{{ $discoverys->pop }}</td>
                <th>Medical Reimbursements </th>
                <td>{{ $discoverys->mr }}</td>
            </tr>
            
            <tr>
                <th> Dependent Care Reimbursements <span class="pl-5"> {{ $discoverys->dcr }} </span></th>
            
                <th> Do you pay a fee for pre-taxing services? </span></th>
                <th colspan="2"> {{ $discoverys->pre_taxing }}</th>
            </tr>
            
            <tr>
                <th>Do you have access to plan documents?</th>
            
                
                <th colspan="3"> {{ $discoverys->plan_documents }}</th>
            </tr>
            
            @endif
            
            
            
            
            <tr>
                <td colspan="4"><h3>VOLUNTARY AND OTHER BENEFITS</h3></td>
            </tr>
            
            <tr>
                <th> Long-Term Disability</th>
                <td>{{ $discoverys->ltd }}</td>
                <th>Short-Term Disability</th>
                <td>{{ $discoverys->std }}</td>
            </tr>
            
            <tr>
                <th>  Accident</th>
                <td>{{ $discoverys->accident }}</td>
                <th>Supplemental Health</th>
                <td>{{ $discoverys->sh }}</td>
            </tr>
            
            <tr>
                <th>  Cancer/Critical Care</th>
                <td>{{ $discoverys->cc }}</td>
                <th>Health Savings Account</th>
                <td>{{ $discoverys->hsa }}</td>
            </tr>
            
            <tr>
                <th>Vacation/Sick Leave</th>
                <td>{{ $discoverys->ltd }}</td>
                <th>401(k)</th>
                <td>{{ $discoverys->profit_sharing }}</td>
            </tr>
                       
            <tr>
                <th>Wellness Programs</th>
                <td>{{ $discoverys->wellness_programs }}</td>
                <th>Benefit Bank</th>
                <td>{{ $discoverys->benefit_bank }}</td>
            </tr>
                       
            <tr>
                <th>How are benefits decisions made in your company?</th>
                <td colspan="3">{{ $discoverys->benefits_decisions }}</td>
            </tr>
            
            <tr>
                <th>How are your annual enrollments currently communicated?</th>
                <td colspan="3">{{ $discoverys->annual_enrollment }}</td>
            </tr>
            
            <tr>
                <th>Is there a benefit that your employees have asked for that you are not currently offering?</th>
                <td colspan="3">{{ $discoverys->benefits_nco }}</td>
            </tr>
            
            <tr>
                <th>What would you NOT change about your benefits offering?</th>
                <td colspan="3">{{ $discoverys->change_benefits_offering }}</td>
            </tr>
            
            <tr>
                <th>Over the past 3–5 years, have you experienced medical plan rate increases?</th>
                <td colspan="3">{{ $discoverys->mpri }}</td>
            </tr>
            
            <tr>
                <th>Do you feel employees understand and appreciate your investment in their benefits?</th>
                <td colspan="3">{{ $discoverys->feel_employees }}</td>
            </tr>
                    
            <tr>
                <td colspan="4"><h3>UNBENEFITED QUESTIONS</h3></td>
            </tr>  
            
             <tr>
                <th colspan="3">Have you ever offered benefits to your employees?</th>
                <td>{{ $discoverys->offered_benefits ?? 'No Reply'  }}</td>
                
            </tr>
            
            @if($discoverys->offered_benefits == 'yes')
            
            <tr>
                <th>What did that look like for your employees?</th> 
                <td colspan="3">{{ $discoverys->like_employees }}</td>
            </tr>
            
            <tr>
                <th>Why do you think it didn’t work out?</th> 
                <td colspan="3">{{ $discoverys->didnot_work }}</td>
            </tr>
            
            <tr>
                <th>What were you willing to invest in the program?</th> 
                <td colspan="3">{{ $discoverys->willing_to_invest }}</td>
            </tr>
                    
            
            @endif
            
            @if($discoverys->offered_benefits == 'no')
            
            <tr>
                <th>What do you feel has kept you from offering any benefits?</th> 
                <td colspan="3">{{ $discoverys->offering_any_benefits }}</td>
            </tr>
                    
            
            @endif
            
             <tr>
                <th>What separates you from other companies in your industry when it comes to attracting, hiring and retaining talent?</th> 
                <td colspan="3">{{ $discoverys->ahr_talent }}</td>
            </tr>
            
             <tr>
                <th>Who are your competitors? Do you know what they offer?</th> 
                <td colspan="3">{{ $discoverys->competitors }}</td>
            </tr>
            
             <tr>
                <th>If one of your employees was in financial distress, would he/she come to you for assistance?</th> 
                <td colspan="3">{{ $discoverys->employees_fd }}</td>
            </tr>
            
            <tr>
                <th>Do you feel your company experiences an abnormal amount of workers’ comp claims?</th> 
                <td colspan="3">{{ $discoverys->comp_claims }}</td>
            </tr>
            
            <tr>
                <th>Note *</th> 
                <td colspan="3">{{ $discoverys->comp_claims }}</td>
            </tr>
            
                
            <tr>
                <td colspan="4"><h3>ADDITIONAL NOTES</h3></td>
            </tr>
            
             <tr>
                <th>Note *</th> 
                <td colspan="3">{{ $discoverys->additional_notes }}</td>
            </tr>
                       
            </table>
       </div>
    </div>
   
@endsection