@extends('layouts.student')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/student-courses.css') }}">
@endpush

@section('content')

<div class="page-header">
    <h1>Available Courses</h1>
    <p>Browse and enroll in new courses</p>
</div>

@if($courses->isEmpty())
    <div class="empty-state">
        <p>No available courses at the moment.</p>
    </div>
@else
    <div class="course-grid">
        @foreach($courses as $course)
            <div class="course-card">
                <div class="course-body">
                    <h3>{{ $course->title }}</h3>
                    <p>{{ $course->description }}</p>
                </div>

                <div class="course-footer">
                    <form method="POST" action="{{ route('student.enroll', $course->id) }}">
                        @csrf
                        <button type="submit" class="enroll-btn">
                            Enroll
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection
