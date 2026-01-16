<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}

include '../config/koneksi.php';

mysqli_query($koneksi, "INSERT INTO buku (judul, penulis, tahun)
VALUES ('$_POST[judul]', '$_POST[penulis]', '$_POST[tahun]')");

header("Location: index.php");
exit;
?>