<?php
session_start();
include '../config/koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Peminjaman Buku</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">

<h4>Peminjaman Buku</h4>

<form method="post" action="simpan.php">

<label>Anggota</label>
<select name="id_anggota" class="form-control mb-2">
<?php
$anggota = mysqli_query($koneksi, "SELECT * FROM anggota");
while ($a = mysqli_fetch_assoc($anggota)) {
    echo "<option value='$a[id]'>$a[nama]</option>";
}
?>
</select>

<label>Buku</label>
<select name="id_buku" class="form-control mb-2">
<?php
$buku = mysqli_query($koneksi, "SELECT * FROM buku");
while ($b = mysqli_fetch_assoc($buku)) {
    echo "<option value='$b[id]'>$b[judul]</option>";
}
?>
</select>

<button class="btn btn-primary">Pinjam</button>
</form>

</div>
</body>
</html>
