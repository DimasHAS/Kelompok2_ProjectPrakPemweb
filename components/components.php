<?php
function head($title)
{
?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($title) ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
    crossorigin="anonymous">

  <link rel="stylesheet" href="css/style.css">
<?php
}
?>

<?php
function footer()
{ ?>
  <!-- JS Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<?php }
?>

<?php
function alert($type, $massage)
{ ?>
  <div class="px-2 pt-2">
    <div class="alert alert-<?= $type ?> m-0 shadow-sm" role="alert">
      <?= $massage ?>
    </div>
  </div>
<?php } ?>

<?php
function listAlert($status)
{
  switch ($status) {
    case "berhasil":
      alert("success", "Register Berhasil! Silahkan login");
      break;
    case "gagal_password":
      alert("danger", "Error: Konfirmasi Password tidak sama");
      break;
    case "duplikat":
      alert("danger", "Error: Username sudah terdaftar");
      break;
    case "username_tidak_ditemukan":
      alert("danger", "Error: Akun user tidak ditemukan");
      break;
    case "password_salah":
      alert("danger", "Error: Password salah");
      break;
    case "gagal":
      alert("danger", "Error: Terjadi Kesalahan");
      break;
    default:
      break;
  }
}
?>

<?php
function cardMenu($data)
{
?>
  <div class="card h-100 shadow-sm" style="width: 300px;">
    <img src="<?= htmlspecialchars($data['gambar_url']) ?>" class="card-img-top object-fit-cover" style="height: 200px;" alt="<?= htmlspecialchars($data['nama_musang']) ?>">
    <div class="card-body d-flex flex-column">
      <h5 class="card-title"><?= htmlspecialchars($data['nama_musang']) ?></h5>
      <p class="card-text m-0 text-muted"><?= htmlspecialchars($data['jenis_musang']) ?></p>
      <p class="card-text m-0 mb-3">
        Rp <?= number_format($data['harga'], 0, ',', '.') ?> - 
        <span class="fw-bold <?= ($data['status'] == 'Tersedia') ? 'text-success' : 'text-danger' ?>">
          <?= htmlspecialchars($data['status']) ?>
        </span>
      </p>

      <div class="mt-auto">
        <div class="d-flex gap-2 mb-2">
          <a href="update.php?id=<?= $data['id_musang'] ?>" class="btn btn-warning btn-sm w-100">Edit</a>
          <a href="logic/delete.logic.php?id=<?= $data['id_musang'] ?>" class="btn btn-danger btn-sm w-100" onclick="return confirm('Yakin ingin menghapus data <?= htmlspecialchars($data['nama_musang']) ?>?')">Hapus</a>
        </div>
        <a href="detail.php?id=<?= $data['id_musang'] ?>" class="btn btn-primary w-100">Detail</a>
      </div>
    </div>
  </div>
<?php
}

function navbar()
{
?>
  <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php">🐾 CivetStore Management</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
        <form action="logic/auth.logic.php" method="post" class="d-flex">
          <button class="btn btn-danger" type="submit" name="logout">Logout</button>
        </form>
      </div>
    </div>
  </nav>
<?php
}
?>