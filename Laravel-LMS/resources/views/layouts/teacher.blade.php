<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LMS Teacher Panel</title>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}" />
</head>
<body>

<!-- TOPBAR -->
<header class="topbar">
  <button id="menuToggle" class="menu-btn">
    <i class="bi bi-list"></i>
  </button>

  <div class="topbar-title">LMS Teacher Panel</div>

  <div class="topbar-right">
    <button class="profile-btn" id="profileBtn">
      <i class="bi bi-person-circle"></i>
      <i class="bi bi-caret-down-fill"></i>
    </button>

    <div class="profile-dropdown" id="profileDropdown">
      <a href="#">Profile</a>
      <a href="#">Settings</a>
      <hr>

      <!-- LOGOUT (TOPBAR) -->
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn">
          Logout
        </button>
      </form>
    </div>
  </div>
</header>

<!-- SIDEBAR -->
<aside id="sidebar" class="sidebar">

  <!-- DASHBOARD -->
  <a href="{{ route('teacher.dashboard') }}" class="sidebar-link">
    <i class="bi bi-speedometer2"></i>
    Dashboard
  </a>

  <!-- MY COURSES -->
  <div class="sidebar-group">
    <button class="sidebar-toggle">
      <span>
        <i class="bi bi-journal-bookmark"></i>
        My Courses
      </span>
      <i class="bi bi-chevron-down"></i>
    </button>

    <div class="sidebar-submenu">
      <a href="#">All Courses</a>
    </div>
  </div>

  <!-- MANAGE COURSE -->
  <div class="sidebar-group">
    <button class="sidebar-toggle">
      <span>
        <i class="bi bi-folder2-open"></i>
        Manage Course
      </span>
      <i class="bi bi-chevron-down"></i>
    </button>

    <div class="sidebar-submenu">
      <a href="#">Course Content</a>
      <a href="#">Assignments</a>
      <a href="#">Students</a>
      <a href="#">Analytics</a>
    </div>
  </div>

  <!-- SUBMISSIONS -->
  <div class="sidebar-group">
    <button class="sidebar-toggle">
      <span>
        <i class="bi bi-inbox"></i>
        Submissions
      </span>
      <i class="bi bi-chevron-down"></i>
    </button>

    <div class="sidebar-submenu">
      <a href="#">Pending Review</a>
      <a href="#">Reviewed</a>
    </div>
  </div>

  <!-- ENROLLMENTS -->
  <a href="#" class="sidebar-link">
    <i class="bi bi-people"></i>
    Enrollments
  </a>

  <!-- STUDENT INSIGHT -->
  <a href="#" class="sidebar-link">
    <i class="bi bi-bar-chart-line"></i>
    Student Insight
  </a>

  <!-- LOGOUT (SIDEBAR) -->
  <form method="POST" action="{{ route('logout') }}" class="sidebar-logout-form">
    @csrf
    <button type="submit" class="sidebar-link logout-btn">
      <i class="bi bi-box-arrow-right"></i>
      Logout
    </button>
  </form>

</aside>

<!-- OVERLAY -->
<div id="overlay"></div>

<!-- MAIN CONTENT -->
<main class="content">
    @yield('content')
</main>

<!-- JS -->
<script src="{{ asset('assets/js/layout.js') }}"></script>
</body>
</html>
