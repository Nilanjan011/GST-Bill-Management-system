@extends('layout')

@section('title','update Form')


 @section('ad')
    
 <div id="wrapper">

    <x-header/>
{% block content%}
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                
                <div id="err"></div>
                <div id="page">
                    <div id="morris-area-chart"></div>
                    <div id="morris-bar-chart"></div>
                    <div id="morris-donut-chart"></div>
            
                 </div>
                <h1 class="page-header" style="border-bottom: 1px solid #15ee39;">Update Registeration Form</h1>
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
                <form action="{{ route('customer.update',$id->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div id="err"></div>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                       
                      <input type="text" class="form-control" name="name" placeholder="name" value="{{ $id->name}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Phone</label>
                      
                      <input type="text" class="form-control" id="phone" name="phone" value="{{ $id->phone}}" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                       
                        <input type="email" class="form-control" id="email" name="email" value="{{ $id->email}}" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" placeholder="Address" rows="3" class="form-control"> {{$id->address}} </textarea>
                       
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-2 colform-label">Date</label>
                        <div class="col-10">
                            <input type="" class="form-control" id="date" name="date"  value="{{ $id->date}}">
                        </div>
                    </div>
                    <div class="form-group form-check">
                        <label for="exampleInputEmail1">User Status</label><br>
                        <input class="form-check-input" type="radio" name="radio[]" id="radio" value="1" @if ($id->user_status == 1) checked @endif>
                        <label class="form-check-label" for="exampleRadios1">
                          Active
                        </label>
                
                        <input class="form-check-input" type="radio" name="radio[]" id="radio" value="2" @if ($id->user_status == 2) checked @endif>
                        <label class="form-check-label" for="exampleRadios2">
                          Inactive
                        </label>
                      </div>
                      <div class="form-group form-check">
                        <label for="exampleInputEmail1">payment Status</label><br>
                        <input class="form-check-input" type="radio" name="payment[]" id="payment" value="1" @if ($id->payment_status == 1) checked @endif>
                        <label class="form-check-label" for="exampleRadios1">
                          Paid
                        </label>
                
                        <input class="form-check-input" type="radio" name="payment[]" id="payment" value="0" @if ($id->payment_status == 0) checked @endif>
                        <label class="form-check-label" for="exampleRadios2">
                          Not Paid
                        </label>
                      </div>
                    
                    <button type="submit" class="btn btn-lg btn-success">Submit</button>
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
