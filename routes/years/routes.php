<?php
use Illuminate\Support\Facades\Route;

Route::get('/admin/classes','App\Http\Controllers\YearController@index')->name('class.index');

Route::get('/admin/classes/create','App\Http\Controllers\YearController@create')->name('class.create');

Route::post('/admin/classes/create','App\Http\Controllers\YearController@store')->name('class.store');
