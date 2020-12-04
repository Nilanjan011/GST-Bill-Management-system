@extends('layout')

@section('title','Show Distributors')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<script>

    $(document).ready(function(){
        $("#example").DataTable();
    });
</script>

@section('ad')
    
<div id="wrapper">
    <x-header/>
    <div id="page">
        <div id="morris-area-chart"></div>
        <div id="morris-bar-chart"></div>
        <div id="morris-donut-chart"></div>

    </div>
    <script>
        document.getElementById("page").style.display="none";

        $(document).ready(function() {
            $('#example').DataTable();
        } );

    </script>
     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="border-bottom: 1px solid #ec1db9f3;">Distributors Table</h1>
                @if ($message = Session::get('message'))
                    <div class="alert alert-danger alert-block">
                        <button class="close" data-dismiss="alert">X</button>
                        <strong>{{$message}}</strong>
                    </div>
                @endif
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Distributor Tables
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                         <table class="table table-striped table-bordered table-hover display" id="example">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Distributor Name </th>
                                        <th>Phone No.</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Registration Date</th>
                                        <th>User Status</th>
                                        {{-- <th>Payment Status</th> --}}
                                        <th style="color: blue;">Update</th>
                                        <th style="color: red;">DELETE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i=1
                                    @endphp
                                    @foreach ($Distributor as $item)
                                    <tr class="odd gradeX">
                                          <td class="text-center">{{$i++}} </td>
                                        <td class="text-center">{{$item->name}} </td>
                                        <td class="text-center">{{$item->phone}} </td>
                                        <td class="text-center">{{$item->address}} </td>
                                        <td class="text-center">{{$item->email}} </td>
                                        <td class="text-center">{{$item->date}} </td>
                                        <td class="text-center"> 
                                            @if ( $item->user_status == 1 )
                                                Active
                                            @else
                                               @if ( $item->user_status == 2  )
                                               Inactive
                                               @endif 
                                            @endif
                                        </td>
                                        {{-- <td class="text-center">
                                            @if ($item->payment_status == 1)
                                                <div style="color: green">Paid</div> 
                                            @else
                                                @if ( $item->payment_status == 0 )
                                                    <div style="color: red">Not Paid</div>
                                                @endif
                                            @endif
                                
                                        </td> --}}
                                        <td class="text-center">
                                            <a href="{{ route('customer.edit',$item->id) }}" style="color: blue;">Edit</a>
                                        </td>
                                        <td class="text-center">  
                                            <a href="" onclick="if(confirm('Do you want to delete this customer?')) event.preventDefault(); document.getElementById('delete-{{$item->id}}').submit();" style="color: red" class="btn btn-sm btn-outline-danger py-0">Delete</a>
                                            <form id="delete-{{$item->id}}" method="post" action="{{route('customer.delete',$item->id)}}" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
       
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
</div>
@endsection
