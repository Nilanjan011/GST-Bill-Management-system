<?php

namespace App\Http\Controllers;
use App\admins;
use Illuminate\Http\Request;


class adminloginController extends Controller
{
    //
    function index(Request $req){

        
            $req->validate([  
                'email'=>['required','email'],
                'password'=>'required | min:3 | max:20',
              ]);
    
            $admin=admins::where('email',$req->email)->where('password',$req->password)->get()->toArray();
            if ($admin) {
                $req->session()->put("key",$req->email);
                // echo $req->session()->get("key"); //it's work
                if ($req->session()->has("key")) {
                  return view("home");
                }
            }else {
                return redirect('/login')->with('message','Account is Incorrect!');
    
            }
       
       
    }

    function logout(Request $req){
        $req->session()->forget("key");
        $req->session()->invalidate();

        $req->session()->regenerateToken();
        return redirect("/");
    }
}
