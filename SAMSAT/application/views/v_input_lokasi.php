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
            echo $this->session->flashdata('pesan');
        }
        ?>

        <?= form_open('lokasi/input') ?>

        <div class="form-group">
            <label for="nama_kantor">Nama Kantor*</label>
            <input class="form-control" name="nama_kantor" id="nama_kantor" value="<?= set_value('nama_kantor'); ?>" placeholder="Nama Kantor..">
        </div>

        <div class="form-group">
            <label for="petugas">Nama Petugas*</label>
            <input class="form-control" name="petugas" id="petugas" value="<?= set_value('petugas'); ?>" placeholder="Nama Petugas..">
        </div>

        <div class="form-group">
            <label for="npp">NPP</label>
            <input class="form-control" name="npp" id="npp" value="<?= set_value('npp'); ?>" placeholder="Nama NPP..">
        </div>

        <div class="form-group">
            <label for="grade">Grade</label>
            <input class="form-control" name="grade" id="grade" value="<?= set_value('grade'); ?>" placeholder="Nama Grade..">
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input class="form-control" name="alamat" id="alamat" value="<?= set_value('alamat'); ?>" placeholder="Alamat..">
        </div>

        <div class="form-group">
            <label for="informasi">Informasi</label>
            <textarea class="form-control" name="informasi" id="informasi" rows="3" placeholder="Informasi.."><?= set_value('informasi'); ?></textarea>
        </div>

        <div class="form-group">
            <label for="latitude">Latitude*</label>
            <input class="form-control" name="latitude" id="latitude" value="<?= set_value('latitude'); ?>" placeholder="Latitude..">
        </div>

        <div class="form-group">
            <label for="longitude">longitude*</label>
            <input class="form-control" name="longitude" id="longitude" value="<?= set_value('longitude'); ?>" placeholder="Longitude..">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-warning">Reset</button>
        <?= form_close() ?>
    </div>
</div><br>


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
        center: [-5.431914342456929, 105.26064753908614],
        zoom: 14,
        layers: [peta3]
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

    var curLocation = [-5.431914342456929, 105.26064753908614];

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