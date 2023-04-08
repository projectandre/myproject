<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Arkatama Store</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="<?= base_url('gambar/') ?>logo.png" rel="icon">
    <link href="<?= base_url('gambar/') ?>logo.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('bizpage/') ?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('bizpage/') ?>assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('bizpage/') ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('bizpage/') ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url('bizpage/') ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('bizpage/') ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url('bizpage/') ?>assets/css/style.css" rel="stylesheet">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center ">
        <div class="container-fluid">

            <div class="row justify-content-center align-items-center">
                <div class="col-xl-11 d-flex align-items-center justify-content-between">
                    <!-- <h1 class="logo"><a href="index.html">Arkatama</a></h1> -->
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <a href="<?= base_url('user'); ?>" class="logo"><img src="<?= base_url('gambar/') ?>logo1.png" alt="" class="img-fluid"></a>

                    <nav id="navbar" class="navbar">
                        <ul>
                            <li><a class="nav-link scrollto" href="<?= base_url() ?>user#hero">Home</a></li>
                            <li><a class="nav-link scrollto" href="<?= base_url() ?>user#about">Tentang</a></li>
                            <li><a class="nav-link scrollto" href="<?= base_url() ?>user#portfolio">Produk/Layanan</a></li>

                            <li><a class="nav-link scrollto" href="<?= base_url() ?>user#contact">Kontak</a></li>
                            <?php if ($this->session->userdata('role_id') == '3') { ?>
                                <li><a class="nav-link scrollto active" href="<?= base_url('riwayat/') ?>">Pesanan Saya</a></li>
                                <li><a class="nav-link scrollto" href="<?= base_url('keranjang/') ?>">Keranjang</a></li>
                                <li class="dropdown"><a href="#"><span>Lainnya</span> <i class="bi bi-chevron-down"></i></a>
                                    <ul>
                                      <li><a class="nav-link scrollto" href="<?= base_url('user/tampilubahPasswordUser') ?>">Ganti Password</a></li>
                                      <li><a class="nav-link scrollto" href="<?= base_url('auth/logout') ?>">Logout</a></li>
                                    </ul>
                                  </li>
                                 <?php } else if ($this->session->userdata('role_id')) { ?>
                                <li><a class="nav-link scrollto" href="<?= base_url('auth/logout') ?>">Logout</a></li>
                                
                                <?php } else { ?>
                                <li><a class="nav-link scrollto" href="<?= base_url('auth/') ?>">Login</a></li>
                            <?php } ?>
                        </ul>
                        <i class="bi bi-list mobile-nav-toggle"></i>
                    </nav><!-- .navbar -->
                </div>
            </div>

        </div>
    </header><!-- End Header -->



    <main id="main">


        <!-- ======= Judul Pembayaran ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Pesanan Saya</h2>
                </div>

            </div>
        </section><!-- End Judul Pembayaran -->

        <!-- ======= Main Pembayaran ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row">
                    <div class="col-md-6" style="margin-top: 20px;">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="card-title">No. Rekening Toko</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Silahkan Transfer Uang Ke No. Rekening Dibawah ini sebesar</label>
                                    
                                </div>
                                <br>
                                <div class="form-group">
                                    <h3 style="color: blue;">Rp. <?= number_format($data_order->total_bayar, 0, ',', '.') ?></h3>                                    
                                </div>
                                <div class="form-group">
                                    <div class="table-content table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="li-product-thumbnail">Bank</th>
                                                    <th class="cart-product-name">No. Rekening</th>
                                                    <th class="cart-product-name">Atas Nama</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td> Mandiri </td>
                                                    <td> 144-00-5650000-9 </td>
                                                    <td> PT. Arkatama Multi Solusindo </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6" style="margin-top: 20px;">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="card-title">Bukti Pembayaran</h4>
                            </div>

                            <form method="POST" action="<?= base_url('riwayat/updatebayar/'); ?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Atas Nama</label>
                                    <input type="text" class="form-control" name="atas_nama">
                                    <input type="hidden" class="form-control" name="id_pemesanan" value="<?= $id_penjualan ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Bank</label>
                                    <input type="text" class="form-control" name="nama_bank" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">No. Rekening</label>
                                    <input type="text" class="form-control" name="no_rekening" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Bukti Bayar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="bukti_transfer" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Pembayaran -->



        <!-- ======= Clients  ======= -->
        <section id="clients">
            <div class="container" data-aos="zoom-in">

                <header class="section-header">
                    <h3>Bagian dari klien kami</h3>
                </header>

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="<?= base_url('gambar/client/') ?>logo1.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="<?= base_url('gambar/client/') ?>logo2.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="<?= base_url('gambar/client/') ?>logo3.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="<?= base_url('gambar/client/') ?>logo4.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="<?= base_url('gambar/client/') ?>logo5.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="<?= base_url('gambar/client/') ?>logo6.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="<?= base_url('gambar/client/') ?>logo7.png" class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img src="<?= base_url('gambar/client/') ?>logo8.png" class="img-fluid" alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Clients -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                   <div class="col-lg-3 col-md-6 footer-info">
                        <h3>Arkatama</h3>
                        <p>Arkatama Store merupakan salah satu aplikasi layanan di PT Arkatama Multi Solusindo yang menjual produk-produk dengan kualitas terbaik dan murah.</p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Navigasi</h4>
                        <ul>
                            <li><a class="nav-link scrollto active" href="<?= base_url() ?>user#hero">Home</a></li>
                            <li><a class="nav-link scrollto" href="<?= base_url() ?>user#about">Tentang</a></li>
                            <li><a class="nav-link scrollto" href="<?= base_url() ?>user#portfolio">Produk/Layanan</a></li>

                            <li><a class="nav-link scrollto" href="<?= base_url() ?>user#contact">Kontak</a></li>
                            <?php if ($this->session->userdata('role_id') == '3') { ?>
                                <li><a class="nav-link scrollto" href="<?= base_url('riwayat/') ?>">Pesanan Saya</a></li>
                                <li><a class="nav-link scrollto" href="<?= base_url('keranjang/') ?>">Keranjang</a></li>
                                <li><a class="nav-link scrollto" href="<?= base_url('auth/logout') ?>">Logout</a></li>
                                </li>
                            <?php } else if ($this->session->userdata('role_id')) { ?>
                                <li><a class="nav-link scrollto" href="<?= base_url('auth/logout') ?>">Logout</a></li>
                                
                                <?php } else { ?>
                                <li><a class="nav-link scrollto" href="<?= base_url('auth/') ?>">Login</a></li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h4>Kontak Kami</h4>
                        <p>
                            Perumahan Joyoagung Greenland No. B4-B5 <br>
                            Tlogomas, Malang<br>
                            Indonesia <br>
                            <strong>Whatsapp:</strong> 0812-3431-1135<br>
                            <strong>Email:</strong> info@arkatama.id<br>
                        </p>



                    </div>

                    <div class="col-lg-3 col-md-6 footer-newsletter">
                        <h4>Sosial Media</h4>
                        <div class="social-links">
                            <a href="https://www.facebook.com/arkatama.id" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="https://www.instagram.com/arkatamamulti/" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="https://id.linkedin.com/company/arkatama?original_referer=https%3A%2F%2Farkatama.id%2F" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong>PT Arkatama Store</strong>.
            </div>
            <div class="credits">
                Dibuat oleh <a href="">Andre Agung</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <!-- Geser Atas -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- End Geser Atas -->

    <!-- Vendor JS Files -->
    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>

    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('bizpage/') ?>assets/vendor/jquery/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('bizpage/') ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url('bizpage/') ?>assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url('bizpage/') ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('bizpage/') ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url('bizpage/') ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url('bizpage/') ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('bizpage/') ?>assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?= base_url('bizpage/') ?>assets/vendor/php-email-form/validate.js"></script>
    
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url('bizpage/') ?>assets/vendor/sweetalert/sweetalert.min.js"></script>
    
    <!-- Template Main JS File -->
    <script src="<?= base_url('bizpage/') ?>assets/js/main.js"></script>
    <script src="<?= base_url('assets/'); ?>js/main.js"></script>
    <script src="<?= base_url('assets/') ?>js/search.js"></script>

</body>

</html>