<?php
session_start();
include "config.php";

$error = "";

if (isset($_POST['login'])) {
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Incorrect password!";
        }
    } else {
        $error = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      /* Match the dashboard background */
      background: linear-gradient(to right, #4ade80, #16a34a);
      min-height: 100vh;
    }
    .card-login {
      background-color: rgba(255, 255, 255, 0.9); /* semi-transparent card */
      border-radius: 1rem;
    }
  </style>
</head>

<body class="d-flex justify-content-center align-items-center">

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-5 col-lg-4">
      <div class="card card-login shadow-lg p-4">
        <div class="card-body">

          <h2 class="text-center mb-4 display-6 fw-bold">Sign In</h2>

          <?php if(!empty($error)): ?>
              <div class="alert alert-danger"><?= htmlspecialchars($error); ?></div>
          <?php endif; ?>

          <form method="POST">
            <div class="mb-3">
              <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" required>
            </div>
            <div class="mb-3">
              <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
            </div>
            <div class="d-grid">
              <button type="submit" name="login" class="btn btn-success btn-lg">Login</button>
            </div>
          </form>

          <p class="mt-4 text-center">
            No account? <a href="register.php" class="text-danger fw-bold text-decoration-underline">Register</a>
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
