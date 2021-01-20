<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use App\Distributo;
use Auth;
use App\RegisModel;
class RegisController extends Controller
{
    function index(Request $req){
        $req->validate([  
            'email'=>['required','email', 'unique:regis_models'],
            'Name'=>['required', 'max:25'],
            'password'=>'required | min:3 | max:20',
        ]);

        $input= $req->input();
        $input['password'] = bcrypt($input['password']);
        $RegisModel = new RegisModel;
        $RegisModel->name=$input['Name'];
        $RegisModel->email=$input['email'];
        $RegisModel->password=$input['password'];
        $s=$RegisModel->save();
        if ($s) {
            return redirect('/userlogin')->with('message','suceessfull Registration! Now please Login');
        }

    }
    function userin(Request $req){
        // dd($req->input());
        $req->validate([  
            'email'=>['required','email'],
            'password'=>'required | min:3 | max:20',
          ]);
        $RegisModel=RegisModel::where('email',$req->email)->value('password');
        if( Hash::check($req->password,$RegisModel)){
            
            $nam=RegisModel::where('email',$req->email)->value('name');

            // $paidcount=Distributo::where('payment_status','=',1)->count();
            // $Notpaidcount=Distributo::where('payment_status','=',0)->count();

            // $paiddata=(DB::table('distributors')->where('payment_status','=',1)->get());
            // $Notpaiddata=(DB::table('distributors')->where('payment_status','=',0)->get());

            $req->session()->put("key",$nam);
            // $arr=["paid"=>$paidcount,"notpaid"=>$Notpaidcount];
            // dd($req->session()->get("key")); //it's work
            if ($req->session()->has("key")) {
              return view("home");
            }
        }else {
            return redirect('/userlogin')->with('message','Account is Incorrect!');
        }

    }

}
