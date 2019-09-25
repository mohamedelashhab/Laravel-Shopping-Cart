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


Route::get('/', 'ProductController@getProducts')->name('product.index');
Route::get('/login', 'UserController@getLogin')->name('user.login-form');
Route::post('/login', 'UserController@login')->name('user.login');
Route::get('/register', 'UserController@getRegister')->name('user.register-form');
Route::post('/register', 'UserController@register')->name('user.register');