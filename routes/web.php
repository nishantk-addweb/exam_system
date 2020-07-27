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

Route::get('/home', 'HomeController@index')->name('home');

Route::view('insquestion','insquestion');
Route::get('question','questioncontroller@show');
Route::view('boiler','boiler');

Route::post('result','resultcontroller@save');

Route::post('save','questioncontroller@save');

Route::get('display','resultcontroller@display');

Route::view('displayresult','displayresult');

Route::get('insquestion','questioncontroller@showcat');


