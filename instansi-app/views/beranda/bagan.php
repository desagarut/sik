<link rel="stylesheet" href="<?= base_url()?>assets/css/bagan.css">

<div class="pcoded-main-container">
	<div class="pcoded-content">

	<div class="page-header">
		<h5 class="m-b-10">Bagan Pemerintahan <?= ucwords($this->setting->sebutan_desa)?></h5>
		<ul class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('pengurus')?>">Pemerintahan <?= ucwords($this->setting->sebutan_desa)?></a></li>
						<li class="breadcrumb-item active">Bagan Pemerintahan <?= ucwords($this->setting->sebutan_desa)?></li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<div class="card">
		<div class="row">
			<div class="col-md-12">
				
					<div class="card-body">
						<figure class="highcharts-figure">
					    <div id="container"></div>
					    <p class="highcharts-description">
					    </p>
						</figure>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('instansi-app/views/beranda/chart_bagan.php'); ?>
