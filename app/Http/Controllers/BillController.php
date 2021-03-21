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
            'name'=>['required','string', 'max:50'],
            'gstin'=>'required | min:3 | max:50',
            'invoice_date'=>'required ',
            'invoice_no'=>'required ',
            'registration_date'=>'required ',
            'state_code'=>'required ',
        ]);
        if ($req->am_GST5==null && $req->am_GST12==null && $req->am_GST18==null && $req->am_GST28==null) {
            return back()->with('message','please enter minimum one amount');
        }
        if($req->am_GST5){
            $am_GST5=$req->am_GST5;

            $CGST_5_value=$req->CGST_5_hidden;

            $SGST_5_value=$req->SGST_5_hidden;
            $total5GST=$req->t_gst_5_hidden;
            $total5_amt=$req->t_amt_5_hidden;
        }else{
            $am_GST5=0;
            $CGST_5_value=0;
            $SGST_5_value=0;
            $total5GST=0;
            $total5_amt=0;
        }
        if($req->am_GST12){
            $am_GST12=$req->am_GST12;

            $CGST_12_value=$req->CGST_12_hidden;

            $SGST_12_value=$req->SGST_12_hidden;
            $total12GST=$req->t_gst_12_hidden;
            $total12_amt=$req->t_amt_12_hidden;
        }else{
            $am_GST12=0;
            $CGST_12_value=0;
            $SGST_12_value=0;
            $total12GST=0;
            $total12_amt=0;
        }

        if($req->am_GST18){
            $am_GST18=$req->am_GST18;

            $CGST_18_value=$req->CGST_18_hidden;

            $SGST_18_value=$req->SGST_18_hidden;
            $total18GST=$req->t_gst_18_hidden;
            $total18_amt=$req->t_amt_18_hidden;
        }else{
            $am_GST18=0;
            $CGST_18_value=0;
            $SGST_18_value=0;
            $total18GST=0;
            $total18_amt=0;
        }

        if($req->am_GST28){
            $am_GST28=$req->am_GST28;

            $CGST_28_value=$req->CGST_28_hidden;

            $SGST_28_value=$req->SGST_28_hidden;
            $total28GST=$req->t_gst_28_hidden;
            $total28_amt=$req->t_amt_28_hidden;
        }else{
            $am_GST28=0;
            $CGST_28_value=0;
            $SGST_28_value=0;
            $total28GST=0;
            $total28_amt=0;
        }

        $bill = new Bill;
        $bill->name=$req->name;
        $bill->gstin=$req->gstin;
        $bill->registration_date=$req->registration_date;
        $bill->invoice_date=$req->invoice_date;
        $bill->invoice_no=$req->invoice_no;
        $bill->state_code=$req->state_code;
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
    //-------------------------------------------------------------------------
        $bill->G_total=$req->G_total_hidden;                  
        $bill->operator=$req->operator;                                   
        $bill->round_Off=$req->round_Off;                                  
        $bill->F_total=$req->F_total_hidden;                        
        $bill->grand_all_total=$req->grand_all_total_hidden;

    // "T_A_value_hidden" => "5204.56"
