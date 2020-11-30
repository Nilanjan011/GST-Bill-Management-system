@extends('layout')

@section('title','Distributors Bill Form')


 @section('ad')
    
 <div id="wrapper">

    <x-header/>
{{-- {% block content%} --}}
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                
                
                <div id="page" style="display: none;">
                    <div id="morris-area-chart"></div>
                    <div id="morris-bar-chart"></div>
                    <div id="morris-donut-chart"></div>
                 </div>
                <h1 class="page-header" style="border-bottom: 1px solid #ff0000;">Purcharse Bill Form <SPan style="float: right; display: inline; font-size:30px;" id="top_name"></SPan></h1>
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
                <form action="{{route('bill.store')}}" id="myForm" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Distributor Name</label>
                        <select class="form-control form-control-lg" id="name" name="name" onclick="top_name()">
                            <option value="">select</option>
                            @forelse ($Distributor as $item)
                            <option value=" {{$item->name}} ">{{$item->name}}</option>
                            
                            @empty
                                <option value="">No data found</option>
                            @endforelse
                        </select>
                      {{-- <input type="text" class="form-control" name="name" id="name" placeholder="name" required> --}}
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Bill Number</label>
                      
                      <input type="text" class="form-control" id="bill_no" name="bill_no" placeholder="Bill Number" required>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-2 colform-label">Date</label>
                        <div class="col-10">
                            <input type="date" class="form-control" id="date" name="date" value="12/9/2020">
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th class="text-center"> GST Type 5%.</th>
                                <th class="text-center"> GST Type 12%</th>
                                <th class="text-center"> GST Type 18%</th>
                                <th class="text-center"> GST Type 28%</th>
                            </tr>
                        </thead>
                        <tb>
                            <tr class="odd gradeX">
                                <td class="text-center">Enter Amount
                                    <br><input type="text" id="am_GST5"  name="am_GST5" placeholder="Enter Amount">
                                </td>
                                <td class="text-center">Enter Amount
                                    <br><input type="text" id="am_GST12" name="am_GST12" placeholder="Enter Amount">
                                </td>
                                <td class="text-center">Enter Amount
                                    <br><input type="text" id="am_GST18" name="am_GST18" placeholder="Enter Amount" >
                                </td>
                                <td class="text-center">Enter Amount
                                    <br><input type="text" id="am_GST28"  name="am_GST28" placeholder="Enter Amount">
                                </td>
                            </tr>
                            <tr class="odd gradeX">
                                <td class="text-center">CGST : <p id="5%CGST" name="5%CGST"></p> </td>
                                <td class="text-center">CGST : <p id="12%CGST" name="12%CGST"></p></td>
                                <td class="text-center">CGST : <p id="18%CGST" name="18%CGST"></p></td>
                                <td class="text-center">CGST : <p id="28%CGST" name="28%CGST"></p></td>
                            </tr>
                            <tr class="odd gradeX">
                                <td class="text-center">SGST : <p id="5%SGST" name="5%SGST"></p> </td>
                                <td class="text-center">SGST : <p id="12%SGST" name="12%SGST"></p></td>
                                <td class="text-center">SGST : <p id="18%SGST" name="18%SGST"></p></td>
                                <td class="text-center">SGST : <p id="28%SGST" name="28%SGST"></p></td>
                            </tr>
                            <tr class="odd gradeX">
                                <td class="text-center">Total GST : <p name="5%T_GST" id="5%T_GST"></p> </td>
                                <td class="text-center">Total GST : <p name="12%T_GST" id="12%T_GST"></p></td>
                                <td class="text-center">Total GST : <p name="18%T_GST" id="18%T_GST"></p></td>
                                <td class="text-center">Total GST : <p name="28%T_GST" id="28%T_GST"></p></td>
                            </tr>
                            <tr class="odd gradeX">
                                <td class="text-center">Total Amount : <p id="5%T_amt"  name="5%T_amt" ></p> </td>
                                <td class="text-center">Total Amount : <p id="12%T_amt" name="12%T_amt"></p></td>
                                <td class="text-center">Total Amount : <p id="18%T_amt" name="18%T_amt"></p></td>
                                <td class="text-center">Total Amount : <p id="28%T_amt" name="28%T_amt"></p></td>
                            </tr>
                        </tb>
                    </table>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th class="text-center">Total Asscble Value</th>
                                <th class="text-center">GST AMT</th>
                                <th class="text-center">Grand Total</th>
                            </tr>
                        </thead>
                        <td>
                            <tr>
                                <td class="text-center" id="T_A_value"></td>
                                <td class="text-center"><p id="GST_amt"></p></td>
                                <td class="text-center"><p id="G_total"></p></td>
                            </tr>
                        </td>
                    </table>
                    
                </form>
                <div id="err1"></div>
                <div id="err"></div>
                <button onclick="cal()" class="btn btn-success">Total Sum</button>
                <button type="submit" onclick="form_submit()" class="btn btn-primary">Submit</button>
                    <script>

                        function top_name(){
                            document.getElementById("top_name").innerHTML='gbcfjahfgbhguih';
                            document.getElementById("top_name").innerHTML=document.getElementById('name').value;
                        }

                        function form_submit() {
                            var name= document.getElementById("name").value;
                            var bill_no= document.getElementById("bill_no").value;
                            var date= document.getElementById("date").value;
                            var am_GST5=  parseFloat(document.getElementById("am_GST5").value);
                            var am_GST12= parseFloat(document.getElementById("am_GST12").value);
                            var am_GST18= parseFloat(document.getElementById("am_GST18").value);
                            var am_GST28= parseFloat(document.getElementById("am_GST28").value);
                            var sub=0;
                            var sub1=0;
                            if(name!='' && bill_no!='' && date!=''){
                                sub=1;
                                
                            }else{
                                document.getElementById("err1").innerHTML='<h4 style="color:red;"> Name, Bill NO. and Date is required</h4>'
                            }
                            if(!isNaN(am_GST5) || !isNaN(am_GST12) || !isNaN(am_GST18) || !isNaN(am_GST28   )){
                                sub1=1
                            }else{
                                sub1=0
                                document.getElementById("err").innerHTML='<h4 style="color:red;"> please fill any one Amount</h4>'
                            }
                            if (sub==1 && sub1==1) {
                                console.log( am_GST18 );
                                document.getElementById("myForm").submit();
                                
                            }
                        }

                        function cal() {
                            var T_A_value=0;
                            var GST_value=0;
                            var G_total=0;

                            var am_GST5=  parseFloat(document.getElementById("am_GST5").value);
                            var am_GST12= parseFloat(document.getElementById("am_GST12").value);
                            var am_GST18= parseFloat(document.getElementById("am_GST18").value);
                            var am_GST28= parseFloat(document.getElementById("am_GST28").value);
                            if(!isNaN(am_GST5)){
                                var select=5/2;
            
                                var CGSTvalue=(am_GST5*select)/100;

                                var SGSTvalue=(am_GST5*select)/100;

                                var total5GST=(CGSTvalue)+(SGSTvalue);
                                var total5_amt=parseFloat(am_GST5) + parseFloat(total5GST);

                                document.getElementById("5%CGST").innerHTML=CGSTvalue;
                                document.getElementById("5%SGST").innerHTML=SGSTvalue;
                                document.getElementById("5%T_GST").innerHTML=total5GST;
                                document.getElementById("5%T_amt").innerHTML=total5_amt;

                                T_A_value=T_A_value+parseFloat(am_GST5);
                                GST_value=GST_value+parseFloat(total5GST);
                                G_total=G_total+parseFloat(total5_amt);
                            }else{
                                document.getElementById("5%CGST").innerHTML="";
                                document.getElementById("5%SGST").innerHTML="";
                                document.getElementById("5%T_GST").innerHTML="";
                                document.getElementById("5%T_amt").innerHTML="";
                            }
                            if(!isNaN(am_GST12)){
                            
                                var select=12/2;
                                   
                                var CGSTvalue=(am_GST12*select)/100;
                                   
                                var SGSTvalue=(am_GST12*select)/100;
                                   
                                total12GST=(CGSTvalue)+(SGSTvalue);
                                total12_amt=parseFloat(am_GST12) + parseFloat(total12GST);


                                document.getElementById("12%CGST").innerHTML=  CGSTvalue;
                                document.getElementById("12%SGST").innerHTML=SGSTvalue;
                                document.getElementById("12%T_GST").innerHTML=total12GST;
                                document.getElementById("12%T_amt").innerHTML=total12_amt;

                                T_A_value=T_A_value+parseFloat(am_GST12);
                                GST_value=GST_value+parseFloat(total12GST);
                                G_total=G_total+parseFloat(total12_amt);
                            }else{
                                document.getElementById("12%CGST").innerHTML="";
                                document.getElementById("12%SGST").innerHTML="";
                                document.getElementById("12%T_GST").innerHTML='';
                                document.getElementById("12%T_amt").innerHTML='';
                            }
                            if(!isNaN(am_GST18)){
                                var select=18/2;
            
                                var CGSTvalue=(am_GST18*select)/100;

                                var SGSTvalue=(am_GST18*select)/100;

                                total18GST=(CGSTvalue)+(SGSTvalue);
                                total18_amt=parseFloat(am_GST18) + parseFloat(total18GST);


                                document.getElementById("18%CGST").innerHTML=  CGSTvalue;
                                document.getElementById("18%SGST").innerHTML=SGSTvalue;
                                document.getElementById("18%T_GST").innerHTML=total18GST;
                                document.getElementById("18%T_amt").innerHTML=total18_amt;

                                T_A_value=T_A_value+parseFloat(am_GST18);
                                GST_value=GST_value+parseFloat(total18GST);
                                G_total=G_total+parseFloat(total18_amt);

                            }else{
                                document.getElementById("18%CGST").innerHTML="";
                                document.getElementById("18%SGST").innerHTML='';
                                document.getElementById("18%T_GST").innerHTML='';
                                document.getElementById("18%T_amt").innerHTML='';

                            }
                            if(!isNaN(am_GST28)){

                                var select=28/2;

                                var CGSTvalue=(am_GST28*select)/100;               
                                var SGSTvalue=(am_GST28*select)/100;               
                                total28GST=(CGSTvalue)+(SGSTvalue);
                                total28_amt=parseFloat(am_GST28) + parseFloat(total28GST);


                                document.getElementById("28%CGST").innerHTML=  CGSTvalue;
                                document.getElementById("28%SGST").innerHTML=SGSTvalue;
                                document.getElementById("28%T_GST").innerHTML=total28GST;
                                document.getElementById("28%T_amt").innerHTML=total28_amt;

                                T_A_value=T_A_value+parseFloat(am_GST28);
                                GST_value=GST_value+parseFloat(total28GST);
                                G_total=G_total+parseFloat(total28_amt);
                            }else{
                                document.getElementById("28%CGST").innerHTML=  "";
                                document.getElementById("28%SGST").innerHTML="";
                                document.getElementById("28%T_GST").innerHTML="";
                                document.getElementById("28%T_amt").innerHTML="";
                            }

                            document.getElementById("T_A_value").innerHTML=T_A_value;
                            document.getElementById("GST_amt").innerHTML=GST_value;
                            document.getElementById("G_total").innerHTML=G_total;
                        }
                        //=-----------------------------------------------------------------------------------
                        // var T_A_value=0;
                        // var GST_value=0;
                        // var G_total=0;

                        // function cal5() {
                        //     var am_GST5= document.getElementById("am_GST5").value;

                        //     var select=5/2;
            
                        //     var CGSTvalue=(am_GST5*select)/100;

                        //     var SGSTvalue=(am_GST5*select)/100;

                        //     var total5GST=(CGSTvalue)+(SGSTvalue);
                        //     var total5_amt=parseFloat(am_GST5) + parseFloat(total5GST);

                        //     document.getElementById("5%CGST").innerHTML=  CGSTvalue;
                        //     document.getElementById("5%SGST").innerHTML=SGSTvalue;
                        //     document.getElementById("5%T_GST").innerHTML=total5GST;
                        //     document.getElementById("5%T_amt").innerHTML=total5_amt;
                    

                        //    var am_GST12= parseFloat(document.getElementById("am_GST12").value)
                        //    var am_GST18= parseFloat(document.getElementById("am_GST18").value)
                        //    var am_GST28= parseFloat(document.getElementById("am_GST28").value)
                        //     if(!isNaN(am_GST12)) {
                        //         am_GST5=parseFloat(am_GST5)+parseFloat(am_GST12);
                        //         document.getElementById("T_A_value").innerHTML=am_GST5;

                        //         total5GST=total5GST + parseFloat(document.getElementById("12%T_GST").textContent);
                        //         document.getElementById("GST_amt").innerHTML=total5GST;
                                
                        //         total5_amt=total5_amt+parseFloat(document.getElementById("12%T_amt").textContent);
                        //         document.getElementById("G_total").innerHTML=total5_amt;
                        //     }

                        //     if(!isNaN(am_GST18)) {
                        //         am_GST5=parseFloat(am_GST5)+parseFloat(am_GST18);
                        //         document.getElementById("T_A_value").innerHTML=am_GST5;

                        //         total5GST=total5GST + parseFloat(document.getElementById("18%T_GST").textContent);
                        //         document.getElementById("GST_amt").innerHTML=total5GST;
                                
                        //         total5_amt=total5_amt+parseFloat(document.getElementById("18%T_amt").textContent);
                        //         document.getElementById("G_total").innerHTML=total5_amt;
                        //     }

                        //     if(!isNaN(am_GST28)) {
                        //         am_GST5=parseFloat(am_GST5)+parseFloat(am_GST28);
                        //         document.getElementById("T_A_value").innerHTML=am_GST5;

                        //         total5GST=total5GST + parseFloat(document.getElementById("28%T_GST").textContent);
                        //         document.getElementById("GST_amt").innerHTML=total5GST;
                                
                        //         total5_amt=total5_amt+parseFloat(document.getElementById("28%T_amt").textContent);
                        //         document.getElementById("G_total").innerHTML=total5_amt;
                        //     }
                        //     if( isNaN(am_GST18) && isNaN(am_GST12) && isNaN(am_GST28)){

                        //         document.getElementById("T_A_value").innerHTML=am_GST5;
                        //         document.getElementById("GST_amt").innerHTML=total5GST;
                        //         document.getElementById("G_total").innerHTML=total5_amt;
                        //     }
                        //     if(isNaN(total5_amt)) {
                        //         document.getElementById("5%CGST").innerHTML='';
                        //         document.getElementById("5%SGST").innerHTML='';
                        //         document.getElementById("5%T_GST").innerHTML='';
                        //         document.getElementById("5%T_amt").innerHTML='';
                        //         document.getElementById("GST_amt").innerHTML='';
                        //         document.getElementById("G_total").innerHTML='';
                        //         cal12();
                        //         cal18();
                        //         cal28();
                        //     }

                        //  }
                        


                        // function cal12() {
                        //     console.log( T_A_value );
                        //     am_GST12= document.getElementById("am_GST12").value;
                            
                        //     var select=12/2;
            
                        //     var CGSTvalue=(am_GST12*select)/100;

                        //     var SGSTvalue=(am_GST12*select)/100;

                        //     total12GST=(CGSTvalue)+(SGSTvalue);
                        //     total12_amt=parseFloat(am_GST12) + parseFloat(total12GST);


                        //    document.getElementById("12%CGST").innerHTML=  CGSTvalue;
                        //    document.getElementById("12%SGST").innerHTML=SGSTvalue;
                        //    document.getElementById("12%T_GST").innerHTML=total12GST;
                        //    document.getElementById("12%T_amt").innerHTML=total12_amt;

                        //    var am_GST5= parseFloat(document.getElementById("am_GST5").value)
                        //    var am_GST18= parseFloat(document.getElementById("am_GST18").value)
                        //    var am_GST28= parseFloat(document.getElementById("am_GST28").value)
                        //     if(!isNaN(am_GST5)) {
                        //         am_GST12=parseFloat(am_GST5)+parseFloat(am_GST12);
                        //         document.getElementById("T_A_value").innerHTML=am_GST12;

                        //         total12GST=total12GST + parseFloat(document.getElementById("5%T_GST").textContent);
                        //         document.getElementById("GST_amt").innerHTML=total12GST;
                                
                        //         total12_amt=total12_amt+parseFloat(document.getElementById("5%T_amt").textContent);
                        //         document.getElementById("G_total").innerHTML=total12_amt;
                        //     }

                        //     if(!isNaN(am_GST18)) {
                        //         am_GST12=parseFloat(am_GST18)+parseFloat(am_GST12);
                        //         document.getElementById("T_A_value").innerHTML=am_GST12;

                        //         total12GST=total12GST + parseFloat(document.getElementById("18%T_GST").textContent);
                        //         document.getElementById("GST_amt").innerHTML=total12GST;
                                
                        //         total12_amt=total12_amt+parseFloat(document.getElementById("18%T_amt").textContent);
                        //         document.getElementById("G_total").innerHTML=total12_amt;
                        //     }

                        //     if(!isNaN(am_GST28)) {
                        //         am_GST12=parseFloat(am_GST28)+parseFloat(am_GST12);
                        //         document.getElementById("T_A_value").innerHTML=am_GST12;

                        //         total12GST=total12GST + parseFloat(document.getElementById("28%T_GST").textContent);
                        //         document.getElementById("GST_amt").innerHTML=total12GST;
                                
                        //         total12_amt=total12_amt+parseFloat(document.getElementById("28%T_amt").textContent);
                        //         document.getElementById("G_total").innerHTML=total12_amt;
                        //     }
                        //     if( isNaN(am_GST18) && isNaN(am_GST5) && isNaN(am_GST28)){

                        //             document.getElementById("T_A_value").innerHTML=am_GST12;
                        //             document.getElementById("GST_amt").innerHTML=total12GST;
                        //             document.getElementById("G_total").innerHTML=total12_amt;
                        //     }
                        //     if(isNaN(total12_amt)) {
                        //         document.getElementById("12%CGST").innerHTML='';
                        //         document.getElementById("12%SGST").innerHTML='';
                        //         document.getElementById("12%T_GST").innerHTML='';
                        //         document.getElementById("12%T_amt").innerHTML='';
                        //         document.getElementById("GST_amt").innerHTML='';
                        //         document.getElementById("G_total").innerHTML='';
                        //         cal5();
                        //         cal18();
                        //         cal28();
                        //     }


                        // }
                        // function cal18() {
                        //     am_GST18= document.getElementById("am_GST18").value;

                        //     var select=18/2;
            
                        //     var CGSTvalue=(am_GST18*select)/100;

                        //     var SGSTvalue=(am_GST18*select)/100;

                        //     total18GST=(CGSTvalue)+(SGSTvalue);
                        //     total18_amt=parseFloat(am_GST18) + parseFloat(total18GST);


                        //    document.getElementById("18%CGST").innerHTML=  CGSTvalue;
                        //    document.getElementById("18%SGST").innerHTML=SGSTvalue;
                        //    document.getElementById("18%T_GST").innerHTML=total18GST;
                        //    document.getElementById("18%T_amt").innerHTML=total18_amt;

                        //    var am_GST5= parseFloat(document.getElementById("am_GST5").value)
                        //    var am_GST12= parseFloat(document.getElementById("am_GST12").value)
                        //    var am_GST28= parseFloat(document.getElementById("am_GST28").value)
                        //     if(!isNaN(am_GST5)) {
                        //         am_GST18=parseFloat(am_GST5)+parseFloat(am_GST18);
                        //         document.getElementById("T_A_value").innerHTML=am_GST18;

                        //         total18GST=total18GST + parseFloat(document.getElementById("5%T_GST").textContent);
                        //         document.getElementById("GST_amt").innerHTML=total18GST;
                                
                        //         total18_amt=total18_amt+parseFloat(document.getElementById("5%T_amt").textContent);
                        //         document.getElementById("G_total").innerHTML=total18_amt;
                        //     }

                        //     if(!isNaN(am_GST12)) {
                        //         am_GST18=parseFloat(am_GST12)+parseFloat(am_GST18);
                        //         document.getElementById("T_A_value").innerHTML=am_GST18;

                        //         total18GST=total18GST + parseFloat(document.getElementById("12%T_GST").textContent);
                        //         document.getElementById("GST_amt").innerHTML=total18GST;
                                
                        //         total18_amt=total18_amt+parseFloat(document.getElementById("12%T_amt").textContent);
                        //         document.getElementById("G_total").innerHTML=total18_amt;
                        //     }

                        //     if(!isNaN(am_GST28)) {
                        //         am_GST18=parseFloat(am_GST28)+parseFloat(am_GST18);
                        //         document.getElementById("T_A_value").innerHTML=am_GST18;

                        //         total18GST=total18GST + parseFloat(document.getElementById("28%T_GST").textContent);
                        //         document.getElementById("GST_amt").innerHTML=total18GST;
                                
                        //         total18_amt=total18_amt+parseFloat(document.getElementById("28%T_amt").textContent);
                        //         document.getElementById("G_total").innerHTML=total18_amt;
                        //     }

                        //     if( isNaN(am_GST12) && isNaN(am_GST5) && isNaN(am_GST28)){

                        //         document.getElementById("T_A_value").innerHTML=am_GST18;
                        //         document.getElementById("GST_amt").innerHTML=total8GST;
                        //         document.getElementById("G_total").innerHTML=total8_amt;
                        //     }

                        //     if(isNaN(total18_amt)) {
                        //         document.getElementById("18%CGST").innerHTML='';
                        //         document.getElementById("18%SGST").innerHTML='';
                        //         document.getElementById("18%T_GST").innerHTML='';
                        //         document.getElementById("18%T_amt").innerHTML='';
                        //         document.getElementById("GST_amt").innerHTML='';
                        //         document.getElementById("G_total").innerHTML='';
                        //         cal12();
                        //         cal5();
                        //         cal28();
                        //     }

                        // }
                        // function cal28() {
                        //    am_GST28= document.getElementById("am_GST28").value;

                        //    var select=28/2;
                           
                        //    var CGSTvalue=(am_GST28*select)/100;               
                        //    var SGSTvalue=(am_GST28*select)/100;               
                        //    total28GST=(CGSTvalue)+(SGSTvalue);
                        //    total28_amt=parseFloat(am_GST28) + parseFloat(total28GST);


                        //    document.getElementById("28%CGST").innerHTML=  CGSTvalue;
                        //    document.getElementById("28%SGST").innerHTML=SGSTvalue;
                        //    document.getElementById("28%T_GST").innerHTML=total28GST;
                        //    document.getElementById("28%T_amt").innerHTML=total28_amt;

                        //    var am_GST5= parseFloat(document.getElementById("am_GST5").value)
                        //    var am_GST12= parseFloat(document.getElementById("am_GST12").value)
                        //    var am_GST18= parseFloat(document.getElementById("am_GST18").value)
                        //     if(!isNaN(am_GST5)) {
                                
                        //         am_GST28=(parseFloat(am_GST5)+parseFloat(am_GST28));
                        //         document.getElementById("T_A_value").innerHTML=am_GST28;

                        //         total28GST=total28GST + parseFloat(document.getElementById("5%T_GST").textContent);
                        //         document.getElementById("GST_amt").innerHTML=total28GST;
                                
                        //         total28_amt=total28_amt+parseFloat(document.getElementById("5%T_amt").textContent);
                        //         document.getElementById("G_total").innerHTML=total28_amt;
                        //     }

                        //     if(!isNaN(am_GST12)) {
                        //         am_GST28=(parseFloat(am_GST12)+parseFloat(am_GST28));
                        //         document.getElementById("T_A_value").innerHTML=am_GST28;

                        //         total28GST=total28GST + parseFloat(document.getElementById("12%T_GST").textContent);
                        //         document.getElementById("GST_amt").innerHTML=total28GST;
                                
                        //         total28_amt=total28_amt+parseFloat(document.getElementById("12%T_amt").textContent);
                        //         document.getElementById("G_total").innerHTML=total28_amt;
                        //     }

                        //     if(!isNaN(am_GST18)) {
                        //         am_GST28=(parseFloat(am_GST18)+parseFloat(am_GST28));
                        //         document.getElementById("T_A_value").innerHTML=am_GST28;

                        //         total28GST=total28GST + parseFloat(document.getElementById("18%T_GST").textContent);
                        //         document.getElementById("GST_amt").innerHTML=total28GST;
                                
                        //         total28_amt=total28_amt+parseFloat(document.getElementById("18%T_amt").textContent);
                        //         document.getElementById("G_total").innerHTML=total28_amt;
                        //     }

                        //     if( isNaN(am_GST12) && isNaN(am_GST5) && isNaN(am_GST28)){

                        //         document.getElementById("T_A_value").innerHTML=am_GST28;
                        //         document.getElementById("GST_amt").innerHTML=total28GST;
                        //         document.getElementById("G_total").innerHTML=total28_amt;
                        //     }

                        //     if(isNaN(total28_amt)) {
                        //         document.getElementById("28%CGST").innerHTML='';
                        //         document.getElementById("28%SGST").innerHTML='';
                        //         document.getElementById("28%T_GST").innerHTML='';
                        //         document.getElementById("28%T_amt").innerHTML='';
                        //         document.getElementById("GST_amt").innerHTML='';
                        //         document.getElementById("G_total").innerHTML='';
                        //         cal12();
                        //         cal18();
                        //         cal58();
                        //     }
                        // }

    
                        
                    </script>
            </div>
        </div>
    </div>
</div>
 @endsection
