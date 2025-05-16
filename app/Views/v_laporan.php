<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Laporan</h3>
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
                    <a href="#">Laporan</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Laporan</div>
                            <div class="card-tools">
                                <a href="<?= base_url('Laporan/cetak') ?>" target="_blank" class="btn btn-danger btn-round">
                                    <i class="far fa-file-pdf"></i> Cetak Laporan
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>No.</th>
                                        <th>Anak</th>
                                        <th>Jenis Pemeriksaan</th>
                                        <th>Hasil</th>
                                    </tr>
                                </thead>
                                <tfoot class="text-center">
                                    <th>No.</th>
                                    <th>Anak</th>
                                    <th>Jenis Pemeriksaan</th>
                                    <th>Hasil</th>
                                </tfoot>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($detail as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $value['nama_anak'] ?></td>
                                            <td><?= $value['nama_pemeriksaan'] ?></td>
                                            <td><?= $value['hasil'] ?></td>
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