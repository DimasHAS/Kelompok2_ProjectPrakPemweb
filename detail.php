<?php
require "config/session_protect.php";
require "config/koneksi.php";
require "components/components.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id_musang = (int) $_GET['id'];
$sql = "SELECT * FROM musang WHERE id_musang = $id_musang";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) === 0) {
    header("Location: index.php");
    exit;
}

$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?= head("Detail Musang - " . $data['nama_musang']); ?>
</head>

<body>
  <?php navbar(); ?>

  <main class="container my-5">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none" style="color: #4B774B;">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($data['nama_musang']) ?></li>
      </ol>
    </nav>

    <h1 class="mb-4">Detail Data Musang</h1>

    <div class="card p-4 shadow-lg">
      <div class="d-flex flex-wrap gap-5 align-items-center">
        <img src="<?= htmlspecialchars($data['gambar_url']) ?>" alt="<?= htmlspecialchars($data['nama_musang']) ?>" class="rounded detail-image object-fit-cover w-50 h-auto">

        <div>
          <h2 class="display-6 mb-3" style="color: #4B774B;"><?= htmlspecialchars($data['nama_musang']) ?></h2>

          <div class="mb-3">
            <p class="fs-5 m-0"><span class="fw-bold">Jenis Musang:</span> <?= htmlspecialchars($data['jenis_musang']) ?></p>
            <p class="fs-5 m-0"><span class="fw-bold">Harga:</span> Rp <?= number_format($data['harga'], 0, ',', '.') ?></p>
            <p class="fs-5 m-0"><span class="fw-bold">Status:</span>
              <span class="fw-bold <?= ($data['status'] == 'Tersedia') ? 'text-success' : 'text-danger' ?>">
                <?= htmlspecialchars($data['status']) ?>
              </span>
            </p>
          </div>

          <form action="logic/status.logic.php" method="post" class="mt-4">
            <input type="hidden" name="id_musang" value="<?= $data['id_musang'] ?>">
            <?php if ($data['status'] === 'Tersedia') : ?>
              <button type="submit" name="beli" class="btn btn-primary btn-lg shadow">Tandai Terjual / Beli</button>
            <?php else : ?>
              <button type="button" class="btn btn-secondary btn-lg shadow" disabled>Sudah Terjual</button>
            <?php endif; ?>
          </form>

          <div class="mt-4 d-flex gap-2">
            <a href="update.php?id=<?= $data['id_musang'] ?>" class="btn btn-warning btn-sm">Edit Data</a>
            <a href="logic/delete.logic.php?id=<?= $data['id_musang'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data <?= htmlspecialchars($data['nama_musang']) ?>?')">Hapus Data</a>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php footer(); ?>
</body>

</html>