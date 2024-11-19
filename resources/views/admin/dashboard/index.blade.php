@include('admin.component.header')
@include('admin.component.topnav')
@include('admin.component.navbar')



<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body" ">

    <div class="container-fluid mt-3">

        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body" >
                        <h3 class="card-title text-white">Customer</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$customer}}</h2>
                           <a class="m-0 p-0" href="{{url('/customer')}}"> <p class="text-white mb-0">Customer <i class="fa-solid fa-arrow-right m-2"></i></p></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body" >
                        <h3 class="card-title text-white">Deal</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$deal}}</h2>
                           <a class="m-0 p-0" href="{{url('/deals')}}"> <p class="text-white mb-0">Deal <i class="fa-solid fa-arrow-right m-2"></i></p></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-print"></i></span>
                    </div>
                </div>
            </div>

        </div>




    </div>
    <!-- #/ container -->
</div>
<!--**********************************
            Content body end
        ***********************************-->


@include('admin.component.footer')


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

