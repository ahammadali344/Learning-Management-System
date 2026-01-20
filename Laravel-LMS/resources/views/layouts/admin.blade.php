<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LMS Admin Panel</title>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
   <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">
   

   @stack('styles')



   
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

    <!-- Dashboard -->
    <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
        <i class="bi bi-speedometer2"></i>
        Dashboard
    </a>

    <!-- Admins -->
    <div class="sidebar-group">
        <button class="sidebar-toggle">
            <span>
                <i class="bi bi-shield-lock"></i>
                Admins
            </span>
            <i class="bi bi-chevron-down"></i>
        </button>
        <div class="sidebar-submenu">
            <a href="#">Admin List</a>
            <a href="#">Create Admin</a>
        </div>
    </div>

    <!-- Users -->
    <div class="sidebar-group">
        <button class="sidebar-toggle">
            <span>
                <i class="bi bi-people"></i>
                Users
            </span>
            <i class="bi bi-chevron-down"></i>
        </button>
        <div class="sidebar-submenu">
         <a href="{{ route('admin.users.students.index') }}">
           Students
        </a>

          <a href="{{ route('admin.users.teachers.index') }}">
             Teachers
          </a>

        </div>
    </div>

    <!-- Student Insight -->
    <a href="#" class="sidebar-link">
        <i class="bi bi-bar-chart-line"></i>
        Student Insight
    </a>

    <!-- Courses -->
    <div class="sidebar-group">
        <button class="sidebar-toggle">
            <span>
                <i class="bi bi-journal-bookmark"></i>
                Courses
            </span>
            <i class="bi bi-chevron-down"></i>
        </button>

        <div class="sidebar-submenu">
            <!-- THIS IS THE CRITICAL FIX -->
            <a href="{{ route('admin.courses.index') }}">
                All Courses
            </a>

            <a href="{{ route('admin.courses.create') }}">
                Create Course
            </a>
        </div>
    </div>

    <!-- Enrollments -->
      <a href="{{ route('admin.enrollments.index') }}"
   class="sidebar-link {{ request()->routeIs('admin.enrollments.*') ? 'active' : '' }}">
    <i class="bi bi-person-check"></i>
    Enrollments
</a>

    <!-- Reports -->
    <a href="#" class="sidebar-link">
        <i class="bi bi-graph-up"></i>
        Reports
    </a>

    <!-- System -->
    <div class="sidebar-group">
        <button class="sidebar-toggle">
            <span>
                <i class="bi bi-gear"></i>
                System
            </span>
            <i class="bi bi-chevron-down"></i>
        </button>
        <div class="sidebar-submenu">
            <a href="#">Settings</a>
            <a href="#">Roles & Permissions</a>
        </div>
    </div>

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="sidebar-link logout">
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
@stack('scripts')


</body>
</html>
