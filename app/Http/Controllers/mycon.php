<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB; model na baniya ae vabe kora jay
use App\products; // model baniya kora hoy6a. model er name hol products
class mycon extends Controller
{
    //
    function m(){
        return ["n"=>"myuio"];
     }

     public function login(Request $req){
      dd($req->input('g')); //it's work
      dd($req->input()); //it's work
      $req->validate([  
        'email'=>['required','email'],
        'pass'=>'required | min:3',
      ]);
      
      $req->session()->put("key",$req->input('email'));
      // echo $req->session()->get("key"); //it's work
      if ($req->session()->has("key")) {
        return view("ses");
      }

     }
     
     public function logout(Request $req){

        $req->session()->forget("key");
        return redirect("/");

     }

     function show(){
       echo 'show in mycon';
      //  return DB::select("select * from cot"); model na baniya ae vabe kora jay
      return products::all();  // model baniya kora hoy6a. model er name hol products
     }
}
