@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-courses.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('assets/js/admin-courses.js') }}"></script>
@endpush


@section('content')

<div class="page-header">
    <div>
        <h1>Manage Courses</h1>
        <p>Manage all published courses</p>
    </div>

    <a href="{{ route('admin.courses.create') }}" class="btn-primary">
    + New Course
</a>

</div>

<form method="GET" class="filters">
    <input type="text" name="search" placeholder="🔍 Search courses"
           value="{{ request('search') }}">

    <select name="status">
        <option value="">Status</option>
        <option value="published" @selected(request('status')=='published')>Published</option>
        <option value="draft" @selected(request('status')=='draft')>Draft</option>
    </select>

    <select name="teacher">
        <option value="">Teacher</option>
        @foreach($teachers as $teacher)
            <option value="{{ $teacher->id }}"
                @selected(request('teacher')==$teacher->id)>
                {{ $teacher->name }}
            </option>
        @endforeach
    </select>

    <button class="btn-secondary">Apply</button>
</form>

<div class="table-card">
<table class="course-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Teacher</th>
            <th>Status</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>
    <tbody>
@foreach($courses as $course)
<tr>
    <td data-label="Title">{{ $course->title }}</td>

    <td data-label="Teacher">
        {{ $course->teacher->name ?? '-' }}
    </td>

    <td data-label="Status">
        <span class="status {{ $course->status }}">
            {{ ucfirst($course->status) }}
        </span>
    </td>

    <td data-label="Actions">
        @include('admin.courses.partials.actions', ['course' => $course])
    </td>
</tr>
@endforeach
</tbody>

</table>
</div>

<div class="pagination-wrap">
    {{ $courses->links() }}
</div>





@endsection
