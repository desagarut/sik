<div class="pcoded-main-container">
	<div class="pcoded-content">

	<div class="page-header">
		<h5 class="m-b-10">Pengaturan Teks Berjalan</h5>
		<ul class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fa fa-home"></i> Home</a></li>
						<li class="breadcrumb-item active">Pengaturan Teks Berjalan</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<div class="card">
		<form id="validasi" action="<?= $form_action?>" method="POST">
			<div class="row">
				<div class="col-md-12">
					
						<div class="card-header">
							<a href="<?= site_url().$this->controller?>" class="btn btn-box btn-info btn-sm btn-sm "  title="Tambah Artikel">
								<i class="fa fa-arrow-circle-left "></i>Kembali Ke Daftar Teks
							</a>
						</div>
						<div class="card-body">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label" for="isi_teks_berjalan">Isi teks berjalan</label>
									<textarea id="teks" class="form-control input-sm required" placeholder="Isi teks berjalan" name="teks" rows="5" style="resize:none;"><?= $teks['teks']?></textarea>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label class="control-label">Tautan ke artikel</label>
									<select class="form-control select2 " id="tautan" name="tautan" style="width: 100%;">
										<option value="">-- Cari Judul Artikel --</option>
										<?php foreach ($list_artikel as $artikel): ?>
											<option value="<?= $artikel['id']?>" <?php selected($artikel['id'], $teks['tautan']); ?>><?=tgl_indo($artikel['tgl_upload']).' | '.$artikel['judul']?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label">Judul tautan</label>
									<input class="form-control input-sm required" placeholder="Judul tautan ke artikel atau url" name="judul_tautan" value="<?= $teks['judul_tautan'] ? $teks['judul_tautan'] : '-- selengkapnya...' ?>" maxlength="150"></input>
								</div>
							</div>
						</div>
						<div class='card-footer'>
							<div class='col-xs-12'>
								<button type='reset' class='btn btn-box btn-danger btn-sm' ><i class='fa fa-times'></i> Batal</button>
								<button type='submit' class='btn btn-box btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
