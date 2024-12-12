<?php
require '../vendor/autoload.php'; // Memuat library MongoDB
require 'connection.php';
require_once 'session.php';

// Mulai sesi
$session = new Session();

// Ambil data dari form login
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "<script>alert('Username atau password tidak boleh kosong!'); window.location.href='index.php';</script>";
        exit;
    }

    // Mencari pengguna berdasarkan username
    $admin = $collectionUser->findOne(['username' => 'admin']);
    $user = $collectionUser->findOne(['username' => $username]);

    if ($admin&&$admin['password'] == $password) {
            $session->set('is_login', true);
            $session->set('username', $username);
            $session->commit();
            echo "Login berhasil!";
            // Redirect ke halaman utama atau halaman yang sesuai
            header('Location: ../index.php?pages=admin');
    } else if ($user&&$user['password'] == $password) {
            // Validasi password (gunakan hashing jika password disimpan dengan hash)
                $session->set('is_login', true);
                $session->set('username', $username);
                $session->commit();
                echo "Login berhasil!";
                // Redirect ke halaman utama atau halaman yang sesuai
                header('Location: ../index.php');
    } else {
        echo "Pengguna tidak ditemukan!";
    }
}
?>