<div class="content-wrapper">
	<section class="content-header">
		<h1>Data Polling</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('polling')?>"> Daftar Polling</a></li>
			<li class="active">Data Polling</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="validasi" action="<?= $form_action?>" method="POST" class="form-horizontal">
			<div class="row">
				<div class="col-md-6">
					<div class="card card-info">
						<div class="box-header with-border">
							<a href="<?= site_url("polling")?>" class="btn btn-social btn-flat btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Tambah Artikel">
								<i class="fa fa-arrow-circle-left "></i>Kembali ke Daftar Polling
							</a>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label class="control-label col-sm-4" for="nama">Pertanyaan</label>
								<div class="col-sm-8">
									<input name="pertanyaan" class="form-control input-sm" type="text" value="<?=$polling['pertanyaan']?>">
								</div>
							</div>
						</div>
						<div class='card-footer'>
							<button type='reset' class='btn btn-social btn-flat btn-danger btn-sm' ><i class='fa fa-times'></i> Batal</button>
							<button type='submit' class='btn btn-social btn-flat btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>
