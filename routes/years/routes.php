<?php
use Illuminate\Support\Facades\Route;

Route::get('/admin/classes','App\Http\Controllers\YearController@index')->name('class.index');

Route::get('/admin/classes/{year}/arms','App\Http\Controllers\YearController@armindex')->name('class.index.arm');

Route::get('/admin/classes/create','App\Http\Controllers\YearController@create')->name('class.create');

Route::post('/admin/classes/create','App\Http\Controllers\YearController@store')->name('class.store');

Route::get('admin/classes/{year}/subject/attach','App\Http\Controllers\YearController@create')->name('subject.attach.edit');

Route::patch('admin/classes/{year}/subject/attach','App\Http\Controllers\YearController@subjectattach')->name('subject.attach');

Route::delete('admin/classes/{year}/subject/detach','App\Http\Controllers\YearController@subjectdetach')->name('subject.detach');

Route::patch('admin/classes/{year}/arm/attach','App\Http\Controllers\YearController@armattach')->name('arm.attach');

Route::delete('admin/classes/{year}/arm/detach','App\Http\Controllers\YearController@armdetach')->name('arm.detach');
