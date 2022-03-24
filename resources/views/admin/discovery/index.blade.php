@extends("admin/layouts.master")
@section('title','All Discovery | ')
@section("body")

   <div class="box" >
       <div class="box-header">
            <h3 class="box-title">
                Discovery Form
            </h3>
        </div>
        <div class="box-body">
            <table id="full_detail_table" class="width100 table table-bordered table-striped">
                <thead>
                    <tr>
                      <th>Id</th>
                      <th>Company Name </th>
                      <th>Type of Business</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Address </th>
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
                      $count =  count($discoverys);
                      ?>
                       @foreach($discoverys as $discovery)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$discovery->companyname}}</td>
                        <td>{{$discovery->typeofbusiness}}</td>
                        <td>{{$discovery->email}}</td>
                        <td>{{$discovery->mobile}}</td>
                        <td>{{$discovery->address}}</td>
                        <td>{{date('d M Y', strtotime($discovery->created_at)) }}</td>
                        <td>
                        <a href="{{route('discovery.show',[$discovery->id])}}" class="btn btn-md btn-danger"> <i class="fa fa-eye"></i></a>
                        </td>  
                    </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
   
@endsection