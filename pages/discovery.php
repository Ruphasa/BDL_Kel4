<?php include 'lib/crud.php'; ?>
<!-- News With Sidebar Start -->
<div class="container-fluid mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h4 class="m-0 text-uppercase font-weight-bold"> Category: <?php echo $selectedCategory; ?>
                            </h4>
                            <a class="text-secondary font-weight-medium text-decoration-none" href=""
                                data-toggle="modal" data-target="#categoryModal">View All</a>
                        </div>
                    </div>
                    <?php if (!empty($keyword)) { ?>
                        <div class="col-12">
                            <div class="section-title">
                                <h4 class="m-0 text-uppercase font-weight-bold">Search Results for:
                                    "<?php echo $keyword; ?>"</h4>
                                <button class="btn btn-danger btn-sm ml-3" onclick="removeKeywordFilter()">×</button>
                            </div>
                        <?php } ?>
                        <?php foreach ($allData as $data) { ?>
                            <div class="col-lg-4">
                                <div class="position-relative mb-3">
                                    <img class="img-fluid w-100" src="img/news-700x435-1.jpg" style="object-fit: cover;">
                                    <div class="bg-white border border-top-0 p-4">
                                        <div class="mb-2">
                                            <a class="badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2"
                                                href=""><?php echo $data['Kategori']; ?></a>
                                            <a class="text-body"
                                                href=""><small><?php echo $data['Dibuat']->toDateTime()->format('Y-m-d H:i:s'); ?></small></a>
                                        </div>
                                        <a class="h4 d-block mb-3 text-secondary text-uppercase font-weight-bold"
                                            href="index.php?pages=single&id=<?php echo $data['_id']; ?>"><?php echo $data['Judul']; ?></a>
                                        <p class="m-0"><?php echo $data['Ringkasan']; ?></p>
                                    </div>
                                    <div class="d-flex justify-content-between bg-white border border-top-0 p-4">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle mr-2" src="img/user.jpg" width="25" height="25"
                                                alt="">
                                            <small><?php echo $data['Penulis']; ?></small>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <small class="ml-3"><i class="far fa-eye mr-2"></i>12345</small>
                                            <small class="ml-3"><i class="far fa-comment mr-2"></i>123</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- Tags End -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Modal Start -->
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Select Category</h5> <button type="button"
                        class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="get" action="index.php"> <input type="hidden" name="pages" value="discovery">
                        <div class="form-group"> <label for="Kategori">Category</label> <select class="form-control"
                                id="Kategori" name="Kategori">
                                <option value="View All">View All</option> <?php foreach ($categories as $category) { ?>
                                    <option value="<?php echo $category; ?>"><?php echo $category; ?></option> <?php } ?>
                            </select> </div> <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script> function removeKeywordFilter() {
            const url = new URL(window.location.href);
            url.searchParams.delete('keyword');
            window.location.href = url.toString();
        } </script>
    <!-- Category Modal End -->
    <!-- News With Sidebar End -->