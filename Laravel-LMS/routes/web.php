<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminStudentController;
use App\Http\Controllers\Admin\AdminTeacherController;


/* Login Routes */
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/* Admin Dashboard */
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /* =======================
           Admin Dashboard
        ======================= */
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');


        /* =======================
           Courses
        ======================= */
        Route::resource('courses', AdminCourseController::class);


        /* =======================
           Users Management
        ======================= */
        Route::prefix('users')->name('users.')->group(function () {

    // List students
    Route::get('/students', [AdminStudentController::class, 'index'])
        ->name('students.index');

    // Create student
    Route::get('/students/create', [AdminStudentController::class, 'create'])
        ->name('students.create');

    Route::post('/students', [AdminStudentController::class, 'store'])
        ->name('students.store');

    // Edit / update
    Route::get('/students/{user}/edit', [AdminStudentController::class, 'edit'])
        ->name('students.edit');

    Route::put('/students/{user}', [AdminStudentController::class, 'update'])
        ->name('students.update');

    // Toggle status
    Route::post('/students/{user}/toggle', [AdminStudentController::class, 'toggleStatus'])
        ->name('students.toggle');

    // Delete
    Route::delete('/students/{user}', [AdminStudentController::class, 'destroy'])
        ->name('students.destroy');



        /* -------- Teachers -------- */
Route::get('/teachers', [AdminTeacherController::class, 'index'])
    ->name('teachers.index');

Route::get('/teachers/create', [AdminTeacherController::class, 'create'])
    ->name('teachers.create');

Route::post('/teachers', [AdminTeacherController::class, 'store'])
    ->name('teachers.store');

Route::get('/teachers/{user}/edit', [AdminTeacherController::class, 'edit'])
    ->name('teachers.edit');

Route::put('/teachers/{user}', [AdminTeacherController::class, 'update'])
    ->name('teachers.update');

Route::post('/teachers/{user}/toggle', [AdminTeacherController::class, 'toggleStatus'])
    ->name('teachers.toggle');

Route::delete('/teachers/{user}', [AdminTeacherController::class, 'destroy'])
    ->name('teachers.destroy');

});

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
