<?php
use Illuminate\Support\Facades\Route;

Route::get('/admin/subject/create','App\Http\Controllers\SubjectController@create')->name('subject.create');

Route::post('/admin/subject/create','App\Http\Controllers\SubjectController@store')->name('subject.store');

Route::get('/admin/subject/user/assign','App\Http\Controllers\SubjectController@assignsubjectedit')->name('assign.subject.user.edit');

Route::patch('/admin/subject/{user}/assign','App\Http\Controllers\SubjectController@assignsubjectstore')->name('assign.subject.user.store');
