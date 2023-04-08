<div class="row">
    <div class="col-sm-6">
        <div id="map" style="width: 100%; height: 500px;"></div><br>
    </div>
    <div class="col-sm-6">

        <table class="table ">

            <tr>
                <th>Nama Kantor</th>
                <th>:</th>
                <td><?= $lokasi->nama_kantor; ?></td>
            </tr>
            <tr>
                <th>Petugas</th>
                <th>:</th>
                <td><?= $lokasi->petugas; ?></td>
            </tr>
            <tr>
                <th>NPP</th>
                <th>:</th>
                <td><?= $lokasi->npp; ?></td>
            </tr>
            <tr>
                <th>Grade</th>
                <th>:</th>
                <td><?= $lokasi->grade; ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <th>:</th>
                <td><?= $lokasi->alamat; ?></td>
            </tr>
            <tr>
                <th>Informasi</th>
                <th>:</th>
                <td><?= $lokasi->informasi; ?></td>
            </tr>
            <tr>
                <th>Latitude</th>
                <th>:</th>
                <td><?= $lokasi->latitude; ?></td>
            </tr>
            <tr>
                <th>Longitude</th>
                <th>:</th>
                <td><?= $lokasi->longitude; ?></td>
            </tr>


        </table>

        <a class="btn btn-warning" href="<?= base_url('lokasi') ?>">Kembali</a>

    </div>
</div>

<br><br>

<script>
    var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    });

    var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/satellite-v9'
    });


    var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/dark-v10'
    });

    var map = L.map('map', {
        center: [<?= $lokasi->latitude; ?>, <?= $lokasi->longitude; ?>],
        zoom: 14,
        layers: [peta3]
    });

    var baseLayers = {
        'Default': peta1,
        'Satelite': peta2,
        'Street': peta3,
        'Dark': peta4,

    };

    L.marker([<?= $lokasi->latitude; ?>, <?= $lokasi->longitude; ?>]).addTo(map).bindPopup("<b><?= $lokasi->nama_kantor; ?></b><br>" +
        "Petugas: <?= $lokasi->petugas; ?><br>"
    ).openPopup();
</script>