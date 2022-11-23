<?php


use Illuminate\Support\Facades\Route;



Route::get('/admin/roles','App\Http\Controllers\RoleController@index')->name('role.index');

Route::get('/admin/role/create','App\Http\Controllers\RoleController@create')->name('role.create');

Route::post('admin/roles/create','App\Http\Controllers\RoleController@store')->name('role.store');

Route::get('admin/roles/{role_slug}/users','App\Http\Controllers\RoleController@showusers')->name('role.users.show');
