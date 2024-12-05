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
    $collection = $db->News;
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