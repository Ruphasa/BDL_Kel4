<?php
include 'lib/crud.php';
$id = $_GET['id'];
$collection = $db->News;

// Increment jumlah views
$collection->updateOne(
    ['_id' => new MongoDB\BSON\ObjectID($id)], // Cari berita berdasarkan ID
    ['$inc' => ['views' => 1]] // Tambahkan nilai views sebesar 1
);

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
                        <div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold"
                                href="">Lorem ipsum dolor sit amet elit. Proin interdum lacus eget ante tincidunt, sed
                                faucibus nisl sodales</a></div>
                        <div class="text-truncate"><a class="text-secondary text-uppercase font-weight-semi-bold"
                                href="">Lorem ipsum dolor sit amet elit. Proin interdum lacus eget ante tincidunt, sed
                                faucibus nisl sodales</a></div>
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
                    <img class="img-fluid w-100" src="img/news-700x435-1.jpg" style="object-fit: cover;">
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
                            <span class="ml-3"><i class="far fa-comment mr-2"></i>123</span>
                        </div>
                    </div>
                </div>
                <!-- News Detail End -->

                <!-- Comment List Start -->
                <div class="position-relative mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">3 Comments</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4">
                        <div class="media mb-4">
                            <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6><a class="text-secondary font-weight-bold" href="">John Doe</a> <small><i>01 Jan 2045</i></small>
                                </h6>
                                <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                <button class="btn btn-sm btn-outline-secondary">Reply</button>
                            </div>
                        </div>
                        <div class="media">
                            <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                            <div class="media-body">
                                <h6><a class="text-secondary font-weight-bold" href="">John Doe</a> <small><i>01 Jan 2045</i></small>
                                </h6>
                                <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore
                                    accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                                <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                <div class="media mt-4">
                                    <img src="img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                    <div class="media-body">
                                        <h6><a class="text-secondary font-weight-bold" href="">John Doe</a> <small><i>01 Jan
                                                    2045</i></small></h6>
                                        <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor
                                            labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed
                                            eirmod ipsum.</p>
                                        <button class="btn btn-sm btn-outline-secondary">Reply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Comment List End -->

                <!-- Comment Form Start -->
                <div class="position-relative mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Leave a comment</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-4">
                        <form>
                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Leave a comment" class="btn btn-primary font-weight-semi-bold py-2 px-3">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Comment Form End -->

            </div>
        </div>
    </div>
</div>
