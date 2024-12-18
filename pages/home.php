<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7 px-0">
            <div class="owl-carousel main-carousel position-relative">
                <?php
                for ($i = 0; $i < 3; $i++) { ?>
                    <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src=<?php echo $allData[$i]['img']; ?> style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="index.php?pages=discovery&Kategori=<?php echo $allData[$i]['Kategori']; ?>"><?php echo $allData[$i]['Kategori']; ?></a>
                                <a class="text-white"
                                    href=""><?php echo $allData[$i]['Dibuat']->toDateTime()->format('Y-m-d H:i:s'); ?></a>
                            </div>
                            <a class="h2 m-0 text-white text-uppercase font-weight-bold"
                                href="index.php?pages=single&id=<?php echo $allData[$i]['_id']; ?>"><?php echo $allData[$i]['Judul']; ?></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-lg-5 px-0">
            <div class="row mx-0">
                <?php 
                for ($i = 3; $i < 7; $i++) { ?>
                <div class="col-md-6 px-0">
                    <div class="position-relative overflow-hidden" style="height: 250px;">
                        <img class="img-fluid w-100 h-100" src="<?php echo $allData[$i]['img']; ?>" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                    href="index.php?pages=discovery&Kategori=<?php echo $allData[$i]['Kategori']; ?>"><?php echo $allData[$i]['Kategori']; ?></a>
                                <a class="text-white" href=""><small><?php echo $allData[$i]['Dibuat']->toDateTime()->format('Y-m-d H:i:s'); ?></small></a>
                            </div>
                            <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href="index.php?pages=single&id=<?php echo $allData[$i]['_id']; ?>"><?php echo $allData[$i]['Judul']; ?></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- Main News Slider End -->

<!-- Breaking News Start -->
<div class="container-fluid bg-dark py-3 mb-3">
    <div class="container">
        <div class="row align-items-center bg-dark">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div class="bg-primary text-dark text-center font-weight-medium py-2" style="width: 170px;">Breaking
                        News</div>
                    <div class="owl-carousel tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                        style="width: calc(100% - 170px); padding-right: 110px;">
                        <?php for ($i = 0; $i < 2; $i++) { ?>
                        <div class="text-truncate"><a class="text-white text-uppercase font-weight-semi-bold"
                                href="index.php?pages=single&id=<?php echo $breakingNews[$i]['_id']; ?>"><?php echo $breakingNews[$i]['Judul']; ?></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breaking News End -->


<!-- Featured News Slider Start -->
<div class="container-fluid pt-5 mb-3">
    <div class="container">
        <div class="section-title">
            <h4 class="m-0 text-uppercase font-weight-bold">Featured News</h4>
        </div>
        <div class="owl-carousel news-carousel carousel-item-4 position-relative">
            <?php 
            for ($i = 0; $i < 5; $i++) { ?>
            <div class="position-relative overflow-hidden" style="height: 300px;">
                <img class="img-fluid h-100" src="<?php echo $allData[$i]['img']; ?>" style="object-fit: cover;">
                <div class="overlay">
                    <div class="mb-2">
                        <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                            href="index.php?pages=discovery&Kategori='<?php echo $allData[$i]['Kategori']; ?>'""><?php echo $allData[$i]['Kategori']; ?></a>
                        <a class="text-white" href=""><small><?php echo $allData[$i]['Dibuat']->toDateTime()->format('Y-m-d H:i:s'); ?></small></a>
                    </div>
                    <a class="h6 m-0 text-white text-uppercase font-weight-semi-bold" href=""><?php echo $allData[$i]['Judul']; ?></a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Featured News Slider End -->


<!-- News With Sidebar Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold">Latest News</h4>
                        </div>
                    </div>
                    <?php for ($i = 0; $i < 4; $i++) { ?>
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="<?php echo $latestData[$i]['img']; ?>" style="object-fit: cover;">
                            <div class="bg-white border border-top-0 p-4">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                        href="index.php?pages=discovery&Kategori=<?php echo $latestData[$i]['Kategori']; ?>"><?php $latestData[$i]['Kategori']; ?></a>
                                    <a class="text-body" href=""><small><?php $latestData[$i]['Dibuat']->toDateTime()->format('Y-m-d H:i:s'); ?></small></a>
                                </div>
                                <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href=""><?php echo $latestData[$i]['Judul']; ?></a>
                                <p class="m-0"><?php echo $latestData[$i]['Ringkasan']; ?></p>
                            </div>
                            <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25" alt="">
                                    <small><?php echo $latestData[$i]['Penulis']; ?></small>
                                </div>
                                <div class="d-flex align-items-center">
                                    <small class="ml-3"><i class="far fa-eye mr-2"></i><?php echo $latestData[$i]['views']; ?></small>
                                    <small class="ml-3"><i class="far fa-comment mr-2"></i><?php  echo 0;?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-lg-12 mb-3">
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Popular News Start -->
                <div class="mb-3">
                    <div class="section-title mb-0">
                        <h4 class="m-0 text-uppercase font-weight-bold">Tranding News</h4>
                    </div>
                    <div class="bg-white border border-top-0 p-3">
                        <?php for ($i = 0; $i < 6; $i++) { ?>
                        <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                            <img class="img-fluid" style="height: 110px; width: 110px;" src=<?php echo $trandingData[$i]['img']; ?> alt="">
                            <div
                                class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2"
                                        href="index.php?pages=discovery&Kategori=<?php echo $trandingData[$i]['Kategori'];?>"><?php echo $trandingData[$i]['Kategori']; ?></a>
                                    <a class="text-body" href=""><small><?php echo $trandingData[$i]['Dibuat']->toDateTime()->format('Y-m-d'); ?></small></a>
                                </div>
                                <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href=""><?php if(strlen($trandingData[$i]['Judul']) > 50) echo substr($trandingData[$i]['Judul'], 0, 50) . '...'; else echo $trandingData[$i]['Judul']; ?></a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- Popular News End -->
            </div>
        </div>
    </div>
</div>