<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view($folder_themes . '/commons/meta') ?>
	<?php $this->load->view($folder_themes . '/commons/for_css') ?>
</head>
<body>

	<?php $this->load->view($folder_themes .'/commons/header') ?>
    
<div class="breadcrumbs">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-6 col-12">
        <div class="breadcrumbs-content">
          <h1 class="page-title">Wisata Desa</h1>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-12">
        <ul class="breadcrumb-nav">
          <li><a href="<?= site_url("first"); ?>"><i class="lni lni-home"></i> Beranda</a></li>
          <li><a href="#">UMKM</a></li>
          <li>Wisata</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<section id="team" class="team section-bg">
  <div class="container">
        	<div class="row">
            <div class="col-lg-12 entries">
                  <?php $this->load->view($folder_themes . '/partials/wisata/index.php') ?>
            </div>
				<?php // $this->load->view($folder_themes .'/partials/sidebar.php') ?>
            </div>
        </div>
    </section>
    
	<?php $this->load->view($folder_themes .'/commons/footer') ?>
	<?php $this->load->view($folder_themes . '/commons/for_js') ?>
    
</body>
</html>