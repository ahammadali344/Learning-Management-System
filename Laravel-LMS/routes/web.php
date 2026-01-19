<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Auth\LoginController;

/* Login Routes */
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/* Admin Dashboard */
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('courses', AdminCourseController::class);

});


/* Teacher Dashboard Route */
use App\Http\Controllers\Teacher\TeacherDashboardController;

Route::get('/teacher/dashboard', [TeacherDashboardController::class, 'index'])
    ->name('teacher.dashboard');

/* Student Dashboard Route */
Route::get('/student/dashboard',
    [\App\Http\Controllers\Student\StudentDashboardController::class, 'index']
)->name('student.dashboard');

/*Student Course Controller */
use App\Http\Controllers\Student\AvailableCourseController;
use App\Http\Controllers\Student\EnrollmentController;

Route::middleware(['auth'])->prefix('student')->name('student.')->group(function () {
    Route::get('/available-courses', [AvailableCourseController::class, 'index'])
        ->name('available-courses');

    Route::post('/enroll/{course}', [EnrollmentController::class, 'store'])
        ->name('enroll');
});
