<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="pcoded-main-container">
	<div class="pcoded-content">

	<div class="page-header">
		<h5 class="m-b-10">Pengelolaan Kategori Kelompok</h5>
		<ul class="breadcrumb">
			<li><a href="<?= site_url('beranda'); ?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('kelompok'); ?>"> Daftar Kelompok</a></li>
			<li><a href="<?= site_url('kelompok_master'); ?>"> Daftar Ketegori Kelompok</a></li>
						<li class="breadcrumb-item active">Pengelolaan Kategori Kelompok</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<div class="card">
		
			<div class="card-header">
				<a href="<?= site_url('kelompok_master'); ?>" class="btn btn-box btn-info btn-sm "><i class="fa fa-arrow-circle-left"></i> Kembali Ke Kategori Kelompok</a>
			</div>
			<form id="validasi" action="<?= $form_action; ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
				<div class="card-body">
					<div class="form-group">
						<label class="col-sm-3 control-label" for="nama">Klasifikasi/Kategori Kelompok</label>
						<div class="col-sm-8">
							<input id="kelompok" class="form-control input-sm required" type="text" placeholder="Kategori Kelompok" name="kelompok" value="<?= $kelompok_master['kelompok']; ?>"></input>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label" for="Deskripsi">Deskripsi Kelompok</label>
						<div class="col-sm-8">
						 	<textarea name="deskripsi" class="form-control input-sm" placeholder="Deskripsi Kelompok" rows="3"><?= $kelompok_master['deskripsi']; ?></textarea>
						 </div>
					</div>
				</div>
				<div class="card-footer">
					<button type="reset" class="btn btn-box btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
					<button type="submit" class="btn btn-box btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
