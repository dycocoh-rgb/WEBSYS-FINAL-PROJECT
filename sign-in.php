<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: /blood-bank/dashboard.php");
    exit();
}
require_once 'includes/db.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = $conn->real_escape_string(trim($_POST['email']));
    $password = trim($_POST['password']);

    // Check admin first
    $admin = $conn->query("SELECT * FROM admin WHERE username='$email'")->fetch_assoc();
    if ($admin && $password === $admin['password']) {
        $_SESSION['user_id']  = $admin['admin_id'];
        $_SESSION['fname']    = $admin['username'];
        $_SESSION['is_admin'] = true;
        header("Location: /blood-bank/admin/index.php");
        exit();
    }

    // Check regular user
    $user = $conn->query("SELECT u.*, p.fname, p.lname FROM user_account u
        LEFT JOIN profile p ON u.user_id = p.user_id
        WHERE u.email='$email'")->fetch_assoc();

    if ($user && $password === $user['password']) {
        $_SESSION['user_id']  = $user['user_id'];
        $_SESSION['fname']    = isset($user['fname']) ? $user['fname'] : 'User';
        $_SESSION['lname']    = isset($user['lname']) ? $user['lname'] : '';
        $_SESSION['is_admin'] = false;
        header("Location: /blood-bank/dashboard.php");
        exit();
    }
    $error = "Invalid email or password.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>BloodBank — Login</title>
  <link rel="stylesheet" href="assets/style.css"/>
</head>
<body>
<div class="auth-wrap">
  <div class="auth-card">
    <div class="auth-logo">
      <div class="icon"><i class="bi bi-droplet-fill"></i></div>
      <div>
        <h1>BloodBank</h1>
        <p>Management System</p>
      </div>
    </div>
    <h2>Welcome back</h2>
    <p class="subtitle">Sign in to your account</p>
    <?php if ($error): ?>
      <div class="alert alert-error"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST">
      <div class="form-group">
        <label>Email or Username</label>
        <input type="text" name="email" placeholder="Enter your email" required/>
      </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password" required/>
      </div>
      <button type="submit" class="btn btn-primary btn-full">Sign In</button>
    </form>
    <div class="auth-link">Don't have an account? <a href="register.php">Register here</a></div>
  </div>
</div>
<script src="assets/script.js"></script>
</body>
</html>
