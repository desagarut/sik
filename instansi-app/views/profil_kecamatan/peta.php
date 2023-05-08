<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOKTzsvtw8j-TJI8dmJ228bXASq4C-S7U&callback=initMap&v=weekly" defer></script>

<script>
    var PetaKecamatan
    var KantorKecamatan
    var batasWilayah

    function initMap() {
        <?php if (!empty($wil_ini['lat']) && !empty($wil_ini['lng'])) : ?>
            var center = {
                lat: <?= $wil_ini['lat'] ?>,
                lng: <?= $wil_ini['lng'] ?>
            }
        <?php else : ?>
            var center = {
                lat: -7.2027243,
                lng: 107.8866452,
            }
        <?php endif; ?>

        //Jika posisi kantor desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
        PetaKecamatan = new google.maps.Map(document.getElementById("peta_wilayah_kecamatan"), {
            center,
            zoom: <?= $wil_ini['zoom'] ?>,
            mapTypeId: google.maps.MapTypeId.<?= $wil_ini['map_tipe'] ?>
        });

        KantorKecamatan = new google.maps.Marker({
            position: center,
            map: PetaKecamatan,
            title: 'Kantor <?php echo ucwords($this->setting->sebutan_kecamatan) . " " ?><?php echo ucwords($desa['nama_kecamatan']) ?>'.true,
            icon: '<?= logo_web($main['logo']); ?>',
        });

        <?php if (!empty($wil_ini['path'])) : ?>
            let polygon_kecamatan = <?= $wil_ini['path']; ?>;

            polygon_kecamatan[0].map((arr, i) => {
                polygon_kecamatan[i] = {
                    lat: arr[0],
                    lng: arr[1]
                }
            })

            //Style polygon batas wilayah desa
            var batasWilayah = new google.maps.Polygon({
                paths: polygon_kecamatan,
                strokeColor: '<?= $wil_ini['warna_garis'] ?>',
                strokeOpacity: 1,
                strokeWeight: 3,
                fillColor: '<?= $wil_ini['warna'] ?>',
                fillOpacity: 0.25
            });

            batasWilayah.setMap(PetaKecamatan)
        <?php endif; ?>
    }
</script>

<div id="peta_wilayah_kecamatan" class="set-map" style="height:300px;"></div>
