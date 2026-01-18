<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Enrollment;
use App\Models\Assignment;
use App\Models\Submission;
use Carbon\Carbon;

class StudentDashboardController extends Controller
{
    public function index()
    {
        $studentId = Auth::id();

        // Active enrollments
        $activeEnrollments = Enrollment::where('student_id', $studentId)
            ->where('status', 'approved')
            ->with('course')
            ->get();

        $activeCoursesCount = $activeEnrollments->count();

        // Pending assignments (not submitted yet)
        $pendingTasks = Assignment::whereIn(
                'course_id',
                $activeEnrollments->pluck('course_id')
            )
            ->whereNotIn('id', function ($q) use ($studentId) {
                $q->select('assignment_id')
                  ->from('submissions')
                  ->where('student_id', $studentId);
            })
            ->whereDate('deadline', '>=', Carbon::now())
            ->count();

        // Awaiting feedback
        $awaitingFeedback = Submission::where('student_id', $studentId)
            ->where('status', 'submitted')
            ->count();

        // Upcoming assignments
        $upcomingTasks = Assignment::whereIn(
                'course_id',
                $activeEnrollments->pluck('course_id')
            )
            ->whereDate('deadline', '>=', Carbon::now())
            ->orderBy('deadline')
            ->limit(5)
            ->get();

        return view('student.dashboard', compact(
            'activeEnrollments',
            'activeCoursesCount',
            'pendingTasks',
            'awaitingFeedback',
            'upcomingTasks'
        ));
    }
}
