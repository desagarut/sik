<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h5>Kategori</h5>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
						<li class="breadcrumb-item"><a href="<?= site_url('kategori') ?>">Kategori</a></li>
						<li class="breadcrumb-item active"><a href="#!">Form</a></li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
				<form id="validasi" action="<?= $form_action ?>" method="POST" class="form-horizontal">
					<div class="row">
						<div class="col-md-3">
							<?php $this->load->view('kategori/menu_kiri.php') ?>
						</div>
						<div class="col-md-9">
							<div class="card">
								<div class="card-header">
									<a href="<?= site_url("kategori") ?>" class="btn btn-box btn-info btn-sm btn-sm " title="Tambah Artikel">
										<i class="fa fa-arrow-circle-left "></i>&nbsp;Kembali
									</a>
								</div>
								<div class="card-body">
									<div class="form-group">
										<label class="control-label col-sm-4" for="nama">Nama Kategori</label>
										<div class="col-sm-6">
											<?php if ($kategori) : ?>
												<input name="kategori_lama" type="hidden" value="<?= $kategori['kategori'] ?>">
											<?php endif; ?>
											<input name="kategori" class="form-control input-sm required nomor_sk" maxlength="50" type="text" value="<?= $kategori['kategori'] ?>"></input>
										</div>
									</div>
								</div>
								<div class="card-footer">
									<div class="col-xs-12">
										<button type='reset' class='btn btn-box btn-danger btn-sm'><i class='fa fa-times'></i> Batal</button>
										<button type='submit' class='btn btn-box btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
		</div>
	</section>
</div>