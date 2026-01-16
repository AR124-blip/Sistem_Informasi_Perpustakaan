<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}
include '../config/koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id='$id'");
$a = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Anggota</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-6">

<div class="card shadow">
<div class="card-header bg-warning">Edit Anggota</div>
<div class="card-body">
<form method="post" action="update.php">
    <input type="hidden" name="id" value="<?= $a['id']; ?>">
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" value="<?= $a['nama']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control" required><?= $a['alamat']; ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">No HP</label>
        <input type="text" name="no_hp" value="<?= $a['no_hp']; ?>" class="form-control" required>
    </div>
    <button class="btn btn-warning">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>
</div>
</div>

</div>
</div>
</div>
</body>
</html>
<?php
?>