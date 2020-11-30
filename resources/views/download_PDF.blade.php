<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
<style>
    table{
        width: 100%;
        border-collapse: collapse;
    }
    th,td{
        padding-bottom: 2px;
        border:1px solid #000;
    }
    th{
        padding-bottom: 3px;
    }
</style>
</head>
<body>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    
    <script>
    
        $(document).ready(function(){
            $("#example").DataTable();
        });
    </script>
    <table id="example" class="display" >
        <thead>
            <tr>
                <th rowspan="2">Distributors Name</th>
                <th rowspan="2">Bill Number</th>
                <th rowspan="2">Purchase Bill Date</th>
                <th colspan="2">GST Type 5%</th>
                <th colspan="2">GST Type 12%</th>
                <th colspan="2">GST Type 18%</th>
                <th colspan="2">GST Type 28%</th>
                <th rowspan="2">Grand Total</th>
            </tr>
            <tr>
                <th>Amount</th>
                <th>GST</th>
                <th>Amount</th>
                <th>GST</th>
                <th>Amount</th>
                <th>GST</th>
                <th>Amount</th>
                <th>GST</th>
            </tr>
            </thead>
        <tbody>
            @foreach ($bill as $item)
            
            <tr class="odd gradeX">
                <td class="text-center"> {{$item->name}} </td>
                <td class="text-center"> {{$item->billno}} </td>
                <td class="text-center"> {{$item->date}} </td>
            {{-- --------------------GST 5%------------------------------------ --}}
                <td class="text-center"> {{$item->gst5e_amt}} </td>
                <td class="text-center">{{$item->gst5t_gst}} </td>
            {{-- -- --------------------GST 12%------------------------------------ --}}
                <td class="text-center"> {{$item->gst12e_amt}} </td>
                <td class="text-center"> {{$item->gst12t_gst}} </td>
            {{-- -- --------------------GST 18%------------------------------------ --}}
                <td class="text-center"> {{$item->gst18e_amt}} </td>
                <td class="text-center"> {{$item->gst18t_gst}} </td>
            {{-- -- --------------------GST 28%------------------------------------ --}}
                <td class="text-center"> {{$item->gst28e_amt}} </td>
                <td class="text-center"> {{$item->gst28t_gst}} </td>
            <td class="text-center"> {{$item->gst12t_amt+$item->gst5t_amt+ $item->gst18t_amt+$item->gst28t_amt}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

