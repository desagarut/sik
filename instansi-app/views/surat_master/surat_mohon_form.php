
<div class="pcoded-main-container">
	<div class="pcoded-content">

	<div class="page-header">
		<h5 class="m-b-10">Pengaturan Dokumen Persyaratan Surat</h5>
		<ul class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('surat_mohon')?>"> Dokumen Persyaratan Surat</a></li>
						<li class="breadcrumb-item active">Pengaturan Dokumen Persyaratan Surat</li>
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
				
					<div class="card-header">
						<a href="<?=site_url("surat_mohon")?>" class="btn btn-box btn-info btn-sm btn-sm ">
							<i class="fa fa-arrow-circle-left "></i>Kembali ke Dokumen Persyaratan Surat
           	</a>
					</div>
					<div class="card-body">
						<form id="validasi" action="<?= $form_action?>" method="POST" enctype="multipart/form-data"  class="form-horizontal">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label class="col-sm-3 control-label" >Nama Dokumen</label>
											<div class="col-sm-8">
													<input type="text" class="form-control input-sm required" id="ref_syarat_nama" name="ref_syarat_nama" placeholder="Nama Dokumen" value="<?= $ref_syarat_surat['ref_syarat_nama']?>"/>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="card-footer">
								<div class="col-xs-12">
									<button type="reset" class="btn btn-box btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
									<button type="submit" class="btn btn-box btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
