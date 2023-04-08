<a class='btn btn-xs btn-primary mt-3' data-bs-toggle="modal" data-bs-target="#tambahKategori"><i class="bi bi-plus"></i> Tambah Kategori</a><br><br>
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
       <div class="table-responsive">
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($admin as $key => $value) { ?>



                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $value['nama_kategori']; ?></td>
                        <td>
                            <a class='btn btn-warning' href='<?= base_url('admin/edit_kategori/' . $value['id_kategori']); ?>'><i class="bi bi-pencil-square"></i></a>
                            <a onclick='return confirm("Apakah anda yakin menghapus data ini?")' class='btn btn-danger' href='<?= base_url('admin/delete_kategori/' . $value['id_kategori']); ?>'><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
       </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/tambah_kategori'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" name="nama_kategori" id="nama_kategori" class="form-control">
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