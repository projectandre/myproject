<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Registrasi Akun</strong></h1> -->

    <div class="card-body">

        <div class="content-wrapper">
            <div class="row">
                <section class="col-sm-6">
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url('lokasi/ubah_password'); ?>" method="POST">
                        <div class="form-group">
                            <label for="password_lama">Password Lama</label>
                            <input type="password" name="password_lama" id="password_lama" class="form-control" required>
                            <?= form_error('password_lama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password_baru">Password Baru</label>
                            <input type="password" name="password_baru" id="password_baru" class="form-control" required>
                            <?= form_error('password_baru', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password_baru1">Ulangi Password</label>
                            <input type="password" name="password_baru1" id="password_baru1" class="form-control" required>

                        </div>
                        <button type="submit" class="btn btn-primary mt-3" onclick="return confirm ('Apa anda yakin mengganti password?')">Simpan</button>
                        <button type="reset" class="btn btn-danger mt-3 ml-3">Reset</button>

                    </form>


                </section>
            </div>
        </div>
    </div>
</div>