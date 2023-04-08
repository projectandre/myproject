  <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Produk Dijual <span>| Saat Ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-boxes"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $produkDijual ?></h6>
                      <span class="text-muted small pt-2 ps-1">Jumlah Produk Dijual</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Produk Menunggu <span>| Saat Ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-hourglass-split"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $produkValidasi; ?></h6>
                      <span class="text-muted small pt-2 ps-1">Produk Menunggu Validasi</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <div class="col-md-4">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Hero Menunggu <span>| Saat Ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-hourglass-split"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $heroValidasi; ?></h6>
                      <span class="text-muted small pt-2 ps-1">Hero Menunggu Validasi</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->






          

        

          

    

        </div><!-- End Right side columns -->

      </div>
    </section>
