@extends('layout')

@section('title','Distributors Registeration Form')


 @section('ad')
    
 <div id="wrapper">

    <x-header/>
{{-- {% block content%} --}}
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                
                <div id="err"></div>
                <div id="page">
                    <div id="morris-area-chart"></div>
                    <div id="morris-bar-chart"></div>
                    <div id="morris-donut-chart"></div>
                 </div> 
                <h1 class="page-header" style="border-bottom: 1px solid orangered;">Distributors Registeration Form</h1>
                @if ($message = Session::get('message'))
                    <div class="alert alert-danger alert-block">
                        <button class="close" data-dismiss="alert">X</button>
                        <strong>{{$message}}</strong>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $err)
                                <li> {{$err}} </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    
                @endif
                <form action="Distributor" onsubmit="return vali()" method="POST">
                    @csrf
                    <div id="err"></div>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                       
                      <input type="text" class="form-control" name="name" placeholder="name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Phone</label>
                      
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                       
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" placeholder="Address" rows="3" class="form-control"></textarea>
                       
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-2 colform-label">Date</label>
                        <div class="col-10">
                            <input type="date" class="form-control" id="date" name="date" value="12/9/2020">
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <label for="exampleInputEmail1">User Status</label><br>
                        <input class="form-check-input" type="radio" name="radio[]" id="radio" value="1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                          Active
                        </label>
                
                        <input class="form-check-input" type="radio" name="radio[]" id="radio" value="2">
                        <label class="form-check-label" for="exampleRadios2">
                          Inactive
                        </label>
                      </div>
                    
                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                </form>

                         <script>
                             document.getElementById("page").style.display="none";

                            function vali(){

                                var name= document.getElementById("name").value;
                                var phone= document.getElementById("phone").value;
                                var email= document.getElementById("email").value;
                                var address= document.getElementById("address").value;
                                var date= document.getElementById("date").value;
                                var radio= document.getElementById("radio").value;

                                if( name=="" || phone=="" || email=="" || address=="" || date=="" || radio=="")
                                {
                                    document.getElementById("err").innerHTML= "<span> fill correctly</span>";
                                    return false;
                                }
                            }
                         </script>
            </div>
        </div>
    </div>
</div>
 @endsection
