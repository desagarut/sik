<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="pcoded-main-container">
	<div class="pcoded-content">

	<div class="page-header">
		<h5 class="m-b-10">Panduan</h5>
		<ul class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('Suplemen')?>"> Data Suplemen</a></li>
						<li class="breadcrumb-item active">Panduan</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<div class="card">
		<form id="mainform" name="mainform" action="" method="post">
			
				<div class="card-header">
					<a href="<?=site_url('suplemen')?>" class="btn btn-box btn-info btn-sm " title="Kembali Ke Daftar Suplemen"><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Daftar Suplemen</a>
				</div>
				<div class="card-body">
					<h4>Keterangan</h4>
					<p><strong>Data Suplemen</strong> adalah modul untuk pengelolaan data tambahan warga, baik secara perorangan, keluarga, rumah tangga, maupun kelompok/organisasi.</p>
					<h4>Panduan</h4>
					<p>Cara menyimpan/memperbarui Data Suplemen adalah dengan mengisikan formulir yang terdapat dari menu Tulis Data Suplemen Baru:</p>
					<p>
						<ul>
							<li>Kolom <strong>Sasaran Data</strong>
								<p>Pilihlah salah satu dari sasaran data, apakah pribadi/perorangan, keluarga/kk, Rumah Tangga, ataupu Organisasi/kelompok warga</p>
							</li>
							<li>Kolom <strong>Nama Data</strong>
								<p>Nama data wajib diisi</p>
							</li>
							<li>Kolom <strong>Keterangan Data</strong>
								<p>Isikan keterangan data suplemen ini</p>
							</li>
						</ul>
					</p>
				</div>
			</div>
		</form>
	</div>
</div>
