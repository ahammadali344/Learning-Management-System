@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-courses.css') }}">
@endpush

@section('content')

<div class="admin-page-header">
    <h1>Manage Courses</h1>
    <a href="{{ route('admin.courses.create') }}" class="btn-primary">
        + New Course
    </a>
</div>

@if($courses->isEmpty())
    <div class="empty-state">
        No courses found. Create your first course.
    </div>
@else
<table class="admin-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Teacher</th>
            <th>Status</th>
            <th width="120">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>
            <td>{{ $course->title }}</td>
            <td>{{ $course->teacher->name ?? '—' }}</td>
            <td>
                <span class="badge badge-{{ $course->status }}">
                    {{ ucfirst($course->status) }}
                </span>
            </td>
            <td>
                <a href="{{ route('admin.courses.edit', $course) }}" class="action-link">
                    Edit
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@endsection
