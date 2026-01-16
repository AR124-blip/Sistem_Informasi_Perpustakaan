<?php
include '../config/koneksi.php';
mysqli_query($koneksi, "UPDATE peminjaman SET status='Dikembalikan' WHERE id='$_GET[id]'");
header("Location: index.php");
exit;
?>