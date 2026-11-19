<?php
require "config/session_protect.php";
require "config/koneksi.php";
require "components/components.php";

$sql = "SELECT * FROM musang";
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?= head("Manajemen Jual Beli Musang"); ?>
</head>

<body>
  <?php navbar(); ?>

  <main class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Katalog & Manajemen Musang</h2>
      <a href="tambah.php" class="btn btn-primary shadow-sm">+ Tambah Data Musang</a>
    </div>

    <section class="d-flex flex-wrap gap-4 mt-4 justify-content-start">
      <?php if (mysqli_num_rows($result) > 0) : ?>
        <?php while ($data = mysqli_fetch_assoc($result)) : ?>
          <?php cardMenu($data); ?>
        <?php endwhile; ?>
      <?php else : ?>
        <div class="alert alert-info w-100" role="alert">
          Belum ada data musang yang tersedia. Silahkan tambah data terlebih dahulu.
        </div>
      <?php endif; ?>
    </section>
  </main>

  <?php footer(); ?>
</body>

</html>