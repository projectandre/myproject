<?php
// notif data masuk db
if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-primary">';
    echo $this->session->flashdata('pesan');
    echo '</div>';
}
?>

<div class="card mb-4 col-md-6">
    <div class="card-body "><br>
    	<section class="content">
                <form action="<?= site_url(); ?>manager/simpan_registrasi" method="POST">
                    <div class="mb-3">
                        <label for="nama">Nama Anda</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="email">Email Anda</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                         <label for="yourPassword">Password</label>
                         <input type="password" name="password" class="form-control" id="password" required>
                         <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                          <label for="yourPassword">Ulangi Password</label>
                          <input type="password" name="password2" class="form-control" id="password2" required>
                          <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                          <label for="role">Role</label>
                          <select class="form-control" name="role" id="role" required>
                            <option value="" selected disabled>Pilih Role</option>
                            <?php foreach ($role as $key => $value) { ?>
                                <option value="<?= $value->role_id; ?>"><?= $value->nama_role; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= site_url(); ?>admin/akun_manager" style="margin-left: 10px;" class="btn btn-secondary float-right">Kembali</a>
                </form>
            </section>
    </div>
</div>
	