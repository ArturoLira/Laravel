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

Route::get('saludos/{nombre?}',function($nombre="mundo"){
	return "Hola ".$nombre;
});

Route::get('admin', function(){
	return "Si eres admin";

})->middleware('admin');

Route::middleware(['admin'])->group(function(){
	Route::get('admin2', function(){
		return view('layouts.admin');

	})->middleware('admin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
