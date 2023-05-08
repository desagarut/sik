<div class="pcoded-main-container">
	<div class="pcoded-content">

	<div class="page-header">
		<h5 class="m-b-10">Kode Isian Form Surat</h5>
		<ul class="breadcrumb">
      <li><a href="<?= site_url('beranda')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('surat_master')?>"> Format Surat Desa</a></li>
						<li class="breadcrumb-item active">Kode Isian Form Surat</li>
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
						<a href="<?=site_url("surat_master")?>" class="btn btn-box btn-info btn-sm btn-sm "  title="Kembali Ke Daftar Wilayah">
							<i class="fa fa-arrow-circle-left "></i>Kembali ke Daftar Format Surat
           	</a>
					</div>
					<div class="card-header">
						<h3 class="card-title"><i class="fa fa-info-circle"></i> <strong>Kode Isian Format Surat <?= $surat_master['nama']?></strong></h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-7">
								<p>
									Kode isian pada tabel di bawah dapat dimasukkan ke dalam template/Format RTF Ekspor Dok untuk jenis surat ini.
								</p>
								<p>
									Pada waktu mencetak surat Ekspor Dok memakai template itu, kode isian di bawah akan diganti dengan data yang diisi pada form isian untuk jenis surat ini.
								</p>
							</div>
							<div class="col-sm-5">
								<table class="table table-bordered table-hover ">
									<thead class="bg-gray disabled color-palette">
										<tr>
											<th>Kode</th>
											<th >Data di Form Isian</th>
										</tr>
									</thead>
									<tbody>
										 <?php foreach ($inputs as $kode => $keterangan): ?>
											<tr>
												<td style="padding-top : 10px;padding-bottom : 10px; " >[form_<?= $kode?>]</td>
												<td><?= $keterangan?></td>
											</tr>
										  <?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
