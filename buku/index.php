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
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h4>Data Buku</h4>
        <a href="tambah.php" class="btn btn-success">+ Tambah Buku</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

        <?php
        $no = 1;
        $data = mysqli_query($koneksi, "SELECT * FROM buku");
        while ($row = mysqli_fetch_assoc($data)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['judul']; ?></td>
            <td><?= $row['penulis']; ?></td>
            <td><?= $row['tahun']; ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>

        </tbody>
    </table>

    <a href="../index.php" class="btn btn-secondary">Kembali</a>

</div>

</body>
</html>
