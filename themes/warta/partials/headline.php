<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $abstract = potong_teks($headline['isi'], 150); ?>
<?php $url = site_url('artikel/' . buat_slug($headline)); ?>
<?php $image = ($headline['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'kecil_' . $headline['gambar'])) ?
  AmbilFotoArtikel($headline['gambar'], 'kecil') :
  base_url($this->theme_folder . '/' . $this->theme . '/assets/images/placeholder.png') ?>

<div class="whats-news-single mb-40 mb-40">
  <div class="whates-img wow fadeInUp" data-wow-delay="0.2s">
    <img src="<?= $image ?>">
  </div>
  <div class="whates-caption wow fadeInUp" data-wow-delay="0.2s">
    <h4><a href="<?= $url; ?>"><?= $headline['judul'] ?></a></h4>

    <?= $abstract ?>
    <span><?= $headline['owner'] ?> - <?= tgl_indo($headline['tgl_upload']); ?> - <?= hit($headline['hit']); ?></span>
  </div>
</div>