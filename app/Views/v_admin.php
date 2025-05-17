<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
                <h6 class="op-7 mb-2">Selamat datang Admin! Anda dapat mengelola aplikasi dari sini.</h6>
            </div>
            <div class="ms-md-auto py-2 py-md-0">

            </div>
        </div>
        <div class="row row-card-no-pd">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="icon-pie-chart text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Data Anak</p>
                                    <h4 class="card-title"><?= $jml_anak ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="icon-pie-chart text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Data Ibu</p>
                                    <h4 class="card-title"><?= $jml_ibu ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="icon-pie-chart text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Data Pemeriksaan</p>
                                    <h4 class="card-title"><?= $jml_pemeriksaan ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="icon-pie-chart text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Data User</p>
                                    <h4 class="card-title"><?= $jml_user ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card card-round">
                    <div class="card-body">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">User Pengguna</div>
                            <div class="card-tools">
                            </div>
                        </div>
                        <div class="card-list py-4">
                            <?php
                            foreach ($all_user as $key => $value) { ?>
                                <div class="item-list">
                                    <div class="info-user ms-3">
                                        <div class="username"><?= $value['nama_user'] ?></div>
                                        <div class="status"><?= $value['email'] ?></div>
                                    </div>
                                    <div class="status">
                                        <?php
                                        if ($value['level'] == 1) { ?>
                                            <span class="badge bg-success">Admin</span>
                                        <?php } elseif ($value['level'] == 2) { ?>
                                            <span class="badge bg-primary">Petugas</span>
                                        <?php } elseif ($value['level'] == 3) { ?>
                                            <span class="badge bg-warning text-dark">Kader</span>
                                        <?php } elseif ($value['level'] == 4) { ?>
                                            <span class="badge bg-info text-dark">Orang Tua</span>
                                        <?php } else { ?>
                                            <span class="badge bg-secondary">Tidak Dikenal</span>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">Pemeriksaan</div>
                            <div class="card-tools">
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Anak</th>
                                        <th scope="col" class="text-center">Jenis Pemeriksaan</th>
                                        <th scope="col" class="text-center">Tanggal Cek</th>
                                        <th scope="col" class="text-center">Hasil</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($all_pemeriksaan as $key => $value) { ?>
                                        <tr>
                                            <th scope="row">
                                                <?= $value['nama_anak'] ?>
                                            </th>
                                            <td class="text-center">
                                                <?= $value['nama_pemeriksaan'] ?>
                                            </td>
                                            <td class="text-center">
                                                <?= date('d-m-Y', strtotime($value['tanggal_cek'])) ?>
                                            </td>
                                            <td class="text-center">
                                                <?= $value['hasil'] ?>
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