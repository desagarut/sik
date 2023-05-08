<div class="pcoded-main-container">
	<div class="pcoded-content">

	<div class="page-header">
		<h5 class="m-b-10">Pengaturan Aparatur Desa</h5>
		<ul class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fa fa-home"></i> Home</a></li>
						<li class="breadcrumb-item active">Pengaturan Aparatur Desa</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<div class="card">
		<form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12">
					
            <div class="card-header">
              <a href="<?=site_url("web_widget")?>" class="btn btn-box btn-info btn-sm btn-sm "  title="Tambah Artikel">
								<i class="fa fa-arrow-circle-left "></i>Kembali ke Daftar Widget
            	</a>
						</div>
						<div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="container-fluid">
                    <div class="jumbotron">
                      <p>Widget Aparatur Desa menampilkan foto staf pemerintah desa. Klik tombol berikut untuk mengubah data aparatur desa, termasuk foto staf pemerintah desa</p>
                      <a class="btn btn-primary btn-large" href="<?= site_url('pengurus/clear')?>">
                        Pemerintah Desa
                      </a>
                    </div>
                  </div>
                </div>
              </div>
							<div class="row">
								<div class="col-sm-12">
									<form id="mainform" name="mainform" action="" method="post">
										<div class="row">
											<div class="col-sm-12">
                        <div class="form-group">
                          <label class="col-xs-12 col-md-3 col-lg-2">Tampilkan nama/jabatan</label>
                          <div class="col-xs-12 col-sm-2">
                            <select class="form-control input-sm" name="setting[overlay]">
                            <option value="1" <?php selected($setting['overlay'], true)?>>Ya</option>
                              <option value="0" <?php selected($setting['overlay'], false)?>>Tidak</option>
                            </select>
                          </div>
                        </div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
            <div class="card-footer">
						  <div class="col-xs-12">
							  <button type="reset" class="btn btn-box btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
								<button type="submit" class="btn btn-box btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

