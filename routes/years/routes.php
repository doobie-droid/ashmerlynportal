<?php
use Illuminate\Support\Facades\Route;

Route::get('/admin/classes','App\Http\Controllers\YearController@index')->name('class.index');

Route::get('/admin/classes/create','App\Http\Controllers\YearController@create')->name('class.create');

Route::post('/admin/classes/create','App\Http\Controllers\YearController@store')->name('class.store');

Route::get('admin/classes/{year}/subject/attach','App\Http\Controllers\YearController@create')->name('subject.attach.edit');

Route::patch('admin/classes/{year}/subject/attach','App\Http\Controllers\YearController@subjectattach')->name('subject.attach');

Route::delete('admin/classes/{year}/subject/detach','App\Http\Controllers\YearController@subjectdetach')->name('subject.detach');
