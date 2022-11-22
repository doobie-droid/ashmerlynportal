<?php


use Illuminate\Support\Facades\Route;


Route::get('/users/{user}/password/edit','App\Http\Controllers\UserController@passwordedit')->name('user.password.edit');

Route::patch('/users/{user}/password/update','App\Http\Controllers\UserController@passwordupdate')->name('user.password.update');

