<?php


use Illuminate\Support\Facades\Route;

Route::get('/admin/user/create','App\Http\Controllers\UserController@create')->name('user.create');

Route::post('admin/user/create','App\Http\Controllers\UserController@store')->name('user.store');
