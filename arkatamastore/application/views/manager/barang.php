<?php
// Notif gagal input
echo validation_errors('<div class="alert alert-danger">', '</div>');

// notif data masuk db
if ($this->session->flashdata('pesan')) {
    echo $this->session->flashdata('pesan');
}
?>
<div class="card ">
    <div class="card-body"><br>
        <div class="col d-flex justify-content-end ">

          
            <div class="col-md-3">
                <?php echo form_open('manager/search_produk'); ?>
                <input type="text" class="form-control" name="keyword" required placeholder="Cari produk.. " id="keyword" value="<?= set_value('keyword'); ?>">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary mb-3" style="margin-left: 5px;">Cari</button><br>
                <?php echo form_close(); ?>
            </div>
        
            

        </div>
       <div class="table-responsive">
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk/Layanan</th>
                  
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($admin as $key => $value) { ?>



                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $value['nama_barang']; ?></td>
                       
                        <td><?= $value['nama_kategori']; ?></td>
                        <td><?= $value['stok_barang']; ?></td>
                        <td>
                            <a class='btn btn-sm btn-primary' href='<?= base_url('manager/detail_barang/' . $value['id_barang']); ?>'><i class="bi bi-search"></i></a>
                            

                            <a onclick='return confirm("Apakah anda yakin menghapus data ini?")' class='btn btn-sm btn-danger' href='<?= base_url('manager/delete_barang/' . $value['id_barang']); ?>'><i class="bi bi-trash"></i></a>
                            <?php if ($value['status_produk'] == 'belum disetujui') { ?>
                                <a class='btn btn-sm btn-success' href='<?= base_url('manager/setujui_produk/' . $value['id_barang']); ?>'><i class="bi bi-check"></i></a>
                            <?php } ?>
                        </td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
       </div>
    </div>
</div>