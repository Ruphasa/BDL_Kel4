<?php include 'lib/connection.php';
function getAllData($db)
{
    $collection = $db->News;
    // Memilih koleksi news 
    return $collection->find()->toArray();
    // Mengambil semua data dalam bentuk array 
}
// Memproses form untuk create, update, delete 
if (isset($_POST['create'])) {
    $judul = $_POST['Judul'];
    $ringkasan = $_POST['Ringkasan'];
    $konten = $_POST['Konten'];
    $penulis = $_POST['Penulis'];
    $kategori = $_POST['Kategori'];
    $dibuat = new MongoDB\BSON\UTCDateTime(strtotime($_POST['Dibuat']) * 1000);
    $diperbarui = new MongoDB\BSON\UTCDateTime(strtotime($_POST['Diperbarui']) * 1000);
    
    // Menambahkan data ke koleksi termasuk views yang diinisialisasi dengan 0
    $collection->insertOne([
        'Judul' => $judul,
        'Ringkasan' => $ringkasan,
        'Konten' => $konten,
        'Penulis' => $penulis,
        'Kategori' => $kategori,
        'Dibuat' => $dibuat,
        'Diperbarui' => $diperbarui,
        'Views' => 0  // Kolom Views yang diinisialisasi dengan 0
    ]);
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
        $db->News->deleteOne(['_id' => new MongoDB\BSON\ObjectID($id)]);
        // Menghapus data dari koleksi 
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
    $collection = $db->News;
    $categories = $collection->distinct('Kategori');
    return $categories;
}

function getNewsByCategory($db, $category)
{
    $collection = $db->News;
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