<?php
include __DIR__ . '/../vendor/autoload.php';
// Konfigurasi koneksi ke MongoDB
$host = 'localhost:27017';
$database = 'BDL_Kel4';

// Membuat koneksi ke MongoDB
$client = new MongoDB\Client("mongodb://$host");

// Memilih database yang akan digunakan
$db = $client->selectDatabase($database);

// Memastikan koleksi news ada 
$collection = $db->News;
$collectionUser = $db->User;
if(!$collection) { 
    die("Koleksi 'news' tidak ditemukan"); 
}
?>