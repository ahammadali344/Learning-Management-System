@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div>
        <h1>Edit Student</h1>
        <p>Update student information</p>
    </div>
</div>

<div class="form-card">
<form method="POST" action="{{ route('admin.students.update', $user) }}">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="{{ $user->name }}" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="{{ $user->email }}" required>
    </div>

    <div class="form-footer">
        <a href="{{ route('admin.students.index') }}" class="btn-light">Cancel</a>
        <button class="btn-primary">Update Student</button>
    </div>
</form>
</div>

@endsection
