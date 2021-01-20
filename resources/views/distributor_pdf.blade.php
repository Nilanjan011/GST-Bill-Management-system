@extends('layout')

@section('title','Distributor PDF')

 @section('ad')
    <x-header/>
     
    <div class="container">
        
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Distributor PDF</h3>
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
                            <form action=" {{url('distributor_pdf')}} " method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <select class="form-control form-control-lg" id="name" name="name" onclick="top_name()">
                                        <option value="">select</option>
                                        @forelse ($Distributor as $item)
                                        <option value=" {{$item->name}} ">{{$item->name}}</option>
                                        
                                        @empty
                                            <option value="">No data found</option>
                                        @endforelse
                                    </select>
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
