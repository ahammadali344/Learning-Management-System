@extends('layouts.admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/admin-student-form.css') }}">
@endpush

@section('content')

<div class="student-form-page">

    <!-- Header -->
    <div class="form-header">
        <div class="header-left">
            <h1>Add Teacher</h1>
            <p>Create and manage teacher access to the LMS</p>
        </div>

        <a href="{{ route('admin.users.teachers.index') }}" class="back-link">
            ← Back to Teachers
        </a>
    </div>

    <!-- Card -->
    <div class="form-card">

        <form method="POST" action="{{ route('admin.users.teachers.store') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label>Full Name</label>
                <input type="text"
                       name="name"
                       placeholder="Teacher full name"
                       value="{{ old('name') }}"
                       required>
                @error('name')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <label>Email Address</label>
                <input type="email"
                       name="email"
                       placeholder="teacher@email.com"
                       value="{{ old('email') }}"
                       required>
                @error('email')
                    <small class="error">{{ $message }}</small>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-row">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password"
                           name="password"
                           placeholder="Minimum 6 characters"
                           required>
                    @error('password')
                        <small class="error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password"
                           name="password_confirmation"
                           placeholder="Confirm password"
                           required>
                </div>
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <a href="{{ route('admin.users.teachers.index') }}" class="btn-secondary">
                    Cancel
                </a>

                <button type="submit" class="btn-primary">
                    Create Teacher
                </button>
            </div>

        </form>

    </div>
</div>

@endsection
