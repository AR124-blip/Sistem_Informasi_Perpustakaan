<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}
include '../config/koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM buku WHERE id='$id'");
$buku = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-warning">
                    <h5 class="mb-0">Edit Buku</h5>
                </div>
                <div class="card-body">

                    <form method="post" action="update.php">

                        <input type="hidden" name="id" value="<?= $buku['id']; ?>">

                        <div class="mb-3">
                            <label class="form-label">Judul Buku</label>
                            <input type="text" name="judul" value="<?= $buku['judul']; ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Penulis</label>
                            <input type="text" name="penulis" value="<?= $buku['penulis']; ?>" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tahun Terbit</label>
                            <input type="number" name="tahun" value="<?= $buku['tahun']; ?>" class="form-control" required>
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
