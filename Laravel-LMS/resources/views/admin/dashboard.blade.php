@extends('layouts.admin')

@section('content')

<!-- PAGE HEADER -->
<div style="margin-bottom: 24px;">
    <h1 style="margin-bottom: 4px;">Admin Dashboard</h1>
    <p style="color:#6b7280;">System overview and platform health</p>
</div>

<!-- KPI ROW 1 -->
<div class="kpi-grid">

    <div class="kpi-card">
        <i class="bi bi-mortarboard kpi-icon"></i>
        <div>
            <p>Total Students</p>
            <h2>{{ $totalStudents }}</h2>
            <small>{{ $newRegistrations }} new this week</small>
        </div>
    </div>

    <div class="kpi-card">
        <i class="bi bi-person-badge kpi-icon"></i>
        <div>
            <p>Total Teachers</p>
            <h2>{{ $totalTeachers }}</h2>
            <small>Active faculty</small>
        </div>
    </div>

    <div class="kpi-card">
        <i class="bi bi-journal-bookmark kpi-icon"></i>
        <div>
            <p>Active Courses</p>
            <h2>{{ $activeCourses }}</h2>
            <small>Published courses</small>
        </div>
    </div>

    <div class="kpi-card warning">
        <i class="bi bi-hourglass-split kpi-icon"></i>
        <div>
            <p>Pending Enrollments</p>
            <h2>{{ $pendingEnrollments }}</h2>
            <small>Needs attention</small>
        </div>
    </div>

</div>

<!-- KPI ROW 2 -->
<div class="kpi-grid">

    <div class="kpi-card">
        <i class="bi bi-person-plus kpi-icon"></i>
        <div>
            <p>New Registrations</p>
            <h2>{{ $newRegistrations }}</h2>
            <small>Last 7 days</small>
        </div>
    </div>

    <div class="kpi-card danger">
        <i class="bi bi-person-x kpi-icon"></i>
        <div>
            <p>Inactive Students</p>
            <h2>{{ $inactiveStudents }}</h2>
            <small>No activity (30 days)</small>
        </div>
    </div>

</div>

<!-- RECENT ACTIVITY -->
<section class="panel">
    <h3>Recent System Activity</h3>

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

<!-- ATTENTION REQUIRED -->
<section class="panel">
    <h3>Admin Attention Required</h3>

    @if($attentionItems->isEmpty())
        <p style="color:#6b7280;">Nothing requires attention 🎉</p>
    @else
        <table class="simple-table">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Details</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attentionItems as $item)
                    <tr>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->details }}</td>
                        <td>
                            <span class="badge badge-warning">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</section>

@endsection
