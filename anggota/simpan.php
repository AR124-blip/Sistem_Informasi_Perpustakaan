<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}
include '../config/koneksi.php';

mysqli_query($koneksi, "INSERT INTO anggota (nama, alamat, no_hp)
VALUES ('$_POST[nama]', '$_POST[alamat]', '$_POST[no_hp]')");

header("Location: index.php");
exit;
?>