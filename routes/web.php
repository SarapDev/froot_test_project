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


Auth::routes();

Route::middleware('auth')->group(function () {
    //Invoices group
    Route::get('/', 'InovoiceController@index')->name('home');
    Route::get('/show/{id}', 'InovoiceController@show');
    Route::middleware('role:Moderator')->group(function () {
        Route::get('/create', 'InovoiceController@create');
        Route::post('/create', 'InovoiceController@store');
        Route::get('/update/{id}', 'InovoiceController@edit');
        Route::put('/update/{id}', 'InovoiceController@update');
    });
    Route::delete('/delete/{id}', 'InovoiceController@destroy')->middleware('role:Admin');
});
