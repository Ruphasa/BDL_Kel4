<?php
require '../vendor/autoload.php';
session_start();

function getDB() {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    return $client->newsKel4;
}

function registerUser($username, $password) {
    $db = getDB();
    $collection = $db->users;

    if ($collection->findOne(['username' => $username])) {
        return "Username sudah terdaftar.";
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $result = $collection->insertOne([
        'username' => $username,
        'password' => $hashedPassword,
    ]);

    return $result->getInsertedCount() === 1 ? "Pendaftaran berhasil!" : "Pendaftaran gagal.";
}

function loginUser($username, $password) {
    $db = getDB();
    $collection = $db->users;

    $user = $collection->findOne(['username' => $username]);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = (string)$user['_id'];
        $_SESSION['username'] = $user['username'];
        return "Login berhasil!";
    }

    return "Username atau password salah.";
}
?>