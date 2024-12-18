<?php
include_once __DIR__ . ('/../lib/connection.php');

$collection = $db->News;
$comments = $db->Comment;

$act = isset($_GET['act']) ? $_GET['act'] : '';
function getAllData($db)
{
    $collection = $db->News;
    // Memilih koleksi news 
    return $collection->find()->toArray();
    // Mengambil semua data dalam bentuk array 
}

// Memproses form untuk create, update, delete 
if ($act == 'create') {
    $judul = $_POST['Judul'];
    $ringkasan = $_POST['Ringkasan'];
    $konten = $_POST['Konten'];
    $penulis = $_POST['Penulis'];
    $kategori = $_POST['Kategori'];
    $file_dir = '../img/';
    $img = $_FILES['img'];
    $file_name = str_replace(' ', '_', basename($img['name']));
    $target_file = $file_dir . basename($file_name);
    $file_dir = '../img/';
    $img = $_FILES['img'];
    $file_name = str_replace(' ', '_', basename($img['name']));
    $target_file = $file_dir . basename($file_name);
    $dibuat = new MongoDB\BSON\UTCDateTime(strtotime($_POST['Dibuat']) * 1000);
    $diperbarui = new MongoDB\BSON\UTCDateTime(strtotime($_POST['Diperbarui']) * 1000);

    // Menambahkan data ke koleksi termasuk views yang diinisialisasi dengan 0
    if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
        $collection->insertOne([
            'Judul' => $judul,
            'Ringkasan' => $ringkasan,
            'Konten' => $konten,
            'Penulis' => $penulis,
            'Kategori' => $kategori,
            'img' => 'img/' . $file_name,
            'Dibuat' => $dibuat,
            'Diperbarui' => $diperbarui,
            'views' => 0  // Kolom Views yang diinisialisasi dengan 0
        ]);
        echo "Data berhasil disimpan";

        header('Location: ../index.php?pages=admin');
    }
} elseif ($act == 'update') {
    $id = $_GET['id'];
    $data = [
        'Judul' => $_POST['Judul'],
        'Ringkasan' => $_POST['Ringkasan'],
        'Konten' => $_POST['Konten'],
        'Penulis' => $_POST['Penulis'],
        'Kategori' => $_POST['Kategori'],
        'Dibuat' => new MongoDB\BSON\UTCDateTime(strtotime($_POST['Dibuat']) * 1000),
        'Diperbarui' => new MongoDB\BSON\UTCDateTime(strtotime($_POST['Diperbarui']) * 1000),
    ];
    try {
        updateData($id, $data);
        header('Location: ../index.php?pages=admin');
    } catch (Exception $e) {
        error_log("Update failed: " . $e->getMessage());
    }
} elseif (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $db->News->deleteOne(['_id' => new MongoDB\BSON\ObjectID($id)]);
    // Menghapus data dari koleksi 
} elseif (isset($_POST['act']) && $_POST['act'] == 'comment') {
    addComment($db, $_POST['id_news'], $_POST['username'], $_POST['comment']);
}

function updateData($id, $data)
{
    global $collection;
    try {
        if (empty($id) || !preg_match('/^[a-f\d]{24}$/i', $id)) {
            throw new Exception("Invalid ObjectId: " . $id);
        }
        $objectId = new MongoDB\BSON\ObjectId($id);
        $collection->updateOne(['_id' => $objectId], ['$set' => $data]);
    } catch (Exception $e) {
        error_log("Error updating data: " . $e->getMessage());
    }
}

function getMessage()
{
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
$breakingNews = getBreakingNews($db);
$trandingData = getTrandingData($db);
$latestData = getLatestData($db);

if (!empty($keyword)) {
    // Pencarian berdasarkan keyword 
    $allData = searchNewsByKeyword($db, $keyword);
} else if ($selectedCategory == 'View All') {
    $allData = getAllData($db);
} else {
    $allData = getNewsByCategory($db, $selectedCategory);
}

// function getLatestData($db)
// {
//     $collection = $db->News;
//     $newestData = $collection->find()->sort(['Dibuat' => -1])->toArray();
//     return $newestData;
// }

// Fetch comments by news ID
function getCommentsByNewsId($db, $newsId)
{
    $collection = $db->Comments;
    return $collection->find(['id_news' => $newsId])->toArray();
}

// Add a new comment
function addComment($db, $newsId, $userId, $comment)
{
    $username = $_SESSION['username'];
    $newsId = $_GET['newsId'];
    $comment = $_POST['comment'];
    $collection = $db->Comments;
    $result = $collection->insertOne([
        'name' => $username,
        'id_news' => $newsId,
        'comment' => $comment,
        'created_at' => new MongoDB\BSON\UTCDateTime()
    ]);
    return $result->getInsertedId();
}

if (isset($_POST['act']) && $_POST['act'] == 'comment') {
    include_once('../lib/connection.php');
    $newsId = $_POST['id_news'];
    $username = $_POST['username'];
    $comment = $_POST['comment'];

    try {
        $commentId = addComment($db, $newsId, $username, $comment);

        header('Location: ' . $_SERVER['PHP_SELF'] . '?id=' . $newsId);
    } catch (Exception $e) {
        $response = [
            'success' => false,
            'message' => $e->getMessage()
        ];
    }

    exit();
}


function getBreakingNews($db)
{
    $collection = $db->News;
    $breakingNews = $collection->find(['Kategori' => 'Breaking News'])->toArray();
    return $breakingNews;
}

function getTrandingData($db)
{
    $collection = $db->News;
    $sort = ['sort' => ['views' => -1]];
    $trandingData = $collection->find([], $sort)->toArray();
    return $trandingData;
}

function getLatestData($db)
{
    $collection = $db->News;
    $sort = ['sort' => ['Dibuat' => -1]];
    $trandingData = $collection->find([], $sort)->toArray();
    return $trandingData;
}
?>