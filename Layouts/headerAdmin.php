<div class="container-fluid d-none d-lg-block">
    <div class="row align-items-center bg-dark px-lg-5">
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-sm bg-dark p-0">
                <ul class="navbar-nav ml-n2">
                    <li class="nav-item border-right border-secondary">
                        <a class="nav-link text-body small" href="#"><?php echo date('l, d F Y');?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-body small" href="index.php">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="row align-items-center bg-white py-3 px-lg-5">
        <div class="col-lg-4">
            <a href="index.html" class="navbar-brand p-0 d-none d-lg-block">
                <h1 class="m-0 display-4 text-uppercase text-primary">KELA<span
                        class="text-secondary font-weight-normal">News</span></h1>
            </a>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-2 py-lg-0 px-lg-5">
        <a href="index.html" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-4 text-uppercase text-primary">KELA<span
                    class="text-white font-weight-normal">News</span></h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3 p-2" id="navbarCollapse">
            <div class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                <form method="GET" class="input-group ml-auto d-none d-lg-flex" style="width: 100%; max-width: 300px;">
                    <input type="hidden" name="pages" value="<?= isset($_GET['pages']) ? $_GET['pages'] : 'home'; ?>">
                    <input type="text" class="form-control border-0" name="keyword" placeholder="Keyword">
                    <div class="input-group-append"> <button
                            class="input-group-text bg-primary text-dark border-0 px-3"><i
                                class="fa fa-search"></i></button> </div>
                </form>
            </div>
        </div>
    </nav>
</div>