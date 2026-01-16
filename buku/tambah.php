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
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Tambah Buku</h5>
                </div>
                <div class="card-body">

                    <form method="post" action="simpan.php">

                        <div class="mb-3">
                            <label class="form-label">Judul Buku</label>
                            <input type="text" name="judul" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Penulis</label>
                            <input type="text" name="penulis" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tahun Terbit</label>
                            <input type="number" name="tahun" class="form-control" required>
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
