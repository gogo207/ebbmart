@extends("front/layout.master")
@section('title','Seller Plans |')
@section("body")
 <div class="body-content">

    <div class="container">
        <div class="pricing-header px-3 py-3 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Success</h1>
            
        </div>
        @if(session('success_msg'))
                    <div class="alert alert-success fade in alert-dismissible show">                
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true" style="font-size:20px">×</span>
                        </button>
                        {{ session('success_msg') }}
                    </div>
                    @endif
                    @if(session('error_msg'))
                    <div class="alert alert-danger fade in alert-dismissible show">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true" style="font-size:20px">×</span>
                        </button>    
                        {{ session('error_msg') }}
                    </div>
                    @endif
                </div>
                </div>



@endsection