<!-- widget Galeri-->
<div class="card card-primary box-solid">
	<div class="card-header">
		<h3 class="card-title"><a href="<?= site_url('first/gallery');?>"><i class="fa fa-camera"></i> Galeri Foto</a></h3>
	</div>
	<div class="card-body">
		<ul id="li-komentar" class="sidebar-latest">
			<?php foreach ($w_gal As $data): ?>
				<?php if (is_file(LOKASI_GALERI . "sedang_" . $data['gambar'])): ?>
					<a href='<?= site_url("first/sub_gallery/$data[id]"); ?>' title="<?= "Album : $data[nama]" ?>">
						<img src="<?= AmbilGaleri($data['gambar'],'kecil')?>" width="130" alt="<?= "Album : $data[nama]" ?>">
					</a>
				<?php endif; ?>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
