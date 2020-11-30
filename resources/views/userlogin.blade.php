@extends('layout')

@section('title','login')

@section('dashpic')

 @section('ad')
     
    <div class="container">
        
        
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="{{ url ('user')}}" method="POST" onsubmit="return vali()">
                            @csrf
                            <fieldset>
                                @if ($message = Session::get('message'))
                                    <div class="alert alert-danger alert-block">
                                        <button class="close" data-dismiss="alert">X</button>
                                        <strong>{{$message}}</strong>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" id="email" name="email" type="email" required autofocus>
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" id="password" name="password" type="password" required>
                                    <span class="text-danger">{{$errors->first('password')}}</span>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>

                                <input type="submit" class="btn btn-lg btn-success btn-block" value="submit">
                                
                            </fieldset>
                        </form>
                        <p class="text-center"><a href=" {{url('regis')}} ">don't have account</a></p>
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
            if (mail == "" || pass=="") {
                document.getElementById("err").innerHTML= "<span> fill correctly</span>";
                return false;
            }

        }
    </script>
    @endsection
