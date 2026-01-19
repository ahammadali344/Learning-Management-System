<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;

class AdminCourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::with('teacher')->latest();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('teacher')) {
            $query->where('teacher_id', $request->teacher);
        }

        $courses = $query->paginate(5)->withQueryString();

        $teachers = User::whereHas('roles', function ($q) {
            $q->where('name', 'teacher');
        })->get();

        return view('admin.courses.index', compact('courses', 'teachers'));
    }

    public function create()
    {
        $teachers = User::whereHas('roles', function ($q) {
            $q->where('name', 'teacher');
        })->get();

        return view('admin.courses.create', compact('teachers'));
    }
}
