<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
   public function store(Course $course)
{
    $studentId = auth()->id();

    Enrollment::firstOrCreate(
        [
            'student_id' => $studentId,
            'course_id'  => $course->id,
        ],
        [
            'status'      => Enrollment::STATUS_PENDING,
            'enrolled_at' => now(),
        ]
    );

    return back()->with('success', 'Successfully enrolled in course');
}


}
