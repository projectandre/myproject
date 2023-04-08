<style>
    @media screen and (max-width: 550px) {
        .peta {
            width: 100%;
            height: 450px;
        }
    }

    /*untuk layar device berukuran besar*/
    @media screen and (min-width: 800px) {
        .peta {
            width: 100%;
            height: 800px;
        }
    }
</style>

<div class="row">
    <div class="col-sm-8">
        <div id="map" class="peta"></div><br>
    </div>
    <div class="col-sm-4">
        <?php
        // Notif gagal input
        echo validation_errors('<div class="alert alert-danger">', '</div>');

        // notif data masuk db
        if ($this->session->flashdata('pesan')) {
            echo '<div>';
            echo $this->session->flashdata('pesan');
            echo '</div>';
        }
        ?>

        <?= form_open_multipart('lokasi/edit/' . $lokasi->id_data); ?>

        <div class="form-group">
            <label for="nama_kantor">Nama Lokasi</label>
            <input value="<?= $lokasi->nama_kantor; ?>" class="form-control" name="nama_kantor" id="nama_kantor" placeholder="Nama Kantor..">
        </div>

        <div class="form-group">
            <label for="petugas">Petugas</label>
            <input value="<?= $lokasi->petugas; ?>" class="form-control" name="petugas" id="petugas" placeholder="Nama Petugas..">
        </div>

        <div class="form-group">
            <label for="npp">NPP</label>
            <input value="<?= $lokasi->npp; ?>" class="form-control" name="npp" id="npp" placeholder="NPP..">
        </div>
        <div class="form-group">
            <label for="grade">Grade</label>
            <input value="<?= $lokasi->grade; ?>" class="form-control" name="grade" id="grade" placeholder="Grade..">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input value="<?= $lokasi->alamat; ?>" class="form-control" name="alamat" id="alamat" placeholder="Alamat..">
        </div>
        <div class="form-group">
            <label for="informasi">Informasi</label>
            <textarea class="form-control" name="informasi" id="informasi" rows="3" placeholder="Informasi.."><?= $lokasi->informasi; ?></textarea>
        </div>
        <div class="form-group">
            <label for="latitude">Latitude</label>
            <input value="<?= $lokasi->latitude; ?>" class="form-control" name="latitude" id="latitude" placeholder="Latitude..">
        </div>
        <div class="form-group">
            <label for="longitude">longitude</label>
            <input value="<?= $lokasi->longitude; ?>" class="form-control" name="longitude" id="longitude" placeholder="Longitude..">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('lokasi'); ?>" class="btn btn-warning">Kembali</a>
        <?= form_close() ?>
    </div>
</div>


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
        layers: [peta1]
    });

    var baseLayers = {
        'Default': peta1,
        'Satelite': peta2,
        'Street': peta3,
        'Dark': peta4,

    };
    var layerControl = L.control.layers(baseLayers).addTo(map);

    // get Coordinat
    var latInput = document.querySelector("[name=latitude]");
    var lngInput = document.querySelector("[name=longitude]");

    var curLocation = [<?= $lokasi->latitude; ?>, <?= $lokasi->longitude; ?>];

    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: 'true',
    });

    // mengambil koordinat saat marker digeser
    marker.on('dragend', function(e) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            curLocation
        }).bindPopup(position).update();
        $("#latitude").val(position.lat);
        $("#longitude").val(position.lng);

    });
    map.on("click", function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        if (!marker) {
            marker = L.marker(e.latlng).addTo(map);
        } else {
            marker.setLatLng(e.latlng);
        }
        latInput.value = lat;
        lngInput.value = lng;
    });

    map.addLayer(marker);
</script>