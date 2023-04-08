<?php
// notif data masuk db
if ($this->session->flashdata('pesan')) {
    echo $this->session->flashdata('pesan');
}
?>

<div class="card mb-4 col-md-6">
    <div class="card-body "><br>
        <section class="content">
                <form action="<?= site_url(); ?>manager/ubah_password" method="POST">
                    <div class="mb-3">
                        <label for="nama">Nama Anda</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $this->session->userdata('nama') ?>" disabled>
                    </div>
                    <div class="mb-3">
                         <label for="yourPassword">Password Lama</label>
                         <input type="password" name="password_lama" class="form-control" id="password_lama" required>
                         <?= form_error('password_lama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                         <label for="yourPassword">Password Baru</label>
                         <input type="password" name="password_baru" class="form-control" id="password_baru" required>
                         <?= form_error('password_baru', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-3">
                          <label for="yourPassword">Ulangi Password Baru</label>
                          <input type="password" name="password_baru1" class="form-control" id="password_baru1" required>
                      
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('manager/'); ?>" style="margin-left: 10px;" class="btn btn-secondary float-right">Kembali</a>
                </form>
            </section>
    </div>
</div>
    