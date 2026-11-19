<?php
session_start();
include "../config/koneksi.php";

// REGISTER
if (isset($_POST['register'])) {
    $username            = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password            = $_POST['password'];
    $konfirmasi_password = $_POST['konfirmasi_password'];

    // Cek kesamaan password dan konfirmasi password
    if ($password !== $konfirmasi_password) {
        header("Location: ../register.php?status=gagal_password");
        exit;
    }

    // Cek apakah username sudah terdaftar
    $cek_user = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");
    if (mysqli_num_rows($cek_user) > 0) {
        header("Location: ../register.php?status=duplikat");
        exit;
    }

    // Hash password dan simpan ke database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: ../login.php?status=berhasil");
        exit;
    } else {
        header("Location: ../register.php?status=gagal");
        exit;
    }
}

// LOGIN
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = $_POST['password'];

    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['login']    = true;
            $_SESSION['id_user']  = $row['id_user'];
            $_SESSION['username'] = $row['username'];

            header("Location: ../index.php");
            exit;
        } else {
            header("Location: ../login.php?status=password_salah");
            exit;
        }
    } else {
        header("Location: ../login.php?status=username_tidak_ditemukan");
        exit;
    }
}

// LOGOUT
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: ../login.php");
    exit;
}

mysqli_close($koneksi);