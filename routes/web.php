<?php

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
Route::post('/customer/data-save', 'CustomerController@dataSave')->name('customer.data');
Route::get('/customer/{id}', 'CustomerController@edit')->name('customer.edit');
Route::post('customer/update/{id}', 'CustomerController@update')->name('customer.update');
Route::get('/customer/delete/{id}', 'CustomerController@delete')->name('customer.delete');
