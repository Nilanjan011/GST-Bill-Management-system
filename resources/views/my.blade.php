@extends('new')

@section('title','my page')
 
@section('con')
    @parent
    {{-- <h3 class="text-success" >This is H3 headline</h3>
    <button onclick="ma()">magic</button>
    <h4 class="jk " >hgsdjskjsjhddjhkdkd</h4>
<script>
    function ma(){
        let jk= document.querySelector(".jk");
        jk.style.color="blue";
    }
</script> --}}

<div class="container">
  <x-header/ >
    <form action="login" method="POST">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            @if ($errors->has('email'))
            <span class="text-danger">{{$errors->first('email')}}</span>
            @endif
          <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
            @if ($errors->has('pass'))
                <span class="text-danger">{{$errors->first('pass')}}</span>
            @endif
          <input type="password" class="form-control" name="pass" placeholder="Password">
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1">
          <input type="text" id="g"  onkeypress="dis()">
          <p id="dis" name="g" value="123"></p>
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script>
  function dis() {
    var dis= document.getElementById('g').value;
    document.getElementById('dis').innerHTML= dis;
  }
</script>

@endsection


{{-- @php
    echo date('N');
@endphp --}}

   
