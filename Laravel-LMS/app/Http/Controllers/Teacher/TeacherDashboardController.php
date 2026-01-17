<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Submission;

class TeacherDashboardController extends Controller
{
    public function index()
    {
        $teacher = Auth::user();

        // Active courses taught by this teacher
        $activeCourses = Course::where('teacher_id', $teacher->id)
            ->where('status', 'published')
            ->count();

        // Total students across teacher courses
        $totalStudents = Enrollment::whereIn(
                'course_id',
                Course::where('teacher_id', $teacher->id)->pluck('id')
            )
            ->where('status', 'approved')
            ->count();

        // Pending submissions for review
        $pendingReviews = Submission::where('status', 'pending')
            ->whereIn(
                'assignment_id',
                Course::where('teacher_id', $teacher->id)
                    ->pluck('id')
            )
            ->count();

        // Recent activity (placeholder – safe)
        $recentActivities = collect();

        return view('teacher.dashboard', compact(
            'activeCourses',
            'totalStudents',
            'pendingReviews',
            'recentActivities'
        ));
    }
}
