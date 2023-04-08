<div class="card">
    <div class="card-body"><br>
        <?= form_open_multipart('hero/update_hero/' .  $hero->id_hero); ?>
            <div class="mb-3">

                <label for="judul_hero">Judul Hero</label>
                <input type="text" name="judul_hero" id="judul_hero" class="form-control" value="<?= $hero->judul_hero; ?>">
                <?= form_error('judul_hero', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="mb-3">
                <label for="teks_hero">Teks Hero</label><br>
                <textarea class="form-control" rows="3" name="teks_hero" id="teks_hero"><?= $hero->teks_hero; ?></textarea>
                <?= form_error('teks_hero', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="mb-3">
                <label for="gambar_hero">Gambar Hero</label>
                <input class="form-control" type="file" id="gambar_hero" name="gambar_hero" value="<?= $hero->gambar_hero; ?>">
            </div>
            <div class="mb-5">
                <a href="<?= base_url('hero'); ?>" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        <?= form_close() ?>
    </div>
</div>