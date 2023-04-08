<a class='btn btn-xs btn-primary mt-3' data-bs-toggle="modal" data-bs-target="#tambahHero" href='<?= base_url('lokasi/export'); ?>'><i class="bi bi-plus"></i> Tambah Hero</a><br><br>
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
            <thead align="center">
                <tr>
                    <th>No</th>
                    <th>Judul </th>
                    <th>Teks </th>
                    <th>Status </th>
                    <th>Gambar </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($hero as $value) { ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td style="width: 300px;"><?= $value->judul_hero; ?></td>
                        <td style="width: 300px;"><?= $value->teks_hero; ?></td>
                        <?php if ( $value->status_hero == 'belum disetujui' ): ?>
                            <td>Belum Disetujui</td>
                        <?php endif ?>
                        <?php if ( $value->status_hero== 'disetujui' ): ?>
                            <td>Disetujui</td>
                        <?php endif ?>
                        <td><img src="<?= base_url('gambar/hero/') . $value->gambar_hero; ?>" alt="gambar hero" width="200" height="180"></td>
                        <td>
                            <a class='btn btn-warning' href='<?= base_url('hero/edit_hero/' . $value->id_hero); ?>'><i class="bi bi-pencil-square"></i></a>
                            <a onclick='return confirm("Apakah anda yakin menghapus data ini?")' class='btn btn-danger' href='<?= base_url('hero/hapus_hero/' . $value->id_hero); ?>'><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahHero" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Hero</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('hero/tambah_hero'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="judul_hero">Judul Hero</label>
                        <input type="text" name="judul_hero" id="judul_hero" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="teks_hero">Teks Hero</label>
                        <input type="text" name="teks_hero" id="teks_hero" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="gambar_hero">Gambar</label>
                        <input class="form-control" type="file" id="gambar_hero" name="gambar_hero" required>
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