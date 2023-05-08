<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view($folder_themes . '/commons/head') ?>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1823410826720847" crossorigin="anonymous"></script>
</head>

<body>
<?php $this->load->view($folder_themes . '/commons/topbar') ?>
    <?php $this->load->view($folder_themes . '/commons/navbar') ?>

    <div class="breadcrumbs">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-12">
          <div class="breadcrumbs-content">
            <h1 class="page-title">Arsip Artikel</h1>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
          <ul class="breadcrumb-nav">
            <li><a href="<?= site_url("first"); ?>"><i class="lni lni-home"></i> Beranda</a></li>
            <li>Arsip artikel</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- End Breadcrumbs -->


  <!-- ======= Section ======= -->
  <section class="item-details section">
    <div class="container">
      <div class="product-details-info">
        <div class="row">
          <div class="col-lg-8 col-sm-12 col-12">
            <div class="row">
              <?php $this->load->view($folder_themes . '/partials/arsip.php') ?>
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <?php //$this->load->view($folder_themes . '/partials/sidebar.php') ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php $this->load->view($folder_themes . '/commons/footer') ?>
</body>

</html>