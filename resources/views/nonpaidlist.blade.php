@extends('layout')

@section('title','Non-paid List')


@section('ad')
<div id="page-wrapper">
    <x-header/>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header" style="border-bottom: 1px solid #ec1db9f3;">Non-paid List</h1>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Paid List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Distributor Name </th>
                                    <th>Phone No.</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Registration Date</th>
                                    <th>User Status</th>
                                    <th>Payment Status</th>
                                    <th style="color: blue;">Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1
                                @endphp
                                @foreach ($Notpaiddata as $item)
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
                                    <td class="text-center">
                                        @if ($item->payment_status == 1)
                                            <div style="color: green">Paid</div> 
                                        @else
                                            @if ( $item->payment_status == 0 )
                                                <div style="color: red">Not Paid</div>
                                            @endif
                                        @endif
                            
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('customer.edit',$item->id) }}" style="color: blue;">Edit</a>
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
@endsection

  

     