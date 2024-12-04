<?php include 'lib/connection.php';
function getAllData($db)
{
    $collection = $db->News;
    // Memilih koleksi news 
    return $collection->find()->toArray();
    // Mengambil semua data dalam bentuk array 
}
// Memproses form untuk create, update, delete 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $data = ['Judul' => $_POST['judul'], 'Konten' => $_POST['konten'], 'Ringkasan' => $_POST['ringkasan'],];
        $db->News->insertOne($data);
        // Menambahkan data ke koleksi 
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $data = ['Judul' => $_POST['judul'], 'Konten' => $_POST['konten'], 'Ringkasan' => $_POST['ringkasan'],];
        $db->News->updateOne(['_id' => new MongoDB\BSON\ObjectID($id)], ['$set' => $data]);
        // Mengupdate data di koleksi 
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $db->News->deleteOne(['_id' => new MongoDB\BSON\ObjectID($id)]);
        // Menghapus data dari koleksi 
    }
}
$allData = getAllData($db);
?>