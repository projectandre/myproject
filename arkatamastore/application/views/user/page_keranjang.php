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


    <!-- =======================================================
  * Template Name: BizPage - v5.10.1
  * Template URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
                                <li><a class="nav-link scrollto" href="<?= base_url('riwayat/') ?>">Pesanan Saya</a></li>
                                <li><a class="nav-link scrollto active" href="<?= base_url('keranjang/') ?>">Keranjang</a></li>
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


        <!-- ======= Breadcrumbs Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Daftar Keranjang Belanja</h2>
                </div>

            </div>
        </section><!-- Breadcrumbs Section -->

        <!-- ======= Portfolio Details Section ======= -->
        <section id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row gy-4">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="table-content table-responsive">
                        <form method="POST" action="<?= base_url('keranjang/update_keranjang/'); ?>">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="li-product-thumbnail">Foto</th>
                                        <th class="cart-product-name">Produk</th>
                                        <th class="li-product-price">Harga Satuan</th>
                                        <th width="10%">Jumlah</th>
                                        <th class="li-product-subtotal">Total</th>
                                        <th class="li-product-subtotal"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    $total = 0;
                                    $totalBerat = 0;
                                    foreach ($data_keranjang as $row_keranjang) {
                                        $subtotal = $row_keranjang->harga_barang * $row_keranjang->jumlah;
                                        $subBerat = $row_keranjang->berat_barang * $row_keranjang->jumlah;
                                        $total = $total + $subtotal;
                                        $totalBerat = $totalBerat + $subBerat;
                                    ?>
                                        <tr>
                                            <td class="li-product-thumbnail"><a href="#"><img src="<?= base_url('uploads/') . $row_keranjang->gambar_barang; ?>" width="100px" alt="Li's Product Image"></a></td>
                                            <td class="li-product-name"><a><?= $row_keranjang->nama_barang; ?></a></td>
                                            <td class="li-product-price"><span class="amount">Rp. <?= number_format($row_keranjang->harga_barang, 0, ',', '.'); ?></span></td>
                                            <td>

                                                <input type="number" class="form-control" id="jumlah<?= $no ?>" name="jumlah_<?= $no ?>" value="<?= $row_keranjang->jumlah ?>" min="1" max="<?php echo $row_keranjang->stok_barang; ?>">
                                                <input type="hidden" class="form-control" id="id_barang<?= $no ?>" name="id_barang_<?= $no ?>" value="<?= $row_keranjang->id_barang ?>">

                                            </td>
                                            <td class="product-subtotal"><label>Rp. <?= number_format($subtotal, 0, ',', '.'); ?></label></td>
                                            <td class="product-subtotal"><button type="button" class="btn btn-primary" id="delkeranjang" data-idkeranjang="<?= $row_keranjang->id_keranjang ?>">Hapus</button></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>

                                    <tr>
                                        <td colspan="4" align="center"> Total
                                        </td>
                                        <td class="product-subtotal"><label>Rp. <?= number_format($total, 0, ',', '.'); ?></label>
                                            <input type="hidden" id="sub_total" name="sub_total" value="<?= $total ?>">
                                            <input type="hidden" id="sub_berat" name="sub_berat" value="<?= $totalBerat ?>">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" name="row" value="<?= $no ?>">
                            <button type="submit" class="btn btn-success" style="margin-bottom: 20px;">Update Keranjang</button>
                             <a href="<?= base_url('user/page_produk/'); ?>" class="btn btn-danger text-white" style="margin-bottom: 20px;">Belanja Lagi</a>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="border p-md-4 cart-totals ml-30">
                            <div class="table-responsive">
                                <form action="#">
                                    <table class="table no-border">
                                        <tbody>
                                            <tr>
                                                <td width="50%">
                                                    <h6 class="text-muted">Nama</h6>
                                                </td>
                                                <td class="cart_total_amount">
                                                    <h6 class="text-heading"><?= $this->session->userdata('nama'); ?></h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">
                                                    <h6 class="text-muted">No Tlp</h6>
                                                </td>
                                                <td class="cart_total_amount">
                                                    <input type="number" id="no_telp" name="no_telp" class="form-control" required>
                                                    <input type="hidden" class="form-control" name="propinsi_asal" id="propinsi_asal" value="11">
                                                    <input type="hidden" class="form-control" name="origin" id="origin" value="256">
                                                    <input type="hidden" name="berat" placeholder="gram" id="berat" class="form-control" value="1000">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">
                                                    <h6 class="text-muted">Alamat</h6>
                                                </td>
                                                <td class="cart_total_amount">
                                                    <input type="text" id="alamat" name="alamat" class="form-control" required>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">
                                                    <h6 class="text-muted">Provinsi</h6>
                                                </td>
                                                <td class="cart_total_amount">
                                                    <select class="form-control" name="propinsi_tujuan" id="propinsi_tujuan" style="width: 400px;" required>
                                                        <option value="" selected="" disabled="">Pilih Provinsi</option>
                                                        <?php $this->load->view('rajaongkir/getProvince'); ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="cart_total_label">
                                                    <h6 class="text-muted">Kota</h6>
                                                </td>
                                                <td class="cart_total_amount">
                                                    <select class="form-control" name="destination" id="destination" style="width: 400px;" required>
                                                        <option value="" selected="" disabled="">Pilih Kota</option>
                                                    </select>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td class="cart_total_label">
                                                    <h6 class="text-muted">Kurir</h6>
                                                </td>
                                                <td class="cart_total_amount">
                                                    <select class="form-control" name="courier" id="courier" required>
                                                        <option value="" selected="" disabled="">Pilih Kurir</option>
                                                        <option value="jne">JNE</option>
                                                        <option value="pos">POS</option>
                                                        <option value="tiki">TIKI</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="col" colspan="2">
                                                    <div class="divider-2 mt-10 mb-10"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td scope="col" colspan="2">
                                                    <div id="hasil">

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                </td>
                                                <td>
                                                    <button type="button" id="konfirmasi_order" class="btn btn-primary btn-center">Checkout<i class="fi-rs-sign-out ml-15"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Details Section -->



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
        </section><!-- End Our Clients Section -->



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
        $("#propinsi_tujuan").click(function() {
            $.post("<?php echo base_url(); ?>/rajaongkir/getCity/" + $('#propinsi_tujuan').val(), function(obj) {
                $('#destination').html(obj);
            });
        });

        $("#courier").click(function() {
            var w = $('#origin').val();
            var x = $('#destination').val();
            var y = $('#sub_berat').val();
            var z = $('#courier').val();
            var sub_total = $('#sub_total').val();

            if (x == null) {
                swal("Peringatan", "Kota Tujuan Harus Diisi", "warning");
                return;
            }
            else if (sub_total == 0) {
                            swal("Peringatan", "Anda belum memasukkan barang ke keranjang", "warning");
                            return;
                        }
             else {
                $.ajax({
                    url: "<?= base_url() ?>rajaongkir/getCost",
                    type: "GET",
                    data: {
                        origin: w,
                        destination: x,
                        berat: y,
                        courier: z,
                        sub_total: sub_total
                    },
                    success: function(ajaxData) {
                        $("#hasil").html(ajaxData);
                    }
                });
            }


        });

        $(document).on("click", "#konfirmasi_order", function() {
            var no_telp = $("#no_telp").val();
            var alamat = $("#alamat").val();
            var propinsi_tujuan = $("#propinsi_tujuan").val();
            var destination = $("#destination").val();
            var courier = $("#courier").val();
            var jenis_ongkir = $("#jenis_ongkir").val();
            var biaya_kirim = $("#ongkir").val();
            var subtotal = $("#subtotal").val();
            var total = parseInt(subtotal) + parseInt(biaya_kirim);

            if (no_telp == '' || alamat == '' || propinsi_tujuan == '' || destination == '' || courier == '') {
                swal("Peringatan", "Cek Kembali, Data Anda Belum Lengkap", "warning");
                return;
            }

            var value = {
                no_telp: no_telp,
                alamat: alamat,
                propinsi_tujuan: propinsi_tujuan,
                destination: destination,
                courier: courier,
                jenis_ongkir: jenis_ongkir,
                biaya_kirim: biaya_kirim,
                subtotal: subtotal,
                total: total
            };

            $.ajax({
                url: "<?= base_url() ?>keranjang/checkout",
                type: "POST",
                data: value,
                success: function(data, textStatus, jqXHR) {
                    var data = jQuery.parseJSON(data);
                    if (data.result == 1) {
                        var url = '<?= base_url() ?>riwayat/';
                        swal("Sukses", "Pemesanan berhasil diproses", "success");
                        window.location = (href = url);
                    } else {
                        swal("Peringatan", "Anda Harus Login Terlebih Dahulu", "warning");
                    }
                }
            });



        });

        $(document).on("click", "#delkeranjang", function() {
            var id = $(this).attr("data-idkeranjang");
            var value = {
                id: id
            };
            $.ajax({
                url: "<?= base_url() ?>keranjang/delete_keranjang/",
                type: "POST",
                data: value,
                success: function(data, textStatus, jqXHR) {
                    var data = jQuery.parseJSON(data);
                    if (data.result == 1) {
                        var url = '<?= base_url() ?>keranjang/';
                        swal("Sukses", "Produk berhasil dihapus dari keranjang", "success");
                        window.location = (href = url);
                    } else if (data.result == 2) {
                        swal("Sukses", "Jumlah produk berhasil diubah", "success");
                    } else {
                        swal("Peringatan", "Anda Harus Login Terlebih Dahulu", "warning");
                    }
                }
            });
        });
    </script>

</body>

</html>