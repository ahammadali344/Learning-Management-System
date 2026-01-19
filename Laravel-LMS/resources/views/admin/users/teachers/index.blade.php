@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-students.css') }}">
@endpush

@section('content')

<div class="page-header">
    <div>
        <h1>Teachers</h1>
        <p>Manage registered teachers</p>
    </div>

    <div class="header-actions">
        <form method="GET" class="search-box">
            <input type="text"
                   name="search"
                   placeholder="Search teachers..."
                   value="{{ request('search') }}">
            <button type="submit">
                <i class="bi bi-search"></i>
            </button>
        </form>

        <a href="{{ route('admin.users.teachers.create') }}" class="btn-primary">
            <i class="bi bi-plus-lg"></i> Add Teacher
        </a>
    </div>
</div>

<div class="card">
    <table class="people-table">
        <thead>
        <tr>
            <th>Teacher</th>
            <th>Email</th>
            <th>Status</th>
            <th class="text-right">Actions</th>
        </tr>
        </thead>

        <tbody>
        @forelse($teachers as $teacher)
            <tr>

                <!-- Teacher -->
                <td data-label="Teacher">
                    <div class="user-info">
                        <div class="avatar">
                            {{ strtoupper(substr($teacher->name, 0, 2)) }}
                        </div>
                        <strong>{{ $teacher->name }}</strong>
                    </div>
                </td>

                <!-- Email -->
                <td data-label="Email">
                    {{ $teacher->email }}
                </td>

                <!-- Status -->
                <td data-label="Status">
                    <span class="status {{ $teacher->status === 'active' ? 'active' : 'blocked' }}">
                        {{ ucfirst($teacher->status) }}
                    </span>
                </td>

                <!-- Actions -->
                <td data-label="Actions" class="text-right">
                    <div class="actions">

                        <a href="{{ route('admin.users.teachers.edit', $teacher) }}"
                           class="icon-btn edit" title="Edit">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form method="POST"
                              action="{{ route('admin.users.teachers.toggle', $teacher) }}"
                              class="inline">
                            @csrf
                            <button class="icon-btn toggle" title="Toggle Status">
                                <i class="bi bi-power"></i>
                            </button>
                        </form>

                        <form method="POST"
                              action="{{ route('admin.users.teachers.destroy', $teacher) }}"
                              class="inline"
                              onsubmit="return confirm('Delete this teacher?')">
                            @csrf
                            @method('DELETE')
                            <button class="icon-btn danger" title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>

                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="empty">No teachers found</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

<div class="pagination-wrap">
    {{ $teachers->links() }}
</div>

@endsection
