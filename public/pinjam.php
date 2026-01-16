<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "../config/koneksi.php";

if (!isset($_GET['id'])) {
    die("Buku tidak ditemukan");
}

$id_buku = $_GET['id'];

// ambil data buku yang dipilih
$buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id='$id_buku'");
$data_buku = mysqli_fetch_assoc($buku);

if (!$data_buku) {
    die("Data buku tidak ada");
}

// proses pinjam
if (isset($_POST['pinjam'])) {
    $nama   = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp  = $_POST['no_hp'];

    // simpan anggota
    mysqli_query($koneksi, "INSERT INTO anggota (nama, alamat, no_hp)
        VALUES ('$nama','$alamat','$no_hp')");

    $id_anggota = mysqli_insert_id($koneksi);

    // simpan peminjaman
    $tanggal = date('Y-m-d');
    mysqli_query($koneksi, "INSERT INTO peminjaman 
        (id_anggota, id_buku, tanggal_pinjam, status)
        VALUES ('$id_anggota','$id_buku','$tanggal','Dipinjam')");

    echo "<script>
        alert('Peminjaman berhasil!');
        window.location='index.php';
    </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pinjam Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h3>Konfirmasi Peminjaman Buku</h3>

    <div class="card mb-3">
        <div class="card-body">
            <p><strong>Judul Buku:</strong> <?= $data_buku['judul']; ?></p>
            <p><strong>Penulis:</strong> <?= $data_buku['penulis']; ?></p>
            <p><strong>Tahun:</strong> <?= $data_buku['tahun']; ?></p>
        </div>
    </div>

    <form method="post">
        <h5>Data Peminjam</h5>

        <input type="text" name="nama" class="form-control mb-2" placeholder="Nama Lengkap" required>
        <textarea name="alamat" class="form-control mb-2" placeholder="Alamat" required></textarea>
        <input type="text" name="no_hp" class="form-control mb-3" placeholder="No HP" required>

        <button name="pinjam" class="btn btn-primary">Konfirmasi Pinjam</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</div>

</body>
</html>
<?php
?>