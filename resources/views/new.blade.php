{{-- //new.blade.html is layout file --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') </title> 
 
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
 
   <style>
       h3{
        background:pink;
       }
   </style>
   @section('style')
       
   @show
</head>
<body>
    <h1 class="text-center">This is my file</h1>
    {{-- <a class="btn btn-primary" href="./myshow" target="_blank">show</a> --}}
@section('con')   
@show

 
</body>
</html>