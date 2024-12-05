<?php
include "lib/crud.php"
    ?>

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
                                    <th>No.</th>
                                    <th>Judul</th>
                                    <th>Ringkasan</th>
                                    <th>Dibuat</th>
                                    <th>Diperbarui</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody> <?php
                            $count = 1;
                            foreach ($allData as $data) { ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $data['Judul']; ?></td>
                                        <td><?php echo $data['Ringkasan']; ?></td>
                                        <td><?php echo $data['Dibuat']->toDateTime()->format('Y-m-d H:i:s'); ?></td>
                                        <td><?php echo $data['Diperbarui']->toDateTime()->format('Y-m-d H:i:s'); ?></td>
                                        <td> <button type="button" class="btn btn-warning btn-sm"
                                                data-id="<?php $edit = $data ?>"
                                                data-toggle="modal" data-target="#updateModal">Edit</button>
                                            <form method="post" style="display:inline-block;"> <input type="hidden"
                                                    name="id" value="<?php echo $data['_id']; ?>"> <button type="submit"
                                                    name="delete" class="btn btn-danger btn-sm">Delete</button> </form>
                                        </td>
                                    </tr> <?php $count++;
                            }
                            $count = 1; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Data Table End -->

    <!-- Form untuk Create Data -->
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
                        <div class="form-group"> <label for="Judul">Judul</label> <input type="text"
                                class="form-control" id="Judul" name="Judul" required> </div>
                        <div class="form-group"> <label for="Ringkasan">Ringkasan</label> <input type="text"
                                class="form-control" id="Ringkasan" name="Ringkasan" required> </div>
                        <div class="form-group"> <label for="Konten">Konten</label> <textarea class="form-control"
                                id="Konten" name="Konten" required></textarea> </div>
                        <div class="form-group"> <label for="Penulis">Penulis</label> <input type="text"
                                class="form-control" id="Penulis" name="Penulis" required> </div>
                        <div class="form-group"> <label for="Kategori">Kategori</label> <input type="text"
                                class="form-control" id="Kategori" name="Kategori" required> </div>
                        <div class="form-group"> <label for="Dibuat">Dibuat</label> <input type="time"
                                class="form-control" id="Dibuat" name="Dibuat" required> </div>
                        <div class="form-group"> <label for="Diperbarui">Diperbarui</label> <input type="time"
                                class="form-control" id="Diperbarui" name="Diperbarui" required> </div>
                        <button type="submit" name="create" class="btn btn-primary">Add New Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- Create Modal End -->

    <!-- Update Modal Start -->
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
                        <div class="form-group"> <label for="updateJudul">Judul</label> <input type="text"
                                class="form-control" id="updateJudul" name="Judul" required><?php $edit['Judul'] ?>
                        </div>
                        <div class="form-group"> <label for="updateRingkasan">Ringkasan</label> <input type="text"
                                class="form-control" id="updateRingkasan" name="Ringkasan"
                                required><?php $edit['Ringkasan'] ?> </div>
                        <div class="form-group"> <label for="updateKonten">Konten</label> <textarea class="form-control"
                                id="updateKonten" name="Konten" required> <?php $edit['Konten'] ?></textarea> </div>
                        <div class="form-group"> <label for="updatePenulis">Penulis</label> <input type="text"
                                class="form-control" id="updatePenulis" name="Penulis"
                                required><?php $edit['Penulis'] ?> </div>
                        <div class="form-group"> <label for="updateKategori">Kategori</label> <input type="text"
                                class="form-control" id="updateKategori" name="Kategori" required>
                            <?php $edit['Kategori'] ?></div>
                        <div class="form-group"> <label for="updateDibuat">Dibuat</label> <input type="time"
                                class="form-control" id="updateDibuat" name="Dibuat" required>
                            <?php $edit['Dibuat']->toDateTime()->format('Y-m-d H:i:s') ?>
                        </div>
                        <div class="form-group"> <label for="updateDiperbarui">Diperbarui</label> <input type="time"
                                class="form-control" id="updateDiperbarui" name="Diperbarui"
                                required><?php $edit['Diperbarui']->toDateTime()->format('Y-m-d H:i:s') ?> </div>
                        <button type="submit" name="update" class="btn btn-primary">Update Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- Update Modal End -->


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