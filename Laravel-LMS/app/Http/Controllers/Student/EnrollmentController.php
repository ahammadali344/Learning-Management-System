<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function store($courseId)
    {
        Enrollment::create([
            'student_id' => Auth::id(),
            'course_id'  => $courseId,
            'status'     => 'pending',
        ]);

        return redirect()
            ->route('student.available-courses')
            ->with('success', 'Enrollment request submitted.');
    }
}
