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
        font-size: 75%;
/* //rotate left  */
        /* transform: rotate(90deg);
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg); */
    }        
</style>
</head>
<body>
    <div id="tp">
        <div class="page">
            <table>
                  <tr>
                    <th>SL no.</th>
                    <th>Reg. Date</th>
                    <th>Invoice No</th>
                    <th>Invice Date</th>
                    <th>GSTIN</th>
                    <th>State Code</th>
                    <th colspan="3">PartyName & Address</th>
                    <th>Total Tax</th>
                    <th>Round off</th>
                    <th>Grand Total</th>
                  </tr>
                @php
                  $i=1;
                  $total_Amount=0;
                @endphp
                @foreach ($bill as $item)
                <tr>
                    <td style="text-align: center;" rowspan="9">{{$i++}}</td>
                    <td style="text-align: center;"> {{$item->registration_date}} </td>
                    <td style="text-align: center;"> {{$item->invoice_no}} {{$item->invoice_date}}  </td>
                    <td style="text-align: center;"> {{$item->name}} </td>
                    <td style="text-align: center;"> {{$item->gstin}}</td>
                    <td style="text-align: center;"> {{$item->state_code}} </td>
                    <td style="text-align: center;" colspan="3">{{$item->invoice_no}}</td>
                    <td style="text-align: center;" rowspan="9"> {{$item->gst12t_gst+$item->gst5t_gst+ $item->gst18t_gst+$item->gst28t_gst}} </td> 
                    <td style="text-align: center;" rowspan="9">{{$item->operator}}{{$item->round_Off}}</td>
                    <td style="text-align: center;" rowspan="9">{{$item->F_total}}</td>
                    {{-- grand_all_total --}}
                </tr>
                <tr>
                    <td colspan="8">_</td>
                </tr>
                @php
                    $total_Amount=$total_Amount+($item->gst12t_amt+$item->gst5t_amt+ $item->gst18t_amt+$item->gst28t_amt);
                @endphp 
                <tr>
                    <th colspan="4">GST Type 5%</th>
                    <th colspan="4">GST Type 12%</th>
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
                </tr>
                <tr>
                     {{-- --------------------GST 5%------------------------------------ --}}
                     <td style="text-align: center;"> {{$item->gst5e_amt}} </td>
                     <td style="text-align: center;"> {{$item->gst5cgst}} </td>
                     <td style="text-align: center;"> {{$item->gst5sgst}} </td>
                     <td style="text-align: center;">{{$item->gst5t_gst}} </td>
                 {{-- -- --------------------GST 12%------------------------------------ --}}
                     <td style="text-align: center;"> {{$item->gst12e_amt}}</td>
                     <td style="text-align: center;"> {{$item->gst12cgst}} </td>
                     <td style="text-align: center;"> {{$item->gst12sgst}} </td>
                     <td style="text-align: center;"> {{$item->gst12t_gst}}</td>
                   </tr>
                   <tr>
                        <td colspan="8">_</td>
                    </tr>
                       <tr>
                           <th colspan="4">GST Type 18%</th>
                           <th colspan="4">GST Type 28%</th>
                       </tr>
                       <tr>
                           <th>Taxable Value</th>
                           <th>CGST 9%</th>
                           <th>SGST 9%</th>
                           <th>GST 18%</th>
                           <th>Taxable Value</th>
                           <th>CGST 14%</th>
                           <th>SGST 14%</th>
                           <th>GST 28%</th>
                       </tr>
             {{-- -- --------------------GST 18%------------------------------------ --}}
                        <tr>
                             <td style="text-align: center;"> {{$item->gst18e_amt}} </td>
                             <td style="text-align: center;"> {{$item->gst18cgst}} </td>
                             <td style="text-align: center;"> {{$item->gst18sgst}} </td>
                             <td style="text-align: center;"> {{$item->gst18t_gst}}</td>
              {{-- -- --------------------GST 28%------------------------------------ --}}
                            <td style="text-align: center;"> {{$item->gst28e_amt}} </td>
                            <td style="text-align: center;"> {{$item->gst28cgst}} </td>
                            <td style="text-align: center;"> {{$item->gst28sgst}} </td>
                            <td style="text-align: center;"> {{$item->gst28t_gst}} </td>
                        </tr>
                        <tr>
                            <td colspan="12">_</td>
                        </tr>
                        <tr>
                            <th colspan="6">Grand Total including 1% tax</th>
                            <th colspan="6">{{$item->grand_all_total}}</th>
                        </tr>
                @endforeach
            </table>
            {{-- <h4>Grand ALL Total:{{$total_Amount}} </h4> --}}
        </div>
    </div>
</body>
</html>

