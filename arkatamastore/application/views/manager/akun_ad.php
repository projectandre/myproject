<a href="<?= base_url('manager/tampil_login_admin')?>" class='btn btn-xs btn-primary mt-3'><i class="bi bi-plus"></i> Tambah Admin/Manager</a><br><br>
<?php
// notif data masuk db
if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-danger">';
    echo $this->session->flashdata('pesan');
    echo '</div>';
}
?>


<div class="card">
    <div class="card-body "><br><br>
        <section class="content">
            <div class="col d-flex justify-content-end">

          
            <div class="col-md-3">
                <?php echo form_open('manager/search_admin'); ?>
                <input type="text" class="form-control" name="keyword" required placeholder="Cari admin.. " id="keyword" value="<?= set_value('keyword'); ?>">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary mb-3" style="margin-left: 5px;">Cari</button><br>
                <?php echo form_close(); ?>
            </div>
        
        </div>
            <div class="table-responsive table-hover">
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($akun as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value->nama; ?></td>
                                <td><?= $value->email; ?></td>
                                <td>
                                    <a onclick='return confirm("Apakah anda yakin menghapus akun ini?")' class='btn btn-xs btn-danger' href='<?= base_url('admin/delete_akunAD/' . $value->id_user); ?>'><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>