//   "GST_amt_hidden" => "1273.95"
//   "G_total_hidden" => "6478.51"
//   "operator" => "+"
//   "round_Off" => "0.49"
//   "F_total_hidden" => "6479"  pdf er grand total
//   "grand_all_total_hidden" => "6543.79"

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
    public function update(Request $req,Bill $bill)
    {
        // dd($bill->id);
        $req->validate([  
            'name'=>['required','string', 'max:50'],
            'gstin'=>'required | min:3 | max:50',
            'invoice_date'=>'required',
            'invoice_no'=>'required',
            'registration_date'=>'required',
            'state_code'=>'required',
       ]);
        if ($req->am_GST5==null && $req->am_GST12==null && $req->am_GST18==null && $req->am_GST28==null) {
            return redirect()->back()->with('message','please enter minimum one amount');
        }
        if($req->am_GST5){
            $am_GST5=$req->am_GST5;

            $CGST_5_value=$req->CGST_5_hidden;

            $SGST_5_value=$req->SGST_5_hidden;
            $total5GST=$req->t_gst_5_hidden;
            $total5_amt=$req->t_amt_5_hidden;
        }else{
            $am_GST5=0;
            $CGST_5_value=0;
            $SGST_5_value=0;
            $total5GST=0;
            $total5_amt=0;
        }
        if($req->am_GST12){
            $am_GST12=$req->am_GST12;

            $CGST_12_value=$req->CGST_12_hidden;

            $SGST_12_value=$req->SGST_12_hidden;
            $total12GST=$req->t_gst_12_hidden;
            $total12_amt=$req->t_amt_12_hidden;
        }else{
            $am_GST12=0;
            $CGST_12_value=0;
            $SGST_12_value=0;
            $total12GST=0;
            $total12_amt=0;
        }

        if($req->am_GST18){
            $am_GST18=$req->am_GST18;

            $CGST_18_value=$req->CGST_18_hidden;

            $SGST_18_value=$req->SGST_18_hidden;
            $total18GST=$req->t_gst_18_hidden;
            $total18_amt=$req->t_amt_18_hidden;
        }else{
            $am_GST18=0;
            $CGST_18_value=0;
            $SGST_18_value=0;
            $total18GST=0;
            $total18_amt=0;
        }

        if($req->am_GST28){
            $am_GST28=$req->am_GST28;

            $CGST_28_value=$req->CGST_28_hidden;

            $SGST_28_value=$req->SGST_28_hidden;
            $total28GST=$req->t_gst_28_hidden;
            $total28_amt=$req->t_amt_28_hidden;
        }else{
            $am_GST28=0;
            $CGST_28_value=0;
            $SGST_28_value=0;
            $total28GST=0;
            $total28_amt=0;
        }
        
        // $ok=Bill::where('id',$bill)->update([ // it's also work same like below. But before use, remove 'Bill' in update function. 'public function update(Request $req, $bill)' 
        $ok=$bill->where('id',$bill->id)->update([
            'name'=>$req->name,
            'gstin'=>$req->gstin,
            'invoice_no'=>$req->invoice_no,
            'state_code'=>$req->state_code,
            'registration_date'=>$req->registration_date,
            'invoice_date'=>$req->invoice_date,
        //---------------GST 5%-----------------------------------------------
            'gst5e_amt'=>$am_GST5,    
            'gst5cgst'=> $CGST_5_value,
            'gst5sgst'=> $SGST_5_value,
            'gst5t_gst'=>$total5GST,
            'gst5t_amt'=>$total5_amt,  
        //---------------GST 12%-----------------------------------------------
            'gst12e_amt'=>$am_GST12,    
            'gst12cgst'=> $CGST_12_value,
            'gst12sgst'=> $SGST_12_value,
            'gst12t_gst'=> $total12GST,
            'gst12t_amt'=> $total12_amt,  
        //---------------GST 18%-----------------------------------------------
            'gst18e_amt'=>$am_GST18,  
            'gst18cgst'=>$CGST_18_value,
            'gst18sgst'=>$SGST_18_value,
            'gst18t_gst'=>$total18GST,
            'gst18t_amt'=>$total18_amt,  
        //---------------GST 28%-----------------------------------------------
            'gst28e_amt'=>$am_GST28,  
            'gst28cgst'=>$CGST_28_value,
            'gst28sgst'=>$SGST_28_value,
            'gst28t_gst'=>$total28GST,
            'gst28t_amt'=>$total28_amt,  
        //-----------------------------------------------------------------------
            'G_total'=> $req->G_total_hidden,                
            'operator'=> $req->operator,                     
            'round_Off'=>$req->round_Off,                  
            'F_total'=>$req->F_total_hidden,                
            'grand_all_total'=>$req->grand_all_total_hidden,
        ]);

//   $this->meesage('message','Customer updated successfully!');
        if ($ok) {
            return redirect('bill')->with('message','suceessfull update!');
        } else {
            return redirect()->back()->with('message','something wrong! TRy Again');
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
    
    function pdf_date(Request $req){
        $req->validate([  
            'from'=>['required','date_format:Y-m-d'],
            'to'=>'required | date_format:Y-m-d',
        ]);
        $bill=Bill::whereBetween('created_at',[$req->from, $req->to])->get();
        
        if ($bill->count()==0) {
            return redirect()->back()->with('msg','No Data found! please check again');
        }
        
        $pdf = PDF::loadView('download_PDF', compact('bill'));
        return $pdf->download('All_Bills.pdf');           

    }

    function Show_distributor_pdf(){ // tamplate file rander
        $Distributor = Distributo::select('name')->get();
        return view('distributor_pdf', compact('Distributor'));
    }

    function distributor_pdf(Request $req){
        $req->validate([  
            'name'=>['required','string','max:30'],
        ]);
        $bill=Bill::where('name',$req->name)->get();
        
        if ($bill->count()==0) {
            return back()->with('msg','No Data found! please check again');
        }
        // return view('new_download_pdf', compact('bill'));
        $pdf = PDF::loadView('download_PDF', compact('bill'));
        return $pdf->download('Distributor.pdf');           

    }


    public function gen(){
        $bill = Bill::toBase()->get();
        return view('download_PDF', compact('bill'));
    }

}
