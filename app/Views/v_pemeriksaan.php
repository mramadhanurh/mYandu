<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Pemeriksaan</h3>
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
                    <a href="#">Pemeriksaan</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Pemeriksaan</div>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#add-data">
                                    Tambah Pemeriksaan
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
                                        <th>Anak</th>
                                        <th>Jadwal</th>
                                        <th>Petugas</th>
                                        <th>Tanggal Cek</th>
                                        <th>Catatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot class="text-center">
                                    <th>No.</th>
                                    <th>Anak</th>
                                    <th>Jadwal</th>
                                    <th>Petugas</th>
                                    <th>Tanggal Cek</th>
                                    <th>Catatan</th>
                                    <th>Aksi</th>
                                </tfoot>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pemeriksaan as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $value['nama_anak'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($value['tanggal'])) ?></td>
                                            <td><?= $value['nama_user'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($value['tanggal_cek'])) ?></td>
                                            <td><?= $value['catatan'] ?></td>
                                            <td class="text-center">
                                                <button class="btn btn-icon btn-round btn-success" data-bs-toggle="modal" data-bs-target="#edit-data<?= $value['id_pemeriksaan'] ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-icon btn-round btn-danger" data-bs-toggle="modal" data-bs-target="#delete-data<?= $value['id_pemeriksaan'] ?>">
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
            <?php echo form_open('Pemeriksaan/InsertData') ?>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Anak</label>
                        <select name="id_anak" class="form-control">
                            <option value="">--Pilih Anak--</option>
                            <?php foreach ($anak as $key => $value) { ?>
                                <option value="<?= $value['id_anak'] ?>"><?= $value['nama_anak'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Jadwal</label>
                        <select name="id_jadwal" class="form-control">
                            <option value="">--Pilih Jadwal--</option>
                            <?php foreach ($jadwal as $key => $value) { ?>
                                <option value="<?= $value['id_jadwal'] ?>"><?= $value['tanggal'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Petugas</label>
                        <select name="id_user" class="form-control">
                            <option value="">--Pilih Petugas--</option>
                            <?php foreach ($petugas as $key => $value) { ?>
                                <option value="<?= $value['id_user'] ?>"><?= $value['nama_user'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal Cek</label>
                        <input type="date" name="tanggal_cek" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Catatan</label>
                        <textarea name="catatan" class="form-control" placeholder="Catatan" cols="30" rows="5" required></textarea>
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
<?php foreach ($pemeriksaan as $key => $item) { ?>
<div class="modal fade" id="edit-data<?= $item['id_pemeriksaan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">Edit Data <?= $subjudul ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('Pemeriksaan/UpdateData/' . $item['id_pemeriksaan']) ?>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Anak</label>
                        <select name="id_anak" class="form-control">
                            <option value="">--Pilih Anak--</option>
                            <?php foreach ($anak as $a) { ?>
                                <option value="<?= $a['id_anak'] ?>" <?= $a['id_anak'] == $item['id_anak'] ? 'selected' : '' ?>>
                                    <?= $a['nama_anak'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Jadwal</label>
                        <select name="id_jadwal" class="form-control">
                            <option value="">--Pilih Jadwal--</option>
                            <?php foreach ($jadwal as $j) { ?>
                                <option value="<?= $j['id_jadwal'] ?>" <?= $j['id_jadwal'] == $item['id_jadwal'] ? 'selected' : '' ?>>
                                    <?= $j['tanggal'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Petugas</label>
                        <select name="id_user" class="form-control">
                            <option value="">--Pilih Petugas--</option>
                            <?php foreach ($petugas as $p) { ?>
                                <option value="<?= $p['id_user'] ?>" <?= $p['id_user'] == $item['id_user'] ? 'selected' : '' ?>>
                                    <?= $p['nama_user'] ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Tanggal Cek</label>
                        <input type="date" name="tanggal_cek" class="form-control" required value="<?= $item['tanggal_cek'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Catatan</label>
                        <textarea name="catatan" class="form-control" cols="30" rows="5" required><?= $item['catatan'] ?></textarea>
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
<?php foreach ($pemeriksaan as $key => $value) { ?>
<div class="modal fade" id="delete-data<?= $value['id_pemeriksaan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="exampleModalLabel">Delete Data <?= $subjudul ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    Apakah Anda Yakin Hapus <b><?= $value['nama_anak'] ?> <?= $value['tanggal_cek'] ?></b> ..?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <a href="<?= base_url('Pemeriksaan/DeleteData/' . $value['id_pemeriksaan']) ?>" class="btn btn-danger">Delete</a>
                </div>
        </div>
    </div>
</div>
<?php } ?>