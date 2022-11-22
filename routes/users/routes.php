<?php


use Illuminate\Support\Facades\Route;

Route::get('/admin/users','App\Http\Controllers\UserController@index')->name('user.index');

Route::get('/admin/users/search','App\Http\Controllers\UserController@show')->name('user.show');

Route::get('/admin/users/active','App\Http\Controllers\UserController@activeindex')->name('user.active-index');

Route::get('/admin/users/inactive','App\Http\Controllers\UserController@deactivatedindex')->name('user.inactive-index');

Route::get('admin/users/{user}/edit','App\Http\Controllers\UserController@edit')->name('user.profile.edit');

Route::put('admin/users/{user}/update','App\Http\Controllers\UserController@update')->name('user.profile.update');

Route::get('/users/{user}/password/edit','App\Http\Controllers\UserController@passwordedit')->name('user.password.edit');

Route::patch('/users/{user}/password/update','App\Http\Controllers\UserController@passwordupdate')->name('user.password.update');



Route::get('/admin/user/create','App\Http\Controllers\UserController@create')->name('user.create');

Route::post('/admin/user/create','App\Http\Controllers\UserController@store')->name('user.store');
