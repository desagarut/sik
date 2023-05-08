
<aside class="main-sidebar sidebar-light-maroon elevation-4"> 
  <!-- Brand Logo --> 
  <a href="<?= site_url() ?>first" target="_blank" class="brand-link"> <img src="<?= logo_web($desa['logo']); ?>" alt="Logo <?= $this->setting->website_title ?>" class="brand-image img-circle elevation-3" style="opacity: .8"> <span class="brand-text font-weight-light">
  <?= $this->setting->website_title ?>
  </span> </a> 
  
  <!-- Sidebar -->
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info"> <strong>
        <?= ucwords($this->setting->sebutan_kecamatan . " " . $desa['nama_kecamatan']); ?>
        </strong><br/>
        <?= ucwords($this->setting->sebutan_kabupaten . " " . $desa['nama_kabupaten']); ?>
        <br/>
        Provinsi Jawa Barat </div>
    </div>
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open"> <a href="" class="nav-link active"> <i class="nav-icon fas fa-tachometer-alt"></i>
          <p> Menu </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item"> <a href="<?= site_url();?>mandiri_web/mandiri/1/1" class="nav-link">
              <p>Beranda</p>
              </a> </li>
            <li class="nav-item"> <a href="<?= site_url();?>mandiri_web/mandiri/1/6" class="nav-link">
              <p> Profil</p>
              </a> </li>
            <li class="nav-item"> <a href="<?= site_url();?>mandiri_web/mandiri_polling" class="nav-link">
              <p> Polling</p>
              </a> </li>
            <!--<li class="nav-item"> <a href="<?= site_url();?>mandiri_web/mandiri_dokumen" class="nav-link">
              <p> Dokumen</p>
              </a> </li>-->
            <li class="nav-item"> <a href="<?= site_url("mandiri_web/cetak_kk/$penduduk[id]/1"); ?>" class="nav-link" target="_blank">
              <p> Cetak Kartu Keluarga</p>
              </a> </li>
            <!--<li class="nav-item"> <a href="<?= site_url();?>mandiri_web/mandiri/1/2" class="nav-link">
              <p> Layanan Surat</p>
              </a> </li>-->
            <li class="nav-item"> <a href="<?= site_url();?>mandiri_web/mandiri/1/3" class="nav-link">
              <p> Kotak Pesan</p>
              <span class="pull-right-container"><small class="label pull-right bg-green" id="b_pesan"></small></span> </a> </li>
            <!--<li class="nav-item"> <a href="<?= site_url();?>mandiri_web/mandiri/1/4" class="nav-link">
              <p>Program Bantuan</p>
              </a></li>-->
            <li class="nav-item"> <a href="<?= site_url();?>mandiri_web/ganti_pin" class="nav-link">
              <p> Ganti Password</p>
              </a> </li>
            <li class="nav-item"> <a href="<?= site_url();?>mandiri_web/logout" class="nav-link">
              <p> Keluar</p>
              </a> </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>
<style type="text/css">
#mandiri i.fa {
	margin-right: 10px;
}
#mandiri button.nowrap {
	white-space: nowrap;
}
#mandiri .badge {
	background-color: red;
	color: white;
	margin-left: 0px;
}
</style>
<script type="text/javascript">

  $('document').ready(function()
  {
    setTimeout(function()
    {
      refresh_badge($("#b_pesan"), "<?= site_url('notif_web/inbox'); ?>");
    }, 500);
  });

</script>