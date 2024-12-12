<?php
include "lib/crud.php"
    ?>
<!-- Data Table Start -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="col-12">
                <div class="section-title">
                    <h4 class="m-0 text-uppercase font-weight-bold"> Category: <?php echo $selectedCategory; ?>
                    </h4>
                    <a class="text-secondary font-weight-medium text-decoration-none" href="" data-toggle="modal"
                        data-target="#categoryModal">View All</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Data Table</h4>
                </div>
                <div class="card-body"> <button class="btn btn-primary mb-3" data-toggle="modal"
                        data-target="#form-data">Add New Data</button>
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
                                            data-id="<?php $row = $data ?>" data-toggle="modal"
                                            data-target="#form-data">Edit</button>
                                        <form method="post" style="display:inline-block;"> <input type="hidden" name="id"
                                                value="<?php echo $data['_id']; ?>"> <button type="submit" name="delete"
                                                class="btn btn-danger btn-sm">Delete</button> </form>
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

<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Select Category</h5> <button type="button" class="close"
                    data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" action="adminIndex.php"> <input type="hidden">
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

<!-- Form untuk Create Data -->
<!-- Create Modal Start -->
<div class="modal fade" id="form-data" tabindex="-1" role="dialog" aria-labelledby="form-dataLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="form-dataLabel">Add New Data</h5> <button type="button" class="close"
                    data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group"> <label for="Judul">Judul</label> <input type="text" class="form-control"
                            id="Judul" name="Judul" required> </div>
                    <div class="form-group"> <label for="Ringkasan">Ringkasan</label> <input type="text"
                            class="form-control" id="Ringkasan" name="Ringkasan" required> </div>
                    <div class="form-group"> <label for="Konten">Konten</label> <textarea class="form-control"
                            id="Konten" name="Konten" required></textarea> </div>
                    <div class="form-group"> <label for="Penulis">Penulis</label> <input type="text"
                            class="form-control" id="Penulis" name="Penulis" required> </div>
                    <div class="form-group"> <label for="Kategori">Kategori</label> <input type="text"
                            class="form-control" id="Kategori" name="Kategori" required> </div>
                    <div class="form-group"> <label for="Gambar">Image</label><input type="file" class="form-control"
                            id="Gambar" name="Gambar" required></div>
                    <div class="form-group"> <label for="Dibuat">Dibuat</label> <input type="datetime-local"
                            class="form-control" id="Dibuat" name="Dibuat" required> </div>
                    <div class="form-group"> <label for="Diperbarui">Diperbarui</label> <input type="datetime-local"
                            class="form-control" id="Diperbarui" name="Diperbarui" required> </div>
                    <button type="submit" name="create" class="btn btn-primary">Add New Data</button>
                </form>
            </div>
        </div>
    </div>
</div> <!-- Create Modal End -->