<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    table, th, td{
        border: 1px solid black;
        border-collapse: collapse;
    }
    .page{  
        text-align: center;

        margin: 3%;
/* //rotate left 
        transform: rotate(90deg);
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg); */
    }
</style>
</head>
<body>
    <div id="tp">
        <div class="page">
            <table style="font-size: 12px;">
                <thead>
                    <tr>
                        <th rowspan="2">Registration Date</th>
                        <th rowspan="2">Invoice No</th>
                        <th rowspan="2">Distributors Name</th>
                        <th rowspan="2">GSTIN</th>
                        <th rowspan="2">State Code</th>
                        <th rowspan="2">Invice No</th>
                        <th colspan="4">GST Type 5%</th>
                        {{-- <th colspan="4">GST Type 12%</th>
                        <th colspan="4">GST Type 18%</th>
                        <th colspan="4">GST Type 28%</th>
                        <th rowspan="2">Grand Total</th> --}}
                    </tr>
                    <tr>
                        <th>Taxable Value</th>
                        <th>CGST 2.5%</th>
                        <th>SGST 2.5%</th>
                        <th>GST 5%</th>
                        {{-- <th>Taxable Value</th>
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
                        <th>GST 28%</th> --}}
                    </tr>
                    </thead>
                    @php
                        $total_Amount=0;
                    @endphp 
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
                        {{-- <td class="text-center"> {{$item->gst12e_amt}} </td>
                        <td class="text-center"> {{$item->gst12cgst}} </td>
                        <td class="text-center"> {{$item->gst12sgst}} </td>
                        <td class="text-center"> {{$item->gst12t_gst}} </td> --}}
                    {{-- -- --------------------GST 18%------------------------------------ --}}
                        {{-- <td class="text-center"> {{$item->gst18e_amt}} </td>
                        <td class="text-center"> {{$item->gst18cgst}} </td>
                        <td class="text-center"> {{$item->gst18sgst}} </td>
                        <td class="text-center"> {{$item->gst18t_gst}} </td> --}}
                    {{-- -- --------------------GST 28%------------------------------------ --}}
                        {{-- <td class="text-center"> {{$item->gst28e_amt}} </td>
                        <td class="text-center"> {{$item->gst28cgst}} </td>
                        <td class="text-center"> {{$item->gst28sgst}} </td>
                        <td class="text-center"> {{$item->gst28t_gst}} </td>--}}
                    {{-- <td class="text-center"> {{$item->gst12t_amt+$item->gst5t_amt+ $item->gst18t_amt+$item->gst28t_amt}} </td>  --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
{{-- -------------------------GST 12%-------------------------------------------- --}}
<div id="tp">
    <div class="page">
        <table style="font-size: 12px;">
            <thead>
                <tr>
                    <th rowspan="2">Registration Date</th>
                    <th rowspan="2">Invoice No</th>
                    <th rowspan="2">Distributors Name</th>
                    <th rowspan="2">GSTIN</th>
                    <th rowspan="2">State Code</th>
                    <th rowspan="2">Invice No</th>
                    <th colspan="4">GST Type 12%</th>
                </tr>
                <tr>
                    <th>Taxable Value</th>
                    <th>CGST 6%</th>
                    <th>SGST 6%</th>
                    <th>GST 12%</th>
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
                {{-- -- --------------------GST 12%------------------------------------ --}}
                    <td class="text-center"> {{$item->gst12e_amt}} </td>
                    <td class="text-center"> {{$item->gst12cgst}} </td>
                    <td class="text-center"> {{$item->gst12sgst}} </td>
                    <td class="text-center"> {{$item->gst12t_gst}} </td>
                </tr>                
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- -------------------------GST 18%-------------------------------------------- --}}
<div id="tp">
    <div class="page">
        <table style="font-size: 12px;">
            <thead>
                <tr>
                    <th rowspan="2">Registration Date</th>
                    <th rowspan="2">Invoice No</th>
                    <th rowspan="2">Distributors Name</th>
                    <th rowspan="2">GSTIN</th>
                    <th rowspan="2">State Code</th>
                    <th rowspan="2">Invice No</th>
                    <th colspan="4">GST Type 18%</th>
                </tr>
                <tr>
                    <th>Taxable Value</th>
                    <th>CGST 9%</th>
                    <th>SGST 9%</th>
                    <th>GST 18%</th>
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
                     
                {{-- -- --------------------GST 18%------------------------------------ --}}
                    <td class="text-center"> {{$item->gst18e_amt}} </td>
                    <td class="text-center"> {{$item->gst18cgst}} </td>
                    <td class="text-center"> {{$item->gst18sgst}} </td>
                    <td class="text-center"> {{$item->gst18t_gst}} </td>
                </tr>                
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- -------------------------GST 28%-------------------------------------------- --}}
<div id="tp">
    <div class="page">
        <table style="font-size: 12px;">
            <thead>
                <tr>
                    <th rowspan="2">Registration Date</th>
                    <th rowspan="2">Invoice No</th>
                    <th rowspan="2">Distributors Name</th>
                    <th rowspan="2">GSTIN</th>
                    <th rowspan="2">State Code</th>
                    <th rowspan="2">Invice No</th>
                    <th colspan="4">GST Type 28%</th>
                    <th rowspan="2">Grand Total <br> (5%+12%+18%+28%)</th>
                </tr>
                <tr>
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
                     
              {{-- -- --------------------GST 28%------------------------------------ --}}
                    <td class="text-center"> {{$item->gst28e_amt}} </td>
                    <td class="text-center"> {{$item->gst28cgst}} </td>
                    <td class="text-center"> {{$item->gst28sgst}} </td>
                    <td class="text-center"> {{$item->gst28t_gst}} </td>
                {{-- ---------------------Grand Total-------------------------------------------- --}}
                    <td class="text-center"> {{$item->gst12t_amt+$item->gst5t_amt+ $item->gst18t_amt+$item->gst28t_amt}} </td> 
                </tr>
                @php
                    $total_Amount=$total_Amount+($item->gst12t_amt+$item->gst5t_amt+ $item->gst18t_amt+$item->gst28t_amt);
                @endphp                
                @endforeach
            </tbody>
        </table>
        <br>
        <h4>Total Grand Amount:  {{$total_Amount}} </h4>
    </div>
</div>

</body>
</html>

