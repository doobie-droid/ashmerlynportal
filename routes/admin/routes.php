<?php
use Illuminate\Support\Facades\Route;

Route::get('/admin/users/activities/log','App\Http\Controllers\ActivityController@index')->name('activity.log');

Route::get('/admin/users/activities/{activity_type}/log','App\Http\Controllers\ActivityController@show')->name('activity.detail');

Route::get('/admin/users','App\Http\Controllers\UserController@index')->name('user.index');

Route::get('/admin/users/{status}/search','App\Http\Controllers\UserController@show')->name('user.show');

Route::get('/admin/users/active','App\Http\Controllers\UserController@activeindex')->name('user.active-index');

Route::get('/admin/users/inactive','App\Http\Controllers\UserController@deactivatedindex')->name('user.inactive-index');

Route::get('admin/users/{user}/edit','App\Http\Controllers\UserController@edit')->name('user.profile.edit');

Route::put('admin/users/{user}/update','App\Http\Controllers\UserController@update')->name('user.profile.update');

Route::get('admin/users/{user}/password/edit','App\Http\Controllers\AdminController@passwordedit')->name('admin.password.edit');

Route::patch('admin/users/{user}/password/update','App\Http\Controllers\AdminController@passwordupdate')->name('admin.password.update');

Route::patch('admin/users/{user}/status/update','App\Http\Controllers\UserController@statusupdate')->name('user.status.update');

Route::get('/admin/user/create','App\Http\Controllers\UserController@create')->name('user.create');

Route::post('/admin/user/create','App\Http\Controllers\UserController@store')->name('user.store');

Route::delete('/admin/user/destroy','App\Http\Controllers\UserController@destroy')->name('user.destroy');
