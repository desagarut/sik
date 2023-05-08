<div class="content-wrapper">
	<?php $this->load->view("surat/form/breadcrumb.php"); ?>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border tdk-permohonan tdk-periksa">
						<a href="<?=site_url("surat")?>" class="btn btn-social btn-flat btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i>Kembali Ke Daftar Cetak Surat
           	</a>
					</div>
					<div class="box-body">
						<form action="" id="main" name="main" method="POST" class="form-horizontal">
							<?php include("instansi-app/views/surat/form/_cari_nik.php"); ?>
						</form>
						<form id="validasi" action="<?= $form_action?>" method="POST" target="_blank" class="form-surat form-horizontal">
							<input type="hidden" id="url_surat" name="url_surat" value="<?= $url ?>">
							<input type="hidden" id="url_remote" name="url_remote" value="<?= site_url('surat/nomor_surat_duplikat')?>">
							<div class="row jar_form">
								<label for="nomor" class="col-sm-3"></label>
								<div class="col-sm-8">
									<input class="required" type="hidden" name="nik" value="<?= $individu['id']?>">
								</div>
							</div>
							<?php if ($individu): ?>
								<?php include("instansi-app/views/surat/form/konfirmasi_pemohon.php"); ?>
							<?php	endif; ?>
							<?php include("instansi-app/views/surat/form/nomor_surat.php"); ?>
							<div class="form-group">
								<label for="barang"  class="col-sm-3 control-label">Barang Yang Hilang</label>
								<div class="col-sm-8">
									<input  id="barang" class="form-control input-sm required" type="text" placeholder="Barang Yang Hilang" name="barang">
								</div>
							</div>
							<div class="form-group">
								<label for="rincian"  class="col-sm-3 control-label">Rincian</label>
								<div class="col-sm-8">
									<input  id="rincian" class="form-control input-sm required" type="text" placeholder="Rincian Barang Yang Hilang" name="rincian">
								</div>
							</div>
							<div class="form-group">
								<label for="keterangan"  class="col-sm-3 control-label">Keterangan Kejadian</label>
								<div class="col-sm-8">
									<textarea name="keterangan" class="form-control input-sm required" placeholder="Keterangan Kejadian"></textarea>
								</div>
							</div>
							<?php include("instansi-app/views/surat/form/_pamong.php"); ?>
						</form>
					</div>
					<?php include("instansi-app/views/surat/form/tombol_cetak.php"); ?>
				</div>
			</div>
		</div>
	</section>
</div>
