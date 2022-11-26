<?php
use Illuminate\Support\Facades\Route;

Route::get('/admin/arm/create','App\Http\Controllers\ArmController@create')->name('arm.create');

Route::post('/admin/arm/create','App\Http\Controllers\ArmController@store')->name('arm.store');

Route::get('/admin/arm/edit','App\Http\Controllers\ArmController@edit')->name('arm.edit');

Route::patch('/admin/arm/update','App\Http\Controllers\ArmController@update')->name('arm.update');
