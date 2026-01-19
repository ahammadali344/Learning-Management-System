@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-students.css') }}">
@endpush

@section('content')

<!-- Page Header -->
<div class="page-header">
    <div>
        <h1>Students</h1>
        <p>Manage registered students</p>
    </div>

    <div class="header-actions">
        <form method="GET" class="search-box">
            <input type="text"
                   name="search"
                   placeholder="Search students..."
                   value="{{ request('search') }}">
            <button type="submit">
                <i class="bi bi-search"></i>
            </button>
        </form>

        <a href="{{ route('admin.users.students.create') }}"
           class="btn-primary">
            <i class="bi bi-plus-lg"></i>
            Add Student
        </a>
    </div>
</div>

<!-- Card -->
<div class="card">
    <table class="people-table">
        <thead>
            <tr>
                <th>Student</th>
                <th>Email</th>
                <th>Status</th>
                <th class="text-right actions-col">Actions</th>
            </tr>
        </thead>

        <tbody>
        @forelse ($students as $student)
            <tr>

                <!-- Student -->
                <td data-label="Student">
                    <div class="user-info">
                        <div class="avatar">
                            {{ strtoupper(substr($student->name, 0, 2)) }}
                        </div>
                        <strong>{{ $student->name }}</strong>
                    </div>
                </td>

                <!-- Email -->
                <td data-label="Email">
                    <span class="email">{{ $student->email }}</span>
                </td>

                <!-- Status -->
                <td data-label="Status">
                    <span class="status {{ $student->status === 'active' ? 'active' : 'blocked' }}">
                        {{ ucfirst($student->status) }}
                    </span>
                </td>

                <!-- Actions -->
                <td data-label="Actions" class="text-right actions-col">
                    <div class="actions">

                        <!-- Edit -->
                        <a href="{{ route('admin.users.students.edit', $student) }}"
                           class="icon-btn edit"
                           title="Edit Student">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <!-- Toggle -->
                        <form method="POST"
                              action="{{ route('admin.users.students.toggle', $student) }}"
                              class="inline">
                            @csrf
                            <button type="submit"
                                    class="icon-btn toggle"
                                    title="{{ $student->status === 'active' ? 'Block Student' : 'Activate Student' }}">
                                <i class="bi {{ $student->status === 'active' ? 'bi-person-x' : 'bi-person-check' }}"></i>
                            </button>
                        </form>

                        <!-- Delete -->
                        <form method="POST"
                              action="{{ route('admin.users.students.destroy', $student) }}"
                              class="inline"
                              onsubmit="return confirm('Delete this student?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="icon-btn danger"
                                    title="Delete Student">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>

                    </div>
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="4" class="empty">
                    No students found
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="pagination-wrap">
    {{ $students->links() }}
</div>

@endsection
