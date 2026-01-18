<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LMS Student Panel</title>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">
</head>
<body>

<!-- TOPBAR -->
<header class="topbar">
  <button id="menuToggle" class="menu-btn">
    <i class="bi bi-list"></i>
  </button>

  <div class="topbar-title">LMS Student Panel</div>

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
        <button type="submit" class="logout">
          Logout
        </button>
      </form>
    </div>
  </div>
</header>

<!-- SIDEBAR -->
<aside id="sidebar" class="sidebar">

  <!-- DASHBOARD -->
  <a href="{{ route('student.dashboard') }}" class="sidebar-link">
    <i class="bi bi-speedometer2"></i>
    Dashboard
  </a>

  <!-- MY LEARNING -->
  <div class="sidebar-group">
    <button class="sidebar-toggle">
      <span>
        <i class="bi bi-book"></i>
        My Learning
      </span>
      <i class="bi bi-chevron-down"></i>
    </button>

    <div class="sidebar-submenu">
      <a href="#">
        <i class="bi bi-journal-bookmark"></i>
        My Courses
      </a>

      <a href="#">
        <i class="bi bi-folder2-open"></i>
        Course Content
      </a>

      <a href="#">
        <i class="bi bi-pencil-square"></i>
        Assignments
      </a>

      <a href="#">
        <i class="bi bi-inbox"></i>
        My Submissions
      </a>
    </div>
  </div>

  <!-- AVAILABLE COURSES -->
  <a href="#" class="sidebar-link">
    <i class="bi bi-search"></i>
    Available Courses
  </a>

  <!-- LOGOUT (SIDEBAR) -->
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
</body>
</html>
