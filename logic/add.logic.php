<?php
include "../config/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_musang  = mysqli_real_escape_string($koneksi, $_POST['nama_musang']);
    $jenis_musang = mysqli_real_escape_string($koneksi, $_POST['jenis_musang']);
    $harga        = (int) $_POST['harga'];
    $gambar_url   = mysqli_real_escape_string($koneksi, $_POST['gambar_url']);
    $status       = "Tersedia";

    $sql = "INSERT INTO musang (nama_musang, jenis_musang, harga, status, gambar_url) 
            VALUES ('$nama_musang', '$jenis_musang', '$harga', '$status', '$gambar_url')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($koneksi);
    }
}
mysqli_close($koneksi);