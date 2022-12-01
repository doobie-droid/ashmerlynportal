<?php

use Illuminate\Support\Facades\Route;


Route::get('/staff/scores/{user}/edit', 'App\Http\Controllers\TeacherController@edit')->name('score.edit');


Route::patch('/staff/scores/edit', 'App\Http\Controllers\TeacherController@update')->name('score.update');

