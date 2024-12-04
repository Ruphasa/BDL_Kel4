<?php
// Fungsi untuk melakukan autentikasi pengguna
function auth($username, $password) {
    global $db;
    $collection = $db->users;
    $query = ['username' => $username, 'password' => $password];
    $result = $collection->findOne($query);
    if ($result) {
        return true;
    } else {
        return false;
    }
}
?>