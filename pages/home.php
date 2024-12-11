<?php include 'lib/crud.php'; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-7 px-0">
            <div class="owl-carousel main-carousel position-relative">
                <?php 
                for ($i = 0; $i < 3; $i++) { ?>
                    <div class="position-relative overflow-hidden" style="height: 500px;">
                        <img class="img-fluid h-100" src="<?php echo $allData[$i]['img']; ?>" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href=""><?php echo $allData[$i]['Kategori']; ?></a>
                                <a class="text-white" href=""><?php echo $allData[$i]['Dibuat']->toDateTime()->format('Y-m-d H:i:s'); ?></a>
                            </div>
                            <a class="h2 m-0 text-white text-uppercase font-weight-bold" href=""><?php echo $allData[$i]['Judul']; ?></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-lg-5 px-0">
            <div class="row mx-0">
                <div class="col-md-6 px-0">
                    <?php 
                    for ($i = 0; $i < 4; $i++) { ?>
                        <div class="position-relative overflow-hidden" style="height: 250px;">
                            <img class="img-fluid h-100" src="<?php echo $allData[$i]['img']; ?>" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-2">
                                    <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href=""><?php echo $allData[$i]['Kategori']; ?></a>
                                    <a class="text-white" href=""><?php echo $allData[$i]['Dibuat']->toDateTime()->format('Y-m-d H:i:s'); ?></a>
                                </div>
                                <a class="h2 m-0 text-white text-uppercase font-weight-bold" href=""><?php echo $allData[$i]['Judul']; ?></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured News Start -->
    <div class="container-fluid pt-5 mb-3">
        <div class="container">
            <div class="section-title">
                <h4 class="m-0 text-uppercase font-weight-bold">Featured News <?php echo $keyword; ?></h4>
            </div>
            <div class="owl-carousel news-carousel carousel-item-4 position-relative">
                <?php 
                for ($i = 0; $i < 1; $i++) { ?>
                    <div class="position-relative overflow-hidden" style="height: 300px;">
                        <img class="img-fluid h-100" src="<?php echo $allData[$i]['img']; ?>" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-2">
                                <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href=""><?php echo $allData[$i]['Kategori']; ?></a>
                                <a class="text-white" href=""><?php echo $allData[$i]['Dibuat']->toDateTime()->format('Y-m-d H:i:s'); ?></a>
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
                                <h4 class="m-0 text-uppercase font-weight-bold">Latest News <?php echo $keyword; ?></h4>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="" data-toggle="modal" data-target="#categoryModal">View All</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php 
                            for ($i = 0; $i < 4; $i++) { ?>
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="<?php echo $allData[$i]['img']; ?>" style="object-fit: cover;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2" href="">Business <?php echo $keyword; ?></a>
                                            <a class="text-body" href=""><?php echo $allData[$i]['Dibuat']->toDateTime()->format('Y-m-d H:i:s'); ?><small></small></a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold" href=""><?php echo $allData[$i]['Kategori']; ?></a>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="img-fluid h-100" src="<?php echo $allData[$i]['img']; ?>" style="object-fit: cover;">
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Popular News Start -->
                    <div class="mb-3">
                        <div class="section-title mb-0">
                            <h4 class="m-0 text-uppercase font-weight-bold">Trending News</h4>
                        </div>
                        <div class="bg-white border border-top-0 p-3">
                            <?php 
                            for ($i = 0; $i < 4; $i++) { ?>
                                <div class="d-flex align-items-center bg-white mb-3" style="height: 110px;">
                                    <img class="img-fluid" src="<?php echo $allData[$i]['img']; ?>" alt="">
                                    <div class="w-100 h-100 px-3 d-flex flex-column justify-content-center border border-left-0">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-1 mr-2" href="">Business <?php echo $keyword; ?></a>
                                            <a class="text-body" href="<?php echo $allData[$i]['Dibuat']->toDateTime()->format('Y-m-d H:i:s'); ?>"></a>
                                        </div>
                                        <a class="h6 m-0 text-secondary text-uppercase font-weight-bold" href=""><?php echo $allData[$i]['Kategori']; ?></a>
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
    <!-- News With Sidebar End -->
</div>

<script>
    function removeKeywordFilter() {
        const url = new URL(window.location.href);
        url.searchParams.delete('keyword');
        window.location.href = url.toString();
    }
</script>
