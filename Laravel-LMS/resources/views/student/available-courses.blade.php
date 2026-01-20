@extends('layouts.student')

<link rel="stylesheet" href="{{ asset('assets/css/student-available-courses.css') }}">

@section('content')

<div class="courses-page">

    <!-- Header -->
    <div class="courses-header">
        <div>
            <h1>Available Courses</h1>
            <p>Browse and enroll in new courses</p>
        </div>

        <form method="GET" class="search-bar">
            <input type="text"
                   name="search"
                   placeholder="Search courses..."
                   value="{{ request('search') }}">
            <button type="submit">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>

    <!-- Grid -->
    <div class="courses-grid">
        @forelse($courses as $course)

            <div class="course-card">

                <h3>{{ $course->title }}</h3>

                <p class="description">
                    {{ $course->description ?? 'No description available.' }}
                </p>

                <div class="teacher">
                    👨‍🏫 {{ $course->teacher->name ?? 'N/A' }}
                </div>

                @if(in_array($course->id, $enrolledCourseIds))
                    <button class="btn enrolled" disabled>
                        Enrolled
                    </button>
                @else
                    <form method="POST"
                          action="{{ route('student.enroll', $course) }}">
                        @csrf
                        <button class="btn enroll">
                            Enroll Now
                        </button>
                    </form>
                @endif

            </div>

        @empty
            <p class="empty">No courses found</p>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="pagination-wrap">
        {{ $courses->links() }}
    </div>

</div>

@endsection
