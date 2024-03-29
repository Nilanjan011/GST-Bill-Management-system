<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Distributo;

class Distributor extends Controller
{
    function index(Request $req){
        $req->validate([  
            'email'=>['required','email','unique:distributors'],
            'gstin'=>['required','unique:distributors'],
            'name'=>['required', 'max:25' ,'string'],
            'phone'=>'required | min:10',
            'address'=>'required | max:30',
            'date' =>'required | date',
            'radio[0]' => ['require' , 'in:0,1']  
        ]);
        
        $radio=$req->radio[0];
        
        $input= $req->input();
        
        $Distributor = new Distributo;
        $Distributor->name=$input['name'];
        $Distributor->gstin=$input['gstin'];
        $Distributor->email=$input['email'];
        $Distributor->address=$input['address'];
        $Distributor->date=$input['date'];
        $Distributor->user_status=$radio;
        $Distributor->phone=$input['phone'];
        $s=$Distributor->save();
        if ($s) {
            return redirect('/customer/list')->with('message','Suceessfull Registration!');
        }

    }

    function fetch_all_customer(){

        $Distributor = Distributo::toBase()->get();
        return view('customerIndex',compact('Distributor'));
        
    }
    function edit_customer_form(Distributo $id)
    {   
       return view('customerView',compact("id"));
    }
  


    function delete_customer(Distributo $id)
    {
        
      $id->delete();
    
      return redirect()->back()->with('message','Deleted Successfully!');
    }
    public function edit_customer_form_submit(Request $request, Distributo $id)
    {
    
        $request->validate([  
            'email'=>['required','email','unique:distributors,email,'.$id->id],
            'gstin'=>['required'],
            'name'=>['required', 'max:25' ,'string'],
            'phone'=>'required | min:10',
            'address'=>'required | max:30',
            'date' =>'required | date',
            'radio[0]' => ['require' , 'in:0,1'],
        ]);

        $radio=$request->radio[0];
        
        
      $ok=$id->update([
        'name' => $request->name,
        'gstin'=>$request->gstin,
        'email' => $request->email,
        'phone'=>$request->phone,
        'address'=>$request->address,
        'date' =>$request->date,
        'user_status' => $radio,
    
    ]);

    //   $this->meesage('message','Customer updated successfully!');
        if ($ok) {
            return redirect('/customer/list')->with('message','Suceessfull Update!');
        } else {
            return redirect()->back()->with('message','Something Wrong! Try Again');
        }
        
    }

    // public function paidlist(){
        
    //     $paiddata=(Distributo::where('payment_status','=',1)->get());
    //     return view('paidlist', compact('paiddata'));
    // }
    // public function non_paidlist(){
    //     $Notpaiddata=(Distributo::where('payment_status','=',0)->get());
    //     return view('nonpaidlist', compact('Notpaiddata'));
    // } 


}
