<?php
// Mulai sesi
session_start();

// Fungsi untuk memeriksa apakah pengguna sudah login
function is_logged_in() {
    if (isset($_SESSION['username'])) {
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk melakukan login
function login($username, $password) {
    if (auth($username, $password)) {
        $_SESSION['username'] = $username;
        return true;
    } else {
        return false;
    }
}

// Fungsi untuk melakukan logout
function logout() {
    session_unset();
    session_destroy();
}
?>