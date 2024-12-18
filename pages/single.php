<?php
$id = $_GET['id'];
$collection = $db->News;

// Increment jumlah views
$collection->updateOne(
    ['_id' => new MongoDB\BSON\ObjectID($id)], // Cari berita berdasarkan ID
    ['$inc' => ['views' => 1]] // Tambahkan nilai views sebesar 1
);

$comments = getCommentsByNewsId($db, $id);

// Ambil data berita setelah increment
$data = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($id)]);
?>
<!-- Breaking News Start -->
<div class="container-fluid mt-5 mb-3 pt-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div class="section-title border-right-0 mb-0" style="width: 180px;">
                        <h4 class="m-0 text-uppercase font-weight-bold">Tranding</h4>
                    </div>
                    <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center bg-white border border-left-0"
                        style="width: calc(100% - 180px); padding-right: 100px;">
                        <?php for ($i = 0; $i < 2; $i++) { ?>
                            <div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold"
                                    href=""><?php echo $trandingData[$i]['Judul']; ?></a></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breaking News End -->


<!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- News Detail Start -->
                <div class="position-relative mb-3">
                    <img class="img-fluid w-100" src="<?php echo $data['img']; ?>" style="object-fit: cover;">
                    <div class="bg-white border border-top-0 p-4">
                        <div class="mb-3">
                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                href=""><?php echo $data['Kategori']; ?></a>
                            <a class="text-body"
                                href=""><?php echo $data['Dibuat']->toDateTime()->format('Y-m-d H:i:s'); ?></a>
                        </div>
                        <h1 class="mb-3 text-secondary text-uppercase font-weight-bold"> <?php echo $data['Judul']; ?>
                        </h1>
                        <p> <?php echo $data['Konten']; ?> </p>
                    </div>
                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                            <span><?php echo $data['Penulis']; ?></span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="ml-3"><i class="far fa-eye mr-2"></i><?php echo $data['views']; ?></span>
                            <span class="ml-3"><i class="far fa-comment mr-2"></i><?php echo count($comments); ?></span>
                        </div>
                    </div>
                </div>
                <!-- News Detail End -->

                <!-- Comment List Start -->
                <div class="position-relative mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold"><?php echo count($comments); ?> Comments</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4">
                        <?php foreach ($comments as $comment): ?>
                            <div class="media mb-4">
                                <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                <div class="media-body">
                                    <h6><a class="text-secondary font-weight-bold"
                                            href="#"><?php echo $comment['name']; ?></a></h6>
                                    <p><?php echo $comment['comment']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Comment List End -->

                <!-- Comment Form Start -->
                <div class="position-relative mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Leave a comment</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4">
                            <form id="commentForm" action="action/crud.php?act=comment&newsId=<?php echo $id; ?>"
                                method="POST"> <input type="hidden" name="id_news" value="<?php echo $id; ?>">
                                <div class="form-group"> <label for="comment">Message *</label> <textarea id="comment"
                                        name="comment" cols="30" rows="5" class="form-control"></textarea> </div>
                                <div class="form-group mb-0"> <button type="submit" id="submitComment"
                                        class="btn btn-primary font-weight-semi-bold py-2 px-3">Leave a comment</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>