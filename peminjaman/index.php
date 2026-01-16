<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}

include "../config/koneksi.php";

/* ================= TAMBAH PEMINJAMAN ================= */
if (isset($_POST['simpan'])) {
    $id_anggota = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $tanggal = date('Y-m-d');
    $status = 'Dipinjam';

    mysqli_query($koneksi, "INSERT INTO peminjaman 
        (id_anggota, id_buku, tanggal_pinjam, status)
        VALUES ('$id_anggota','$id_buku','$tanggal','$status')");
}

/* ================= UPDATE STATUS ================= */
if (isset($_GET['kembali'])) {
    $id = $_GET['kembali'];
    mysqli_query($koneksi, "UPDATE peminjaman SET status='Dikembalikan' WHERE id='$id'");
}

/* ================= DATA ================= */
$peminjaman = mysqli_query($koneksi,"
    SELECT peminjaman.*, anggota.nama, buku.judul
    FROM peminjaman
    JOIN anggota ON peminjaman.id_anggota = anggota.id
    JOIN buku ON peminjaman.id_buku = buku.id
    ORDER BY peminjaman.id DESC
");

$anggota = mysqli_query($koneksi, "SELECT * FROM anggota");
$buku = mysqli_query($koneksi, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h3>Data Peminjaman Buku</h3>
    <a href="../index.php" class="btn btn-secondary mb-3">← Kembali</a>

    <!-- FORM TAMBAH -->
    <form method="post" class="card p-3 mb-4">
        <h5>Tambah Peminjaman</h5>

        <select name="id_anggota" class="form-control mb-2" required>
            <option value="">-- Pilih Anggota --</option>
            <?php while ($a = mysqli_fetch_assoc($anggota)) { ?>
                <option value="<?= $a['id']; ?>"><?= $a['nama']; ?></option>
            <?php } ?>
        </select>

        <select name="id_buku" class="form-control mb-2" required>
            <option value="">-- Pilih Buku --</option>
            <?php while ($b = mysqli_fetch_assoc($buku)) { ?>
                <option value="<?= $b['id']; ?>"><?= $b['judul']; ?></option>
            <?php } ?>
        </select>

        <button name="simpan" class="btn btn-primary">Simpan</button>
    </form>

    <!-- TABEL -->
    <table class="table table-bordered">
        <tr class="table-dark">
            <th>No</th>
            <th>Anggota</th>
            <th>Buku</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; while ($p = mysqli_fetch_assoc($peminjaman)) { ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $p['nama']; ?></td>
            <td><?= $p['judul']; ?></td>
            <td><?= $p['tanggal_pinjam']; ?></td>
            <td><?= $p['status']; ?></td>
            <td>
                <?php if ($p['status'] == 'Dipinjam') { ?>
                    <a href="?kembali=<?= $p['id']; ?>" 
                       class="btn btn-success btn-sm"
                       onclick="return confirm('Yakin buku dikembalikan?')">
                        Kembalikan
                    </a>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </table>

</div>

</body>
</html>
<?php
?>