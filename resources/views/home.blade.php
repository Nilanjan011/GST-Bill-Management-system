@extends('layout')

@section('title','Home')


 @section('ad')
    <div id="wrapper" style="min-height: 10px;">
        <x-header/>
        <div class="container">
            <div id="page-wrapper">
                <div class="text-center" style=" margin: 30px;">
                    <h1 style="padding-top: 10px;">Welcome {{Session::get('key')}}</h1>
                </div>
                {{-- <div class="row">
                    <div class="col-md-6" style="padding: 30px;" >
                        <div class="card p-5 bg-success" style="border-radius: 10px;border-right: groove;">
                            <div class="card-body text-center" style="padding: 30px;" >
                                <h1 class="card-title">Paid</h1>
                                <h3> {{ $arr['paid']}} </h3>
                            <a href="{{ url('paidlist')}}" class="btn btn-primary">Paid List</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="padding: 30px;">
                        <div class="card p-5 bg-danger" style="border-radius: 10px;border-right: groove;">
                            <div class="card-body text-center" style="padding: 30px;">
                                <h1 class="card-title">Not Paid</h1>
                                <h3>{{ $arr['notpaid']}} </h3>
                                <a href="{{ url('non-paidlist')}}" class="btn btn-danger"> Non-paid List</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

        <div id="page">
            <div id="morris-area-chart"></div>
            <div id="morris-bar-chart"></div>
            <div id="morris-donut-chart"></div>
    
         </div>
         <script>
                         
             document.getElementById("page").style.display="none";
         </script>
    
    <!-- /#wrapper -->
    @endsection

  

     