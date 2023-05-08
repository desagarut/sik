<style type="text/css">
	.disabled {
		pointer-events: none;
		cursor: default;
	}
</style>

<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4>Surat Keluar</h4>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
						<li class="breadcrumb-item"><a href="#!">Pembangunan Desa</a></li>
						<li class="breadcrumb-item active"><a href="#!"><?= $subtitle ?></a></li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					<div class="card">
						<?php $this->load->view('bumindes/umum/side') ?>
					</div>
				</div>
				<div class="col-md-9">
					<div class="card">
						<?php $this->load->view($main_content) ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>