<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class AvailableCourseController extends Controller
{
    public function index()
    {
        $studentId = Auth::id();

        $courses = Course::where('status', 'published')
            ->whereDoesntHave('enrollments', function ($q) use ($studentId) {
                $q->where('student_id', $studentId);
            })
            ->get();

        return view('student.available-courses', compact('courses'));
    }
}
