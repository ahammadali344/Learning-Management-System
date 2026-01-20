<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvailableCourseController extends Controller
{
   public function index(Request $request)
{
    $courses = Course::with('teacher')
        ->where('status', 'published')
        ->when($request->search, function ($q) use ($request) {
            $q->where(function ($qq) use ($request) {
                $qq->where('title', 'like', '%' . $request->search . '%')
                   ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        })
        ->latest()
        ->paginate(6)
        ->withQueryString();

    $enrolledCourseIds = Enrollment::where('student_id', auth()->id())
        ->pluck('course_id')
        ->toArray();

    return view('student.available-courses', compact(
        'courses',
        'enrolledCourseIds'
    ));
}

}
