<script>
	$(document).ready(function() {
		$('#cari').focus();
	});

	$(function() {
		$("#cari").autocomplete({
			source: function(request, response) {
				$.ajax({
					type: "POST",
					url: '<?= site_url("penduduk/autocomplete"); ?>',
					dataType: "json",
					data: {
						cari: request.term
					},
					success: function(data) {
						response(JSON.parse(data));
					}
				});
			},
			minLength: 2,
		});
	});
</script>


<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4 class="m-0">Data Kependudukan</h4>
                    <ol class="breadcrumb">
                      <li class="breadcrumb"><a href="<?= site_url('beranda'); ?>"><i class="feather icon-home"></i></a></li>
						<li class="breadcrumb-item active">Data Kependudukan</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<form id="mainform" name="mainform" action="" method="post">
							<div class="card-header">
								<div class="row">
									<div class="col-sm-9">
										<?php if ($this->CI->cek_hak_akses('h')) : ?>
											<a href="<?= site_url('penduduk/form'); ?>" class="btn btn-success" title="Tambah Data"><i class="fa fa-plus"></i> Penduduk Domisili</a>
											<a href="#confirm-delete" title="Hapus Data Terpilih" onclick="deleteAllBox('mainform', '<?= site_url("penduduk/delete_all/$p/$o"); ?>')" class="btn btn-danger hapus-terpilih"><i class='fa fa-trash'></i> Hapus Data Terpilih</a>
										<?php endif; ?>
                                        
										<?php if ($this->CI->cek_hak_akses('h')) : ?>
										<div class="btn-group-vertical">
											<a class="btn btn-info" data-toggle="dropdown"><i class='fa fa-arrow-circle-down'></i> Pilih Aksi Lainnya</a>
											<ul class="dropdown-menu" role="menu">
													<a href="<?= site_url("penduduk/ajax_cetak/$o/cetak"); ?>" class="dropdown-item" title="Cetak Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Data">Cetak</a>
													<a href="<?= site_url("penduduk/ajax_cetak/$o/unduh"); ?>" class="dropdown-item" title="Unduh Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data">Unduh</a>
													<a href="<?= site_url("penduduk/ajax_adv_search"); ?>" class="dropdown-item" title="Pencarian Spesifik" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Pencarian Spesifik">Pencarian Spesifik</a>
													<a href="<?= site_url("penduduk/search_kumpulan_nik"); ?>" class="dropdown-item" title="Pilihan Kumpulan NIK" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Pilihan Kumpulan NIK">Pilihan Kumpulan NIK</a>
													<a href="<?= site_url("penduduk_log/clear"); ?>" class="dropdown-item" title="Log Data Kependudukan">Log Penduduk</a>
											</ul>
										</div>
                                        <?php endif; ?>
                                        
										<a href="<?= site_url("{$this->controller}/clear"); ?>" class="btn btn-secondary"><i class="fa fa-refresh"></i>Bersihkan</a>
									</div>

									<div class="col-sm-3">
										<div class="input-group float-right">
											<input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" title="Pencarian berdasarkan nama penduduk" value="<?= html_escape($cari); ?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?= site_url("penduduk/filter/cari"); ?>');$('#'+'mainform').submit();}">

											<button type="submit" class="btn btn-sm	 btn-default" onclick="$('#'+'mainform').attr('action', '<?= site_url("penduduk/filter/cari"); ?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</div><br />
								<div class="row">
									<div class="col-sm-2">
										<select class="form-control" name="filter" onchange="formAction('mainform', '<?= site_url('penduduk/filter/filter'); ?>')">
											<option value="">Status Penduduk</option>
											<?php foreach ($list_status_penduduk as $data) : ?>
												<option value="<?= $data['id']; ?>" <?= selected($filter, $data['id']); ?>><?= set_ucwords($data['nama']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-sm-2">
										<select class="form-control" name="status_dasar" onchange="formAction('mainform', '<?= site_url('penduduk/filter/status_dasar'); ?>')">
											<option value="">Status Dasar</option>
											<?php foreach ($list_status_dasar as $data) : ?>
												<option value="<?= $data['id']; ?>" <?= selected($status_dasar, $data['id']); ?>><?= set_ucwords($data['nama']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<div class="col-sm-2">
										<select class="form-control" name="sex" onchange="formAction('mainform', '<?= site_url('penduduk/filter/sex'); ?>')">
											<option value="">Jenis Kelamin</option>
											<?php foreach ($list_jenis_kelamin as $data) : ?>
												<option value="<?= $data['id']; ?>" <?= selected($sex, $data['id']); ?>><?= set_ucwords($data['nama']); ?></option>
											<?php endforeach; ?>
										</select>
									</div>
									<?php $this->load->view('global/filter_wilayah', ['form' => 'mainform']); ?>
								</div>
							</div>

							<div class="card-body table-responsive p-0" style="height: 450px;">
								<?php if ($judul_statistik) : ?>
									<h5 class="card-title text-center"><b><?= $judul_statistik; ?></b></h5>
								<?php endif; ?>

								<table class="table table-head-fixed text-nowrap table-hover">
									<thead>
										<tr class="text-center">
											<th><input type="checkbox" id="checkall" /></th>
											<th>No</th>
											<th>Aksi</th>
											<th>
												<?= url_order($o, "{$this->controller}/{$func}/$p", 1, 'NIK'); ?> &nbsp; <?= url_order($o, "{$this->controller}/{$func}/$p", 5, 'KK'); ?>
											</th>
											<th><?= url_order($o, "{$this->controller}/{$func}/$p", 3, 'Nama'); ?></th>
											<th><?= url_order($o, "{$this->controller}/{$func}/$p", 7, 'Umur'); ?></th>
											<th>Alamat</th>
											<th>Info Lainnya</th>
										</tr>
									</thead>
									<tbody>
										<?php if ($main) : ?>
											<?php foreach ($main as $key => $data) : ?>
												<tr>
													<td class="padat"><input type="checkbox" name="id_cb[]" value="<?= $data['id']; ?>" /></td>
													<td class="padat"><?= ($key + $paging->offset + 1); ?></td>
													<td align="center">
														<div class="box-profile">
															<div class="text-center" style="max-width:70px; max-height:70px">
																<img class="profile-user-img img-fluid img-circle" alt="Foto Penduduk" src="<?= AmbilFoto($data['foto'], '', $data['id_sex']) ?>" />
															</div>


															<div class="btn-group">
																<a href="<?= site_url("penduduk/detail/$p/$o/$data[id]"); ?>">
																	<button type="button" class="btn btn-success" title="Lihat Detail Biodata Penduduk">Lihat</button></a>
																<button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown">
																	<span class="sr-only">Toggle Dropdown</span>
																</button>
																<div class="dropdown-menu" role="menu">
																	<a class="dropdown-item" href="<?= site_url("penduduk/detail/$p/$o/$data[id]"); ?>">Lihat Detail Biodata Penduduk</a>
																	<?php if ($data['status_dasar'] == 9) : ?>
																		<a class="dropdown-item" href="#" data-href="<?= site_url("penduduk/kembalikan_status/$p/$o/$data[id]"); ?>" data-remote="false" data-toggle="modal" data-target="#confirm-status">Kembalikan ke Status HIDUP</a>
																	<?php endif; ?>
																	<?php if ($data['status_dasar'] == 1) : ?>
																		<?php if ($this->CI->cek_hak_akses('u')) : ?>
																			<a class="dropdown-item" href="<?= site_url("penduduk/form/$p/$o/$data[id]"); ?>">Ubah Biodata Penduduk</a>
																		<?php endif; ?>
																		<a class="dropdown-item" href="<?= site_url("penduduk/ajax_penduduk_maps_google/$p/$o/$data[id]/0"); ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" title="Lokasi <?= $data['nama'] ?> " data-title="Lokasi <?= $data['nama'] ?> - <?= strtoupper($data['dusun']); ?>, RW <?= $data['rw']; ?> / RT <?= $data['rt']; ?>">Lokasi Tempat Tinggal</a>
																		<?php if ($this->CI->cek_hak_akses('h')) : ?>
																			<a class="dropdown-item" href="<?= site_url("penduduk/edit_status_dasar/$p/$o/$data[id]"); ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Status Dasar">Ubah Status Dasar</a>
																		<?php endif; ?>
																		<a class="dropdown-item" href="<?= site_url("penduduk/dokumen/$data[id]"); ?>">Upload Dokumen Penduduk</a>
																		<a class="dropdown-item" href="<?= site_url("penduduk/rumah_form/$data[id]"); ?>" title="Tambah rumah" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah rumah">Tambah Rumah</a>
																		<a class="dropdown-item" href="<?= site_url("penduduk/cetak_biodata/$data[id]"); ?>" target="_blank">Cetak Biodata Penduduk</a>
																		<a class="dropdown-item" href="#">Something else here</a>
																		<div class="dropdown-divider"></div>
																		<?php if ($this->CI->cek_hak_akses('h')) : ?>
																			<a class="dropdown-item" href="#" data-href="<?= site_url("penduduk/delete/$p/$o/$data[id]"); ?>" data-toggle="modal" data-target="#confirm-delete">Hapus</a>
																		<?php endif; ?>
																	<?php endif; ?>
																</div>
															</div>
														</div>
													</td>
													<td nowrap>
														<p>
															<small>NIK :</small> <a href="<?= site_url("penduduk/detail/$p/$o/$data[id]"); ?>" id="test" name="<?= $data['id']; ?>"><?= $data['nik']; ?></a><br />
															<small>KK :</small> <a href="<?= site_url("keluarga/kartu_keluarga/$p/$o/$data[id_kk]"); ?>"><?= $data['no_kk']; ?> </a><br />
															<small>RTM :</small> <a href="<?= site_url("rtm/anggota/$data[id_rtm]"); ?>"><?= $data['no_rtm']; ?></a><br />
															<small>ID Card :</small>
														</p>
													</td>
													<td nowrap>
														<strong><?= strtoupper($data['nama']); ?></strong></br>
														<small>Ayah :</small> <?= $data['nama_ayah']; ?></br>
														<small>Ibu :</small> <?= $data['nama_ibu']; ?>
													</td>
													<td nowrap><strong><?= $data['umur']; ?></strong> <small>tahun</small><br />
														<small>Gender :</small> <?= $data['sex']; ?><br />
														<small>Lahir di :</small> <?= $data['tempatlahir']; ?><br />
														<small>Tanggal :</small> <?= tgl_indo2($data['tanggallahir']) ?>
													</td>
													<td>
														<?= strtoupper($data['alamat']); ?><br />
														RT <?= $data['rt']; ?> / RW <?= $data['rw']; ?><br />
														DUSUN <?= strtoupper($data['dusun']); ?>
													</td>
													<td nowrap>
														<small>Pendidikan :</small> <?= $data['pendidikan']; ?><br />
														<small>Pekerjaan :</small> <?= $data['pekerjaan']; ?><br />
														<small>Perkawinan :</small> <?= $data['kawin']; ?><br />
														<small>Pendaftar :</small> <?= $data['nama_pendaftar']; ?><br />
														<small>Tanggal :</small> <?= tgl_indo2($data['created_at']) ?></small>
													</td>
												</tr>
											<?php endforeach; ?>
										<?php else : ?>
											<tr>
												<td class="text-center" colspan="20">Data Tidak Tersedia</td>
											</tr>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
						</form>
						<?php $this->load->view('global/paging'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php $this->load->view('global/confirm_delete'); ?>
<?php $this->load->view('global/konfirmasi'); ?>

<div class='modal fade' id='confirm-status' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
	<div class='modal-dialog'>
		<div class='modal-content'>
			<div class='modal-header'>
				<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
				<h4 class='modal-title' id='myModalLabel'><i class='fa fa-exclamation-triangle text-red'></i> Konfirmasi</h4>
			</div>
			<div class='modal-body btn-info'>
				Apakah Anda yakin ingin mengembalikan status data penduduk ini?
			</div>
			<div class='modal-footer'>
				<button type="button" class="btn btn-social btn-box btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
				<a class='btn-ok'>
					<button type="button" class="btn btn-social btn-box btn-info btn-sm" id="ok-status"><i class='fa fa-check'></i> Simpan</button>
				</a>
			</div>
		</div>
	</div>
</div>
