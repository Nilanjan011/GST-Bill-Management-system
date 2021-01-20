<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') </title>

     <!--b Core CSS - Include with every page -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>  
    
    <link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.css')}}"/>
    
    <!-- SB Admin CSS - Include with every page -->
    <link rel="stylesheet" href="{{asset('css/sb-admin.css')}}"/>
{{-- @section('dashpic') --}}
        <!-- Page-Level Plugin CSS - Dashboard -->
        <link href="{{asset('css/plugins/morris/morris-0.4.3.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/plugins/timeline/timeline.css')}}" rel="stylesheet">
        
{{-- @show --}}


</head>

<body>

    @section('ad')   
    @show

    
    <!-- Core Scripts - Include with every page -->
    {{-- <script src="{{asset('js/jquery-1.10.2.js')}}"></script>  --}}
    {{-- ---------------------dataTable jquery cdn---------------------- --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
{{-- ----------------------------------------------------------------------------------------------- --}}
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('js/plugins/morris/raphael-2.1.0.min.js')}}"></script>
    <script src="{{asset('js/plugins/morris/morris.js')}}"></script>
  <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="{{asset('js/demo/dashboard-demo.js')}}"></script>
<!-- SB Admin Scripts - Include with every page -->
    <script src="{{asset('js/sb-admin.js')}}"></script>
</body>

</html>
