<?php
include "../config/koneksi.php";

if (isset($_GET['id'])) {
    $id_musang = (int) $_GET['id'];
    $sql = "DELETE FROM musang WHERE id_musang = $id_musang";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: ../index.php");
        exit;
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
}
mysqli_close($koneksi);