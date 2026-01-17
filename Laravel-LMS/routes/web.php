<?php

use App\Http\Controllers\Admin\AdminDashboardController;

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
     ->name('admin.dashboard');
