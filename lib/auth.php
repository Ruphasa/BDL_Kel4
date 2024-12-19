<?php
require __DIR__.'/../vendor/autoload.php'; // Load MongoDB library
require_once 'connection.php';
require_once 'session.php';

// Start session
$session = new Session();
$session->start();

$collectionUser = $db->User;

// Get data from login form
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "<script>alert('Username atau password tidak boleh kosong!'); window.location.href='index.php';</script>";
        exit;
    }

    // Find user by username
    $user = $collectionUser->findOne(['username' => $username]);

    // Verify user and password
    if ($user && $user['password'] == $password) {
        $session->set('is_login', true);
        $session->set('username', $username);
        $session->commit();

        if ($username == "admin") {
            // Redirect for admin
            echo "<script>alert('Login berhasil! Selamat datang, Admin.'); window.location.href='../index.php?pages=admin';</script>";
        } else {
            // Redirect for regular user
            echo "<script>alert('Login berhasil! Selamat datang.'); window.location.href='../index.php';</script>";
        }
    } else {
        echo "<script>alert('Pengguna tidak ditemukan atau password salah!'); window.location.href='index.php';</script>";
    }
}elseif(isset($_GET['act'])&& $_GET['act'] == 'logout') {
    $session->deleteAll();
    echo "<script>alert('Logout berhasil!'); window.location.href='../index.php';</script>";
}
?>
