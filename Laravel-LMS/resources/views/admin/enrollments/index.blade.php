@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-enrollments.css') }}">
@endpush

@section('content')

<div class="page-header">
    <div>
        <h1>Enrollments</h1>
        <p>Manage student course enrollments</p>
    </div>

    <form method="GET" class="search-box">
        <input type="text"
               name="search"
               placeholder="Search student..."
               value="{{ request('search') }}">
        <button type="submit">
            <i class="bi bi-search"></i>
        </button>
    </form>
</div>

<div class="card">
<table class="enroll-table">
<thead>
<tr>
    <th>Student</th>
    <th>Course</th>
    <th>Date</th>
    <th>Status</th>
    <th class="text-right">Actions</th>
</tr>
</thead>

<tbody>
@forelse($enrollments as $enrollment)
<tr>

<td data-label="Student">
    <strong>{{ $enrollment->user->name }}</strong>
    <span class="muted">{{ $enrollment->user->email }}</span>
</td>

<td data-label="Course">
    {{ $enrollment->course->title }}
</td>

<td data-label="Date">
    {{ $enrollment->created_at->format('d M Y') }}
</td>

<td data-label="Status">
    <span class="status {{ $enrollment->status }}">
        {{ ucfirst($enrollment->status) }}
    </span>
</td>

<td data-label="Actions">
<div class="actions">

@if($enrollment->status === 'pending')
<form method="POST" action="{{ route('admin.enrollments.approve', $enrollment) }}" class="inline">
@csrf
<button class="icon-btn approve" title="Approve">
<i class="bi bi-check-lg"></i>
</button>
</form>

<form method="POST" action="{{ route('admin.enrollments.reject', $enrollment) }}" class="inline">
@csrf
<button class="icon-btn reject" title="Reject">
<i class="bi bi-x-lg"></i>
</button>
</form>
@endif

<form method="POST"
      action="{{ route('admin.enrollments.destroy', $enrollment) }}"
      class="inline"
      onsubmit="return confirm('Remove enrollment?')">
@csrf
@method('DELETE')
<button class="icon-btn danger" title="Remove">
<i class="bi bi-trash"></i>
</button>
</form>

</div>
</td>

</tr>
@empty
<tr>
<td colspan="5" class="empty">No enrollments found</td>
</tr>
@endforelse
</tbody>
</table>
</div>

<div class="pagination-wrap">
    {{ $enrollments->links() }}
</div>

@endsection
