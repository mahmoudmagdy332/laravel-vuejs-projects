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
Route::get('/category','CategoryController@index')->name('index');

Route::get('/addCategory/{id?}','CategoryController@addCategory')->name('addCategory');
Route::post('/store','CategoryController@store')->name('categories.store');

Route::get('/deleteCategory/{id}','CategoryController@delete')->name('delete');

Route::get('/edeteCategory/{id}','CategoryController@edit')->name('edit');
Route::post('/update','CategoryController@update')->name('categories.update');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
