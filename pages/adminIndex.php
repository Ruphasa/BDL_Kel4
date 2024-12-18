<!-- Data Table Start -->
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="col-12">
                <div class="section-title">
                    <h4 class="m-0 text-uppercase font-weight-bold">Category: <?php echo $selectedCategory; ?></h4>
                    <a class="text-secondary font-weight-medium text-decoration-none" href="#" data-toggle="modal"
                        data-target="#categoryModal">View All</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Data Table</h4>
                </div>
                <div class="card-body">
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#form-data-create"
                        onclick="createData()">Add New Data</button>
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
                        <tbody>
                            <?php $count = 1;
                            foreach ($allData as $data) { ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $data['Judul']; ?></td>
                                    <td><?php echo $data['Ringkasan']; ?></td>
                                    <td><?php echo $data['Dibuat']->toDateTime()->format('Y-m-d H:i:s'); ?></td>
                                    <td><?php echo $data['Diperbarui']->toDateTime()->format('Y-m-d H:i:s'); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm"
                                            data-id="<?php echo $data['_id']; ?>" data-Judul="<?php echo $data['Judul']; ?>"
                                            data-Ringkasan="<?php echo $data['Ringkasan']; ?>"
                                            data-Konten="<?php echo $data['Konten']; ?>"
                                            data-Penulis="<?php echo $data['Penulis']; ?>"
                                            data-Kategori="<?php echo $data['Kategori']; ?>"
                                            data-Dibuat="<?php echo $data['Dibuat']->toDateTime()->format('Y-m-d H:i:s'); ?>"
                                            data-Diperbarui="<?php echo date('Y-m-d H:i:s'); ?>" data-toggle="modal"
                                            data-target="#form-data-create" onclick="editData(this)">Edit</button>
                                        <form method="post" style="display:inline-block;">
                                            <input type="hidden" name="id" value="<?php echo $data['_id']; ?>">
                                            <button type="submit" name="delete"
                                                class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $count++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Data Table End -->

<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Select Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" action="index.php">
                    <input type="hidden" name="pages" value="admin">
                    <div class="form-group">
                        <label for="Kategori">Category</label>
                        <select class="form-control" id="Kategori" name="Kategori">
                            <option value="View All">View All</option>
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Create Modal Start -->
<div class="modal fade" id="form-data-create" tabindex="-1" role="dialog" aria-labelledby="form-dataLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="form-dataLabel">Form Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-data" method="post" action="action/crud.php?act=create" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Judul">Judul</label>
                        <input type="text" class="form-control" id="Judul" name="Judul" required>
                    </div>
                    <div class="form-group">
                        <label for="Ringkasan">Ringkasan</label>
                        <input type="text" class="form-control" id="Ringkasan" name="Ringkasan" required>
                    </div>
                    <div class="form-group">
                        <label for="Konten">Konten</label>
                        <textarea class="form-control" id="Konten" name="Konten" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Penulis">Penulis</label>
                        <input type="text" class="form-control" id="Penulis" name="Penulis" required>
                    </div>
                    <div class="form-group">
                        <label for="Kategori">Kategori</label>
                        <input type="text" class="form-control" id="Kategori" name="Kategori" required>
                    </div>
                    <div class="form-group">
                        <label for="img">Image</label>
                        <input type="file" class="form-control" id="img" name="img" required>
                    </div>
                    <div class="form-group">
                        <label for="Dibuat">Dibuat</label>
                        <input type="datetime-local" class="form-control" id="Dibuat" name="Dibuat" required>
                    </div>
                    <div class="form-group">
                        <label for="Diperbarui">Diperbarui</label>
                        <input type="datetime-local" class="form-control" id="Diperbarui" name="Diperbarui" required>
                    </div>
                    <button type="submit" name="create" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function editData(data) {
        console.log("Edit Data function called");

        var form = document.getElementById('form-data');
        if (form) {
            console.log("Form found:", form);

            // Populate form fields with data attributes
            document.getElementById('Judul').value = data.getAttribute('data-Judul');
            document.getElementById('Ringkasan').value = data.getAttribute('data-Ringkasan');
            document.getElementById('Konten').value = data.getAttribute('data-Konten');
            document.getElementById('Penulis').value = data.getAttribute('data-Penulis');
            document.getElementById('Kategori').value = data.getAttribute('data-Kategori');
            document.getElementById('Dibuat').value = data.getAttribute('data-Dibuat');
            document.getElementById('Diperbarui').value = data.getAttribute('data-Diperbarui');

            // Set form action attribute for update
            form.setAttribute('action', 'action/crud.php?act=update&id=' + data.getAttribute('data-id'));
            document.getElementById('form-submit-button').textContent = 'Update';
            console.log("Action set to:", form.getAttribute('action'));
        } else {
            console.error("Form not found or incorrect element type");
        }
    }

    function createData() {
        var form = document.getElementById('form-data');
        if (form) {
            console.log("Create Data function called");
            form.reset();

            // Set form action attribute for create
            form.setAttribute('action', 'action/crud.php?act=create');
            document.getElementById('form-submit-button').textContent = 'Create';
            console.log("Action set to:", form.getAttribute('action'));
        } else {
            console.error("Form not found or incorrect element type");
        }
    }

</script>