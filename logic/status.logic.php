<?php
include "../config/koneksi.php";

if (isset($_POST['beli'])) {
    $id_musang = (int) $_POST['id_musang'];

    $sql = "UPDATE musang SET status = 'Terjual' WHERE id_musang = $id_musang";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: ../detail.php?id=$id_musang");
        exit;
    } else {
        echo "Gagal memperbarui status: " . mysqli_error($koneksi);
    }
}
mysqli_close($koneksi);