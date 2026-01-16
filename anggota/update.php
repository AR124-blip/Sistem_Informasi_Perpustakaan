<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}
include '../config/koneksi.php';

mysqli_query($koneksi, "UPDATE anggota SET
    nama='$_POST[nama]',
    alamat='$_POST[alamat]',
    no_hp='$_POST[no_hp]'
    WHERE id='$_POST[id]'
");

header("Location: index.php");
exit;
?>