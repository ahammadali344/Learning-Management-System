<?php

use App\Http\Controllers\Admin\AdminDashboardController;

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
     ->name('admin.dashboard');

     use App\Http\Controllers\Auth\LoginController;


 /*Create Login Routes */

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/* Teacher Dashboard Route */
use App\Http\Controllers\Teacher\TeacherDashboardController;

Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'index'])
    ->name('teacher.dashboard');

