<?php

use Illuminate\Support\Facades\Route;


Route::get('/staff/scores/{user}/{year}/{subject}/edit', 'App\Http\Controllers\TeacherController@edit')->name('score.edit');


Route::patch('/staff/scores/edit', 'App\Http\Controllers\TeacherController@update')->name('score.update');

Route::get('/staff/form_teacher/{user}/edit', 'App\Http\Controllers\TeacherController@form_teacher_edit')->name('form_teacher.edit');

Route::patch('/staff/form_teacher/{user}/update', 'App\Http\Controllers\TeacherController@form_teacher_update')->name('form_teacher.update');
