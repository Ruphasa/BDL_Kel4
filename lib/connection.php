<?php
include __DIR__ . '/../vendor/autoload.php';
// Konfigurasi koneksi ke MongoDB
$host = 'localhost';
$port = '27017';
$database = 'nama_database';

// Membuat koneksi ke MongoDB
$client = new MongoDB\Client("mongodb://$host:$port");

// Memilih database yang akan digunakan
$db = $client->selectDatabase($database);
?>