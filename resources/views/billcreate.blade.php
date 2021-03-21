@extends('layout')

@section('title','Distributors Bill Form')


 @section('ad')
    
 <div id="wrapper">

    <x-header/>
{{-- {% block content%} --}}
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                
                
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
                        <input type="hidden" name="name" id="hidden_name">
                        <label for="name">Distributor Name & Address</label>
                        <select class="form-control form-control-lg" id="name" onclick="top_name()">
                            <option value="">select</option>
                            @forelse ($Distributor as $item)
                            <option value=" {{$item->name}}&{{$item->gstin}} ">{{$item->name}}, {{$item->address}}</option>  
                            @empty
                                <option value="">No data found</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">GSTIN</label>                     
                      <input type="text" class="form-control" id="gstin" name="gstin" placeholder="GST IN" required>
                    </div>
                    <div class="form-group">
                        <label for="date" class="col-2 colform-label"> Invoice Date</label>
                        <div class="col-10">
                            <input type="date" class="form-control" id="invoice_date" name="invoice_date" required value= "12/5/2020">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-2 colform-label"> Invoice No</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="invoice_no" name="invoice_no" required placeholder="Enter invoice No">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="date" class="col-2 colform-label"> Registration Date</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="registration_date" name="registration_date" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">State Code</label>                     
                        <input type="text" class="form-control" id="state_code" name="state_code" value="21" required>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-center"> GST Type 5%.</th>
                                    <th class="text-center"> GST Type 12%</th>
                                    <th class="text-center"> GST Type 18%</th>
                                    <th class="text-center"> GST Type 28%</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                    <td class="text-center">CGST : <p id="5%CGST" ></p><input type="hidden" name="CGST_5_hidden" id="CGST_5_hidden"></td>
                                    <td class="text-center">CGST : <p id="12%CGST"></p><input type="hidden" name="CGST_12_hidden" id="CGST_12_hidden"></td>
                                    <td class="text-center">CGST : <p id="18%CGST"></p><input type="hidden" name="CGST_18_hidden" id="CGST_18_hidden"></td>
                                    <td class="text-center">CGST : <p id="28%CGST"></p><input type="hidden" name="CGST_28_hidden" id="CGST_28_hidden"></td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td class="text-center">SGST : <p id="5%SGST" ></p><input type="hidden" name="SGST_5_hidden" id="SGST_5_hidden"> </td>
                                    <td class="text-center">SGST : <p id="12%SGST"></p><input type="hidden" name="SGST_12_hidden" id="SGST_12_hidden"></td>
                                    <td class="text-center">SGST : <p id="18%SGST"></p><input type="hidden" name="SGST_18_hidden" id="SGST_18_hidden"></td>
                                    <td class="text-center">SGST : <p id="28%SGST"></p><input type="hidden" name="SGST_28_hidden" id="SGST_28_hidden"></td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td class="text-center">Total GST : <p id="5%T_GST"></p> <input type="hidden" name="t_gst_5_hidden" id="t_gst_5_hidden"></td>
                                    <td class="text-center">Total GST : <p id="12%T_GST"></p><input type="hidden" name="t_gst_12_hidden" id="t_gst_12_hidden"></td>
                                    <td class="text-center">Total GST : <p id="18%T_GST"></p><input type="hidden" name="t_gst_18_hidden" id="t_gst_18_hidden"></td>
                                    <td class="text-center">Total GST : <p id="28%T_GST"></p><input type="hidden" name="t_gst_28_hidden" id="t_gst_28_hidden"></td>
                                </tr>
                                <tr class="odd gradeX">
                                    <td class="text-center">Total Amount : <p id="5%T_amt" ></p><input type="hidden" name="t_amt_5_hidden" id="t_amt_5_hidden"> </td>
                                    <td class="text-center">Total Amount : <p id="12%T_amt"></p><input type="hidden" name="t_amt_12_hidden" id="t_amt_12_hidden"></td>
                                    <td class="text-center">Total Amount : <p id="18%T_amt"></p><input type="hidden" name="t_amt_18_hidden" id="t_amt_18_hidden"></td>
                                    <td class="text-center">Total Amount : <p id="28%T_amt"></p><input type="hidden" name="t_amt_28_hidden" id="t_amt_28_hidden"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-center">Total Asscble Value</th>
                                    <th class="text-center">GST AMT</th>
                                    <th class="text-center">Grand Total</th>
                                    <th class="text-center">Round off</th>
                                    <th class="text-center">Final total</th>
                                    <th class="text-center">Including 1% tax Grand Total </th>
                                </tr>
                            </thead>
                            <td>
                                <tr>
                                    <td class="text-center" id="T_A_value"></td><input type="hidden" name="T_A_value_hidden" id="T_A_value_hidden">
                                    <td class="text-center"><p id="GST_amt"></p></td><input type="hidden" name="GST_amt_hidden" id="GST_amt_hidden">
                                    <td class="text-center"><p id="G_total"></p></td><input type="hidden" name="G_total_hidden" id="G_total_hidden">
                                    <td class="text-center"><select name="operator" id="operator">
                                                                <option value="">select</option>
                                                                <option value="+">+</option>
                                                                <option value="-">-</option>
                                                            </select> <input type="text" name="round_Off" id="round_Off" placeholder="Round off"></td>
                                    <td class="text-center" id="F_total"></td><input type="hidden" name="F_total_hidden" id="F_total_hidden">
                                    <td class="text-center" id="grand_all_total"></td><input type="hidden" name="grand_all_total_hidden" id="grand_all_total_hidden">
                                </tr>
                            </td>

                        </table>
                    </div>
                    
                </form>
                <div id="err1"></div>
                <div id="err"></div>
                <button onclick="cal()" class="btn btn-success">Total Sum</button>
                <button type="submit" onclick="form_submit()" class="btn btn-primary">Submit</button>
                    <script>
                        var total_sum_press;
                        var today = new Date().toLocaleDateString();
                        document.getElementById("registration_date").value=today;

                        function top_name(){
                            var name=document.getElementById('name').value;
                            name=name.split('&');
                            document.getElementById("top_name").innerHTML=name[0];
                            document.getElementById("hidden_name").value=name[0];
                            document.getElementById('gstin').value=name[1];
                        }

                        function form_submit() {
                            if ( total_sum_press==1)
                            {
                                var name= document.getElementById("name").value;
                                var gstin= document.getElementById("gstin").value;
                                var invoice_date= document.getElementById("invoice_date").value;
                                var am_GST5=  parseFloat(document.getElementById("am_GST5").value);
                                var am_GST12= parseFloat(document.getElementById("am_GST12").value);
                                var am_GST18= parseFloat(document.getElementById("am_GST18").value);
                                var am_GST28= parseFloat(document.getElementById("am_GST28").value);
                                var sub=0;
                                var sub1=0;
                                if(name!='' && gstin!='' && invoice_date!=''){
                                    sub=1;
                                    
                                }else{
                                    document.getElementById("err1").innerHTML='<h4 style="color:red;"> Name, GSTiN and Registration Date is required</h4>'
                                }
                                if(!isNaN(am_GST5) || !isNaN(am_GST12) || !isNaN(am_GST18) || !isNaN(am_GST28 )){
                                    sub1=1
                                }else{
                                    sub1=0
                                    document.getElementById("err").innerHTML='<h4 style="color:red;"> please fill any one Amount</h4>'
                                }
                                if (sub==1 && sub1==1) {
                                    // console.log( am_GST18 );
                                    document.getElementById("myForm").submit();
                                    
                                }
                            }else{
                                document.getElementById("err").innerHTML='<h4 style="color:red;"> please click Total sum</h4>'
                            }
                        }

                         function abc(a)
                        {
                        	a = a.toString(); //If it's not already a String
                        	if (a.indexOf(".")>-1)
                        	{
                        		num = a.slice(0, (a.indexOf("."))+3);
                        		return num;
                        	}else{
                        		return a;
                        	}
                        }

                        function cal() {
                            var grand_all_total;
                            total_sum_press=1;
                            var T_A_value=0;
                            var GST_value=0;
                            var G_total=0;
                
                            var round_Off = parseFloat(document.getElementById("round_Off").value);
                            var operator = document.getElementById("operator").value;
                            console.log(operator);
                            
                            var am_GST5=  parseFloat(document.getElementById("am_GST5").value);
                            var am_GST12= parseFloat(document.getElementById("am_GST12").value);
                            var am_GST18= parseFloat(document.getElementById("am_GST18").value);
                            var am_GST28= parseFloat(document.getElementById("am_GST28").value);
                            if(!isNaN(am_GST5)){
                                
                                total5GST=abc(am_GST5 * 0.05);
                                var CGSTvalue = total5GST /2;
                                var SGSTvalue= abc(CGSTvalue);
                                CGSTvalue=SGSTvalue;
                                
                                total5_amt=parseFloat(am_GST5) + parseFloat(total5GST);
                                
                                document.getElementById("5%CGST").innerHTML=CGSTvalue;
                                document.getElementById("CGST_5_hidden").value=CGSTvalue;
                                document.getElementById("5%SGST").innerHTML=SGSTvalue;
                                document.getElementById("SGST_5_hidden").value=SGSTvalue;
                                document.getElementById("5%T_GST").innerHTML=total5GST;
                                document.getElementById("t_gst_5_hidden").value=total5GST;
                                document.getElementById("5%T_amt").innerHTML=total5_amt;
                                document.getElementById("t_amt_5_hidden").value=total5_amt;
                                
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
                                
                                total12GST=abc(am_GST12 * 0.12);
                                var CGSTvalue = total12GST /2;
                                var SGSTvalue= abc(CGSTvalue);
                                CGSTvalue=SGSTvalue;
                                
                                total12_amt=parseFloat(am_GST12) + parseFloat(total12GST);
                                
                                document.getElementById("12%CGST").innerHTML=CGSTvalue;
                                document.getElementById("CGST_12_hidden").value=CGSTvalue;
                                document.getElementById("12%SGST").innerHTML=SGSTvalue;
                                document.getElementById("SGST_12_hidden").value=SGSTvalue;
                                document.getElementById("12%T_GST").innerHTML=total12GST;
                                document.getElementById("t_gst_12_hidden").value=total12GST;
                                document.getElementById("12%T_amt").innerHTML=total12_amt;
                                document.getElementById("t_amt_12_hidden").value=total12_amt;
                                
                                T_A_value=T_A_value+parseFloat(am_GST12);
                                GST_value=GST_value+parseFloat(total12GST);
                                G_total=G_total+parseFloat(total12_amt);
                            }else{
                                document.getElementById("12%CGST").innerHTML="";
                                document.getElementById("12%SGST").innerHTML="";
                                document.getElementById("12%T_GST").innerHTML='';
                                document.getElementById("12%T_amt").innerHTML='';
                            }
                
                            if(!isNaN(am_GST18)) {

                                total18GST=abc(am_GST18 * 0.18);
                                var CGSTvalue = total18GST /2;
                                var SGSTvalue= abc(CGSTvalue);
                                CGSTvalue=SGSTvalue;
                                
                                total18_amt=parseFloat(am_GST18) + parseFloat(total18GST);

                                document.getElementById("18%CGST").innerHTML=CGSTvalue;
                                document.getElementById("CGST_18_hidden").value=CGSTvalue;
                                document.getElementById("18%SGST").innerHTML=SGSTvalue;
                                document.getElementById("SGST_18_hidden").value=SGSTvalue;
                                document.getElementById("18%T_GST").innerHTML=total18GST;
                                document.getElementById("t_gst_18_hidden").value=total18GST;
                                document.getElementById("18%T_amt").innerHTML=total18_amt;
                                document.getElementById("t_amt_18_hidden").value=total18_amt;
                                
                                T_A_value=T_A_value+am_GST18;
                                GST_value=GST_value+parseFloat(total18GST);
                                G_total=G_total+parseFloat(total18_amt);
                                
                            }else{
                                document.getElementById("18%CGST").innerHTML="";
                                document.getElementById("18%SGST").innerHTML='';
                                document.getElementById("18%T_GST").innerHTML='';
                                document.getElementById("18%T_amt").innerHTML='';
                                
                            }
                            if(!isNaN(am_GST28)){
                                
                                total28GST=abc(am_GST28 * 0.28);
                                var CGSTvalue = total28GST /2;
                                var SGSTvalue= abc(CGSTvalue);
                                CGSTvalue=SGSTvalue;
                                
                                total28_amt=parseFloat(am_GST28) + parseFloat(total28GST);
                                
                                document.getElementById("28%CGST").innerHTML= CGSTvalue;
                                document.getElementById("CGST_28_hidden").value=CGSTvalue;
                                document.getElementById("28%SGST").innerHTML=SGSTvalue;
                                document.getElementById("SGST_28_hidden").value=SGSTvalue;
                                document.getElementById("28%T_GST").innerHTML=total28GST;
                                document.getElementById("t_gst_28_hidden").value=total28GST;
                                document.getElementById("28%T_amt").innerHTML=total28_amt;
                                document.getElementById("t_amt_28_hidden").value=total28_amt;

                                T_A_value= T_A_value+am_GST28;
                                GST_value=GST_value+parseFloat(total28GST);
                                G_total=G_total+parseFloat(total28_amt);
                            }else{
                                document.getElementById("28%CGST").innerHTML= "";
                                document.getElementById("28%SGST").innerHTML="";
                                document.getElementById("28%T_GST").innerHTML="";
                                document.getElementById("28%T_amt").innerHTML="";
                            }
                            
                            document.getElementById("T_A_value").innerHTML= T_A_value.toFixed(2);//1833.23+3371.33;
                            document.getElementById("T_A_value_hidden").value=T_A_value.toFixed(2);
                            document.getElementById("GST_amt").innerHTML=abc(GST_value);
                            document.getElementById("GST_amt_hidden").value=abc(GST_value);
                            document.getElementById("G_total").innerHTML=abc(G_total);
                            document.getElementById("G_total_hidden").value=abc(G_total);

                            if (!isNaN(round_Off)) {
                                if (operator=='+') {
                                    grand_all_total=G_total+round_Off;
                                    document.getElementById("F_total").innerHTML= grand_all_total;
                                    document.getElementById("F_total_hidden").value=grand_all_total
                                } else {
                                    grand_all_total=G_total-round_Off;
                                    document.getElementById("F_total").innerHTML= grand_all_total;
                                    document.getElementById("F_total_hidden").value=grand_all_total;
                                }                                
                                
                            } else {
                                grand_all_total=G_total;
                                document.getElementById("F_total").innerHTML= grand_all_total;
                                document.getElementById("F_total_hidden").value=grand_all_total;
                            }
                            if (!isNaN(grand_all_total)) {
                                grand_all_total=grand_all_total+(grand_all_total*0.01);
                                document.getElementById("grand_all_total").innerHTML=abc(grand_all_total);
                                document.getElementById("grand_all_total_hidden").value=abc(grand_all_total);;

                            }
                            
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
