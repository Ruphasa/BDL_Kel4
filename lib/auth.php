<?php
require '../vendor/autoload.php'; // Memuat library MongoDB

// Koneksi ke MongoDB
$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->kampus; // Nama database
$collection = $database->users; // Nama koleksi

// Ambil data dari form login
$user = $_POST['username'];
$pass = $_POST['password'];

// Cari user di database
$filter = ['username' => $user, 'password' => $pass]; // Catatan: Harus menggunakan hashing untuk password
$userData = $collection->findOne($filter);

if ($userData) {
    session_start();
    $_SESSION['username'] = $userData['username'];
    $_SESSION['role'] = $userData['role'];

    if ($userData['role'] === 'admin') {
        // Jika admin
        header("Location: adminIndex.php");
    } else {
        // Jika user biasa
        header("Location: userIndex.php");
    }
} else {
    // Jika login gagal
    echo "<script>alert('Invalid username or password!'); window.location.href='index.php';</script>";
}
?>