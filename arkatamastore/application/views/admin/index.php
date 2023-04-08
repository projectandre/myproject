<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Arkatama Store - Admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('gambar/') ?>logo.png" rel="icon">
    <link href="<?= base_url('gambar/') ?>logo.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('niceadmin/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('niceadmin/') ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('niceadmin/') ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('niceadmin/') ?>assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url('niceadmin/') ?>assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url('niceadmin/') ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url('niceadmin/') ?>assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('niceadmin/') ?>assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?= base_url('admin/'); ?>" class="logo d-flex align-items-center">
                <img src="<?= base_url('gambar/') ?>logo.png" alt="logo">
                <span class="d-none d-lg-block">Arkatama Store</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->



        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">



                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

                        <span class="d-none d-md-block dropdown-toggle ps-2"><?= $this->session->userdata('nama'); ?></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">


                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?= base_url('admin/tampilUbahPassword_admin') ?>">
                               <i class="bi bi-key"></i>
                               <span>Ganti Password</span>
                            </a>
                        </li>
                        <li>
                           <hr class="dropdown-divider">
                        </li>


                        <li>
                            <a onclick='return confirm("Apakah anda yakin logout ?")' class="dropdown-item d-flex align-items-center" href="<?= base_url('auth/logout') ?>">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">



            <li class="nav-heading">Admin</li>

            <li class="nav-item">
                <a class="nav-link <?= $this->uri->segment(1) == 'admin' && $this->uri->segment(2) == '' ? null : 'collapsed' ?>" href="<?= base_url('admin/'); ?>">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Profile Page Nav -->

            <li class="nav-item">
                <a class="nav-link <?= $this->uri->segment(2) == 'data_barang' ? null : 'collapsed' ?>" href="<?= base_url('admin/data_barang'); ?>">
                    <i class="bi bi-menu-app"></i>
                    <span>Data Barang</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->


            <li class="nav-item">
                <a class="nav-link <?= $this->uri->segment(2) == 'data_kategori' ? null : 'collapsed' ?>" href="<?= base_url('admin/data_kategori'); ?>">
                    <i class="bi bi-menu-app"></i>
                    <span>Data Kategori</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link <?= $this->uri->segment(1) == 'hero' ? null : 'collapsed' ?>" href="<?= base_url('hero/'); ?>">
                    <i class="bi bi-window"></i>
                    <span>Setting Hero</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->
            <li class="nav-item">
                <a class="nav-link <?= $this->uri->segment(2) == 'data_testi' ? null : 'collapsed' ?>" href="<?= base_url('admin/data_testi'); ?>">
                    <i class="bi bi-window-desktop"></i>
                    <span>Testimoni</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link <?= $this->uri->segment(1) == 'penjualan' ? null : 'collapsed' ?>" href="<?= base_url('penjualan'); ?>">
                    <i class="bi bi-menu-button-wide"></i>
                    <span>Kelola Penjualan</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->

            <li class="nav-item">
                <a class="nav-link <?= $this->uri->segment(1) == 'laporan' ? null : 'collapsed' ?>" href="<?= base_url('laporan'); ?>">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>Laporan Penjualan</span>
                </a>
            </li><!-- End F.A.Q Page Nav -->


            <!-- <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Kategori</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Tabel Kategori</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-alerts.html">
                            <i class="bi bi-circle"></i><span>Software</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-accordion.html">
                            <i class="bi bi-circle"></i><span>Pakaian</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-badges.html">
                            <i class="bi bi-circle"></i><span>Peralatan Elektronik</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-breadcrumbs.html">
                            <i class="bi bi-circle"></i><span>Laptop</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <!-- End Components Nav -->

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1><?= $judul; ?></h1>

        </div><!-- End Page Title -->

        <section class="section dashboard">
            <?php
            if ($page) {
                $this->load->view($page);
            }
            ?>
        </section>

    </main><!-- End #main -->



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('niceadmin/') ?>assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url('niceadmin/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('niceadmin/') ?>assets/vendor/chart.js/chart.min.js"></script>
    <script src="<?= base_url('niceadmin/') ?>assets/vendor/echarts/echarts.min.js"></script>
    <script src="<?= base_url('niceadmin/') ?>assets/vendor/quill/quill.min.js"></script>
    <script src="<?= base_url('niceadmin/') ?>assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url('niceadmin/') ?>assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url('niceadmin/') ?>assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url('niceadmin/') ?>assets/js/main.js"></script>

        <script>
        // detail
        $(document).on("click",".btndetail",function(){
            var id =$(this).attr("data-id");
            $.ajax({
                url : "<?= base_url() ?>keranjang/detail_keranjang/"+id,
                type: "GET",
                dataType : "html",
                success: function(data)
                {
                    $("#modaledit").modal('show');
                    $("#dataedit").html(data);
                }
            });
        });

        $(document).on("click",".btnclose",function(){
            // var id =$(this).attr("data-id");
            $("#modaledit").modal("hide");
        });


        // bukti bayar
        $(document).on("click",".btnbukti",function(){
            var id =$(this).attr("data-id");
            $.ajax({
                url : "<?= base_url() ?>penjualan/buktibayar/"+id,
                type: "GET",
                dataType : "html",
                success: function(data)
                {
                    $("#modalupdate").modal('show');
                    $("#dataupdate").html(data);
                }
            });
        });

        $(document).on("click",".btnclosed",function(){
            // var id =$(this).attr("data-id");
            $("#modalupdate").modal("hide");
        });


        
    </script>

</body>

</html>