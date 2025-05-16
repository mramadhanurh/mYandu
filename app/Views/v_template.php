<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?= base_url('admin') ?>/assets/img/kaiadmin/favicon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?= base_url('admin') ?>/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                "families": ["Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['<?= base_url('admin') ?>/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url('admin') ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('admin') ?>/assets/css/plugins.min.css">
    <link rel="stylesheet" href="<?= base_url('admin') ?>/assets/css/kaiadmin.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?= base_url('admin') ?>/assets/css/demo.css">
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="red2">

                    <a href="index.html" class="logo">
                        <span class="text-white">&nbsp;Posyandu</span>
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>

                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                    
                    <?php $level = session()->get('level'); ?>

                    <!-- Untuk Admin (Level 1) -->
                    <?php if ($level == 1): ?>

                        <li class="nav-item <?= isset($menu) && $menu == 'admin' ? 'active' : '' ?>">
                            <a href="<?= base_url('Admin/index') ?>">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Master Data</h4>
                        </li>
                        <li class="nav-item <?= isset($menu) && $menu == 'kategori' ? 'active' : '' ?>">
                            <a href="<?= base_url('Kategori') ?>">
                                <i class="fas fa-desktop"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item <?= isset($menu) && $menu == 'jadwal' ? 'active' : '' ?>">
                            <a href="<?= base_url('Jadwal') ?>">
                                <i class="fas fa-desktop"></i>
                                <p>Jadwal</p>
                            </a>
                        </li>
                        <li class="nav-item <?= isset($menu) && $menu == 'user' ? 'active' : '' ?>">
                            <a href="<?= base_url('User') ?>">
                                <i class="fas fa-desktop"></i>
                                <p>Pengguna</p>
                            </a>
                        </li>

                    <?php endif; ?>

                    <!-- Untuk Petugas (Level 2) -->
                    <?php if ($level == 2): ?>

                        <li class="nav-item <?= isset($menu) && $menu == 'petugas' ? 'active' : '' ?>">
                            <a href="<?= base_url('Petugas') ?>">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Petugas Posyandu</h4>
                        </li>
                        <li class="nav-item <?= isset($menu) && $menu == 'ibu' ? 'active' : '' ?>">
                            <a href="<?= base_url('Ibu') ?>">
                                <i class="fas fa-desktop"></i>
                                <p>Catat Data Ibu</p>
                            </a>
                        </li>
                        <li class="nav-item <?= isset($menu) && $menu == 'anak' ? 'active' : '' ?>">
                            <a href="<?= base_url('Anak') ?>">
                                <i class="fas fa-desktop"></i>
                                <p>Catat Data Anak</p>
                            </a>
                        </li>

                        <?php
                            $isPemeriksaanActive = isset($menu) && in_array($menu, ['jenis', 'pemeriksaan', 'detail']);
                        ?>

                        <li class="nav-item <?= $isPemeriksaanActive ? 'active submenu' : '' ?>">
                            <a data-bs-toggle="collapse" href="#sidebarLayouts">
                                <i class="fas fa-stethoscope"></i>
                                <p>Pemeriksaan</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse <?= $isPemeriksaanActive ? 'show' : '' ?>" id="sidebarLayouts">
                                <ul class="nav nav-collapse">
                                    <li class="<?= isset($menu) && $menu == 'jenis' ? 'active' : '' ?>">
                                        <a href="<?= base_url('Jenispemeriksaan') ?>">
                                            <span class="sub-item">Jenis Pemeriksaan</span>
                                        </a>
                                    </li>
                                    <li class="<?= isset($menu) && $menu == 'pemeriksaan' ? 'active' : '' ?>">
                                        <a href="<?= base_url('Pemeriksaan') ?>">
                                            <span class="sub-item">Pemeriksaan</span>
                                        </a>
                                    </li>
                                    <li class="<?= isset($menu) && $menu == 'detail' ? 'active' : '' ?>">
                                        <a href="<?= base_url('Detailpemeriksaan') ?>">
                                            <span class="sub-item">Cek Pemeriksaan</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item <?= isset($menu) && $menu == 'laporan' ? 'active' : '' ?>">
                            <a href="<?= base_url('Laporan') ?>">
                                <i class="fas fa-desktop"></i>
                                <p>Laporan</p>
                            </a>
                        </li>
                    <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="purple">

                        <a href="index.html" class="logo">
                            <img src="<?= base_url('admin') ?>/assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand" height="20">
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>

                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom" data-background-color="red">

                    <div class="container-fluid">
                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">

                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="<?= base_url('admin') ?>/assets/img/profiledua.png" alt="..." class="avatar-img rounded-circle">
                                    </div>
                                    <span class="profile-username">
                                        <span class="op-7">Hi,</span> <span class="fw-bold"><?= session()->get('nama_user') ?></span>
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        <li>
                                            <div class="user-box">
                                                <div class="avatar-lg"><img src="<?= base_url('admin') ?>/assets/img/profiledua.png" alt="image profile" class="avatar-img rounded"></div>
                                                <div class="u-text">
                                                    <h4><?= session()->get('nama_user') ?></h4>
                                                    <p class="text-muted"><?= session()->get('email') ?></p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">My Profile</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Account Setting</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="<?= base_url('Home/Logout') ?>">Logout</a>
                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>

            <!-- isi konten -->
            <?php
            if ($page) {
                echo view($page);
            }
            ?>
            <!-- /.isi konten -->

            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="http://www.themekita.com">
                                    ThemeKita
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Help
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright ms-auto">
                        2025, made with <i class="fa fa-heart heart text-danger"></i> by <a href="http://www.themekita.com">ThemeKita</a>
                    </div>
                </div>
            </footer>
        </div>

    </div>
    <!--   Core JS Files   -->
    <script src="<?= base_url('admin') ?>/assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="<?= base_url('admin') ?>/assets/js/core/popper.min.js"></script>
    <script src="<?= base_url('admin') ?>/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?= base_url('admin') ?>/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="<?= base_url('admin') ?>/assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="<?= base_url('admin') ?>/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="<?= base_url('admin') ?>/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="<?= base_url('admin') ?>/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="<?= base_url('admin') ?>/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="<?= base_url('admin') ?>/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="<?= base_url('admin') ?>/assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="<?= base_url('admin') ?>/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="<?= base_url('admin') ?>/assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="<?= base_url('admin') ?>/assets/js/setting-demo.js"></script>
    <script src="<?= base_url('admin') ?>/assets/js/demo.js"></script>
    <script>
        $('#lineChart').sparkline([102, 109, 120, 99, 110, 105, 115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: '#177dff',
            fillColor: 'rgba(23, 125, 255, 0.14)'
        });

        $('#lineChart2').sparkline([99, 125, 122, 105, 110, 124, 115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: '#f3545d',
            fillColor: 'rgba(243, 84, 93, .14)'
        });

        $('#lineChart3').sparkline([105, 103, 123, 100, 95, 105, 115], {
            type: 'line',
            height: '70',
            width: '100%',
            lineWidth: '2',
            lineColor: '#ffa534',
            fillColor: 'rgba(255, 165, 52, .14)'
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#basic-datatables").DataTable();
        });
    </script>
</body>

</html>