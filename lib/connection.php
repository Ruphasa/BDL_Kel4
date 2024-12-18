<?php
include __DIR__ . '/../vendor/autoload.php';
// Konfigurasi koneksi ke MongoDB
$host = 'localhost:27017';
$database = 'BDL_Kel4';

// Membuat koneksi ke MongoDB
$client = new MongoDB\Client("mongodb://$host");

// Memilih database yang akan digunakan
$db = $client->selectDatabase($database);
?>