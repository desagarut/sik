<?php	$this->load->view('header', $this->header); ?>
<?php	$this->load->view('nav'); ?>

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5> <?= $sub_modul ? 'Submodul' : 'Modul';?></h5>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url('beranda') ?>">Beranda</a></li>
            <?php if(!$sub_modul): ?>
            <li class="breadcrumb-item"><a href="#!">Pengaturan</a></li>
            <?php else: ?>
            <li class="breadcrumb-item"><a href="#!">Pengaturan</a></li>
            <li class="breadcrumb-item active"><a href="<?= site_url('modul/clear')?>"> Daftar Modul</a></li>
            <?php endif; ?>
          </ol>
        </div>
        <!-- /.col --> 
      </div>
      <!-- /.row --> 
    </div>
    <!-- /.container-fluid --> 
  </div>
  <!-- /.content-header --> 
  
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
	<div class="card">
		<div class="row">
			<div class="col-md-12">
					
						<div class="card-body">
								<div class="row">
									<div class="col-xs-12">
											<div class="nav-tabs-custom">
												<ul class="nav nav-tabs">
													<li <?php if ($act_tab==1): ?>class="active"<?php endif ?>><a href="<?= site_url('database')?>">Ekspor Database</a></li>
													<li <?php if ($act_tab==2): ?>class="active"<?php endif ?>><a href="<?= site_url('database/import')?>">Impor Database</a></li>
													<li <?php if ($act_tab==4): ?>class="active"<?php endif ?>><a href="<?= site_url('database/backup')?>">Backup/Restore</a></li>
													<!--<li <?php if ($act_tab==6): ?>class="active"<?php endif ?>><a href="<?= site_url('database/kosongkan')?>">Kosongkan DB</a></li>
													<li <?php if ($act_tab==3): ?>class="active"<?php endif ?>><a href="<?= site_url('database/import_bip')?>">Impor BIP</a></li>
													<li <?php if ($act_tab==5): ?>class="active"<?php endif ?>><a href="<?= site_url('database/migrasi_cri')?>">Migrasi DB</a></li>-->
												</ul>
												<div class="tab-content">

<?php	$this->load->view($content); ?>
<?php	$this->load->view('footer'); ?>
