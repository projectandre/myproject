<div class="card col-md-12">
    <div class="card-body"><br>
        <?= form_open_multipart('admin/update_kategori/' . $admin->id_kategori); ?>
            <div class="mb-3">

                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="<?= $admin->nama_kategori; ?>">
            </div>

            <div class="mb-5">
                <a href="<?= base_url('admin/data_kategori'); ?>" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        <?= form_close() ?>
    </div>
</div>  