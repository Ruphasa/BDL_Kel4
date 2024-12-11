<?php
require '../vendor/autoload.php'; // Memuat library MongoDB
require 'connection.php';

// Mulai sesi
session_start();

// Ambil data dari form login
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

if (empty($username) || empty($password)) {
    echo "<script>alert('Username atau password tidak boleh kosong!'); window.location.href='index.php';</script>";
    exit;
}

 // Mencari pengguna berdasarkan username
 $user = $collectionUser->findOne(['username' => $username]);

 if ($user) {
     // Validasi password (gunakan hashing jika password disimpan dengan hash)
     if ($user['password'] == $password) {
         $_SESSION['user'] = $user;
         echo "Login berhasil!";
         // Redirect ke halaman utama atau halaman yang sesuai
         header('Location: ../adminIndex.php');
     } else {
         echo "Password salah!";
     }
 } else {
     echo "Pengguna tidak ditemukan!";
 }
}
?>