<?php

use Illuminate\Support\Facades\Route;

Route::get('/student/exam/show', [App\Http\Controllers\StudentController::class, 'exam_show'])->name('exam.view');
Route::get('/student/midterm/show', [App\Http\Controllers\StudentController::class, 'midterm_show'])->name('midterm.view');
