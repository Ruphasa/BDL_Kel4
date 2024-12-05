<?php include 'lib/connection.php';
function getAllData($db)
{
    $collection = $db->news;
    // Memilih koleksi news 
    return $collection->find()->toArray();
    // Mengambil semua data dalam bentuk array 
}
// Memproses form untuk create, update, delete 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        $judul = $_POST['Judul'];
        $ringkasan = $_POST['Ringkasan'];
        $konten = $_POST['Konten'];
        $penulis = $_POST['Penulis'];
        $kategori = $_POST['Kategori'];
        // Convert the datetime-local input to MongoDB UTCDateTime 
        $dibuat = new MongoDB\BSON\UTCDateTime(strtotime($_POST['Dibuat']) * 1000);
        $diperbarui = new MongoDB\BSON\UTCDateTime(strtotime($_POST['Diperbarui']) * 1000);
        // Save to MongoDB 
        $collection->insertOne(['Judul' => $judul, 'Ringkasan' => $ringkasan, 'Konten' => $konten, 'Penulis' => $penulis, 'Kategori' => $kategori, 'Dibuat' => $dibuat, 'Diperbarui' => $diperbarui]);
        // Menambahkan data ke koleksi 
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $data = ['Judul' => $_POST['Judul'], 'Ringkasan' => $_POST['Ringkasan'], 'Konten' => $_POST['Konten'], 'Penulis' => $_POST['Penulis'], 'Kategori' => $_POST['Kategori'], 'Dibuat' => new MongoDB\BSON\UTCDateTime(strtotime($_POST['Dibuat']) * 1000), 'Diperbarui' => new MongoDB\BSON\UTCDateTime(strtotime($_POST['Diperbarui']) * 1000),];
        try {
            updateData($id, $data);
        } catch (Exception $e) {
            error_log("Update failed: " . $e->getMessage());
        }
        // Mengupdate data di koleksi 
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $db->news->deleteOne(['_id' => new MongoDB\BSON\ObjectID($id)]);
        // Menghapus data dari koleksi 
    }
}

function updateData($id, $data)
{
    global $collection;
    try {
        if (empty($id) || !MongoDB\BSON\ObjectId::isValid($id)) {
            throw new Exception("Invalid ObjectId: " . $id);
        }
        $objectId = new MongoDB\BSON\ObjectId($id);
        $collection->updateOne(['_id' => $objectId], ['$set' => $data]);
    } catch (Exception $e) {
        error_log("Error updating data: " . $e->getMessage());
    }
}

function getMessage(){
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        return $message;
    }
}

function getAllCategories($db)
{
    $collection = $db->news;
    $categories = $collection->distinct('Kategori');
    return $categories;
}

function getNewsByCategory($db, $category)
{
    $collection = $db->news;
    $collection = $collection->find(['Kategori' => $category])->toArray();
    return $collection;
}

function searchNewsByKeyword($db, $keyword)
{
    $collection = $db->news;
    $regex = new MongoDB\BSON\Regex($keyword, 'i');
    // Pencarian case-insensitive 
    $query = [
        '$or' => [
            ['Judul' => $regex],
            ['Konten' => $regex],
            ['Ringkasan' => $regex],
            ['Penulis' => $regex]
        ]
    ];
    return $collection->find($query)->toArray();
}


// Mendapatkan berita berdasarkan kategori yang dipilih 
$categories = getAllCategories($db);
$selectedCategory = isset($_GET['Kategori']) ? $_GET['Kategori'] : 'View All';
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

if (!empty($keyword)) {
    // Pencarian berdasarkan keyword 
    $allData = searchNewsByKeyword($db, $keyword);
} else if ($selectedCategory == 'View All') {
    $allData = getAllData($db);
} else {
    $allData = getNewsByCategory($db, $selectedCategory);
}


?>