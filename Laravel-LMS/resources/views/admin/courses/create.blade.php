@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-course-form.css') }}">
@endpush

@section('content')

<div class="course-form-header">
    <div>
        <h1>Create New Course</h1>
        <p>Fill in the details to publish a professional course</p>
    </div>
</div>

<div class="course-form-card">
<form method="POST" action="{{ route('admin.courses.store') }}">
@csrf

<div class="form-grid">

    <!-- Course Title -->
    <div class="form-group full">
        <label>Course Title</label>
        <input type="text" name="title" placeholder="e.g. Data Structures" required>
    </div>

    <!-- Short Description -->
    <div class="form-group full">
        <label>Short Description</label>
        <textarea name="description" rows="3"
            placeholder="Brief overview of the course"></textarea>
    </div>

    <!-- Teacher -->
    <div class="form-group">
        <label>Assign Teacher</label>
        <select name="teacher_id" required>
            <option value="">Select Teacher</option>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Category (future ready) -->
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
            <option value="draft">Draft</option>
            <option value="published">Published</option>
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
    <a href="{{ route('admin.courses.index') }}" class="btn-light">Cancel</a>
    <button type="submit" class="btn-primary">
        Create Course
    </button>
</div>

</form>
</div>

@endsection
