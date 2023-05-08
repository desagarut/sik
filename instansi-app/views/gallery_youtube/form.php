<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4 class="m-0">profil_kecamatan</h4>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
						<li class="breadcrumb-item active"><a href="#!">Gallery Youtube</a></li>
						<li class="breadcrumb-item active"><a href="#!">Form</a></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->


	<!-- /.content-header -->
	<section class="content" id="maincontent">
		<div class="card">
			<form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-default">
							<div class="card-header with-border">
								<a href="<?= site_url("gallery_youtube") ?>" class="btn btn-social btn-box btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Tambah Artikel">
									<i class="fa fa-arrow-circle-left "></i>Back to Playlist
								</a>
							</div>
							<div class="card-body">
								<div class="form-group">
									<label class="control-label col-sm-4" for="nama">Nama Playlist</label>
									<div class="col-sm-6">
										<input name="nama" class="form-control input-sm nomor_sk" maxlength="100" type="text" value="<?= $gallery['nama'] ?>"></input>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4" for="link">Link Youtube</label>
									<div class="col-sm-6">
										<div class="box-body text-center">
											<iframe height="160px" width="250px" class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $gallery["link"]; ?>" title="<?= $gallery['nama'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										</div>
										<input name="link" class="form-control input-sm nomor_sk" maxlength="100" type="text" value="<?= $gallery['link'] ?>"></input>
										<code>masukan kode embed video, Contoh: 7APs5ZduJ-0</code>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4" for="deskripsi">Deskripsi</label>
									<div class="col-sm-6">
										<textarea class="textarea" name="deskripsi" placeholder="Deskripsi video" style="width: 100%; height: 200px; font-size: 12px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" value="<?= $gallery['deskripsi'] ?>"><?= $gallery['deskripsi'] ?></textarea>
									</div>
								</div>
							</div>
							<div class='card-footer'>
								<div class='col-xs-12'>
									<button type='reset' class='btn btn-social btn-box btn-danger btn-sm'><i class='fa fa-times'></i> Batal</button>
									<button type='submit' class='btn btn-social btn-box btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
</div>