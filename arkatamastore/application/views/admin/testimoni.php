<?php
// notif data masuk db
if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-primary">';
    echo $this->session->flashdata('pesan');
    echo '</div>';
}
?>

<div class="card">
    <div class="card-body "><br>
        <section class="content">
            <div class="col d-flex justify-content-end">

          
            <div class="col-md-3">
                <?php echo form_open('admin/search_testi_admin'); ?>
                <input type="text" class="form-control" name="keyword" required placeholder="Cari.. " id="keyword" value="<?= set_value('keyword'); ?>">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary mb-3" style="margin-left: 5px;">Cari</button><br>
                <?php echo form_close(); ?>
            </div>
        </div>
            <i>Testimoni yang ditampilkan 1-10 Terbaru</i>
            <div class="table-responsive ">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Customers</th>
                            <th>Email</th>
                            <th>Komentar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($testimoni as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nama'];  ?></td>
                                <td><?= $value['email'];  ?></td>
                                <td ><?= $value['komentar'];  ?></td>
                                <td>
                                    <a onclick='return confirm("Apakah anda yakin menghapus akun ini?")' class='btn btn-xs btn-danger' href='<?= base_url('admin/delete_testi/' . $value['id_testi']); ?>'><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
