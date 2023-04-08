  <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Pesanan Masuk <span>| Saat Ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $pesananMasuk ?></h6>
                      <span class="text-muted small pt-2 ps-1">Jumlah Pesanan</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Pesanan Menunggu <span>| Saat Ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-hourglass-split"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $pesananMenunggu; ?></h6>
                      <span class="text-muted small pt-2 ps-1">Pesanan Menunggu Verifikasi</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <div class="col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Pesanan Diproses <span>| Saat Ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-box-seam"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $pesananProses; ?></h6>
                      <span class="text-muted small pt-2 ps-1">Dalam Proses Dikemas</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <div class="col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Pesanan Dikirim <span>| Saat Ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-truck"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $pesananDikirim; ?></h6>
                      <span class="text-muted small pt-2 ps-1">Dalam Proses Pengiriman</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->



            <!-- Customers Card -->
            <div class="col-xl-8">

              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Pesanan Diterima <span>| Jumlah Total Pesanan</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $pesananSelesai; ?></h6>
                       <span class="text-muted small pt-2 ps-1">Pesanan telah diterima atau selesai</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

          

        

          

    

        </div><!-- End Right side columns -->

      </div>
    </section>
