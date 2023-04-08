<?php
// notif data masuk db
if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-danger">';
    echo $this->session->flashdata('pesan');
    echo '</div>';
}
?>

<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($lokasi as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value->nama; ?></td>
                    <td><?= $value->username; ?></td>
                    <td>***********</td>
                    <td>
                        <a onclick='return confirm("Apakah anda yakin menghapus akun ini?")' class='btn btn-xs btn-danger' href='<?= base_url('lokasi/delete_akun/' . $value->id_user); ?>'><i class="fa fa-trash"></i></a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</div>