<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LMS Admin Panel</title>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
   <link rel="stylesheet" href="../assets/css/layout.css" />
</head>
<body>

<!-- TOPBAR -->
<header class="topbar">
  <button id="menuToggle" class="menu-btn">
    <i class="bi bi-list"></i>
  </button>

  <div class="topbar-title">LMS Admin Panel</div>

  <div class="topbar-right">
    <button class="profile-btn" id="profileBtn">
      <i class="bi bi-person-circle"></i>
      <i class="bi bi-caret-down-fill"></i>
    </button>

    <div class="profile-dropdown" id="profileDropdown">
      <a href="#">Profile</a>
      <a href="#">Settings</a>
      <hr>
      <a href="#" class="logout">Logout</a>
    </div>
  </div>
</header>

<!-- SIDEBAR -->
<aside id="sidebar" class="sidebar">
  <h3 class="sidebar-title"></h3>

      <!-- DASHBOARD -->
    <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
    <i class="bi bi-speedometer2"></i>
    <span>Dashboard</span>
    </a>

    <!-- ADMINS -->
    <div class="sidebar-group">
    <button class="sidebar-toggle" type="button">
      <span>
        <i class="bi bi-shield-lock"></i>
        Admins
      </span>
      <i class="bi bi-chevron-down"></i>
    </button>

    <div class="sidebar-submenu">
      <a href="admin-list.html">
        Admin List
      </a>
      <a href="create-admin.html">
        Create Admin
      </a>
    </div>
    </div>

    <!-- USERS -->
    <div class="sidebar-group">
    <button class="sidebar-toggle" type="button">
      <span>
        <i class="bi bi-people"></i>
        Users
      </span>
      <i class="bi bi-chevron-down"></i>
    </button>

    <div class="sidebar-submenu">
      <a href="students.html">
        Students
      </a>
      <a href="teachers.html">
        Teachers
      </a>
    </div>
    </div>

    <!-- STUDENT INSIGHT -->
    <a href="student-insight.html" class="sidebar-link">
    <i class="bi bi-graph-up-arrow"></i>
    <span>Student Insight</span>
    </a>

    <!-- COURSES -->
    <div class="sidebar-group">
    <button class="sidebar-toggle" type="button">
      <span>
        <i class="bi bi-journal-bookmark"></i>
        Courses
      </span>
      <i class="bi bi-chevron-down"></i>
    </button>

    <div class="sidebar-submenu">
      <a href="all-courses.html">
        All Courses
      </a>
      <a href="categories.html">
        Categories
      </a>
    </div>
    </div>

    <!-- ENROLLMENTS -->
    <a href="enrollments.html" class="sidebar-link">
    <i class="bi bi-person-check"></i>
    <span>Enrollments</span>
    </a>

    <!-- REPORTS -->
    <a href="reports.html" class="sidebar-link">
    <i class="bi bi-bar-chart"></i>
    <span>Reports</span>
    </a>

    <!-- SYSTEM -->
    <div class="sidebar-group">
    <button class="sidebar-toggle" type="button">
      <span>
        <i class="bi bi-gear"></i>
        System
      </span>
      <i class="bi bi-chevron-down"></i>
    </button>

    <div class="sidebar-submenu">
      <a href="settings.html">
        Settings
      </a>
      <a href="roles-permissions.html">
        Roles &amp; Permissions
      </a>
    </div>
    </div>

<!-- LOGOUT -->
<a href="../login.html" class="sidebar-link logout">
  <i class="bi bi-box-arrow-right"></i>
  <span>Logout</span>
</a>

  </div>
</aside>

<!-- OVERLAY -->
<div id="overlay"></div>

<!-- MAIN CONTENT -->
<main class="content">
  <h1>Teacher Dashboard</h1>
  @yield('content')
</main>

<!-- JS -->
<script src="{{ asset('assets/js/layout.js') }}"></script>
</body>
</html>
