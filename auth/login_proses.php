<?php
session_start();
include '../config/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
$data = mysqli_fetch_assoc($query);

if ($data) {
    if ($password === $data['password']) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $data['username'];
        header("Location: ../index.php");
        exit;
    }
}

echo "Login gagal";
exit;
?>