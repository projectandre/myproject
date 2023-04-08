<?php $attributes = array('target' => '_blank'); ?>

<div class="card">
    <div class="card-body"><br>
        <?= form_open_multipart('laporan/export/', $attributes);  ?>
        <div class="mb-3">
            <label for="judul_penjualan">Tanggal Awal</label>
            <input type="date" name="tgl_awal" id="tgl_awal" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="judul_penjualan">Tanggal Akhir</label>
            <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" required>
        </div>

        <div class="mb-5">
            <button type="submit" class="btn btn-primary">Cetak</button>
        </div>
        <?= form_close() ?>
    </div>
</div>