<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Jenis Pemeriksaan</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="/home">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Jenis Pemeriksaan</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Jenis Pemeriksaan</div>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#add-data">
                                    Tambah Jenis Pemeriksaan
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        if (session()->getFlashdata('pesan')) {
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <h5><i class="icon fas fa-check"></i> ';
                            echo session()->getFlashdata('pesan');
                            echo '</h5></div>';
                        }
                        ?>

                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Nama Pemeriksaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot class="text-center">
                                    <th>No.</th>
                                    <th>Nama Pemeriksaan</th>
                                    <th>Aksi</th>
                                </tfoot>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($jenis as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $value['nama_pemeriksaan'] ?></td>
                                            <td class="text-center">
                                                <button class="btn btn-icon btn-round btn-success" data-bs-toggle="modal" data-bs-target="#edit-data<?= $value['id_jenis_pemeriksaan'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-round btn-danger" data-bs-toggle="modal" data-bs-target="#delete-data<?= $value['id_jenis_pemeriksaan'] ?>">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Data -->
<div class="modal fade" id="add-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">Add Data <?= $subjudul ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('Jenispemeriksaan/InsertData') ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Pemeriksaan</label>
                        <input name="nama_pemeriksaan" class="form-control" placeholder="Nama Pemeriksaan" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- Modal Edit Data -->
<?php foreach ($jenis as $key => $value) { ?>
<div class="modal fade" id="edit-data<?= $value['id_jenis_pemeriksaan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">Edit Data <?= $subjudul ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('Jenispemeriksaan/UpdateData/' . $value['id_jenis_pemeriksaan']) ?>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Nama Pemeriksaan</label>
                        <input name="nama_pemeriksaan" class="form-control" value="<?= $value['nama_pemeriksaan'] ?>" placeholder="Nama Pemeriksaan" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>
<?php } ?>

<!-- Modal Delete Data -->
<?php foreach ($jenis as $key => $value) { ?>
<div class="modal fade" id="delete-data<?= $value['id_jenis_pemeriksaan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">Delete Data <?= $subjudul ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    Apakah Anda Yakin Hapus <b><?= $value['nama_pemeriksaan'] ?></b> ..?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <a href="<?= base_url('Jenispemeriksaan/DeleteData/' . $value['id_jenis_pemeriksaan']) ?>" class="btn btn-danger">Delete</a>
                </div>
        </div>
    </div>
</div>
<?php } ?>