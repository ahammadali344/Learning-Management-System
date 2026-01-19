@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-forms.css') }}">
@endpush

@section('content')

<div class="form-card">
    <h1>Create New Course</h1>

    <form method="POST" action="{{ route('admin.courses.store') }}">
        @csrf

        <div class="form-group">
            <label>Course Title</label>
            <input type="text" name="title" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description"></textarea>
        </div>

        <div class="form-group">
            <label>Assign Teacher</label>
            <select name="teacher_id" required>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="category_id">
                <option value="">— Optional —</option>
            </select>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
        </div>

        <div class="form-actions">
            <a href="{{ route('admin.courses.index') }}" class="btn-secondary">Cancel</a>
            <button class="btn-primary">Create Course</button>
        </div>
    </form>
</div>

@endsection
