<a class='btn btn-xs btn-primary mt-3' data-bs-toggle="modal" data-bs-target="#tambahBarang" href='<?= base_url('lokasi/export'); ?>'><i class="bi bi-plus"></i> Tambah Produk</a><br><br>
<?php
// Notif gagal input
echo validation_errors('<div class="alert alert-danger">', '</div>');

// notif data masuk db
if ($this->session->flashdata('pesan')) {
    echo $this->session->flashdata('pesan');
}
?>
<div class="card">
    <div class="card-body"><br>

        <div class="col d-flex justify-content-end">

          
            <div class="col-md-3">
                <?php echo form_open('admin/search_produk_admin'); ?>
                <input type="text" class="form-control" name="keyword" required placeholder="Cari produk.. " id="keyword" value="<?= set_value('keyword'); ?>">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary mb-3" style="margin-left: 5px;">Cari</button><br>
                <?php echo form_close(); ?>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($admin as $key => $value) { ?>



                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $value['nama_barang']; ?></td>
                       
                        <td><?= $value['nama_kategori']; ?></td>
                        <td><?= $value['stok_barang']; ?></td>
                        <?php if ( $value['status_produk'] == 'belum disetujui' ): ?>
                            <td>Belum Disetujui</td>
                        <?php endif ?>
                        <?php if ( $value['status_produk']== 'disetujui' ): ?>
                            <td>Disetujui</td>
                        <?php endif ?>
                        
                        <td>
                            <a class='btn btn-primary' href='<?= base_url('admin/detail_barang/' . $value['id_barang']); ?>'><i class="bi bi-search"></i></a>
                            <a class='btn btn-warning' href='<?= base_url('admin/edit_barang/' . $value['id_barang']); ?>'><i class="bi bi-pencil-square"></i></a>
                            <a onclick='return confirm("Apakah anda yakin menghapus data ini?")' class='btn btn-danger' href='<?= base_url('admin/delete_barang/' . $value['id_barang']); ?>'><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/tambah_barang'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama_barang">Nama Produk</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan_barang">Keterangan</label>
                        <textarea class='form-control' name="keterangan_barang" id="keterangan_barang" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="kategori_barang">Kategori</label>
                        <select class="form-control" name="id_kategori" id="id_kategori" required>
                            <option value="" selected disabled>Pilih Kategori</option>
                            <?php foreach ($isiKategori as $key => $value) { ?>
                                <option value="<?= $value['id_kategori']; ?>"><?= $value['nama_kategori']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga_barang">Harga</label>
                        <input type="text" name="harga_barang" id="harga_barang" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="stok_barang">Stok</label>
                        <input type="text" name="stok_barang" id="stok_barang" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="kondisi_barang">Kondisi</label>
                        <input type="text" name="kondisi_barang" id="kondisi_barang" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="berat_barang">Berat</label>
                        <input type="text" name="berat_barang" id="berat_barang" placeholder="Dalam bentuk gram.." class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar_barang">Gambar</label>
                        <input class="form-control" type="file" id="gambar_barang" name="gambar_barang" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>