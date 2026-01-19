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

        $teachers = User::whereHas('roles', fn ($q) =>
            $q->where('name', 'teacher')
        )->get();

        return view('admin.courses.index', compact('courses', 'teachers'));
    }

    public function create()
    {
        $teachers = User::whereHas('roles', fn ($q) =>
            $q->where('name', 'teacher')
        )->get();

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
}
