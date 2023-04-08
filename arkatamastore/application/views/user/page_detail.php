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
                            <li><a class="nav-link scrollto active" href="<?= base_url() ?>user#portfolio">Produk/Layanan</a></li>

                            <li><a class="nav-link scrollto" href="<?= base_url() ?>user#contact">Kontak</a></li>
                             <?php if ($this->session->userdata('role_id') == '3') { ?>
                                <li><a class="nav-link scrollto" href="<?= base_url('riwayat/') ?>">Pesanan Saya</a></li>
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


        <!-- ======= Judul Detail ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Produk Detail</h2>
                </div>

            </div>
        </section><!-- End Judul Detail -->

        <!-- ======= Detail ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">
                    <?php foreach ($detail as $value) { ?>
                        <div class="col-lg-5">
                            <div class="portfolio-details-slider swiper">
                                <div class="swiper-wrapper align-items-center">

                                    <div class="swiper">
                                        <img src="<?= base_url('uploads/') . $value->gambar_barang; ?>" alt="" height="400">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="portfolio-info">
                                <h3><?= $value->nama_barang; ?></h3>
                                <ul>
                                    <li><strong>Keterangan</strong>: <?= $value->keterangan_barang; ?></li>
                                    <li><strong>Kategori</strong>: <?= $value->nama_kategori; ?></li>
                                    <li><strong>Harga</strong>: Rp. <?= number_format($value->harga_barang, 0, ',', '.');  ?></li>
                                    <li><strong>Stok</strong>: <?= $value->stok_barang; ?></li>
                                    <li><strong>Kondisi</strong>: <?= $value->kondisi_barang; ?></li>
                                    <li><strong>Berat</strong>: <?= $value->berat_barang; ?> gram</li>
                                    <br>
                                    <li>
                                        <div class="row gy-4">
                                            <div class="col-lg-3">
                                                <input type="number" class="form-control" id="jumlah" name="jumlah" value="1" min="1" max="<?php echo $value->stok_barang; ?>">
                                            </div>
                                            <div class="col-lg-6">
                                                <?php if ($this->session->userdata('role_id') == '3') { ?>
                                                    <?php if ($value->stok_barang < 1) { ?>
                                                        <button type="button" disabled class="btn btn-secondary">Stok Telah Habis</button>
                                                    <?php }  else { ?>
                                                        <button type="submit" class="btn btn-primary" id="addkeranjang" data-idproduk="<?= $value->id_barang ?>"onclick="myFunction()">Tambahkan Keranjang</button>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <a href="<?= base_url('auth/') ?>" class="btn btn-primary">Tambahkan Keranjang</a>
                                                <?php } ?>
                                            </div>

                                            </div">
                                    </li>
                                    <li> <a href="<?= base_url('user/page_produk'); ?>" class="btn btn-danger ">Kembali</a> </li>

                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </section><!-- End Details -->



        <!-- =======  Clients ======= -->
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
        </section><!-- End  Clients -->



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

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  

    <!-- Vendor JS Files -->
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

        function myFunction() {
            
            if (document.getElementById("jumlah").validity.rangeUnderflow) {
                swal("Peringatan", "Produk yang ditambahkan minimal 1", "warning");
            } else if (document.getElementById("jumlah").validity.rangeOverflow) {
                swal("Peringatan", "Produk yang ditambahkan melebihi batas maksimum", "warning");
            }
             else {
                $(document).on("click", "#addkeranjang", function() {
            var id = $(this).attr("data-idproduk");
            var jumlah = $("#jumlah").val();
            var value = {
                id: id,
                jumlah: jumlah
            };
            $.ajax({
                url: "<?= base_url() ?>keranjang/tambah_keranjang/",
                type: "POST",
                data: value,
                success: function(data, textStatus, jqXHR) {
                    var data = jQuery.parseJSON(data);
                    if (data.result == 1) {
                        var url = '<?= base_url() ?>keranjang/';
                        swal("Sukses", "Produk berhasil dimasukan ke dalam keranjang", "success");
                        window.location = (href = url);
                    } else if (data.result == 2) {
                        var url = '<?= base_url() ?>keranjang/';
                        swal("Sukses", "Jumlah produk berhasil dirubah", "success");
                        window.location = (href = url);
                    } else {
                        swal("Peringatan", "Anda Harus Login Terlebih Dahulu", "warning");
                    }
                }
            });
        });
            } 
        }

      
    </script>

</body>

</html>