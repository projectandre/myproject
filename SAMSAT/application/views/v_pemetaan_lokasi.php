<style>
    @media screen and (max-width: 550px) {
        .peta {
            width: 100%;
            height: 520px;
        }
    }

    /*untuk layar device berukuran besar*/
    @media screen and (min-width: 800px) {
        .peta {
            width: 100%;
            height: 650px;
        }
    }
</style>
<?php
// notif data masuk db
if ($this->session->flashdata('pesan')) {
    echo $this->session->flashdata('pesan');
}
?>


<div id="map" class="peta"></div>
<br><br>

<script src="<?= base_url('assets/leaflet-easyprint/dist/bundle.js'); ?>"></script>
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
        center: [-5.374517805784923, 105.22335858085205],
        zoom: 10,
        layers: [peta3]
    });

    var baseLayers = {
        'Default': peta1,
        'Satelite': peta2,
        'Street': peta3,
        'Dark': peta4,

    };
    var layerControl = L.control.layers(baseLayers).addTo(map);

    <?php foreach ($lokasi as $key => $value) { ?>
        L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>])
            .bindPopup("<b><?= $value->nama_kantor; ?></b><br>" +
                "Petugas: <?= $value->petugas; ?><br><br>" +
                "<div class='text-center'>" +
                "<a class='btn btn-xs btn-success'" +
                "href='<?= base_url('lokasi/detail/' . $value->id_data); ?>'><i class='fa fa-search-plus'></i></a>   " +
                "<a class='btn btn-xs btn-warning'" +
                "href='<?= base_url('lokasi/edit/' . $value->id_data); ?>'><i class='fa fa-edit'></i></a>   " +
                "<a onclick='return confirm()' class='btn btn-xs btn-danger'" +
                "href='<?= base_url('lokasi/delete/' . $value->id_data); ?>'><i class='fa fa-trash'></i></a>" +
                "</div>"
            )
            .addTo(map);
    <?php } ?>

    L.easyPrint({
        title: 'My awesome image button',
        position: 'topleft',
        exportOnly: true,
        filename: 'JasaRaharja',
        sizeModes: ['Current', 'A4Portrait', 'A4Landscape']
    }).addTo(map);

    L.easyPrint({
        title: 'My awesome print button',
        position: 'topleft',
        filename: 'JasaRaharja',
        sizeModes: ['Current', 'A4Portrait', 'A4Landscape']
    }).addTo(map);
</script>