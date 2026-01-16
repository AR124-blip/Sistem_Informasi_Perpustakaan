<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Tambah Anggota</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-6">

<div class="card shadow">
<div class="card-header bg-success text-white">Tambah Anggota</div>
<div class="card-body">
<form method="post" action="simpan.php">
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">No HP</label>
        <input type="text" name="no_hp" class="form-control" required>
    </div>
    <button class="btn btn-success">Simpan</button>
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