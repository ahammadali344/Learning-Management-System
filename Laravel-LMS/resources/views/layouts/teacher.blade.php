<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LMS Teacher Panel</title>

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
      <a href="#" class="logout">Logout</a>
    </div>
  </div>
</header>

<!-- SIDEBAR -->
<aside id="sidebar" class="sidebar">
  <h3 class="sidebar-title"></h3>

    <!-- DASHBOARD -->
    <a href="dashboard.html" class="sidebar-link">
      <i class="bi bi-speedometer2"></i>
      Dashboard
    </a>

    <!-- MY COURSES GROUP -->
    <div class="sidebar-group">
      <button class="sidebar-toggle">
        <span>
          <i class="bi bi-journal-bookmark"></i>
          My Courses
        </span>
        <i class="bi bi-chevron-down"></i>
      </button>

      <div class="sidebar-submenu">
        <a href="courses.html">My Courses</a>
        <a href="course-content.html">Course Content</a>
        <a href="assignments.html">Assignments</a>
      </div>
    </div>

    <!-- STUDENT SUBMISSIONS GROUP -->
    <div class="sidebar-group">
      <button class="sidebar-toggle">
        <span>
          <i class="bi bi-inbox"></i>
          Student Submissions
        </span>
        <i class="bi bi-chevron-down"></i>
      </button>

      <div class="sidebar-submenu">
        <a href="submissions-pending.html">Pending Review</a>
        <a href="submissions-reviewed.html">Reviewed</a>
      </div>
    </div>

    <!-- ENROLLMENTS -->
    <a href="enrollments.html" class="sidebar-link">
      <i class="bi bi-people"></i>
      Enrollments
    </a>

    <!-- STUDENT INSIGHT -->
    <a href="student-insight.html" class="sidebar-link">
      <i class="bi bi-bar-chart-line"></i>
      Student Insight
    </a>

    <!-- LOGOUT -->
    <a href="../login.html" class="sidebar-link logout">
      <i class="bi bi-box-arrow-right"></i>
      Logout
    </a>

  </div>
</aside>

<!-- OVERLAY -->
<div id="overlay"></div>

<!-- MAIN CONTENT -->
<main class="content">
  <h1>Teacher Dashboard</h1>
  <p>Select an option from the menu.</p>
</main>

<!-- JS -->
<script src="../assets/js/layout.js"></script>
</body>
</html>
