<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('teacher')->latest()->get();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $teachers = User::whereHas('roles', function ($q) {
            $q->where('name', 'teacher');
        })->get();

        return view('admin.courses.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'teacher_id' => 'required|exists:users,id',
            'status'     => 'required|in:draft,published',
        ]);

        Course::create($request->only('title', 'teacher_id', 'status'));

        return redirect()
            ->route('admin.courses.index')
            ->with('success', 'Course created successfully');
    }

    public function edit(Course $course)
    {
        $teachers = User::whereHas('roles', function ($q) {
            $q->where('name', 'teacher');
        })->get();

        return view('admin.courses.edit', compact('course', 'teachers'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'teacher_id' => 'required|exists:users,id',
            'status'     => 'required|in:draft,published',
        ]);

        $course->update($request->only('title', 'teacher_id', 'status'));

        return redirect()
            ->route('admin.courses.index')
            ->with('success', 'Course updated successfully');
    }
}
