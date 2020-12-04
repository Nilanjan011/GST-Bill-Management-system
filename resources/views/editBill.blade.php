@extends('layout')

@section('title','update Form')


 @section('ad')
    
 <div id="wrapper">

    <x-header/>
{% block content%}
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                
            
                <div id="page">
                    <div id="morris-area-chart"></div>
                    <div id="morris-bar-chart"></div>
                    <div id="morris-donut-chart"></div>
            
                 </div>
                <h1 class="page-header" style="border-bottom: 1px solid rgb(82, 37, 206);">Update Bill Form</h1>
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
                <form action="{{ route('bill.update',$bill->id) }}" id="myForm" method="post">
                    @csrf
                    @method('put')
                    
                        <div class="form-group">
                            <label for="name">Distributor Name</label>
                           
                          <input type="text" class="form-control" name="name" id="name" value=" {{$bill->name}} " placeholder="name" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1" >Bill Number</label>
                          
                          <input type="text" class="form-control" id="bill_no" name="bill_no" value=" {{$bill->billno}}" placeholder="Bill Number" required>
                        </div>
                        <div class="form-group">
                            <label for="date" class="col-2 colform-label">Date</label>
                            <div class="col-10">
                                <input  class="form-control" id="date" name="date" value=" {{$bill->date}}">
                            </div>
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
                                <tb>
                                    <tr class="odd gradeX">
                                        <td class="text-center">Enter Amount
                                            <br><input type="text" id="am_GST5"  name="am_GST5" value="{{$bill->gst5e_amt}}" placeholder="Enter Amount">
                                        </td>
                                        <td class="text-center">Enter Amount
                                            <br><input type="text" id="am_GST12" name="am_GST12" value=" {{$bill->gst12e_amt}}" placeholder="Enter Amount">
                                        </td>
                                        <td class="text-center">Enter Amount
                                            <br><input type="text" id="am_GST18" name="am_GST18" value=" {{$bill->gst18e_amt}}" placeholder="Enter Amount" >
                                        </td>
                                        <td class="text-center">Enter Amount
                                            <br><input type="text" id="am_GST28"  name="am_GST28" value=" {{$bill->gst28e_amt}}" placeholder="Enter Amount">
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
                        </div>
                        <div class="table-responsive">
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
                        </div>
                </form>
                <div id="err1"></div>
                <div id="err"></div>
                <button onclick="cal()" class="btn btn-warning">Total Sum</button>
                <button type="submit" onclick="form_submit()" class="btn btn-info">Submit</button>
                         <script>
                             document.getElementById("page").style.display="none";

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
                         </script>
            </div>
        </div>
    </div>
</div>
 @endsection
