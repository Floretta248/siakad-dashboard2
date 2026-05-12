<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('student.index');
});

Route::get('student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
Route::resource('student', StudentController::class);
