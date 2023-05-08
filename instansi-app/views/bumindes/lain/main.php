<style type="text/css">
  .disabled
	{
     pointer-events: none;
     cursor: default;
  }
</style>
<div class="pcoded-main-container">
	<div class="pcoded-content">

	<div class="page-header">
		<h5 class="m-b-10">Buku Administrasi Lainnya</h5>
		<ul class="breadcrumb">
			<li><a href="<?=site_url('beranda')?>"><i class="fa fa-home"></i> Home</a></li>
						<li class="breadcrumb-item active"><?= $subtitle ?></li>
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
			<div class="col-md-3">
				<?php $this->load->view('bumindes/lain/side') ?>
			</div>
			<div class="col-md-9">
				<?php $this->load->view($main_content) ?>
			</div>
		</div>
	</div>
</div>
