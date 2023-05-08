<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php// $this->load->view('style-map'); ?>

<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4 class="m-0">Peta Wilayah</h4>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>

						<li class="breadcrumb-item active"><a href="#!">Peta Wilayah</a></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->

	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<a href="<?= site_url('gis') ?>"><button class="btn btn-primary btn-sm mb-2 mr-2">Peta Wilayah</button></a>
						<a href="<?= site_url('gis/osm') ?>"><button class="btn btn-secondary btn-sm mb-2 mr-2">OSM</button></a>

					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<form action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
									<div id="map">
										<input type="hidden" id="path" name="path" value="<?= $wil_ini['path'] ?>">
										<input type="hidden" name="id" id="id" value="<?= $wil_ini['id'] ?>" />
										<input type="hidden" name="zoom" id="zoom" value="<?= $wil_ini['zoom'] ?>" />
										<?php //include("instansi-app/views/gis/cetak_peta.php"); ?>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('global/konfirmasi'); ?>


<script>
	(function() {
		var infoWindow;
		window.onload = function() {
			<?php if (!empty($desa['lat']) and !empty($desa['lng'])) : ?>
				var posisi = [<?= $desa['lat'] . "," . $desa['lng'] ?>];
				var zoom = <?= $desa['zoom'] ?: 10 ?>;
			<?php elseif (!empty($desa['path'])) : ?>
				var wilayah_desa = <?= $desa['path'] ?>;
				var posisi = wilayah_desa[0][0];
				var zoom = <?= $desa['zoom'] ?: 10 ?>;
			<?php else : ?>
				var posisi = [-7.2025712, 107.8852316];
				var zoom = 10;
			<?php endif; ?>

			//Inisialisasi tampilan peta
			var map = L.map('map').setView(posisi, zoom);

			<?php if (!empty($desa['path'])) : ?>
				map.fitBounds(<?= $desa['path'] ?>);
			<?php endif; ?>

			//Menampilkan overlayLayers Peta Semua Wilayah
			var marker_desa = [];
			var marker_dusun = [];
			var marker_rw = [];
			var marker_rt = [];
			var semua_marker = [];
			var markers = new L.MarkerClusterGroup();
			var markersList = [];


			//OVERLAY WILAYAH DESA
			<?php if (!empty($desa['path'])) : ?>
				set_marker_desa_content(marker_desa, <?= json_encode($desa) ?>, "<?= ucwords($this->setting->sebutan_desa) . ' ' . $desa['nama_desa'] ?>", "<?= favico_desa() ?>", '#isi_popup');
			<?php endif; ?>

			//OVERLAY WILAYAH DUSUN
			<?php if (!empty($dusun_gis)) : ?>
				set_marker_content(marker_dusun, '<?= addslashes(json_encode($dusun_gis)) ?>', '<?= ucwords($this->setting->sebutan_dusun) ?>', 'dusun', '#isi_popup_dusun_', '<?= favico_desa() ?>');
			<?php endif; ?>

			//OVERLAY WILAYAH RW
			<?php if (!empty($rw_gis)) : ?>
				set_marker_content(marker_rw, '<?= addslashes(json_encode($rw_gis)) ?>', 'RW', 'rw', '#isi_popup_rw_', '<?= favico_desa() ?>');
			<?php endif; ?>

			//OVERLAY WILAYAH RT
			<?php if (!empty($rt_gis)) : ?>
				set_marker_content(marker_rt, '<?= addslashes(json_encode($rt_gis)) ?>', 'RT', 'rt', '#isi_popup_rt_', '<?= favico_desa() ?>');
			<?php endif; ?>

			//Menampilkan overlayLayers Peta Semua Wilayah
			var overlayLayers = overlayWil(marker_desa, marker_dusun, marker_rw, marker_rt, "<?= ucwords($this->setting->sebutan_desa) ?>", "<?= ucwords($this->setting->sebutan_dusun) ?>");

			//Menampilkan BaseLayers Peta
			var baseLayers = getBaseLayers(map, '<?= $this->setting->google_key ?>');

			//Geolocation IP Route/GPS
			geoLocation(map);

			//Menambahkan zoom scale ke peta
			L.control.scale().addTo(map);

			//Mencetak peta ke PNG
			cetakPeta(map);

			//Menambahkan Legenda Ke Peta
			// Menampilkan OverLayer Area, Garis, Lokasi
			layerCustom = tampilkan_layer_area_garis_lokasi(map, '<?= addslashes(json_encode($area)) ?>', '<?= addslashes(json_encode($garis)) ?>', '<?= addslashes(json_encode($lokasi)) ?>', '<?= base_url() . LOKASI_SIMBOL_LOKASI ?>', '<?= base_url() . LOKASI_FOTO_AREA ?>', '<?= base_url() . LOKASI_FOTO_GARIS ?>', '<?= base_url() . LOKASI_FOTO_LOKASI ?>');

			//Covid
			var mylayer = L.featureGroup();
			var layerControl = {
				"Peta Sebaran Covid-19": mylayer, // opsi untuk show/hide Peta Sebaran covid19 dari geojson dibawah
			}

			//loading Peta Covid - data geoJSON dari BNPB- https://bnpb-inacovid19.hub.arcgis.com/datasets/data-harian-kasus-per-provinsi-covid-19-indonesia
			$.getJSON("https://opendata.arcgis.com/datasets/0c0f4558f1e548b68a1c82112744bad3_0.geojson", function(data) {
				var datalayer = L.geoJson(data, {
					onEachFeature: function(feature, layer) {
						var custom_icon = L.icon({
							"iconSize": 32,
							"iconUrl": "<?= base_url() ?>assets/images/covid.png"
						});
						layer.setIcon(custom_icon);

						var popup_0 = L.popup({
							"maxWidth": "100%"
						});

						var html_a = $('<div id="html_a" style="width: 100.0%; height: 100.0%;">' +
							'<h4><b>' + feature.properties.Provinsi + '</b></h4>' +
							'<table><tr>' +
							'<th style="color:red">Positif&nbsp;&nbsp;</th>' +
							'<th style="color:green">Sembuh&nbsp;&nbsp;</th>' +
							'<th style="color:black">Meninggal&nbsp;&nbsp;</th>' +
							'</tr><tr>' +
							'<td><center><b style="color:red">' + feature.properties.Kasus_Posi + '</b></center></td>' +
							'<td><center><b style="color:green">' + feature.properties.Kasus_Semb + '</b></center></td>' +
							'<td><center><b>' + feature.properties.Kasus_Meni + '</b></center></td>' +
							'</tr></table></div>')[0];

						popup_0.setContent(html_a);

						layer.bindPopup(popup_0, {
							'className': 'covid_pop'
						});
						layer.bindTooltip(feature.properties.Provinsi, {
							sticky: true,
							direction: 'top'
						});
					},
				});
				mylayer.addLayer(datalayer);
			});

			mylayer.on('add', function() {
				setTimeout(function() {
					var bounds = new L.LatLngBounds();
					if (mylayer instanceof L.FeatureGroup) {
						bounds.extend(mylayer.getBounds());
					}
					if (bounds.isValid()) {
						map.fitBounds(bounds);
					} else {
						<?php if (!empty($desa['path'])) : ?>
							map.fitBounds(<?= $desa['path'] ?>);
						<?php endif; ?>
					}
					$('#covid_status').show();
					$('#covid_status_local').show();
				});
			});

			mylayer.on('remove', function() {
				setTimeout(function() {
					$('#covid_status').hide();
					$('#covid_status_local').hide();
					<?php if (!empty($desa['path'])) : ?>
						map.fitBounds(<?= $desa['path'] ?>);
					<?php endif; ?>
				});
			});

			//End Covid

			//PENDUDUK
			<?php if ($layer_penduduk == 1 or $layer_keluarga == 1 and !empty($penduduk)) : ?>
				//Data penduduk
				var penduduk = JSON.parse('<?= addslashes(json_encode($penduduk)) ?>');
				var jml = penduduk.length;
				var foto;
				var content;
				var point_style = L.icon({
					iconUrl: '<?= base_url(LOKASI_SIMBOL_LOKASI) ?>penduduk.png',
					iconSize: [25, 36],
					iconAnchor: [13, 36],
					popupAnchor: [0, -28],
				});
				for (var x = 0; x < jml; x++) {
					if (penduduk[x].lat || penduduk[x].lng) {
						//Jika penduduk ada foto, maka pakai foto tersebut
						//Jika tidak, pakai foto default
						if (penduduk[x].foto) {
							foto = '<td><tr><img src="' + AmbilFoto(penduduk[x].foto) + '" class="foto_pend"/></td>';
						} else
							foto = '<td><img src="<?= base_url() ?>assets/files/user_pict/kuser.png" class="foto_pend"/></td>';

						//Konten yang akan ditampilkan saat marker diklik
						content =
							'<table border=0><tr>' + foto +
							'<td style="padding-left:2px"><font size="2.5" style="bold">Nama : ' + penduduk[x].nama + '</font> - ' + penduduk[x].sex +
							'<p>' + penduduk[x].umur + ' Tahun ' + penduduk[x].agama + '</p>' +
							'<p>' + penduduk[x].alamat + '</p>' +
							'<p><a href="<?= site_url("penduduk/detail/1/0/") ?>' + penduduk[x].id + '" target="ajax-modalx" rel="content" header="Rincian Data ' + penduduk[x].nama + '" >LIHAT DETAIL</a></p></td>' +
							'</tr></table>';
						//Menambahkan point ke marker
						semua_marker.push(turf.point([Number(penduduk[x].lng), Number(penduduk[x].lat)], {
							content: content,
							style: point_style
						}));
					}
				}
			<?php endif; ?>

			if (semua_marker.length != 0) {
				var geojson = L.geoJSON(turf.featureCollection(semua_marker), {
					pmIgnore: true,
					showMeasurements: true,
					onEachFeature: function(feature, layer) {
						layer.bindPopup(feature.properties.content);
						layer.bindTooltip(feature.properties.content);
					},
					style: function(feature) {
						if (feature.properties.style) {
							return feature.properties.style;
						}
					},
					pointToLayer: function(feature, latlng) {
						if (feature.properties.style) {
							return L.marker(latlng, {
								icon: feature.properties.style
							});
						} else
							return L.marker(latlng);
					}
				});

				markersList.push(geojson);
				markers.addLayer(geojson);
				map.addLayer(markers);

				//Mempusatkan tampilan map agar semua marker terlihat
				map.fitBounds(geojson.getBounds());
			}

			//Menampilkan Baselayer dan Overlayer
			var mainlayer = L.control.layers(baseLayers, overlayLayers, {
				position: 'topleft',
				collapsed: true
			}).addTo(map);
			var customlayer = L.control.groupedLayers('', layerCustom, {
				groupCheckboxes: true,
				position: 'topleft',
				collapsed: true
			}).addTo(map);
			var covidlayer = L.control.layers('', layerControl, {
				position: 'topleft',
				collapsed: false
			}).addTo(map);

			$('#isi_popup').remove();
			$('#isi_popup_dusun').remove();
			$('#isi_popup_rw').remove();
			$('#isi_popup_rt').remove();
			$('#covid_status').hide();
			$('#covid_status_local').hide();
		}; //EOF window.onload

	})();
</script>
<style>
	#map {
		width: 80%;
		height: 400px;
		/*height:80vh*/
	}
</style>