<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800">Registrasi Akun</strong></h1> -->

    <div class="card-body">

        <div class="content-wrapper">
            <div class="row">
                <section class="col-sm-6">
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url('lokasi/registrasi_akun'); ?>" method="POST">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?= set_value('nama'); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?= set_value('username'); ?>" required>
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password" required>
                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password" required>

                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3" onclick="return confirm ('Apa anda yakin menambah akun ini?')">Simpan</button>
                        <button type="reset" class="btn btn-danger mt-3 ml-3">Reset</button>

                    </form>


                </section>
            </div>
        </div>
    </div>
</div>