<?php
require "components/session_protect.php";
require "config/koneksi.php";
require "components/components.php";

$search = trim($_GET['search'] ?? '');

if ($search !== '') {
  $searchTerm = '%' . $search . '%';
  $stmt = mysqli_prepare($koneksi, "SELECT * FROM musang WHERE nama_musang LIKE ? OR jenis_musang LIKE ?");

  if (!$stmt) {
    die("Pencarian katalog gagal: " . mysqli_error($koneksi));
  }

  if (!mysqli_stmt_bind_param($stmt, "ss", $searchTerm, $searchTerm) || !mysqli_stmt_execute($stmt)) {
    $error = mysqli_stmt_error($stmt);
    mysqli_stmt_close($stmt);
    die("Pencarian katalog gagal: " . $error);
  }

  $result = mysqli_stmt_get_result($stmt);
  if (!$result) {
    $error = mysqli_stmt_error($stmt);
    mysqli_stmt_close($stmt);
    die("Gagal mengambil hasil pencarian: " . $error);
  }
} else {
  $result = mysqli_query($koneksi, "SELECT * FROM musang");
  if (!$result) {
    die("Gagal mengambil katalog: " . mysqli_error($koneksi));
  }
}
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

    <form method="get" action="index.php" class="row g-2 mb-4" role="search">
      <div class="col">
        <label for="search" class="visually-hidden">Cari nama atau jenis musang</label>
        <input
          type="search"
          class="form-control"
          id="search"
          name="search"
          placeholder="Cari nama atau jenis musang..."
          value="<?= htmlspecialchars($search, ENT_QUOTES, 'UTF-8') ?>">
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
        <?php if ($search !== '') : ?>
          <a href="index.php" class="btn btn-outline-secondary">Reset</a>
        <?php endif; ?>
      </div>
    </form>

    <section class="d-flex flex-wrap gap-4 mt-4 justify-content-start">
      <?php if (mysqli_num_rows($result) > 0) : ?>
        <?php while ($data = mysqli_fetch_assoc($result)) : ?>
          <?php cardMenu($data); ?>
        <?php endwhile; ?>
      <?php else : ?>
        <div class="alert alert-info w-100" role="alert">
          <?php if ($search !== '') : ?>
            Tidak ada katalog yang cocok dengan pencarian "<?= htmlspecialchars($search, ENT_QUOTES, 'UTF-8') ?>".
          <?php else : ?>
            Belum ada data musang yang tersedia. Silahkan tambah data terlebih dahulu.
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </section>
    <?php if ($search !== '') mysqli_stmt_close($stmt); ?>
  </main>

  <?php footer(); ?>
</body>

</html>