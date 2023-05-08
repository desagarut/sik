<div class="pcoded-main-container">
	<div class="pcoded-content">

	<div class="page-header">
		<h5 class="m-b-10">Pengaturan SMS</h5>
		<ul class="breadcrumb">
			<li><a href="<?= site_url('beranda')?>"><i class="fa fa-home"></i> Home</a></li>
						<li class="breadcrumb-item active">Pengaturan SMS</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<div class="card">
		<form id="validasi" action="<?=$form_action?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
			<div class="row">
				<div class="col-md-3">
					
						<div class="card-header">
							<h3 class="card-title">SMS</h3>
							<div class="box-tools">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="card-body no-padding">
							<ul class="nav nav-pills nav-stacked">
								<li class="active"><a href="<?= site_url('sms/setting')?>"><i class="fa fa-inbox"></i> Pengaturan Balas Otomatis</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-9">
					
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
								  <div class="form-group">
									<label class="col-sm-3 control-label" for="pesan">Isi Pesan Autoreply</label>
									<div class="col-sm-8">
									  <textarea id="autoreply_text" name="autoreply_text" class="form-control input-sm required" maxlength="160" placeholder="Isi Pesan Autoreply"><?php if ($main): ?><?=$main['autoreply_text'];?><?php endif ?></textarea>
									</div>
								  </div>
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

