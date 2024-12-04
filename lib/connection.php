<?php
require '../vendor/auotoload.php';

function getDB() {
    $client = new MongoDB\Client("mongodb://localhost:27017");
    return $client->newsKel4;
}

?>