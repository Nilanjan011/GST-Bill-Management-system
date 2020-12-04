@extends('layout')

@section('title','Bill PDF')

 @section('ad')
    <x-header/>
     
    <div class="container">
        
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Bill PDF</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $err)
                                        <li> {{$err}} </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($message = Session::get('msg'))
                            <div class="alert alert-danger alert-block">
                                <button class="close" data-dismiss="alert">X</button>
                                <strong>{{$message}}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="panel-body">
        
                        <fieldset>
                            <form action=" {{url('pdf_date')}} " method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="from">From</label>
                                    <input type="date" class="form-control" placeholder="from" id="from" name="from" required autofocus> 
                                </div>

                                <div class="form-group">
                                    <label for="TOTAL_AMOUNT"> To</label>
                                    <input type="date" class="form-control" name="to" id="to" placeholder="To">   
                                </div>
                                
                                <button type="submit" class="btn btn-lg btn-success btn-block">PDF Generator</button>
                            </form>
                        </fieldset>
        
                        <div id="err"></div>
                        <div id="page">
                            <div id="morris-area-chart"></div>
                            <div id="morris-bar-chart"></div>
                            <div id="morris-donut-chart"></div>
                    
                         </div>
                         <script>
                             document.getElementById("page").style.display="none";
                         </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
