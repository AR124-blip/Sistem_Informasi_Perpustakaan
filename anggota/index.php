<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}
include '../config/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Data Anggota</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">

<h4>Data Anggota</h4>
<a href="tambah.php" class="btn btn-success mb-3">+ Tambah Anggota</a>
<form method="get" class="mb-3">
    <div class="input-group">
        <input type="text" name="cari" class="form-control" 
               placeholder="Cari nama anggota..." 
               value="<?= isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
        <button class="btn btn-primary">Cari</button>
        <a href="index.php" class="btn btn-secondary">Reset</a>
    </div>
</form>


<table class="table table-bordered">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>No HP</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;
$where = "";
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $where = "WHERE nama LIKE '%$cari%'";
}

$data = mysqli_query($koneksi, "SELECT * FROM anggota $where");

while ($a = mysqli_fetch_assoc($data)) {
?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $a['nama']; ?></td>
    <td><?= $a['alamat']; ?></td>
    <td><?= $a['no_hp']; ?></td>
    <td>
        <a href="edit.php?id=<?= $a['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="hapus.php?id=<?= $a['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>

<a href="../index.php" class="btn btn-secondary">Dashboard</a>
</div>
</body>
</html>
