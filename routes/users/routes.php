<?php


use Illuminate\Support\Facades\Route;

Route::get('/admin/users','App\Http\Controllers\UserController@index')->name('user.index');

Route::get('/admin/users/active','App\Http\Controllers\UserController@activeindex')->name('user.active-index');

Route::get('/admin/users/inactive','App\Http\Controllers\UserController@deactivatedindex')->name('user.inactive-index');

Route::get('/admin/user/create','App\Http\Controllers\UserController@create')->name('user.create');

Route::post('/admin/user/create','App\Http\Controllers\UserController@store')->name('user.store');
