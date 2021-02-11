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

//Products Routes
Route::get('/', "App\Http\Controllers\ProductController@index")->middleware('auth');
Route::get('/edit/{id}', "App\Http\Controllers\ProductController@edit")->middleware('auth');
Route::get('/create', "App\Http\Controllers\ProductController@create")->middleware('auth');
Route::post('/store', "App\Http\Controllers\ProductController@store")->middleware('auth');
Route::post('/update/{id}', "App\Http\Controllers\ProductController@update")->middleware('auth');
Route::delete('/destroy/{id}', "App\Http\Controllers\ProductController@destroy")->middleware('auth');
Route::get('/search', 'App\Http\Controllers\ProductController@search')->middleware('auth');

//Category Routes
Route::get('/category', "App\Http\Controllers\CategoryControlle@index")->middleware('auth');
Route::get('/category/edit/{id}', "App\Http\Controllers\CategoryControlle@edit")->middleware('auth');
Route::get('/category/create', "App\Http\Controllers\CategoryControlle@create")->middleware('auth');
Route::post('/category/store', "App\Http\Controllers\CategoryControlle@store")->middleware('auth');
Route::post('/category/update/{id}', "App\Http\Controllers\CategoryControlle@update")->middleware('auth');
Route::delete('/category/destroy/{id}', "App\Http\Controllers\CategoryControlle@destroy")->middleware('auth');



//Auth Routes
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
