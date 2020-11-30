@extends('layout')

@section('title','calculation')

 @section('ad')
    <x-header/>
     
    <div class="container">
        
        
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Calculation</h3>
                    </div>
                    <div class="panel-body">
        
                        <fieldset>
{{--                             
                            <div class="alert alert-danger alert-block">
                                <button class="close" data-dismiss="alert">X</button>
                            </div>
                         --}}
                            <div class="form-group">
                                <label for="amount">Enter amount</label>
                                <input class="form-control" placeholder="Enter amount" id="amount" name="amount" required autofocus> 
                            </div>
                            <div class="form-group">
                                <label for="gst">GST Selects</label>
                                <select class="form-group" id="select">
                                    <option value=5>5%</option>
                                    <option value=12>12%</option>
                                    <option value=18>18%</option>
                                    <option value=28>28%</option>
                                  </select>
                               
                            </div>
                            <div class="form-group">
                                
                                <label for="CGST"> CGST  : </label><span id="CGST"></span>
                               
                            </div>
                            <div class="form-group">
                                <label for="SGST"> SGST  : </label><span id="SGST"></span>
                               
                            </div>
                            <div class="form-group">
                                <label for="TOTAL_GST"> TOTAL GST  :  </label>
                                <span id="TOTAL_GST"></span>
                               
                            </div>
                            <div class="form-group">
                                <label for="TOTAL_AMOUNT"> TOTAL AMOUNT :</label>
                                <span id="TOTAL_AMOUNT"></span>
                               
                            </div>
                            
                            <button class="btn btn-lg btn-success btn-block" onclick="show()">Calculation</button>
                            
                            
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
    <script>
        function show(){
            var amount = document.getElementById("amount").value;
            var select = document.getElementById("select").value;
            var CGST = document.getElementById("CGST");
            var SGST = document.getElementById("SGST");
            var TOTAL_GST = document.getElementById("TOTAL_GST");
            var TOTAL_AMOUNT = document.getElementById("TOTAL_AMOUNT");

            select=select/2;
            CGST.innerHTML=( amount*select)/100;
            var CGSTvalue=( amount*select)/100;
            SGST.innerHTML=( amount*select)/100;
            var SGSTvalue=( amount*select)/100;
            TOTAL_GST.innerHTML=(CGSTvalue)+(SGSTvalue);
            var total=(CGSTvalue)+(SGSTvalue);;
            TOTAL_AMOUNT.innerHTML=parseFloat(amount)+parseFloat(total);
            console.log(TOTAL_AMOUNT)

        }
    </script>

    @endsection
