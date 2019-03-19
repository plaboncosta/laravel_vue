<?php

use App\Customer;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/customer', 'CustomerController@index')->name('customer.index');
Route::post('/customer/post', 'CustomerController@post')->name('customer.post');
Route::get('/customer-list', 'CustomerController@customerList')->name('customer.list');
Route::get('/customer-edit/{id}', 'CustomerController@customerEdit')->name('customer.edit');
Route::post('/customer-update/{id}', 'CustomerController@customerUpdate')->name( 'customer.update');
Route::post('/customer-delete/{id}', 'CustomerController@customerDelete')->name('customer.delete');

Route::get('/debug', 'DebugController@debug')->name('debug');

