@extends("admin/layouts.master")
@section('title','All Contact | ')
@section("body")

   <div class="box" >
       <div class="box-header">
            <h3 class="box-title">
            Contact Form
            </h3>
        </div>
        <div class="box-body">
            <table id="full_detail_table" class="width100 table table-bordered table-striped">
                <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name </th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Subject </th>
                      <th>Message</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                     <?php $i=1;
                      $review_t = 0;
                      $price_t = 0;
                      $value_t = 0;
                      $sub_total = 0;
                      $count =  count($contacts);
                      ?>
                       @foreach($contacts as $contact)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$contact->name }}</td>
                        <td>{{$contact->email }}</td>
                        <td>{{$contact->mobile }}</td>
                        <td>{{$contact->subject }}</td>
                        <td>{{$contact->message }}</td>
                        <td>{{ date('d M Y', strtotime($contact->created_at)) }}</td>
                        <td>
                        <div class="margin-left-15 col-md-2">
                            <button @if(env('DEMO_LOCK') == 0) data-toggle="modal" data-target="#{{$contact->id}}conatact" @else disabled="disabled" title="This action is disabled in demo !" @endif class="btn btn-md btn-danger">
                              <i class="fa fa-trash"></i>
                            </button>
                  </div>
                        </td>  
                    </tr>
                        @endforeach
                </tbody>
            </table>
        
            
        
        </div>
    </div>
    
    
    @foreach($contacts as $contact)
  
   <div id="{{ $contact->id }}contact" class="delete-modal modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <div class="delete-icon"></div>
            </div>
            <div class="modal-body text-center">
              <h4 class="modal-heading">Are You Sure ?</h4>
              <p>Do you really want to delete this contact? This process cannot be undone.</p>
            </div>
            <div class="modal-footer">
               <form method="get" action="{{ route('contact.destroy',$contact->id) }}" class="pull-right">
                          {{csrf_field()}}
                        
                          
                 <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">Yes</button>
              </form>
            </div>
          </div>
        </div>
      </div>

@endforeach
   
@endsection