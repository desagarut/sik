<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOKTzsvtw8j-TJI8dmJ228bXASq4C-S7U&callback=initMap&v=weekly" defer></script>

<script>
    var map
    var KantorKecamatan

    function initMap() {
        <?php if (!empty($desa['lat']) && !empty($desa['lng'])) : ?>
            var center = {
                lat: <?= $desa['lat'] ?>,
                lng: <?= $desa['lng'] ?>
            }
        <?php else : ?>
            var center = {
                lat: -7.34298008144879,
                lng: 107.217667252986,
            }
        <?php endif; ?>

        //Jika posisi kantor Kecamatan belum ada, maka posisi peta akan menampilkan seluruh Indonesia
        map = new google.maps.Map(document.getElementById("peta_wilayah_kecamatan"), {
            center,
            zoom: <?= $desa['zoom'] ?>,
            mapTypeId: google.maps.MapTypeId.<?= $desa['map_tipe'] ?>
        });

        KantorKecamatan = new google.maps.Marker({
            position: center,
            map: map,
            title: 'Kantor <?php echo ucwords($this->setting->sebutan_kecamatan) . " " ?><?php echo ucwords($desa['nama_kecamatan']) ?>',
            animation: google.maps.Animation.BOUNCE
        });

        <?php if (!empty($desa['path'])) : ?>
            let polygon_kecamatan = <?= $desa['path']; ?>;

            polygon_kecamatan[0].map((arr, i) => {
                polygon_kecamatan[i] = {
                    lat: arr[0],
                    lng: arr[1]
                }
            })

            //Style polygon
            var batasWilayah = new google.maps.Polygon({
                paths: polygon_kecamatan,
                strokeColor: '<?= $desa['warna_garis'] ?>',
                strokeOpacity: 1,
                strokeWeight: 3,
                fillColor: '<?= $desa['warna'] ?>',
                fillOpacity: 0.25
            });

            batasWilayah.setMap(map)
        <?php endif; ?>
    }
</script>

<!-- widget Peta Wilayah Desa -->

<div class="col-md-8">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Peta Wilayah Kecamatan</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove"> <i class="fas fa-times"></i> </button>
            </div>
        </div>
        <div class="card-body">
            <div id="peta_wilayah_kecamatan" class="set-map" style="height: 280px"></div>
        </div>
    </div>
</div>