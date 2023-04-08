<div class="card col-md-12">
    <div class="card-body"><br>
        <?= form_open_multipart('admin/update_barang/' . $admin[0]['id_barang']); ?>
<div class="mb-3">

    <label for="nama_barang">Nama Produk/Layanan</label>
    <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?= $admin[0]['nama_barang']; ?>">
    <?= form_error('nama_barang', '<small class="text-danger pl-3">', '</small>'); ?>
</div>
<div class="mb-3">
    <label for="keterangan_barang">Keterangan</label>
    <textarea class='form-control' name="keterangan_barang" id="keterangan_barang" rows="3" placeholder="Keterangan.." required><?php echo $admin[0]['keterangan_barang'];  ?></textarea>
    <?= form_error('keterangan_barang', '<small class="text-danger pl-3">', '</small>'); ?>
</div>
<div class="mb-3">
    <label for="nama_kategori">Kategori</label>
    <select class="form-control" name="id_kategori" id="id_kategori" required>
        <?php foreach ($isiKategori as $key => $value) { ?>
            <option value="<?= $value['id_kategori']; ?>" <?= ($value['id_kategori'] == $admin[0]['id_kategori']) ? 'selected' : ''; ?>><?= $value['nama_kategori']; ?></option>
        <?php } ?>
    </select>
</div>
<div class="mb-3">
    <label for="harga_barang">Harga</label>
    <input type="text" name="harga_barang" id="harga_barang" class="form-control" value="<?= $admin[0]['harga_barang']; ?>">
    <?= form_error('harga_barang', '<small class="text-danger pl-3">', '</small>'); ?>
</div>
<div class="mb-3">
    <label for="stok_barang">Stok</label>
    <input type="text" name="stok_barang" id="stok_barang" class="form-control" value="<?= $admin[0]['stok_barang']; ?>">
    <?= form_error('stok_barang', '<small class="text-danger pl-3">', '</small>'); ?>
</div>
<div class="mb-3">
    <label for="kondisi_barang">Kondisi</label>
    <input type="text" name="kondisi_barang" id="kondisi_barang" class="form-control" value="<?= $admin[0]['kondisi_barang']; ?>">
    <?= form_error('kondisi_barang', '<small class="text-danger pl-3">', '</small>'); ?>
</div>
<div class="mb-3">
    <label for="berat_barang">Berat</label>
    <input type="text" name="berat_barang" id="berat_barang" class="form-control" value="<?= $admin[0]['berat_barang']; ?>">
    <?= form_error('berat_barang', '<small class="text-danger pl-3">', '</small>'); ?>
</div>
<div class="mb-3">
    <label for="gambar_barang">Gambar</label>
    <input class="form-control" type="file" id="gambar_barang" name="gambar_barang" value="<?= $admin[0]['gambar_barang']; ?>">
</div>
<div class="mb-5">
    <a href="<?= base_url('admin'); ?>" class="btn btn-danger">Kembali</a>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>
<?= form_close() ?>
    </div>
</div>