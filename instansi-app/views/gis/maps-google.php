<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://cdn.jsdelivr.net/gh/somanchiu/Keyless-Google-Maps-API@v5.7/mapsJavaScriptAPI.js" async defer></script>

<script>
	var PetaDesa
	var kantorDesa
	var batasWilayah

	function initMap() {
		<?php if (!empty($desa['lat']) && !empty($desa['lng'])) : ?>
			var center = {
				lat: <?= $desa['lat'] ?>,
				lng: <?= $desa['lng'] ?>
			}
		<?php else : ?>
			var center = {
				lat: -7.202686,
				lng: 107.8866398,
			}
		<?php endif; ?>

		var zoom = 14
		//Jika posisi kantor desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
		PetaDesa = new google.maps.Map(document.getElementById("peta_wilayah_desa"), {
			center,
			zoom: <?= $desa['zoom'] ?>,
			mapTypeId: google.maps.MapTypeId.<?= $desa['map_tipe'] ?>
		});

		kantorDesa = new google.maps.Marker({
			position: center,
			map: PetaDesa,
			title: 'Kantor <?php echo ucwords($this->setting->sebutan_desa) . " " ?><?php echo ucwords($desa['nama_desa']) ?>'.true,
			icon: '<?= logo_web($desa['logo']); ?>',
		});

		<?php if (!empty($desa['path'])) : ?>
			let polygon_desa = <?= $desa['path']; ?>;

			polygon_desa[0].map((arr, i) => {
				polygon_desa[i] = {
					lat: arr[0],
					lng: arr[1]
				}
			})

			//Style polygon batas wilayah desa
			var batasWilayah = new google.maps.Polygon({
				paths: polygon_desa,
				strokeColor: '<?= $desa['warna_garis'] ?>',
				strokeOpacity: 1,
				strokeWeight: 3,
				fillColor: '<?= $desa['warna'] ?>',
				fillOpacity: 0.25,
				labels: false,
			});

			batasWilayah.setMap(PetaDesa)
		<?php endif; ?>

	}
</script>


<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
	<div class="pcoded-content">

		<div class="main-body">
			<div class="page-wrapper">
				<!-- [ breadcrumb ] start -->
				<div class="page-header">
					<div class="page-block">
						<div class="row align-items-center">
							<div class="col-md-12">
								<div class="page-header-title">
									<!--<h5 class="m-b-10">Peta Wilayah Desa</h5>-->
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?= site_url('beranda'); ?>"><i class="feather icon-home"></i></a></li>
									<?php foreach ($breadcrumb as $tautan) : ?>
										<li class="breadcrumb-item"><a href="<?= $tautan['link'] ?>">
												<?= $tautan['judul'] ?>
											</a></li>
									<?php endforeach; ?>
									<li class="breadcrumb-item"><a href="#!">Wilayah Administratif <?= ucwords($this->setting->sebutan_desa) ?></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- [ breadcrumb ] end -->

				<!-- [ static-layout ] start -->
				<div class="card">
					<div class="card-header">
						<a href="<?= site_url('gis/googlemaps') ?>"><button class="btn btn-primary btn-sm mb-2 mr-2">G-Map</button></a>
						<a href="<?= site_url('gis') ?>"><button class="btn btn-secondary btn-sm mb-2 mr-2">OSM</button></a>

						<div class="card-header-right">
							<div class="btn-group card-option">
								<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="feather icon-more-horizontal"></i> </button>
								<ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
									<li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
									<li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
									<li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
									<li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="card-body">
						<div class="map">
							<div id="peta_wilayah_desa" style="height: 500px"></div>
						</div>
					</div>
					<!--<div class="card-footer">
								<?php if ($this->CI->cek_hak_akses('h')) : ?>
								<a href="<?= site_url('profil_kecamatan/form'); ?>" class="btn btn-warning" title="Ubah Data" ><i class="fa fa-edit"></i> Ubah Data
								<?= $desa; ?>
								</a> 
								<a href="<?= site_url('profil_kecamatan/maps/kantor'); ?>" class="btn btn-box bg-purple btn-sm "><i class='fa fa-map-marker'></i> Lokasi Kantor <?= $desa; ?></a>
								<a href="<?= site_url('profil_kecamatan/maps/kantor'); ?>" class="btn btn-success " title="Ubah Lokasi Kantor Desa"><i class="feather mr-2 icon-map-pin"></i> Lokasi Kantor
								<?= $desa; ?>
								</a> 
								<a href="<?= site_url('profil_kecamatan/maps/wilayah'); ?>" class="btn btn-box btn-info btn-sm btn-sm "><i class='fa fa-map'></i> Peta Wilayah <?= $desa; ?></a>
								<a href="<?= site_url('profil_kecamatan/maps/wilayah'); ?>" class="btn btn-primary" title="Ubah Wilayah Desa"><i class="feather mr-2 icon-map"></i> Wilayah Desa | Google </a>
								<a href="<?= site_url('profil_kecamatan/maps_openstreet/wilayah'); ?>" class="btn btn-secondary" title="Ubah Wilayah Desa"><i class='feather mr-2 icon-map'></i> Wilayah Desa | OSM</a>
								<?php endif; ?>

							</div>-->
				</div>
				<!-- [ static-layout ] end -->

			</div>
		</div>
	</div>
</div>
</div>
</div>