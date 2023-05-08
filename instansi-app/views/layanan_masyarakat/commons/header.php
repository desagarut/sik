<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Layanan Masyarakat
    <?=$this->setting->sebutan_desa . ' '. $desa['nama_desa'] ?: '' . 'Layanan Masyarakat';
			?>
    </title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?= base_url() ?>rss.xml" />
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	<!-- jQuery -->
	<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jqvmap/jqvmap.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">

	<!-- Select2 -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

	<!-- OpenStreetMap Css -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/leaflet.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/leaflet-geoman.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/L.Control.Locate.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/MarkerCluster.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/MarkerCluster.Default.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/leaflet-measure-path.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/mapbox-gl.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/L.Control.Shapefile.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/leaflet.groupedlayercontrol.min.css" />
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/peta.css">

	<!-- Untuk ubahan style desa -->
	<!--<?php //if (is_file("desa/css/insidega.css")) : 
		?>
		<link type='text/css' href="<? //= base_url() 
									?>desa/css/insidega.css" rel='Stylesheet' />
	<?php //endif; 
	?>-->
	<!-- Diperlukan untuk script jquery khusus halaman -->

	<!-- OpenStreetMap Js-->
	<script src="<?= base_url() ?>assets/js/leaflet.js"></script>
	<script src="<?= base_url() ?>assets/js/turf.min.js"></script>
	<script src="<?= base_url() ?>assets/js/leaflet-geoman.min.js"></script>
	<script src="<?= base_url() ?>assets/js/leaflet.filelayer.js"></script>
	<script src="<?= base_url() ?>assets/js/togeojson.js"></script>
	<script src="<?= base_url() ?>assets/js/togpx.js"></script>
	<script src="<?= base_url() ?>assets/js/leaflet-providers.js"></script>
	<script src="<?= base_url() ?>assets/js/L.Control.Locate.min.js"></script>
	<script src="<?= base_url() ?>assets/js/leaflet.markercluster.js"></script>
	<script src="<?= base_url() ?>assets/js/peta.js"></script>
	<script src="<?= base_url() ?>assets/js/leaflet-measure-path.js"></script>
	<script src="<?= base_url() ?>assets/js/apbdes_manual.js"></script>
	<script src="<?= base_url() ?>assets/js/mapbox-gl.js"></script>
	<script src="<?= base_url() ?>assets/js/leaflet-mapbox-gl.js"></script>
	<script src="<?= base_url() ?>assets/js/shp.js"></script>
	<script src="<?= base_url() ?>assets/js/leaflet.shpfile.js"></script>
	<script src="<?= base_url() ?>assets/js/leaflet.groupedlayercontrol.min.js"></script>
	<script src="<?= base_url() ?>assets/js/leaflet.browser.print.js"></script>
	<script src="<?= base_url() ?>assets/js/leaflet.browser.print.utils.js"></script>
	<script src="<?= base_url() ?>assets/js/leaflet.browser.print.sizes.js"></script>
	<script src="<?= base_url() ?>assets/js/dom-to-image.min.js"></script>

	<!-- Diperlukan untuk global automatic base_url oleh external js file -->
	<script type="text/javascript">
		var BASE_URL = "<?= base_url(); ?>";
		var SITE_URL = "<?= site_url(); ?>";
	</script>
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/chart.js/Chart.min.css">

	<!-- Highcharts JS -->
	<script src="<?= base_url() ?>assets/js/highcharts/highcharts.js"></script>
	<script src="<?= base_url() ?>assets/js/highcharts/highcharts-3d.js"></script>
	<script src="<?= base_url() ?>assets/js/highcharts/exporting.js"></script>
	<script src="<?= base_url() ?>assets/js/highcharts/highcharts-more.js"></script>
	<script src="<?= base_url() ?>assets/js/highcharts/sankey.js"></script>
	<script src="<?= base_url() ?>assets/js/highcharts/organization.js"></script>
	<script src="<?= base_url() ?>assets/js/highcharts/accessibility.js"></script>
	<?php //$this->load->view('layanan_masyarakat/sets/css.php') ?>
	</head>
	<body class="hold-transition <?= $this->setting->warna_tema_admin; ?> sidebar-mini layout-fixed <?php if ($minsidebar == 1) : ?>sidebar-collapse<?php endif ?> layout-navbar-fixed">
