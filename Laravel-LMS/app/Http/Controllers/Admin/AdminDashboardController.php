<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // KPI Metrics
        $totalStudents = User::whereHas('roles', function ($q) {
            $q->where('name', 'student');
        })->count();

        $totalTeachers = User::whereHas('roles', function ($q) {
            $q->where('name', 'teacher');
        })->count();

        $activeCourses = Course::where('status', 'published')->count();

        $pendingEnrollments = Enrollment::where('status', 'pending')->count();

        $newRegistrations = User::where(
            'created_at',
            '>=',
            Carbon::now()->subDays(7)
        )->count();

        $inactiveStudents = User::whereHas('roles', function ($q) {
                $q->where('name', 'student');
            })
            ->where('last_login_at', '<', Carbon::now()->subDays(30))
            ->count();

        // Dashboard sections (initialized safely)
        $recentActivities = collect();   // must be Collection
        $attentionItems   = collect();   // must be Collection

        return view('admin.dashboard', compact(
            'totalStudents',
            'totalTeachers',
            'activeCourses',
            'pendingEnrollments',
            'newRegistrations',
            'inactiveStudents',
            'recentActivities',
            'attentionItems'
        ));
    }
}
