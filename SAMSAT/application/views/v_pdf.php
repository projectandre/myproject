<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        
        
        h1 {
            text-align: center;
        }

        .data {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            min-height: 400px;
        }

        .data thead tr {
            background-color: #277BC0;
            color: #fff;
            text-align: left;
            font-weight: bold;
        }

        .data th,
        .data td {
            padding: 12px 12px;
        }
    </style>
    <title>Cetak Data Samsat JR</title>


</head>

<body>
    <h1>DATA PETUGAS SAMSAT LAMPUNG</h1>
    <h1>JASA RAHARJA</h1>
    <table class="data" width="100%" cellspacing="0" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kantor</th>
                <th>Petugas</th>
                <th>NPP</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($lokasi as $key => $value) { ?>



                <tr>
                    <td align="center"><?= $no++; ?></td>
                    <td><?= $value->nama_kantor; ?></td>
                    <td><?= $value->petugas; ?></td>
                    <td><?= $value->npp; ?></td>
                    <td><?= $value->grade; ?></td>
                </tr>

            <?php } ?>
        </tbody>
    </table>
</body>

</html>