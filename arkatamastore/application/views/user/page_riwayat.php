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


        <!-- ======= Pesanan Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Pesanan Saya</h2>
                </div>

            </div>
        </section><!-- Pesanan Section -->

        <!-- ======= Main Data Pesanan ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">
                <?= $this->session->flashdata('message'); ?>
                <div class="card">
                    <div class="card-header d-flex p-0">
                        <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Order</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Diproses</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Dikirim</a></li>
                            <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Selesai</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="row gy-4">
                                    <div class="table-content table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="li-product-thumbnail">Tanggal Transaksi</th>
                                                    <th class="cart-product-name">No. Transaksi</th>
                                                    <th class="cart-product-name">Ekspedisi</th>

                                                    <th class="li-product-price">Detail</th>
                                                    <th class="li-product-price">Total Transaksi</th>
                                                    <th class="li-product-price">Status/Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                foreach ($data_order as $row_order) {
                                                ?>
                                                    <tr>
                                                        <td class="li-product-name"><a><?= $row_order->tgl_pemesanan; ?></a></td>
                                                        <td class="li-product-name"><a><?= $row_order->no_order; ?></a></td>
                                                        <td class="li-product-name">
                                                            <b><?= $row_order->kurir; ?></b> <br>
                                                            <a><?= $row_order->jenis_ongkir; ?></a> <br>
                                                            <a>Rp. <?= number_format($row_order->biaya_kirim, 0, ',', '.') ?></a>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-info btndetail" data-toggle="modal" data-id="<?= $row_order->id_pemesanan ?>">
                                                                Detail
                                                            </button>
                                                        </td>
                                                        <td class="li-product-name"><a>Rp. <?= number_format($row_order->total_bayar, 0, ',', '.') ?></a><br>
                                                            <?php if ($row_order->bukti_transfer == '' && $row_order->status == 'Order') { ?>

                                                                <span style="color: blue;">Segera Lakukan pembayaran!</span>
                                                            <?php } ?>
                                                        </td>
                                                        <td class="li-product-name">
                                                            <?php if ($row_order->bukti_transfer == '' && $row_order->status == 'Order') { ?>
                                                                <a href="<?= base_url() ?>riwayat/bayar/<?= $row_order->id_pemesanan; ?>" class="btn btn-success btn-center">Bayar<i class="fi-rs-sign-out ml-15"></i></a>

                                                               

                                                            <?php }
                                                             else if ($row_order->status == 'Ditolak' ) { ?>
                                                                <span style="color: red;">Pesanan ditolak!</span><br>
                                                                <a onclick='return confirm("Apakah anda yakin menghapus data ini?")' class='btn btn-danger' href='<?= base_url('riwayat/hapus_penjualan/' . $row_order->id_pemesanan); ?>'>Hapus</a>
                                                            <?php } 
                                                             else { ?>
                                                                <span style="color: blue;">Menunggu Verifikasi</span>
                                                            <?php } ?>

                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab_2">
                                <div class="row gy-4">
                                    <div class="table-content table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="li-product-thumbnail">Tanggal Transaksi</th>
                                                    <th class="cart-product-name">No. Transaksi</th>
                                                    <th class="cart-product-name">Ekspedisi</th>
                                                    <th class="li-product-price">Total Transaksi</th>
                                                    <th class="li-product-price">Detail</th>
                                                    <th class="li-product-price">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                foreach ($data_proses as $row_proses) {
                                                ?>
                                                    <tr>
                                                        <td class="li-product-name"><a><?= $row_proses->tgl_pemesanan; ?></a></td>
                                                        <td class="li-product-name"><a><?= $row_proses->no_order; ?></a></td>
                                                        <td class="li-product-name">
                                                            <b><?= $row_proses->kurir; ?></b> <br>
                                                            <a><?= $row_proses->jenis_ongkir; ?></a> <br>
                                                            <a>Rp. <?= number_format($row_proses->biaya_kirim, 0, ',', '.') ?></a>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-info btndetail" data-toggle="modal" data-id="<?= $row_proses->id_pemesanan ?>">
                                                                Detail
                                                            </button>
                                                        </td>
                                                        <td class="li-product-name"><a>Rp. <?= number_format($row_proses->total_bayar, 0, ',', '.') ?></a></td>
                                                        <td class="li-product-name">
                                                            <span style="color: blue;">Terverifikasi</span>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab_3">
                                <div class="row gy-4">
                                    <div class="table-content table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="li-product-thumbnail">Tanggal Transaksi</th>
                                                    <th class="cart-product-name">No. Transaksi</th>
                                                    <th class="cart-product-name">Ekspedisi</th>
                                                    <th class="li-product-price">Total Transaksi</th>
                                                    <th class="li-product-price">Detail</th>
                                                    <th class="li-product-price">No. Resi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                foreach ($data_kirim as $row_kirim) {
                                                ?>
                                                    <tr>
                                                        <td class="li-product-name"><a><?= $row_kirim->tgl_pemesanan; ?></a></td>
                                                        <td class="li-product-name"><a><?= $row_kirim->no_order; ?></a></td>
                                                        <td class="li-product-name">
                                                            <b><?= $row_kirim->kurir; ?></b> <br>
                                                            <a><?= $row_kirim->jenis_ongkir; ?></a> <br>
                                                            <a>Rp. <?= number_format($row_kirim->biaya_kirim, 0, ',', '.') ?></a>
                                                        </td>
                                                        <td class="li-product-name"><a>Rp. <?= number_format($row_kirim->total_bayar, 0, ',', '.') ?></a><br>
                                                            <a style="color: green;">Dikirim</a>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-info btndetail" data-toggle="modal" data-id="<?= $row_kirim->id_pemesanan ?>">
                                                                Detail
                                                            </button>
                                                        </td>
                                                        <td class="li-product-name">

                                                            <span style="color: blue;"><?= $row_kirim->no_resi ?></span><br>
                                                            <!-- <a href="riwayat/terima/<?= $row_kirim->id_pemesanan; ?>" class="btn btn-primary btn-center" data-toggle="modal">Diterima</a> -->
                                                            <button type="button" class="btn btn-primary btn-center btnDiterima" data-bs-toggle="modal" data-bs-target="#modalupdateTesti">Diterima</button>
                                                            
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab_4">
                                <div class="row gy-4">
                                    <div class="table-content table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="li-product-thumbnail">Tanggal Transaksi</th>
                                                    <th class="cart-product-name">No. Transaksi</th>
                                                    <th class="cart-product-name">Ekspedisi</th>
                                                    <th class="li-product-price">Total Transaksi</th>
                                                    <th class="li-product-price">Detail</th>
                                                    <th class="li-product-price">No. Resi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                foreach ($data_terima as $row_terima) {
                                                ?>
                                                    <tr>
                                                        <td class="li-product-name"><a><?= $row_terima->tgl_pemesanan; ?></a></td>
                                                        <td class="li-product-name"><a><?= $row_terima->no_order; ?></a></td>
                                                        <td class="li-product-name">
                                                            <b><?= $row_terima->kurir; ?></b> <br>
                                                            <a><?= $row_terima->jenis_ongkir; ?></a> <br>
                                                            <a>Rp. <?= number_format($row_terima->biaya_kirim, 0, ',', '.') ?></a>
                                                        </td>
                                                        <td class="li-product-name"><a>Rp. <?= number_format($row_terima->total_bayar, 0, ',', '.') ?></a><br>
                                                            <a style="color: green;">Selesai</a>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-info btndetail" data-toggle="modal" data-id="<?= $row_terima->id_pemesanan ?>">
                                                                Detail
                                                            </button>
                                                        </td>
                                                        <td class="li-product-name">

                                                            <span style="color: blue;"><?= $row_terima->no_resi ?></span><br>


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

                <!-- Modal -->
                <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content" id="dataedit">

                        </div>
                    </div>
                </div>


                <!-- Button trigger modal -->


                <!-- Modal Testi -->
                  <!-- modal testi -->
                <div class="modal fade" id="modalupdateTesti" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog ">
                        <div class="modal-content" id="dataupdateTesti">
                            <div class='modal-header'>
                <h1 class='modal-title fs-5' id='exampleModalLabel'>Pesanan Diterima</h1>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
                <form action=" <?= base_url() ?>riwayat/terima " method='POST' enctype='multipart/form-data'>
                    <!-- <div class='mb-3'>
                        <label for='rating'>Nama</label>      
                        <input type='hidden' name='id_pesan' id='id_pesan' class='form-control' value="<?= $row_kirim->id_pemesanan; ?>" >
                        <input type='text' name='rating' id='rating' class='form-control'>
                    </div> -->
                    <div class='mb-3'>
                        <label for='komentar'>Komentar*</label>
                        <input type='hidden' name='id_pesan' id='id_pesan' class='form-control' value="<?= $row_kirim->id_pemesanan; ?>" >
                          <textarea class='form-control' name="komentar" id="komentar" rows="5" placeholder="Berikan komentar anda terhadap produk/layanan kami.." required></textarea>
                    </div>
            </div>
               
                        <div class="modal-footer">
                 <button type='submit' class='btn btn-primary btnSimpan'>Kirim</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
                        </div>
                    </div>
                </div>






            </div>
        </section><!-- End Main Data pesanan -->



        <!-- ======= Our Clients Section ======= -->
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
        </section><!-- End Clients  -->



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
                <!--
        All the links in the footer should remain intact.
        You can delete the links only if you purchased the pro version.
        Licensing information: https://bootstrapmade.com/license/
        Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
      -->
                Dibuat oleh <a href="">Andre Agung</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Uncomment below i you want to use a preloader -->
    <!-- <div id="preloader"></div> -->

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

    <script>
        $(document).on("click", ".btndetail", function() {
            var id = $(this).attr("data-id");
            $.ajax({
                url: "<?= base_url() ?>keranjang/detail_keranjang/" + id,
                type: "GET",
                dataType: "html",
                success: function(data) {
                    $("#modaledit").modal('show');
                    $("#dataedit").html(data);
                }
            });
        });

        $(document).on("click", ".btnclose", function() {
            // var id =$(this).attr("data-id");
            $("#modaledit").modal("hide");
        });

       
    </script>

</body>

</html>