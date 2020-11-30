<?php

namespace App\Http\Controllers;
use App\Distributo;
use App\Bill;
use PDF;
// use App;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bill = Bill::toBase()->get();
        return view('showBill',compact('bill'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Distributor = Distributo::toBase()->get();
        return view('billcreate', compact('Distributor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([  
            'name'=>['required','string', 'max:25'],
            'bill_no'=>'required | min:3 | max:50',
            'date'=>'required ',
        ]);
        if ($req->am_GST5==null && $req->am_GST12==null && $req->am_GST18==null && $req->am_GST28==null) {
            return redirect()->back()->with('message','please enter minimum one amount');
        }
        if($req->am_GST5){
            $am_GST5=$req->am_GST5;
            
            $select=5/2;

            $CGST_5_value=($am_GST5*$select)/100;

            $SGST_5_value=($am_GST5*$select)/100;
            $total5GST=($CGST_5_value)+($SGST_5_value);
            $total5_amt=$am_GST5 + $total5GST;
        }else{
            $am_GST5=0;
            $CGST_5_value=0;
            $SGST_5_value=0;
            $total5GST=0;
            $total5_amt=0;
        }
        if($req->am_GST12){
            $am_GST12=$req->am_GST12;
            $select=12/2;

            $CGST_12_value=($am_GST12*$select)/100;

            $SGST_12_value=($am_GST12*$select)/100;
            $total12GST=($SGST_12_value)+($CGST_12_value);
            $total12_amt=$am_GST12 + $total12GST;
        }else{
            $am_GST12=0;
            $CGST_12_value=0;
            $SGST_12_value=0;
            $total12GST=0;
            $total12_amt=0;
        }

        if($req->am_GST18){
            $am_GST18=$req->am_GST18;
            $select=18/2;

            $CGST_18_value=($am_GST18*$select)/100;

            $SGST_18_value=($am_GST18*$select)/100;
            $total18GST=($SGST_18_value)+($CGST_18_value);
            $total18_amt=$am_GST18 + $total18GST;
        }else{
            $am_GST18=0;
            $CGST_18_value=0;
            $SGST_18_value=0;
            $total18GST=0;
            $total18_amt=0;
        }

        if($req->am_GST28){
            $am_GST28=$req->am_GST28;
            $select=28/2;

            $CGST_28_value=($am_GST28*$select)/100;

            $SGST_28_value=($am_GST28*$select)/100;
            $total28GST=($SGST_28_value)+($CGST_28_value);
            $total28_amt=$am_GST28 + $total28GST;
        }else{
            $am_GST28=0;
            $CGST_28_value=0;
            $SGST_28_value=0;
            $total28GST=0;
            $total28_amt=0;
        }

        $bill = new Bill;
        $bill->name=$req->name;
        $bill->billno=$req->bill_no;
        $bill->date=$req->date;
    //--------------------GST 5%----------------------------------------------
        $bill->gst5e_amt=$am_GST5;               
        $bill->gst5cgst= $CGST_5_value;            
        $bill->gst5sgst= $SGST_5_value;         
        $bill->gst5t_gst=$total5GST;          
        $bill->gst5t_amt=$total5_amt;                 
    //--------------------GST 12%----------------------------------------------
        $bill->gst12e_amt=$am_GST12;     
        $bill->gst12cgst= $CGST_12_value;
        $bill->gst12sgst= $SGST_12_value;
        $bill->gst12t_gst=$total12GST;   
        $bill->gst12t_amt=$total12_amt;  
    //--------------------GST 18%----------------------------------------------
        $bill->gst18e_amt=$am_GST18;     
        $bill->gst18cgst= $CGST_18_value;
        $bill->gst18sgst= $SGST_18_value;
        $bill->gst18t_gst=$total18GST;   
        $bill->gst18t_amt=$total18_amt;  
    //============GST 28%-------------------------------------------------
        $bill->gst28e_amt=$am_GST28;     
        $bill->gst28cgst= $CGST_28_value;
        $bill->gst28sgst= $SGST_28_value;
        $bill->gst28t_gst=$total28GST;   
        $bill->gst28t_amt=$total28_amt;  
        $s=$bill->save();
        if ($s) {
            return redirect('bill')->with('message','successfully inserted');
        }
        
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        return view('editBill',compact("bill"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Bill $bill)
    {
        $req->validate([  
            'name'=>['required','string', 'max:25'],
            'bill_no'=>'required | min:3 | max:50',
            'date'=>'required ',
        ]);
        if ($req->am_GST5==null && $req->am_GST12==null && $req->am_GST18==null && $req->am_GST28==null) {
            return redirect()->back()->with('message','please enter minimum one amount');
        }
        if($req->am_GST5){
            $am_GST5=$req->am_GST5;
            
            $select=5/2;

            $CGST_5_value=($am_GST5*$select)/100;

            $SGST_5_value=($am_GST5*$select)/100;
            $total5GST=($CGST_5_value)+($SGST_5_value);
            $total5_amt=$am_GST5 + $total5GST;
        }else{
            $am_GST5=0;
            $CGST_5_value=0;
            $SGST_5_value=0;
            $total5GST=0;
            $total5_amt=0;
        }
        if($req->am_GST12){
            $am_GST12=$req->am_GST12;
            $select=12/2;

            $CGST_12_value=($am_GST12*$select)/100;

            $SGST_12_value=($am_GST12*$select)/100;
            $total12GST=($SGST_12_value)+($CGST_12_value);
            $total12_amt=$am_GST12 + $total12GST;
        }else{
            $am_GST12=0;
            $CGST_12_value=0;
            $SGST_12_value=0;
            $total12GST=0;
            $total12_amt=0;
        }

        if($req->am_GST18){
            $am_GST18=$req->am_GST18;
            $select=18/2;

            $CGST_18_value=($am_GST18*$select)/100;

            $SGST_18_value=($am_GST18*$select)/100;
            $total18GST=($SGST_18_value)+($CGST_18_value);
            $total18_amt=$am_GST18 + $total18GST;
        }else{
            $am_GST18=0;
            $CGST_18_value=0;
            $SGST_18_value=0;
            $total18GST=0;
            $total18_amt=0;
        }

        if($req->am_GST28){
            $am_GST28=$req->am_GST28;
            $select=28/2;

            $CGST_28_value=($am_GST28*$select)/100;

            $SGST_28_value=($am_GST28*$select)/100;
            $total28GST=($SGST_28_value)+($CGST_28_value);
            $total28_amt=$am_GST28 + $total28GST;
        }else{
            $am_GST28=0;
            $CGST_28_value=0;
            $SGST_28_value=0;
            $total28GST=0;
            $total28_amt=0;
        }

        $ok=$bill->update([
            'name' => $req->name,
            'billno' => $req->bill_no,
            'date'=>$req->date,
        //---------------GST 5%-----------------------------------------------
            'gst5e_amt'=>$am_GST5,    
            'gst5cgst'=> $CGST_5_value,
            'gst5sgst'=> $SGST_5_value,
            'gst5t_gst'=>$total5GST,
            'gst5t_amt'=>$total5_amt,  
        //---------------GST 12%-----------------------------------------------
            'gst12e_amt'=>$am_GST12,    
            'gst12cgst '=> $CGST_12_value,
            'gst12sgst '=> $SGST_12_value,
            'gst12t_gst'=>$total12GST,
            'gst12t_amt'=>$total12_amt,  
        //---------------GST 18%-----------------------------------------------
            'gst18e_amt'=>$am_GST18,  
            'gst18cgst '=> $CGST_18_value,
            'gst18sgst '=> $SGST_18_value,
            'gst18t_gst'=>$total18GST,
            'gst18t_amt'=>$total18_amt,  
        //---------------GST 28%-----------------------------------------------
            'gst28e_amt'=>$am_GST28,  
            'gst28cgst '=> $CGST_28_value,
            'gst28sgst '=> $SGST_28_value,
            'gst28t_gst'=>$total28GST,
            'gst28t_amt'=>$total28_amt,  

        ]);

//   $this->meesage('message','Customer updated successfully!');
        if ($ok) {
            return redirect('bill')->with('message','suceessfull update!');
        } else {
            return redirect()->back()->with('message','suceessfullsomething update!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        $bill->delete();
    
        return redirect()->back()->with('message','deleted successfully!');
    }
    public function PDFgen(){
            $bill = Bill::toBase()->get();
            $pdf = PDF::loadView('download_PDF', compact('bill'));
            return $pdf->download('All_Bills.pdf');           
    }
    public function gen(){
        $bill = Bill::toBase()->get();
        return view('download_PDF', compact('bill'));
    }

}
