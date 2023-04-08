<?php
// Notif gagal input
echo validation_errors('<div class="alert alert-danger">', '</div>');

// notif data masuk db
if ($this->session->flashdata('pesan')) {
    echo $this->session->flashdata('pesan');
}
?>
<div class="card-header d-flex p-0">
    <ul class="nav nav-pills ml-auto p-2">
        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Pesanan Masuk</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Diproses</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Dikirim</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Selesai</a></li>
    </ul>
</div>
<div class="card">
    <div class="card-body"><br>

        <div class="col d-flex justify-content-end">

          
            <div class="col-md-3">
                <?php echo form_open('penjualan/search'); ?>
                <input type="text" class="form-control" name="keyword" required placeholder="Masukkan no transaksi.. " id="keyword" value="<?= set_value('keyword'); ?>">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary mb-3" style="margin-left: 5px;">Cari</button><br>
                <?php echo form_close(); ?>
            </div>
        
            

        </div>
        
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="table-content table-responsive">
                    <table class="table table-hover">
                        <thead align="center">
                            <tr>
                                <th>Tanggal Transaksi</th>
                                <th>No. Transaksi</th>
                                <th>Ekspedisi</th>
                                <th>Total Transaksi</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data_order as $row_order) {

                                if ($row_order->bukti_transfer != '' && $row_order->status == 'Order') {
                            ?>
                                <tr id="data-pesanan">
                                    <td><?= date('d-m-Y', strtotime($row_order->tgl_pemesanan)) ?> </td>
                                    <td><?= $row_order->no_order; ?></td>
                                    <td>
                                        <b><?= $row_order->kurir; ?></b> <br>
                                        <a><?= $row_order->jenis_ongkir; ?></a> <br>
                                        <a>Rp. <?= number_format($row_order->biaya_kirim, 0, ',', '.') ?></a>
                                    </td>
                                    <td>
                                        Rp. <?= number_format($row_order->total_bayar, 0, ',', '.'); ?> <br>
                                        <?php if ($row_order->bukti_transfer == '' && $row_order->status == 'Order') { ?>
                                            <span style="color: blue;">Menunggu Pembayaran</span>
                                        <?php } else if ($row_order->status == 'Ditolak' ) { ?>
                                            <span style="color: red;">Permintaan Ditolak</span>
                                            <?php } else { ?>
                                            <span style="color: blue;">Menunggu Verifikasi</span>
                                            <?php } ?>
                                            <br>
                                        <?php if ($row_order->bukti_transfer != '') { ?>
                                            <button type="button" class="btn btn-primary btn-sm btnbukti" data-toggle="modal" data-id="<?= $row_order->id_pemesanan ?>">
                                            Lihat Bukti Bayar
                                        </button>
                                        <?php } ?>
                                        
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btndetail" data-toggle="modal" data-id="<?= $row_order->id_pemesanan ?>">
                                            Detail
                                        </button>
                                    </td>
                                    <td>
                                        <?php if ($row_order->bukti_transfer == '' && $row_order->status == 'Order'  ) { ?>
                                             <a class="btn btn-warning btn-sm" href="<?= base_url('penjualan/ditolak/' . $row_order->id_pemesanan); ?>">Tolak</a>
                                        <?php } else if ($row_order->bukti_transfer != '' && $row_order->status == 'Order') { ?>
                                            <a class="btn btn-primary btn-sm" href="<?= base_url('penjualan/proses/' . $row_order->id_pemesanan); ?>">Proses</a>
                                            <a class="btn btn-warning btn-sm" href="<?= base_url('penjualan/ditolak/' . $row_order->id_pemesanan); ?>">Tolak</a>
                                            <?php } else if ($row_order->bukti_transfer == '' && $row_order->status == 'Ditolak' ) { ?>
                                            <a class="btn btn-primary btn-sm" href="<?= base_url('penjualan/proses/' . $row_order->id_pemesanan); ?>">Proses</a>
                                            <a onclick='return confirm("Apakah anda yakin menghapus data ini?")' class="btn btn-danger btn-sm" href="<?= base_url('penjualan/hapus_penjualan/' . $row_order->id_pemesanan); ?>"><i class="bi bi-trash"></i></a><br>
                                            <?php } else if ($row_order->bukti_transfer != '' && $row_order->status == 'Ditolak' ) { ?>
                                                <a class="btn btn-primary btn-sm" href="<?= base_url('penjualan/proses/' . $row_order->id_pemesanan); ?>">Proses</a>
                                                <a onclick='return confirm("Apakah anda yakin menghapus data ini?")' class="btn btn-danger btn-sm" href="<?= base_url('penjualan/hapus_penjualan/' . $row_order->id_pemesanan); ?>"><i class="bi bi-trash"></i></a><br>

                                            <?php } ?>
                                                

                                        
                                    </td>
                                </tr>
                              <?php } ?>
                            <?php } ?>


                            <!-- non urgent -->
                            <?php 
                            foreach ($data_order as $row_order) {

                                if ($row_order->bukti_transfer != '' && $row_order->status == 'Order') { } else {
                            ?>
                                <tr id="data-pesanan">
                                    <td><?= date('d-m-Y', strtotime($row_order->tgl_pemesanan)) ?> </td>
                                    <td><?= $row_order->no_order; ?></td>
                                    <td>
                                        <b><?= $row_order->kurir; ?></b> <br>
                                        <a><?= $row_order->jenis_ongkir; ?></a> <br>
                                        <a>Rp. <?= number_format($row_order->biaya_kirim, 0, ',', '.') ?></a>
                                    </td>
                                    <td>
                                        Rp. <?= number_format($row_order->total_bayar, 0, ',', '.'); ?> <br>
                                        <?php if ($row_order->bukti_transfer == '' && $row_order->status == 'Order') { ?>
                                            <span style="color: blue;">Menunggu Pembayaran</span>
                                        <?php } else if ($row_order->status == 'Ditolak' ) { ?>
                                            <span style="color: red;">Permintaan Ditolak</span>
                                            <?php } else { ?>
                                            <span style="color: blue;">Menunggu Verifikasi</span>
                                            <?php } ?>
                                            <br>
                                        <?php if ($row_order->bukti_transfer != '') { ?>
                                            <button type="button" class="btn btn-primary btn-sm btnbukti" data-toggle="modal" data-id="<?= $row_order->id_pemesanan ?>">
                                            Lihat Bukti Bayar
                                        </button>
                                        <?php } ?>
                                        
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btndetail" data-toggle="modal" data-id="<?= $row_order->id_pemesanan ?>">
                                            Detail
                                        </button>
                                    </td>
                                    <td>
                                        <?php if ($row_order->bukti_transfer == '' && $row_order->status == 'Order'  ) { ?>
                                             <a class="btn btn-warning btn-sm" href="<?= base_url('penjualan/ditolak/' . $row_order->id_pemesanan); ?>">Tolak</a>
                                        <?php } else if ($row_order->bukti_transfer != '' && $row_order->status == 'Order') { ?>
                                            <a class="btn btn-primary btn-sm" href="<?= base_url('penjualan/proses/' . $row_order->id_pemesanan); ?>">Proses</a>
                                            <a class="btn btn-warning btn-sm" href="<?= base_url('penjualan/ditolak/' . $row_order->id_pemesanan); ?>">Tolak</a>
                                            <?php } else if ($row_order->bukti_transfer == '' && $row_order->status == 'Ditolak' ) { ?>
                                            <a class="btn btn-primary btn-sm" href="<?= base_url('penjualan/proses/' . $row_order->id_pemesanan); ?>">Proses</a>
                                            <a onclick='return confirm("Apakah anda yakin menghapus data ini?")' class="btn btn-danger btn-sm" href="<?= base_url('penjualan/hapus_penjualan/' . $row_order->id_pemesanan); ?>"><i class="bi bi-trash"></i></a><br>
                                            <?php } else if ($row_order->bukti_transfer != '' && $row_order->status == 'Ditolak' ) { ?>
                                                <a class="btn btn-primary btn-sm" href="<?= base_url('penjualan/proses/' . $row_order->id_pemesanan); ?>">Proses</a>
                                                <a onclick='return confirm("Apakah anda yakin menghapus data ini?")' class="btn btn-danger btn-sm" href="<?= base_url('penjualan/hapus_penjualan/' . $row_order->id_pemesanan); ?>"><i class="bi bi-trash"></i></a><br>

                                            <?php } ?>
                                                

                                        
                                    </td>
                                </tr>
                             <?php  } ?>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane" id="tab_2">
                <div class="table-content table-responsive">
                    <table class="table table-hover">
                        <thead align="center">
                            <tr id="data-pesanan">
                                <th>Tanggal Transaksi</th>
                                <th>No. Transaksi</th>
                                <th>Ekspedisi</th>
                                <th>Total Transaksi</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data_proses as $row_proses) {
                            ?>
                                <tr id="data-pesanan">
                                   <td><?= date('d-m-Y', strtotime($row_proses->tgl_pemesanan)) ?> </td>
                                    <td><?= $row_proses->no_order; ?></td>
                                    <td>
                                        <b><?= $row_proses->kurir; ?></b> <br>
                                        <a><?= $row_proses->jenis_ongkir; ?></a> <br>
                                        <a>Rp. <?= number_format($row_proses->biaya_kirim, 0, ',', '.') ?></a>
                                    </td>
                                    <td>
                                        Rp. <?= number_format($row_proses->total_bayar, 0, ',', '.'); ?> <br>
                                        <span style="color: blue;">Diproses / Dikemas</span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btndetail" data-toggle="modal" data-id="<?= $row_proses->id_pemesanan ?>">
                                            Detail
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Kirim
                                        </button>
                                    </td>
                                </tr>



                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form method="POST" action="<?= base_url('penjualan/kirim/'); ?>" enctype="multipart/form-data">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><?= $row_proses->no_order; ?></h5>
                                                    
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Ekspedisi</label>
                                                        <input type="text" class="form-control" name="atas_nama" value="<?= $row_proses->kurir ?>" readonly>
                                                        <input type="hidden" class="form-control" name="id_pemesanan" value="<?= $row_proses->id_pemesanan ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Paket</label>
                                                        <input type="text" class="form-control" name="nama_bank" value="<?= $row_proses->jenis_ongkir ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Biaya Ongkir</label>
                                                        <input type="text" class="form-control" name="nama_bank" value="<?= $row_proses->biaya_kirim ?>" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">No. Resi</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="no_resi" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane" id="tab_3">
                <div class="table-content table-responsive">
                    <table class="table table-hover">
                        <thead align="center">
                            <tr>
                                <th>Tanggal Transaksi</th>
                                <th>No. Transaksi</th>
                                <th>Ekspedisi</th>
                                <th>Total Transaksi</th>
                                <th>Detail</th>
                                <th>No. Resi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data_kirim as $row_kirim) {
                            ?>
                                <tr>
                                    <td><?= date('d-m-Y', strtotime($row_kirim->tgl_pemesanan)) ?> </td>
                                    <td><?= $row_kirim->no_order; ?></td>
                                    <td>
                                        <b><?= $row_kirim->kurir; ?></b> <br>
                                        <a><?= $row_kirim->jenis_ongkir; ?></a> <br>
                                        <a>Rp. <?= number_format($row_kirim->biaya_kirim, 0, ',', '.') ?></a>
                                    </td>
                                    <td>
                                        Rp. <?= number_format($row_kirim->total_bayar, 0, ',', '.'); ?> <br>
                                        <span style="color: blue;">Dikirim</span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-info btndetail" data-toggle="modal" data-id="<?= $row_kirim->id_pemesanan ?>">
                                            Detail
                                        </button>
                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-sm"><?= $row_kirim->no_resi ?></a>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane" id="tab_4">
                <div class="table-content table-responsive">
                    <table class="table table-hover">
                        <thead align="center">
                            <tr>
                                <th>Tanggal Transaksi</th>
                                <th>No. Transaksi</th>
                                <th>Ekspedisi</th>
                                <th>Total Transaksi</th>
                                <th>Detail</th>
                                <th>No. Resi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data_selesai as $row_selesai) {
                            ?>
                                <tr>
                                    <td><?= date('d-m-Y', strtotime($row_selesai->tgl_pemesanan)) ?> </td>
                                    <td><?= $row_selesai->no_order; ?></td>
                                    <td>
                                        <b><?= $row_selesai->kurir; ?></b> <br>
                                        <a><?= $row_selesai->jenis_ongkir; ?></a> <br>
                                        <a>Rp. <?= number_format($row_selesai->biaya_kirim, 0, ',', '.') ?></a>
                                    </td>
                                    <td>
                                        Rp. <?= number_format($row_selesai->total_bayar, 0, ',', '.'); ?> <br>
                                        <span style="color: blue;">Selesai</span>
                                    </td>
                                     <td>
                                        <button type="button" class="btn btn-info btndetail" data-toggle="modal" data-id="<?= $row_selesai->id_pemesanan ?>">
                                            Detail
                                        </button>
                                    </td>
                                    <td>


                                        <a class="btn btn-success btn-sm"><?= $row_selesai->no_resi ?></a>

                                        <a onclick='return confirm("Apakah anda yakin menghapus data ini?")' class='btn btn-danger' href='<?= base_url('penjualan/hapus_penjualan/' . $row_selesai->id_pemesanan); ?>'><i class="bi bi-trash"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" id="dataedit">
            
        </div>
    </div>
</div>

<!-- Modal bayar -->
<div class="modal fade" id="modalupdate" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" id="dataupdate">
            
        </div>
    </div>
</div>