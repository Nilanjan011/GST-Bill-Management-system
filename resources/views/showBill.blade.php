@extends('layout')

@section('title','Show BIll')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
{{-- <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> --}}
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
    </script>
     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <h1 class="page-header" style="border-bottom: 1px solid rgb(45, 218, 45);">Show Bill</h1>
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
            <div class="col-lg-12 col-md-12 col-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Show Bill
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div  style="overflow-x:auto">
                            <table class="table table-striped table-bordered table-hover display" id="example" >
                                <thead class="thead-dark">
                                    <tr>
                                        <th rowspan="2">Registration Date</th>
                                        <th rowspan="2">Invoice No</th>
                                        <th rowspan="2">Distributors Name</th>
                                        <th rowspan="2">GSTIN</th>
                                        <th rowspan="2">State Code</th>
                                        <th rowspan="2">Invice No</th>
                                        <th class="text-center" colspan="4">GST Type 5%</th>
                                        <th class="text-center" colspan="4">GST Type 12%</th>
                                        <th class="text-center" colspan="4">GST Type 18%</th>
                                        <th class="text-center" colspan="4">GST Type 28%</th>
                                        <th rowspan="2">Grand Total</th>
                                        {{-- <th rowspan="2">View</th> --}}
                                        <th rowspan="2">Edit</th>
                                        <th rowspan="2">Delete</th>
                                    </tr>
                                    <tr>
                                        <th>Taxable Value</th>
                                        <th>CGST 2.5%</th>
                                        <th>SGST 2.5%</th>
                                        <th>GST 5%</th>
                                        <th>Taxable Value</th>
                                        <th>CGST 6%</th>
                                        <th>SGST 6%</th>
                                        <th>GST 12%</th>
                                        <th>Taxable Value</th>
                                        <th>CGST 9%</th>
                                        <th>SGST 9%</th>
                                        <th>GST 18%</th>
                                        <th>Taxable Value</th>
                                        <th>CGST 14%</th>
                                        <th>SGST 14%</th>
                                        <th>GST 28%</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                    @foreach ($bill as $item)
                                    
                                    <tr class="odd gradeX">
                                        <td class="text-center"> {{$item->registration_date}} </td>
                                        <td class="text-center"> {{$item->invoice_no}} </td>
                                        <td class="text-center"> {{$item->name}} </td>
                                        <td class="text-center"> {{$item->gstin}} </td>
                                        <td class="text-center"> {{$item->state_code}} </td>
                                        <td class="text-center"> {{$item->invoice_date}} </td>
                                    {{-- --------------------GST 5%------------------------------------ --}}
                                        <td class="text-center"> {{$item->gst5e_amt}} </td>
                                        <td class="text-center"> {{$item->gst5cgst}} </td>
                                        <td class="text-center"> {{$item->gst5sgst}} </td>
                                        <td class="text-center">{{$item->gst5t_gst}} </td>
                                    {{-- -- --------------------GST 12%------------------------------------ --}}
                                        <td class="text-center"> {{$item->gst12e_amt}} </td>
                                        <td class="text-center"> {{$item->gst12cgst}} </td>
                                        <td class="text-center"> {{$item->gst12sgst}} </td>
                                        <td class="text-center"> {{$item->gst12t_gst}} </td>
                                    {{-- -- --------------------GST 18%------------------------------------ --}}
                                        <td class="text-center"> {{$item->gst18e_amt}} </td>
                                        <td class="text-center"> {{$item->gst18cgst}} </td>
                                        <td class="text-center"> {{$item->gst18sgst}} </td>
                                        <td class="text-center"> {{$item->gst18t_gst}} </td>
                                    {{-- -- --------------------GST 28%------------------------------------ --}}
                                        <td class="text-center"> {{$item->gst28e_amt}} </td>
                                        <td class="text-center"> {{$item->gst28cgst}} </td>
                                        <td class="text-center"> {{$item->gst28sgst}} </td>
                                        <td class="text-center"> {{$item->gst28t_gst}} </td>
                                    <td class="text-center"> {{$item->gst12t_amt+$item->gst5t_amt+ $item->gst18t_amt+$item->gst28t_amt}} </td>
                                        <td class="text-center">
                                            <a href="{{ route('bill.edit',$item->id) }}" class="btn btn-sm btn-outline-danger py-0">Edit</a>
                                        </td>
                                        <td class="text-center">  
                                            <a href="" onclick="if(confirm('Do you want to delete this customer?')) event.preventDefault(); document.getElementById('delete-{{$item->id}}').submit();" class="btn btn-sm btn-outline-danger py-0">Delete</a>
                                            <form id="delete-{{$item->id}}" method="post" action="{{route('bill.destroy',$item->id)}}" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <a href=" {{url('PDFgen')}} "><button  class="btn btn-warning btn-lg">PDF Generate</button></a>
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