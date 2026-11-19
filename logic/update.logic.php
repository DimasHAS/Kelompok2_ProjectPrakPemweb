<?php
include "../config/koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_musang    = (int) $_POST['id_musang'];
    $nama_musang  = mysqli_real_escape_string($koneksi, $_POST['nama_musang']);
    $jenis_musang = mysqli_real_escape_string($koneksi, $_POST['jenis_musang']);
    $harga        = (int) $_POST['harga'];
    $status       = mysqli_real_escape_string($koneksi, $_POST['status']);
    $gambar_url   = mysqli_real_escape_string($koneksi, $_POST['gambar_url']);

    $sql = "UPDATE musang SET 
                nama_musang  = '$nama_musang', 
                jenis_musang = '$jenis_musang', 
                harga        = '$harga', 
                status       = '$status', 
                gambar_url   = '$gambar_url' 
            WHERE id_musang = $id_musang";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: ../detail.php?id=$id_musang");
        exit;
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
}
mysqli_close($koneksi);