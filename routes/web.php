<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\AdminController;

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/aboutus',[ProductController::class,'aboutUs']);
Route::get('/contactus',[ProductController::class,'contactUs']);


Route::post('/login',[UserController::class,'login']);

Route::get('/',[ProductController::class,'index']);
Route::get('/detail/{id}',[ProductController::class,'detail']);
Route::get('/search',[ProductController::class,'search']);
Route::post('/add_to_cart',[ProductController::class,'addToCart']);

Route::get('/cartlist',[ProductController::class,'cartList']);

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::get('removecart/{id}',[ProductController::class,'removeCart']);
Route::get('ordernow',[ProductController::class,'orderNow']);

Route::view('/register','register');
Route::post('/register',[UserController::class,'register']);


//admin part start here
Route::get('/adminlogin', function () {
    return view('adminlogin');
});
Route::post('/adminlogin',[AdminController::class,'adminlogin']);


Route::view('/admindashboard','admindashboard');
Route::view('/adminuserscontrol','adminuserscontrol');

Route::view('/adminaddmember','adminaddmember');
Route::post('/addmember',[UserController::class,'addmember']);
//Route::view('/admindeleteuser','admindeleteuser');

Route::get('/admindeleteuser',[UserController::class,'deleteuser']);
Route::get('/delete/{id}',[UserController::class,'delete']);

//for products
Route::view('/adminproductscontrol','adminproductscontrol');

Route::view('/adminaddproduct','adminaddproduct');
Route::post('/addproduct',[ProductController::class,'addproduct']);



