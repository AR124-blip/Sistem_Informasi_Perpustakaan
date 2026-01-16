<?php
include "../config/koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perpustakaan Digital</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background-color: #0d47a1;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 18px;
        }

        .page-title {
            color: #0d47a1;
            font-weight: 600;
        }

        .table thead {
            background-color: #0d47a1;
            color: white;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        footer {
            background-color: #0d47a1;
            color: white;
            padding: 15px 0;
            margin-top: 40px;
            font-size: 14px;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <span class="navbar-brand">
            📚 Perpustakaan Digital Indonesia
        </span>

        <a href="../auth/login.php" class="btn btn-outline-light btn-sm">
            Login Admin
        </a>
    </div>
</nav>

<!-- CONTENT -->
<div class="container mt-4">

    <div class="card p-4">
        <h4 class="page-title mb-3">
            Daftar Buku Tersedia
        </h4>

        <table class="table table-bordered table-striped align-middle">
            <thead>
                <tr>
                    <th width="50">No</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th width="100">Tahun</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if (mysqli_num_rows($data) > 0):
                    while ($b = mysqli_fetch_assoc($data)):
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $b['judul']; ?></td>
                    <td><?= $b['penulis']; ?></td>
                    <td><?= $b['tahun']; ?></td>
                </tr>
                <?php
                    endwhile;
                else:
                ?>
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Data buku belum tersedia
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<!-- FOOTER -->
<footer class="text-center">
    <div class="container">
        © <?= date('Y'); ?> Sistem Informasi Perpustakaan | UAS Pemrograman Web
    </div>
</footer>

</body>
</html>
