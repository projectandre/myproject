
<div class="table-content table-responsive">
<table class="table table-hover">
    <thead align="center">
        <tr>
            <th>Foto</th>
            <th>Produk</th>
            <th>Harga Satuan</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody align="center">
        <?php $no = 1;
        foreach ($detail as $value) { 
            $subtotal = $value->harga_barang * $value->jumlah;
        ?>
            <tr>
                <td><img src="<?= base_url('uploads/') . $value->gambar_barang; ?>" width="100px" alt="Li's Product Image"></td>
                <td><?= $value->nama_barang; ?></td>
                <td>Rp. <?= number_format($value->harga_barang, 0, ',', '.'); ?></td>
                <td><?= $value->jumlah; ?></td>
                <td>Rp. <?= number_format($subtotal, 0, ',', '.'); ?></td>
                </td>
            </tr>

        <?php } ?>
    </tbody>
</table>
</div>

<?= form_open_multipart('penjualan/update_penjualan/' .  $penjualan->id_pemesanan); ?>
<?php
$subtotal = $penjualan->total_bayar - $penjualan->biaya_kirim;
?>
<div class="mb-3">
    <label for="judul_penjualan">Nama</label>
    <input type="text" name="nama" id="nama" class="form-control" value="<?= $penjualan->nama; ?>" readonly>
    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
</div>
<div class="mb-3">
    <label for="judul_penjualan">No. Telp</label>
    <input type="text" name="no_telp" id="no_telp" class="form-control" value="<?= $penjualan->no_telp; ?>" readonly>
    <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
</div>
<div class="mb-3">
    <label for="judul_penjualan">Alamat</label>
    <input type="text" name="alamat" id="alamat" class="form-control" value="<?= $penjualan->alamat; ?>" readonly>
    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
</div>
<div class="mb-3">
    <label for="judul_penjualan">Kurir</label>
    <input type="text" name="kurir" id="kurir" class="form-control" value="<?= $penjualan->kurir; ?>" readonly>
    <?= form_error('kurir', '<small class="text-danger pl-3">', '</small>'); ?>
</div>
<div class="mb-3">
    <label for="judul_penjualan">Jenis Ongkir</label>
    <input type="text" name="jenis_ongkir" id="jenis_ongkir" class="form-control" value="<?= $penjualan->jenis_ongkir; ?>" readonly>
    <?= form_error('jenis_ongkir', '<small class="text-danger pl-3">', '</small>'); ?>
</div>
<div class="mb-3">
    <label for="judul_penjualan">Biaya Ongkir</label>
    <input type="text" name="biaya_kirim" id="biaya_kirim" class="form-control" value="Rp. <?= number_format($penjualan->biaya_kirim, 0, ',', '.'); ?>" readonly>
    <?= form_error('biaya_kirim', '<small class="text-danger pl-3">', '</small>'); ?>
</div>
<div class="mb-3">
    <label for="judul_penjualan">Total Barang</label>
    <input type="text" name="total_barang" id="total_barang" class="form-control" value="Rp. <?= number_format($subtotal, 0, ',', '.'); ?>" readonly>
    <?= form_error('total_barang', '<small class="text-danger pl-3">', '</small>'); ?>
</div>
<div class="mb-3">
    <label for="judul_penjualan">Total Transaksi</label>
    <input type="text" name="total_bayar" id="total_bayar" class="form-control" value="Rp. <?= number_format($penjualan->total_bayar, 0, ',', '.'); ?>" readonly>
    <?= form_error('total_bayar', '<small class="text-danger pl-3">', '</small>'); ?>
</div>

<div class="mb-3">
    <label for="judul_penjualan">Keputusan</label>
    <select id="status" name="status" class="form-control">
        <option value="Proses" <?php if($penjualan->status == 'Proses') echo"selected"; ?>>Proses</option>
        <option value="Pending" <?php if($penjualan->status == 'Pending') echo"selected"; ?>>Pending</option>
    </select>
</div>

</div>
<div class="mb-5">
    <a href="<?= base_url('penjualan'); ?>" class="btn btn-danger">Kembali</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>
<?= form_close() ?>