<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}

include '../config/koneksi.php';

mysqli_query($koneksi, "UPDATE buku SET
    judul='$_POST[judul]',
    penulis='$_POST[penulis]',
    tahun='$_POST[tahun]'
    WHERE id='$_POST[id]'
");

header("Location: index.php");
exit;
?>