@extends('layouts.student')

@section('content')

<div class="page-header">
    <h1>Student Dashboard</h1>
    <p class="text-muted">My learning overview</p>
</div>

<!-- KPI ROW -->
<div class="kpi-grid">

    <div class="kpi-card">
        <h2>{{ $activeCoursesCount }}</h2>
        <p>Active Courses</p>
    </div>

    <div class="kpi-card warning">
        <h2>{{ $pendingTasks }}</h2>
        <p>Pending Tasks</p>
    </div>

    <div class="kpi-card success">
        <h2>{{ $awaitingFeedback }}</h2>
        <p>Awaiting Feedback</p>
    </div>

</div>

<!-- ACTIVE COURSES -->
<section class="panel">
    <h3>My Courses</h3>

    @if($activeEnrollments->isEmpty())
        <p class="text-muted">You are not enrolled in any courses yet.</p>
    @else
        <ul class="simple-list">
            @foreach($activeEnrollments as $enrollment)
                <li>
                    <strong>{{ $enrollment->course->title }}</strong>
                    <span class="badge">Enrolled</span>
                </li>
            @endforeach
        </ul>
    @endif
</section>

<!-- UPCOMING TASKS -->
<section class="panel">
    <h3>Upcoming Assignments</h3>

    @forelse($upcomingTasks as $task)
        <p>
            {{ $task->title }}
            <span class="text-muted">
                (Due {{ \Carbon\Carbon::parse($task->deadline)->diffForHumans() }})
            </span>
        </p>
    @empty
        <p class="text-muted">No upcoming assignments.</p>
    @endforelse
</section>

@endsection
