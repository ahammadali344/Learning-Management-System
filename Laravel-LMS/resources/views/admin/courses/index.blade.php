@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-courses.css') }}">
@endpush

@section('content')

<div class="page-header">
    <div>
        <h1>Manage Courses</h1>
        <p class="subtitle">Manage all published courses</p>
    </div>

    <a href="{{ route('admin.courses.create') }}" class="btn-primary">
        + New Course
    </a>
</div>

<form method="GET" class="filter-bar">
    <input type="text" name="search" placeholder="🔍 Search courses"
           value="{{ request('search') }}">

    <select name="status">
        <option value="">Status</option>
        <option value="published" @selected(request('status')==='published')>Published</option>
        <option value="draft" @selected(request('status')==='draft')>Draft</option>
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
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Teacher</th>
            <th>Status</th>
            <th class="text-right">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($courses as $course)
        <tr>
            <td>{{ $course->title }}</td>
            <td>{{ $course->teacher->name ?? '-' }}</td>
            <td>
                <span class="status {{ $course->status }}">
                    {{ ucfirst($course->status) }}
                </span>
            </td>

            <td class="text-right">
                <div class="action-menu">
                    <button class="menu-btn">⋮</button>

                    <div class="menu-dropdown">
                        <a href="{{ route('admin.courses.edit', $course) }}">✏ Edit</a>

                        @if($course->status === 'draft')
                        <form method="POST" action="#">
                            @csrf
                            <button type="submit">🟢 Publish</button>
                        </form>
                        @else
                        <form method="POST" action="#">
                            @csrf
                            <button type="submit">🟡 Unpublish</button>
                        </form>
                        @endif

                        <form method="POST" action="#">
                            @csrf @method('DELETE')
                            <button class="danger">🗑 Delete</button>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="empty">No courses found</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>

<div class="pagination-wrapper">
    {{ $courses->links() }}
</div>

@endsection
