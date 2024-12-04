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
</head>

<body>
    <!-- Navbar Start -->
    <?php include 'Layouts/headerAdmin.php'; ?>
    <!-- Navbar End -->


    <!-- Data Table Start -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Data Table</h4>
                    </div>
                    <div class="card-body"> <button class="btn btn-primary mb-3" data-toggle="modal"
                            data-target="#createModal">Add New Data</button>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Column 1</th>
                                    <th>Column 2</th>
                                    <th>Column 3</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody> <?php foreach ($allData as $data) { ?>
                                    <tr>
                                        <td><?php echo $data['_id']; ?></td>
                                        <td><?php echo $data['column1']; ?></td>
                                        <td><?php echo $data['column2']; ?></td>
                                        <td><?php echo $data['column3']; ?></td>
                                        <td> <button type="button" class="btn btn-warning btn-sm"
                                                onclick="populateUpdateForm('<?php echo $data['_id']; ?>', '<?php echo $data['column1']; ?>', '<?php echo $data['column2']; ?>', '<?php echo $data['column3']; ?>')"
                                                data-toggle="modal" data-target="#updateModal">Edit</button>
                                            <form method="post" style="display:inline-block;"> <input type="hidden"
                                                    name="id" value="<?php echo $data['_id']; ?>"> <button type="submit"
                                                    name="delete" class="btn btn-danger btn-sm">Delete</button> </form>
                                        </td>
                                    </tr> <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Data Table End --><!-- Form untuk Create Data -->
    <!-- Create Modal Start -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Add New Data</h5> <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group"> <label for="column1">Column 1</label> <input type="text"
                                class="form-control" id="column1" name="column1" required> </div>
                        <div class="form-group"> <label for="column2">Column 2</label> <input type="text"
                                class="form-control" id="column2" name="column2" required> </div>
                        <div class="form-group"> <label for="column3">Column 3</label> <input type="text"
                                class="form-control" id="column3" name="column3" required> </div> <button type="submit"
                            name="create" class="btn btn-primary">Add New Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- Create Modal End --> <!-- Update Modal Start -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Data</h5> <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="updateForm"> <input type="hidden" id="updateId" name="id">
                        <div class="form-group"> <label for="updateColumn1">Column 1</label> <input type="text"
                                class="form-control" id="updateColumn1" name="column1" required> </div>
                        <div class="form-group"> <label for="updateColumn2">Column 2</label> <input type="text"
                                class="form-control" id="updateColumn2" name="column2" required> </div>
                        <div class="form-group"> <label for="updateColumn3">Column 3</label> <input type="text"
                                class="form-control" id="updateColumn3" name="column3" required> </div> <button
                            type="submit" name="update" class="btn btn-primary">Update Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- Update Modal End -->
    </div>
    </div>
    </div>
    </div>
    </div> <!-- Data Table End -->
    <!-- Contact End -->

    <!-- Footer Start -->
    <?php include 'Layouts/footer.php'; ?>
    <!-- Footer End -->


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