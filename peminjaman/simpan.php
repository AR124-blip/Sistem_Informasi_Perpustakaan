<?php
include '../config/koneksi.php';

mysqli_query($koneksi, "INSERT INTO peminjaman 
(id_anggota,id_buku,tanggal_pinjam,status)
VALUES 
('$_POST[id_anggota]','$_POST[id_buku]',CURDATE(),'Dipinjam')");

header("Location: index.php");
exit;
?>