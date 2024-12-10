<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KELANEWS - Free News Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .content {
            flex: 1;
        }

        .footer {
            background: #111111;
            position: relative;
            bottom: 0;
            width: 100%;
            padding: 20px;
            text-align: center;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Topbar Start -->
        <?php include 'Layouts/header.php'; ?>
        <!-- Navbar End -->

        <!-- Content Start -->
        <div class="content">
            <?php 
            if (isset($_GET['pages']) && $_GET['pages'] == 'single') {
                include 'pages/single.php';
            } else if (isset($_GET['pages']) && $_GET['pages'] == 'discovery') {
                include 'pages/discovery.php';
            } else {
                include 'pages/home.php';
            }
            ?>
        </div>
        <!-- Content End -->

        <!-- Footer Start -->
        <div class="footer">
            <p class="m-0 text-center">&copy; <a href="#">KELANEWS</a>. All Rights Reserved.
                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https:///credit-removal". Thank you for your support. ***/-->
                Design by <a href="https://">Kelompok 4</a>
            </p>
        </div>
        <!-- Footer End -->
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-square back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
