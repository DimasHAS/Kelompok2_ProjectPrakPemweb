<?php
require "components/session_protect.php";
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
  <?= head("Update Musang - " . $data['nama_musang']); ?>
</head>

<body>
  <?php navbar(); ?>

  <main class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Update Data Musang: <span class="fw-bold"><?= htmlspecialchars($data['nama_musang']) ?></span></h2>
      <a href="detail.php?id=<?= $data['id_musang'] ?>" class="btn btn-outline-secondary">Kembali</a>
    </div>

    <div class="card p-4 shadow-sm">
      <form action="logic/update.logic.php" method="post">
        <input type="hidden" name="id_musang" value="<?= $data['id_musang'] ?>">
        
        <div class="mb-3">
          <label for="nama" class="form-label fw-bold">Nama / Kode Musang</label>
          <input name="nama_musang" type="text" class="form-control" id="nama" value="<?= htmlspecialchars($data['nama_musang']) ?>" required>
        </div>

        <div class="mb-3">
          <label for="jenis" class="form-label fw-bold">Jenis Musang</label>
          <select name="jenis_musang" id="jenis" class="form-select" required>
            <option value="" disabled>Pilih jenis musang</option>
            <option value="Musang Pandan" <?= ($data['jenis_musang'] === 'Musang Pandan') ? 'selected' : '' ?>>Musang Pandan</option>
            <option value="Musang Bulan" <?= ($data['jenis_musang'] === 'Musang Bulan') ? 'selected' : '' ?>>Musang Bulan</option>
            <option value="Musang Rase" <?= ($data['jenis_musang'] === 'Musang Rase') ? 'selected' : '' ?>>Musang Rase</option>
            <option value="Musang Akar" <?= ($data['jenis_musang'] === 'Musang Akar') ? 'selected' : '' ?>>Musang Akar</option>
            <option value="Musang Binturong" <?= ($data['jenis_musang'] === 'Musang Binturong') ? 'selected' : '' ?>>Musang Binturong</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="harga" class="form-label fw-bold">Harga (Rp)</label>
          <input name="harga" type="number" class="form-control" id="harga" min="0" value="<?= $data['harga'] ?>" required>
        </div>

        <div class="mb-3">
          <label for="status" class="form-label fw-bold">Status Ketersediaan</label>
          <div class="d-flex gap-3">
            <div>
              <input id="tersedia" type="radio" name="status" value="Tersedia" <?= ($data['status'] === 'Tersedia') ? 'checked' : '' ?> required>
              <label for="tersedia">Tersedia</label>
            </div>
            <div>
              <input id="terjual" type="radio" name="status" value="Terjual" <?= ($data['status'] === 'Terjual') ? 'checked' : '' ?> required>
              <label for="terjual">Terjual</label>
            </div>
          </div>
        </div>

        <div class="mb-4">
          <label for="gambar" class="form-label fw-bold">Foto Musang (Link URL)</label>
          <input name="gambar_url" type="url" class="form-control" id="gambar" value="<?= htmlspecialchars($data['gambar_url']) ?>" required>
        </div>

        <div class="d-flex gap-2">
          <button type="submit" class="btn btn-primary w-100 shadow-sm">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </main>

  <?php footer(); ?>
</body>

</html>