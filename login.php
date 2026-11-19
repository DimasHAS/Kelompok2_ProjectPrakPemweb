<?php
session_start();
require "components/components.php"; // Sesuaikan path folder tempat kamu menyimpan components.php

// Jika sudah login, langsung arahkan ke index.php
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    header("Location: index.php");
    exit;
}

// Tangkap parameter status dari URL untuk alert
$status = $_GET['status'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?= head("Login Admin"); ?>
</head>

<body class="d-flex justify-content-center align-items-center mt-5">
  <section class="w-50 shadow-lg mt-5 p-4 rounded">
    <h1 class="text-center">Login Admin</h1>

    <?php
    // ALERT STATUS TAMPIL
    listAlert($status);
    ?>

    <div class="card-body">
      <form action="logic/auth.logic.php" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary w-100" name="login" value="login">Login</button>
      </form>
      <a href="register.php"><button type="button" class="btn btn-outline-primary w-100 mt-3">Belum punya akun? Register</button></a>
    </div>

  </section>

  <?php footer(); ?>
</body>

</html>