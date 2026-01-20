@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-enrollments.css') }}">
@endpush

@section('content')

<div class="page-header">
    <div>
        <h1>Enrollments</h1>
        <p>Approve or reject student enrollments</p>
    </div>

    <!-- Search -->
    <form method="GET" class="search-box">
        <input type="text"
               name="search"
               placeholder="Search student or course..."
               value="{{ request('search') }}">
        <button type="submit">🔍</button>
    </form>
</div>

<div class="card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Student</th>
                <th>Course</th>
                <th>Status</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>

        <tbody>
        @forelse($enrollments as $enrollment)
            <tr>
                <td data-label="Student">
                    {{ $enrollment->student->name ?? '—' }}
                </td>

                <td data-label="Course">
                    {{ $enrollment->course->title ?? '—' }}
                </td>

                <td data-label="Status">
                    <span class="status {{ $enrollment->status }}">
                        {{ ucfirst($enrollment->status) }}
                    </span>
                </td>

                <td data-label="Actions" class="text-right">
                    @if($enrollment->status === 'pending')
                        <form method="POST"
                              action="{{ route('admin.enrollments.approve', $enrollment) }}"
                              class="inline">
                            @csrf
                            <button class="btn-action approve">Approve</button>
                        </form>

                        <form method="POST"
                              action="{{ route('admin.enrollments.reject', $enrollment) }}"
                              class="inline">
                            @csrf
                            <button class="btn-action reject">Reject</button>
                        </form>
                    @else
                        <span class="muted">No actions</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="empty">No enrollments found</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="pagination-wrap">
    {{ $enrollments->links() }}
</div>

@endsection
