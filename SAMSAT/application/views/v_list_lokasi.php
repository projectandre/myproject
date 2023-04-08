<a class='btn btn-xs btn-danger' target="_blank" href='<?= base_url('lokasi/export'); ?>'><i class="fa fa-file-pdf"></i> Export PDF</a><br><br>
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kantor</th>
                <th>Petugas</th>
                <th>NPP</th>
                <th>Grade</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($lokasi as $key => $value) { ?>



                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value->nama_kantor; ?></td>
                    <td><?= $value->petugas; ?></td>
                    <td><?= $value->npp; ?></td>
                    <td><?= $value->grade; ?></td>
                    <td>
                        <a class='btn btn-xs btn-success' href='<?= base_url('lokasi/detail/' . $value->id_data); ?>'><i class="fa fa-search-plus"></i></a>
                        <a class='btn btn-xs btn-warning' href='<?= base_url('lokasi/edit/' . $value->id_data); ?>'><i class="fa fa-edit"></i></a>
                        <a onclick='return confirm("Apakah anda yakin menghapus data ini?")' class='btn btn-xs btn-danger' href='<?= base_url('lokasi/delete/' . $value->id_data); ?>'><i class="fa fa-trash"></i></a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
    <br><br>
</div>