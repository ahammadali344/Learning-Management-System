<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCourseController extends Controller
{
    /**
     * List courses
     */
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

    /**
     * Show create form
     */
    public function create()
    {
        $teachers = User::whereHas('roles', fn ($q) =>
            $q->where('name', 'teacher')
        )->get();

        return view('admin.courses.create', compact('teachers'));
    }

    /**
     * Store new course
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'nullable|string',
        'teacher_id'  => 'required|exists:users,id',
        'status'      => 'required|in:draft,published',
    ]);

    // Generate unique slug
    $baseSlug = Str::slug($validated['title']);
    $slug = $baseSlug;
    $count = 1;

    while (Course::where('slug', $slug)->exists()) {
        $slug = $baseSlug . '-' . $count++;
    }

    $validated['slug'] = $slug;

    Course::create($validated);

    return redirect()
        ->route('admin.courses.index')
        ->with('success', 'Course created successfully');
}

    /**
     * Show edit form
     */
    public function edit(Course $course)
    {
        $teachers = User::whereHas('roles', fn ($q) =>
            $q->where('name', 'teacher')
        )->get();

        return view('admin.courses.edit', compact('course', 'teachers'));
    }

    /**
     * ✅ UPDATE COURSE (THIS WAS MISSING)
     */
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'teacher_id'  => 'required|exists:users,id',
            'status'      => 'required|in:draft,published',
        ]);

        $course->update($validated);

        return redirect()
            ->route('admin.courses.index')
            ->with('success', 'Course updated successfully');
    }

    /**
     * Delete course
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('admin.courses.index')
            ->with('success', 'Course deleted successfully');
    }
}
