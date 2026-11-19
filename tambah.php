<?php
require "config/session_protect.php";
require "components/components.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?= head("Tambah Data Musang"); ?>
</head>

<body>
  <?php navbar(); ?>

  <main class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Tambah Data Musang Baru</h2>
      <a href="index.php" class="btn btn-outline-secondary">Kembali</a>
    </div>

    <div class="card p-4 shadow-sm">
      <form action="logic/add.logic.php" method="post">
        <div class="mb-3">
          <label for="nama" class="form-label fw-bold">Nama / Kode Musang</label>
          <input name="nama_musang" type="text" class="form-control" id="nama" placeholder="Contoh: Musang Pandan Jantan 4 Bulan" required>
        </div>
        <div class="mb-3">
          <label for="jenis" class="form-label fw-bold">Jenis Musang</label>
          <select name="jenis_musang" id="jenis" class="form-select" required>
            <option value="" selected disabled>Pilih jenis musang</option>
            <option value="Musang Pandan">Musang Pandan</option>
            <option value="Musang Bulan">Musang Bulan</option>
            <option value="Musang Rase">Musang Rase</option>
            <option value="Musang Akar">Musang Akar</option>
            <option value="Musang Binturong">Musang Binturong</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="harga" class="form-label fw-bold">Harga (Rp)</label>
          <input name="harga" type="number" class="form-control" id="harga" placeholder="Contoh: 450000" min="0" required>
        </div>
        <div class="mb-4">
          <label for="gambar" class="form-label fw-bold">Foto Musang (Link URL)</label>
          <input name="gambar_url" type="url" class="form-control" id="gambar" placeholder="Masukkan link URL foto musang" required>
        </div>
        <div class="d-flex gap-2">
          <button type="submit" class="btn btn-primary w-75 shadow-sm">Simpan Data</button>
          <button type="reset" class="btn btn-outline-primary w-25">Reset Form</button>
        </div>
      </form>
    </div>
  </main>

  <?php footer(); ?>
</body>

</html>