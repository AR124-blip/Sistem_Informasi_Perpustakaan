<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}
include '../config/koneksi.php';

mysqli_query($koneksi, "DELETE FROM anggota WHERE id='$_GET[id]'");
header("Location: index.php");
exit;
?>