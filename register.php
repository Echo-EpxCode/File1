<?php
include "config.php";

$error = "";
$success = "";

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if user exists
    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Email already exists!";
    } else {
        mysqli_query($conn, "INSERT INTO users(username,email,password) VALUES('$username','$email','$password')");
        $success = "Registration successful!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to right, #fbcfe8, #f472b6);
      min-height: 100vh;
    }
    .card-register {
      background-color: rgba(255, 255, 255, 0.9); /* semi-transparent card */
      border-radius: 1rem;
    }
  </style>
</head>

<body class="d-flex justify-content-center align-items-center">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5 col-lg-4">
      <div class="card card-register shadow-lg p-4">
        <div class="card-body">

          <h2 class="text-center mb-4 display-6 fw-bold">Create Account</h2>

          <?php if (!empty($error)): ?>
              <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
          <?php endif; ?>

          <?php if (!empty($success)): ?>
              <div class="alert alert-success"><?= $success; ?></div>
          <?php endif; ?>

          <form method="POST">
            <div class="mb-3">
              <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
            </div>
            <div class="mb-3">
              <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" required>
            </div>
            <div class="mb-3">
              <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
            </div>
            <div class="d-grid">
              <button type="submit" name="register" class="btn btn-success btn-lg">Register</button>
            </div>
          </form>

          <p class="mt-4 text-center">
            Already have an account? <a href="index.php" class="text-primary fw-bold text-decoration-underline">Login</a>
          </p>

        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
