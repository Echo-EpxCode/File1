<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to right, #4ade80, #16a34a); /* Green gradient */
      min-height: 100vh;
    }
    .card-dashboard {
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 1rem;
    }
    .navbar-custom {
      background-color: #065f46; /* Dark green navbar */
    }
  </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">My Dashboard</a>
  </div>
</nav>

<!-- Main Content -->
<div class="d-flex justify-content-center align-items-center" style="min-height: calc(100vh - 70px);">
  <div class="card card-dashboard shadow-lg p-4" style="max-width: 600px; width: 100%;">
    <div class="card-body text-center">
      <h1 class="card-title mb-3 display-5 fw-bold">Welcome, <?= htmlspecialchars($_SESSION['username']); ?>!</h1>
      <p class="card-text lead mb-4">
        You are now logged in. Use the menu to navigate your dashboard.
      </p>
      <a href="logout.php" class="btn btn-danger btn-lg">Logout</a>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
