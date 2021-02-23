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

Auth::routes();

Route::get('/home', 'EmployeeController@show');;
Route::get('/create', 'EmployeeController@create');
Route::get('/edit/{id}', 'EmployeeController@edit');
Route::post('/emp_submit', 'EmployeeController@store');
Route::get('/emp_delete/{id}', 'EmployeeController@destroy');
Route::post('/emp_update/{id}', 'EmployeeController@update')->name('employee.update');
