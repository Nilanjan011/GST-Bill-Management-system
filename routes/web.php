<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     if (Session::has('key')) {
//         return view('ses');
//     }
//     return view('my');
// });

// Route::get('myto','mycon@m');
// Route::view('myo','my');
// Route::get('myshow','mycon@show');
// Route::post('login','mycon@login');
// Route::get('/logout','mycon@logout');
// // Route::view('/normal','normal');

// gst admin
/// Goto dashboard -------------------------
// Route::view('/','dash');
Route::get('/', function(){
        if (Session::has('key')) {
            $paidcount=(DB::table('distributors')->where('payment_status','=',1)->count());
            $Notpaidcount=(DB::table('distributors')->where('payment_status','=',0)->count());
            $arr=["paid"=>$paidcount,"notpaid"=>$Notpaidcount];
            return view('home',compact('arr')); // if user login sucessfully goto home
        }else {
            return view('dash'); // if user not login  goto dashboard
        }
    
});


// ----------------------------------admin-------------------
Route::post('/index','adminloginController@index');
Route::get('/login', function () {
    return view('adminlogin');
}); 
//------------------------------------------------------------------------
//------------- main kaj  akane ho6a ----------------
Route::group(['middleware'=> ['admin']], function (){
    //------------- Distributors ----------------------------------------------
        Route::view('/calculation','calculation');
        Route::view('/distuibutor','distuibutor');
        Route::post('/Distributor','Distributor@index');
        Route::get('/paidlist','Distributor@paidlist');
        Route::get('/non-paidlist','Distributor@non_paidlist');

        Route::get('/customer/list', 'Distributor@fetch_all_customer');
        Route::get('/customer/edit/{id}', 'Distributor@edit_customer_form')->name('customer.edit');
        Route::put('/customer/edit/{id}', 'Distributor@edit_customer_form_submit')->name('customer.update');
        //------------- Distributors end----------------------------------------------
        //------------- Bill siart ----------------------------------------------    
        Route::resource('bill','BillController');
        Route::get('/PDFgen','BillController@PDFgen');
        // Route::get('/gen','BillController@gen');
        //------------- bill end----------------------------------------------
        Route::get('/logout','adminloginController@logout');
        
});

//------------- Distributors ----------------------------------------------
Route::delete('/customer/{id}', 'Distributor@delete_customer')->name('customer.delete');
// Route::get('/customer/{customer}', 'Distributor@view_single_customer')->name('customer.view');
//------------- Distributors end----------------------------------------------

Route::view('/userlogin','userlogin');
Route::view('/regis','registration');

Route::post('/resitration','RegisController@index');
Route::post('/user','RegisController@userin');
