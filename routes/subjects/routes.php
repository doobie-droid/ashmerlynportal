<?php
use Illuminate\Support\Facades\Route;

Route::get('/admin/subject/create','App\Http\Controllers\SubjectController@create')->name('subject.create');

Route::post('/admin/subject/create','App\Http\Controllers\SubjectController@store')->name('subject.store');
