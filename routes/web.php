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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('dashboard', 'EmployController@index')->name('dashboard');
    Route::get('add-employ', 'EmployController@create')->name('employ.create');
    Route::post('add-employ', 'EmployController@store')->name('employ.store');
    Route::get('all-employ', 'EmployController@allEmploy')->name('employ.all');
    Route::get('edit-employ/{id}', 'EmployController@editEmploy')->name('employ.edit');
    Route::post('update-employ', 'EmployController@updateEmploy')->name('employ.update');
    Route::get('delete-employ/{id}', 'EmployController@deleteEmploy')->name('employ.delete');
    Route::get('sendEmail/{id}', 'EmployController@sendEmail')->name('employ.sendEmail');
});

 
Route::get('lang/bn', 'LangController@change')->name('changeLang');