<div class="wrapper"> 
      <!--<div class="preloader flex-column justify-content-center align-items-center"> <img class="animation__shake" src="<?= base_url() ?>assets/files/logo/neosidega.fw.png" alt="<?= $this->setting->website_title ?>" height="80" width="80"> </div>--> 
      
      <!--<body class="hold-transition <?= $this->setting->warna_tema_admin; ?> sidebar-mini fixed">
<div class="wrapper">-->
      <header class="main-header"> <a href="<?=site_url()?>mandiri_web"  target="_blank" class="logo"> <span class="logo-mini logo-text" style="padding-top:7px"><img src="<?php echo base_url().'instansi/logo/logo.png'; ?>" class="img-circle logo-desa" alt="User Image" width="27px"></span> <span class="logo-lg logo-text"><img src="<?php echo base_url().'instansi/logo/logo.png'; ?>" class="img-circle logo-desa" alt="User Image" width="27px"><small> Layanan
      <?= ucwords($this->setting->sebutan_desa . " " . $desa['nama_desa']); ?>
      </small> </span> </a> 
    
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <ul class="navbar-nav">
        <li class="nav-item"> <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> </li>
        <li class="nav-item d-none d-sm-inline-block"> <a href="<?= site_url() ?>first" target="_blank" class="nav-link">Front</a> </li>
        <li class="nav-item d-none d-sm-inline-block"> <a href="<?= site_url();?>mandiri_web" class="nav-link">Beranda</a> </li>
        <li class="nav-item d-none d-sm-inline-block"> <a href="<?= site_url() ?>insidega/logout" class="nav-link">keluar</a> </li>
      </ul>
          
          <!-- Right navbar links -->
          <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item"> <a class="nav-link" data-widget="navbar-search" href="#" role="button"> <i class="fas fa-search"></i> </a>
              <div class="navbar-search-block">
            <form class="form-inline">
                  <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                      <button class="btn btn-navbar" type="submit"> <i class="fas fa-search"></i> </button>
                      <button class="btn btn-navbar" type="button" data-card-widget="navbar-search"> <i class="fas fa-times"></i> </button>
                    </div>
              </div>
                </form>
          </div>
            </li>
        
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown"> </li>
        <li class="nav-item dropdown"> <a class="nav-link" data-toggle="dropdown" href="#"> <i class="far fa-bell"></i> <span class="badge badge-warning navbar-badge">15</span> </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"> <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item"> <i class="fas fa-envelope mr-2"></i> 4 new messages <span class="float-right text-muted text-sm">3 mins</span> </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item"> <i class="fas fa-users mr-2"></i> 8 friend requests <span class="float-right text-muted text-sm">12 hours</span> </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item"> <i class="fas fa-file mr-2"></i> 3 new reports <span class="float-right text-muted text-sm">2 days</span> </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> </div>
            </li>
        <li class="nav-item"> <a class="nav-link" data-widget="fullscreen" href="#" role="button"> <i class="fas fa-expand-arrows-alt"></i> </a> </li>
        <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <?php if ($penduduk['foto']): ?>
          <img src="<?= AmbilFoto($penduduk['foto'])?>" class="user-image img-circle elevation-2" alt="User Image">
          <?php else: ?>
          <img src="<?= base_url()?>assets/files/user_pict/kuser.png" class="user-image img-circle elevation-2" alt="User Image">
          <?php endif; ?>
          <span class="d-none d-md-inline"></span> </a>
              <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
                  <?php if ($penduduk['foto']): ?>
                  <img src="<?= AmbilFoto($penduduk['foto'])?>" class="user-image img-circle elevation-2" alt="User Image">
                  <?php else: ?>
                  <img src="<?= base_url()?>assets/files/user_pict/kuser.png" class="user-image img-circle elevation-2" alt="User Image">
                  <?php endif; ?>
                  <p>
                <?= $_SESSION['nama'];?>
                <br/>
                <?= $_SESSION['nik'];?>
              </p>
                </li>
            <!-- Menu Footer-->
            <li class="user-footer"> <a href="<?= site_url('user_setting'); ?>" data-remote="false" data-toggle="modal" data-tittle="Pengaturan Pengguna" data-target="#modalBox" class="btn btn-default btn-flat">Profile</a> <a href="<?= site_url();?>mandiri_web/logout" class="btn btn-default btn-flat float-right">Keluar</a> </li>
          </ul>
            </li>
      </ul>
        </nav>
    </nav>
  </header>
<script type="text/javascript">

  $('document').ready(function()
  {
    setTimeout(function()
    {
      refresh_badge($("#b_pesan"), "<?= site_url('notif_web/inbox'); ?>");
    }, 500);
  });

</script> 