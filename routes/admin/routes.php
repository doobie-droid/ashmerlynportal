<?php
use Illuminate\Support\Facades\Route;

Route::get('/admin/users/activities/log','App\Http\Controllers\ActivityController@index')->name('activity.log');

Route::get('/admin/user/show_honor_roll','App\Http\Controllers\AdminController@honor_roll_edit')->name('honor_roll.edit');

Route::post('/admin/user/show_honor_roll','App\Http\Controllers\AdminController@honor_roll_update')->name('honor_roll.update');

Route::get('/admin/users/activities/{activity_type}/log','App\Http\Controllers\ActivityController@show')->name('activity.detail');

Route::get('/admin/users','App\Http\Controllers\UserController@index')->name('user.index');

Route::get('/admin/users/student/{year}/arm_assign','App\Http\Controllers\AdminController@student_arm_edit')->name('student.arm.assign.edit');

Route::patch('/admin/users/student/{year}/arm_assign','App\Http\Controllers\AdminController@student_arm_update')->name('student.arm.assign.update');

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

Route::patch('admin/user/{user}/role/attach','App\Http\Controllers\AdminController@roleattach')->name('role.attach');

Route::delete('admin/user/{user}/role/detach','App\Http\Controllers\AdminController@roledetach')->name('role.detach');

Route::get('admin/app/settings','App\Http\Controllers\AdminController@app_setting_view')->name('app.settings');

Route::patch('admin/app/result/show','App\Http\Controllers\AdminController@showresult')->name('result.show');

Route::patch('admin/app/mode/toggle','App\Http\Controllers\AdminController@togglemode')->name('mode.toggle');

Route::patch('admin/app/term/change','App\Http\Controllers\AdminController@changeterm')->name('term.change');

Route::patch('admin/app/year/change','App\Http\Controllers\AdminController@changeyear')->name('year.change');
