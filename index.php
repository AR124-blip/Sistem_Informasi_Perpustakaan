<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: auth/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">Sistem Informasi Perpustakaan</span>
        <span class="text-white">Login: <?= $_SESSION['username']; ?></span>
    </div>
</nav>

<div class="container mt-4">
    <div class="row">

        <!-- MENU BUKU -->
        <div class="col-md-4">
            <div class="card shadow mb-3">
                <div class="card-body text-center">
                    <h5>Data Buku</h5>
                    <a href="buku/index.php" class="btn btn-primary">Kelola</a>
                </div>
            </div>
        </div>

        <!-- MENU ANGGOTA -->
        <div class="col-md-4">
            <div class="card shadow mb-3">
                <div class="card-body text-center">
                    <h5>Data Anggota</h5>
                    <a href="anggota/index.php" class="btn btn-success">Kelola</a>
                </div>
            </div>
        </div>

        <!-- MENU PEMINJAMAN -->
        <div class="col-md-4">
            <div class="card shadow mb-3">
                <div class="card-body text-center">
                    <h5>Data Peminjaman</h5>
                    <a href="peminjaman/index.php" class="btn btn-warning">Kelola</a>
                </div>
            </div>
        </div>

    </div>

    <a href="auth/logout.php" class="btn btn-danger mt-3">Logout</a>
</div>

</body>
</html>
<?php
?>