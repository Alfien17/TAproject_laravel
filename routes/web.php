<?php

use Illuminate\Routing\Route as RoutingRoute;
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

// Halaman Admin
Route::get('/admin','AdminController@admin');
Route::post('/admin/postLogin','AdminController@postLogin')->name('admin');
Route::get('/admin/register','AdminController@register');
Route::post('/admin/postRegister','AdminController@postRegister')->name('register');
Route::get('/admin/forgot-password','AdminController@forgot');
Route::post('/admin/forgot','AdminController@editpsw');

Route::group(['middleware' => ['auth','ceklevel:admin']],function(){
	Route::get('/mainadmin','AdminController@mainadmin')->name('main.mainadmin');
	Route::get('/mainadmin','AdminController@dashboard');
	Route::get('/mainadmin/barang','AdminController@barang');
	Route::get('/mainadmin/customers','AdminController@customers');
	Route::get('/mainadmin/akun','AdminController@akun');
	Route::get('/mainadmin/transaksi','AdminController@transaksi');

	Route::get('/mainadmin/barang/search','AdminController@searchbrg');
	Route::get('/mainadmin/customers/search','AdminController@searchcstmr');
	Route::get('/mainadmin/transaksi/search','AdminController@searchtrans');
	Route::get('/logout','AdminController@logout');

	Route::get('/mainadmin/barang/add','BarangController@addbrg');
	Route::post('/mainadmin/addbarang','BarangController@add');
	Route::get('/mainadmin/barang/edit/{no}','BarangController@ebrg');
	Route::post('/mainadmin/editbarang','BarangController@edit');
	Route::get('/mainadmin/barang/delete/{no}','BarangController@dbrg');

	Route::get('/mainadmin/customers/add','CustomersController@addcstmr');
	Route::post('/mainadmin/addcstmr','CustomersController@add2');
	Route::get('/mainadmin/customers/edit/{id}','CustomersController@ecstmr');
	Route::post('/mainadmin/editcstmr','CustomersController@edit2');
	Route::get('/mainadmin/customers/delete/{id}','CustomersController@dcstmr');

	Route::get('/mainadmin/transaksi/edit/{id}','AdminController@edittrans');
	Route::post('/mainadmin/postedit','AdminController@postedit');
	Route::get('/mainadmin/transaksi/detail/{kd_psnan}', 'AdminController@detailtrans');

	Route::get('/mainadmin/akun/edit/{id}','AdminController@eakun');
	Route::post('/mainadmin/editakun','AdminController@edit4');
	Route::get('/mainadmin/akun/editPassword/{id}','AdminController@epswd');
	Route::post('/mainadmin/editpassword','AdminController@edit5');
});

// Halaman Website Penjualan

Route::get('/','MainController@index')->name('home');
Route::get('/','MainController@main')->name('home');
Route::get('/search','MainController@searchprdk');

Route::get('/akun','MainController@akun');
Route::get('/akun/edit-akun/{id}','MainController@editakun');
Route::post('/posteditakun','MainController@postedit');
Route::get('/akun/editpass/{id}','MainController@editpass');
Route::post('/editpassword','MainController@postpass');

Route::get('/cart','CartController@cart');
Route::post('/addcart{no}','CartController@addcart');
Route::get('/cart/delete/{id}','CartController@delete');
Route::get('/cart/checkout','CartController@checkout');
Route::get('/cart/checkout/editcheckout{id}','CartController@editcheckout');
Route::post('/editcheckout','CartController@posteditcheck');
Route::post('/checkout','CartController@postcheckout');

Route::get('/history','CartController@history');
Route::get('/history/detail/{kd_psnan}','CartController@detailhistory');

Route::get('/login','MainController@loginlayout');
Route::get('/login','MainController@login');
Route::post('/ceklogin','MainController@cekLogin');

Route::get('/create-daftar1','MainController@daftar1');
Route::post('/daftar1','MainController@postdaftar1')->name('daftar1.post');
Route::get('/create-daftar2','MainController@daftar2');
Route::post('/daftar2','MainController@postdaftar2')->name('daftar2.post');
Route::get('/create-daftar3','MainController@daftar3');
Route::post('/daftar3','MainController@postdaftar3')->name('daftar3.post');

Route::get('/forgot-password','MainController@lupa');
Route::post('/forgot','MainController@editpsw');

Route::get('/logout2','MainController@logout');