@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-course-form.css') }}">
@endpush

@section('content')

<div class="course-form-header">
    <div>
        <h1>Edit Course</h1>
        <p>Update course information and manage publication</p>
    </div>
</div>

<div class="course-form-card">
<form method="POST" action="{{ route('admin.courses.update', $course) }}">
@csrf
@method('PUT')

<div class="form-grid">

    <!-- Course Title -->
    <div class="form-group full">
        <label>Course Title</label>
        <input type="text"
               name="title"
               value="{{ old('title', $course->title) }}"
               required>
    </div>

    <!-- Description -->
    <div class="form-group full">
        <label>Short Description</label>
        <textarea name="description"
                  rows="3">{{ old('description', $course->description) }}</textarea>
    </div>

    <!-- Teacher -->
    <div class="form-group">
        <label>Assign Teacher</label>
        <select name="teacher_id" required>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}"
                    @selected($course->teacher_id == $teacher->id)>
                    {{ $teacher->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Category -->
    <div class="form-group">
        <label>Category</label>
        <select name="category_id">
            <option value="">General</option>
        </select>
    </div>

    <!-- Status -->
    <div class="form-group">
        <label>Status</label>
        <select name="status">
            <option value="draft" @selected($course->status === 'draft')>Draft</option>
            <option value="published" @selected($course->status === 'published')>Published</option>
        </select>
    </div>

    <!-- Visibility -->
    <div class="form-group">
        <label>Visibility</label>
        <select>
            <option>Public</option>
            <option>Private</option>
        </select>
    </div>

</div>

<div class="form-footer">
    <a href="{{ route('admin.courses.index') }}" class="btn-light">
        Cancel
    </a>

    <button type="submit" class="btn-primary">
        Update Course
    </button>
</div>

</form>
</div>



<div class="danger-zone">
    <h3>Danger Zone</h3>
    <p>Deleting a course is permanent and cannot be undone.</p>

    <form method="POST"
          action="{{ route('admin.courses.destroy', $course) }}"
          onsubmit="return confirm('Are you sure you want to delete this course?')">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn-danger">
            Delete Course
        </button>
    </form>
</div>


@endsection
