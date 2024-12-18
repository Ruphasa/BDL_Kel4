<?php
require '../vendor/autoload.php'; // Memuat library MongoDB
require '../lib/connection.php';
require_once 'session.php';

// Mulai sesi
$collectionUser = $db->User;
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
    $user = $collectionUser->findOne(['username' => $username]);

    if ($username=="admin"&&$user['password'] == $password) {
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
                // Redirect ke halaman utama atau halaman yang sesuai
                echo "<script>alert('Login berhasil!'); window.location.href='../index.php';</script>";
    } else {
        echo "Pengguna tidak ditemukan!";
    }
}
?>