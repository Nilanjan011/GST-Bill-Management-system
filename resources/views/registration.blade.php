@extends('layout')

@section('title','Registration Form')

@section('dashpic')

 @section('ad')
     
    <div class="container">
       
        
        
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign Up</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="{{ url ('resitration')}}" method="POST" onsubmit="return vali()">
                            @csrf
                            <fieldset>
                                @if ($message = Session::get('message'))
                                    <div class="alert alert-danger alert-block">
                                        <button class="close" data-dismiss="alert">X</button>
                                        <strong>{{$message}}</strong>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input class="form-control" placeholder="Name" id="Name" name="Name" type="Name" required autofocus>
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{$errors->first('Name')}}</span>   
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" id="email" name="email" type="email" required autofocus>
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" id="password" name="password" type="password" required>
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                    @endif
                                        
                                </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="submit">
                                
                            </fieldset>
                        </form>
                        <div id="err"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script>
        function vali() {
            var mail = document.getElementById("email").value;
            var pass = document.getElementById("password").value;
            var name = document.getElementById("Name").value;
            
            if (mail == "" || password=="" || name="") {
                document.getElementById("err").innerHTML= "<span> fill correctly</span>";
                return false;
            }

        }
    </script>
    @endsection
