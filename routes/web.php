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

Route::get('/', 'Controller@home');
Route::get('/aboutus' , 'Controller@aboutUs');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
 
Route::get('/registeradmin' , 'AdminController@index');
Route::post('/regisadminprocess' , 'AdminController@store');
Route::get('/adminlogin' , 'AdminController@loginPage');
Route::get('/adminloginprocess' , 'AdminController@loginProcess');

Route::group(['prefix' => 'user' , 'middleware' => ['auth']], function(){
    Route::get('/pemesananambulance','UserController@ambulancePage');
    Route::get('/pengurusansurat' , 'userController@suratPage');
    Route::get('/pemesanantanah' , 'userController@tanahPage');
    Route::get('/solution' , 'userController@solutionPage');

    Route::post('/prosessurat' , 'userController@prosesSurat');
    Route::post('/prosesambulance' , 'userController@prosesAmbulance');
    Route::post('/prosestanah/{id}' , 'UserController@prosesTanah');

    //cart
    Route::get('/cart' , 'UserController@cart');
    ROute::get('/cartKosong' , 'UserController@cartKosong');
    Route::post('/hapuscart/{id}' , 'UserController@hapusCart');
    Route::get('/order' , 'UserController@order');
    Route::post('/hapusSurat/{id}','UserController@hapusSurat');
    Route::post('/hapusAmbulance/{id}','UserController@hapusAmbulance');
    Route::post('/hapusTanah/{id}','UserController@hapusTanah');


    //upload bukti bayar
    Route::get('/buktibayar/{id}' , 'UserController@buktiBayar');
    Route::post('/prosesbayar' , 'UserController@prosesBayar');
});


Route::group(['prefix' => 'admin' , 'middleware' => ['auth']], function(){
    Route::get('/home' , 'AdminController@home');
    Route::get('/home/verified' , 'AdminController@homeVerified');
    Route::get('/tanahmakam' , 'AdminController@tanahmakam');
    Route::get('/ubahhargapage' ,'AdminController@ubahhargapage');
    Route::get('/detail/{id}' , 'AdminController@detail');
    Route::get('/detailverif/{id}' , 'AdminController@detailverif');

    Route::post('/addtanah' , 'AdminController@itemtanah');
    Route::post('/ubahharga' , 'AdminController@ubahharga');
    Route::post('/verifikasi/{id}' , 'AdminController@verifikasi');
});