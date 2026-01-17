@extends('layouts.teacher')

@section('content')

<!-- PAGE HEADER -->
<div style="margin-bottom: 24px;">
    <h1 style="margin-bottom: 4px;">Teacher Dashboard</h1>
    <p style="color:#6b7280;">Teaching overview and workload summary</p>
</div>

<!-- KPI ROW -->
<div class="kpi-grid">

    <div class="kpi-card">
        <i class="bi bi-journal-bookmark kpi-icon"></i>
        <div>
            <p>Active Courses</p>
            <h2>{{ $activeCourses }}</h2>
            <small>Published courses</small>
        </div>
    </div>

    <div class="kpi-card warning">
        <i class="bi bi-inbox kpi-icon"></i>
        <div>
            <p>Pending Reviews</p>
            <h2>{{ $pendingReviews }}</h2>
            <small>Submissions awaiting grading</small>
        </div>
    </div>

    <div class="kpi-card">
        <i class="bi bi-people kpi-icon"></i>
        <div>
            <p>Total Students</p>
            <h2>{{ $totalStudents }}</h2>
            <small>Across all courses</small>
        </div>
    </div>

</div>

<!-- MY COURSES QUICK ACCESS -->
<section class="panel">
    <h3>My Courses</h3>

    @if($activeCourses === 0)
        <p style="color:#6b7280;">
            You are not teaching any active courses yet.
        </p>
    @else
        <p style="color:#6b7280;">
            Manage your courses, content, and assignments from the
            <strong>My Courses</strong> section.
        </p>
    @endif
</section>

<!-- SUBMISSIONS REQUIRING REVIEW -->
<section class="panel">
    <h3>Submissions Requiring Review</h3>

    @if($pendingReviews === 0)
        <p style="color:#6b7280;">No pending submissions 🎉</p>
    @else
        <p style="color:#6b7280;">
            You have <strong>{{ $pendingReviews }}</strong> submissions waiting for review.
        </p>
    @endif
</section>

<!-- RECENT TEACHING ACTIVITY -->
<section class="panel">
    <h3>Recent Teaching Activity</h3>

    @if($recentActivities->isEmpty())
        <p style="color:#6b7280;">No recent activity</p>
    @else
        <ul class="activity-list">
            @foreach($recentActivities as $activity)
                <li>✔ {{ $activity->description }}</li>
            @endforeach
        </ul>
    @endif
</section>

@endsection
