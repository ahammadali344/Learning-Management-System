@extends('layouts.admin')
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-enrollments.css') }}">
@endpush

@section('title', 'Enrollments')


@section('content')
<div class="container-fluid">

    {{-- Page Header --}}
    <div class="mb-4">
        <h2 class="fw-bold">Enrollments</h2>
        <p class="text-muted mb-0">Manage student enrollments</p>
    </div>

    {{-- Filters --}}
    <form method="GET" class="card mb-4 enrollment-filters">
        <div class="card-body">
            <div class="row g-3 align-items-end">

                <div class="col-lg-4 col-md-6">
                    <label class="form-label">Course</label>
                    <select name="course_id" class="form-select">
                        <option value="">All Courses</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}"
                                {{ request('course_id') == $course->id ? 'selected' : '' }}>
                                {{ $course->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-3 col-md-6">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="">All</option>
                        <option value="pending" {{ request('status')=='pending'?'selected':'' }}>Pending</option>
                        <option value="approved" {{ request('status')=='approved'?'selected':'' }}>Approved</option>
                        <option value="rejected" {{ request('status')=='rejected'?'selected':'' }}>Rejected</option>
                    </select>
                </div>

                <div class="col-lg-2 col-md-12">
                    <button class="btn btn-primary w-100">Apply Filters</button>
                </div>

            </div>
        </div>
    </form>

    {{-- Table --}}
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Student</th>
                        <th>Email</th>
                        <th>Course</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($enrollments as $enrollment)
                    <tr>
                        <td data-label="Student">{{ $enrollment->student->name }}</td>
                        <td data-label="Email">{{ $enrollment->student->email }}</td>
                        <td data-label="Course">{{ $enrollment->course->title }}</td>
                        <td data-label="Status">
                            <span class="badge
                                {{ $enrollment->status === 'approved' ? 'bg-success' :
                                   ($enrollment->status === 'pending' ? 'bg-warning text-dark' : 'bg-danger') }}">
                                {{ ucfirst($enrollment->status) }}
                            </span>
                        </td>
                        <td data-label="Actions" class="text-end enrollment-actions">
                            @if($enrollment->status === 'pending')
                                <button class="btn btn-sm btn-success">Approve</button>
                                <button class="btn btn-sm btn-danger">Reject</button>
                            @elseif($enrollment->status === 'approved')
                                <button class="btn btn-sm btn-outline-danger">Remove</button>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <strong>No enrollments found</strong><br>
                            <small>Try adjusting filters or enroll students</small>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $enrollments->links() }}
            </div>
        </div>
    </div>

</div>
@endsection
