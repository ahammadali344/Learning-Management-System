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
            <h2>12,482</h2>
            <small>+214 this month</small>
        </div>
    </div>

    <div class="kpi-card">
        <i class="bi bi-person-badge kpi-icon"></i>
        <div>
            <p>Total Teachers</p>
            <h2>684</h2>
            <small>Active faculty</small>
        </div>
    </div>

    <div class="kpi-card">
        <i class="bi bi-journal-bookmark kpi-icon"></i>
        <div>
            <p>Active Courses</p>
            <h2>392</h2>
            <small>Published courses</small>
        </div>
    </div>

    <div class="kpi-card warning">
        <i class="bi bi-hourglass-split kpi-icon"></i>
        <div>
            <p>Pending Enrollments</p>
            <h2>47</h2>
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
            <h2>128</h2>
            <small>Last 7 days</small>
        </div>
    </div>

    <div class="kpi-card danger">
        <i class="bi bi-person-x kpi-icon"></i>
        <div>
            <p>Inactive Students</p>
            <h2>312</h2>
            <small>No activity (30 days)</small>
        </div>
    </div>
</div>

<!-- RECENT ACTIVITY -->
<section class="panel">
    <h3>Recent System Activity</h3>
    <ul class="activity-list">
        <li>✔ New course published: <strong>Advanced Algorithms</strong></li>
        <li>✔ Teacher approved: <strong>Dr. Sadia Rahman</strong></li>
        <li>✔ Enrollment approved: <strong>Data Structures</strong></li>
        <li>✔ New admin created: <strong>Regional Admin – EU</strong></li>
    </ul>
</section>

<!-- ATTENTION REQUIRED -->
<section class="panel">
    <h3>Admin Attention Required</h3>
    <table class="simple-table">
        <thead>
            <tr>
                <th>Type</th>
                <th>Details</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Enrollment</td>
                <td>Karim Hossain → Operating Systems</td>
                <td><span class="badge badge-warning">Pending</span></td>
            </tr>
            <tr>
                <td>Course</td>
                <td>AI Fundamentals → Needs review</td>
                <td><span class="badge badge-warning">Pending</span></td>
            </tr>
        </tbody>
    </table>
</section>

@endsection
