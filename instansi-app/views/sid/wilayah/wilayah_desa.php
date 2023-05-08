<script>
	$(function() {
		var keyword = <?= $keyword ?>;
		$("#cari").autocomplete({
			source: keyword,
			maxShowItems: 10,
		});
	});
</script>
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4 class="m-0">Wilayah <?= ucwords($this->setting->sebutan_kecamatan) ?> <?= $setting_kecamatan['nama_kecamatan'] ?>
					</h4>
				</div>
				<div class="col-sm-6">
					<small>
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
							<li class="breadcrumb-item active"><a href="#!">Wilayah Desa & Kelurahan</a></li>
						</ol>
					</small>
				</div>
			</div>
		</div>
	</div>
	<!-- /.content-header -->

	<section class="content" id="maincontent">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
					<i>Daftar Desa / Kelurahan</i>
						<div class="float-right">
							<?php if ($this->CI->cek_hak_akses('h')) : ?>
								<a href="<?= site_url('sid_core/form') ?>" class="btn btn-success btn-sm" title="Tambah Data Desa / Kelurahan"><i class="fa fa-plus"></i> Tambah</a>
							<?php endif; ?>
							<a href="<?= site_url("$this->controller/dialog/cetak") ?>" class="btn bg-purple btn-sm" title="Cetak Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Data"><i class="fa fa-print "></i> Cetak</a>
							<a href="<?= site_url("$this->controller/dialog/unduh") ?>" title="Unduh Data" class="btn bg-navy btn-sm" title="Unduh Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data"><i class="fa fa-download"></i> Unduh</a>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
									<form id="mainform" name="mainform" action="" method="post">
										<div class="row mb-2">
											<div class="col-sm-12">
												<div class="table-responsive">
													<table id="example1" class="table table-bordered table-striped table-hover">
														<thead>
															<tr>
																<th class="padat">No</th>
																<th wlass="padat">Aksi</th>
																<th width="25%"> Kode</th>
																<th width="25%"> Desa/Kelurahan</th>
																<th width="35%">Kepala Desa / Lurah</th>
																<th class="text-center">Wil</th>
																<th class="text-center">RW</th>
																<th class="text-center">RT</th>
																<th class="text-center">L</th>
																<th class="text-center">P</th>
																<th class="text-center">KK</th>
																<th class="text-center">L+P</th>
															</tr>
														</thead>
														<tbody>
															<?php
															$total = array();
															$total['total_dusun'] = 0;
															$total['total_rw'] = 0;
															$total['total_rt'] = 0;
															$total['total_warga_l'] = 0;
															$total['total_warga_p'] = 0;
															$total['total_kk'] = 0;
															$total['total_warga'] = 0;
															foreach ($main as $data) :
															?>
																<tr>
																	<td class="no_urut"><?= $data['no'] ?></td>
																	<td nowrap>
																		<a href="<?= site_url("sid_core/sub_dusun/$data[id]") ?>" class="btn btn-success btn-box btn-sm" title="Rincian Sub Wilayah"> Lihat</a>
																		<?php if ($this->CI->cek_hak_akses('h')) : ?>
																			<a href="<?= site_url("sid_core/form/$data[id]") ?>" class="btn bg-orange btn-box btn-sm" title="Ubah"><i class="fa fa-edit"></i></a>
																			<a href="#" data-href="<?= site_url("sid_core/delete/dusun/$data[id]") ?>" class="btn bg-maroon btn-box btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
																			<a href="<?= site_url("sid_core/ajax_kantor_dusun_maps_google/$data[id]") ?>" class="btn btn-info btn-box btn-sm" title="Lokasi Kantor"><i class="fa fa-map-marker"></i></a>
																			<a href="<?= site_url("sid_core/ajax_wilayah_dusun_maps_google/$data[id]") ?>" class="btn btn-primary btn-box btn-sm" title="Peta Google"><i class="fa fa-map"></i></a>
																			<a href="<?= site_url("sid_core/ajax_wilayah_dusun_openstreet_maps/$data[id]") ?>" class="btn btn-info btn-box btn-sm" title="Peta Openstreet"><i class="fa fa-map"></i></a>
																		<?php endif; ?>
																	</td>
																	<td><?= strtoupper($data['kode_desa']) ?></td>
																	<td><?= strtoupper($data['desa']) ?></td>
																	<td nowrap><strong><?= strtoupper($data['nama_kades']) ?></strong> - <?= $data['nik_kades'] ?></td>
																	<td class="bilangan"><a href="<?= site_url("sid_core/sub_dusun/$data[id]") ?>" title="Rincian Dusun"><?= $data['jumlah_dusun'] ?></a></td>
																	<td class="bilangan"><a href="<?= site_url("sid_core/sub_rw/$data[id]") ?>" title="Rincian RW"><?= $data['jumlah_rw'] ?></a></td>
																	<td class="bilangan"><?= $data['jumlah_rt'] ?></td>
																	<td class="bilangan"><a href="<?= site_url("sid_core/warga_l/$data[id]") ?>"><?= $data['jumlah_warga_l'] ?></a></td>
																	<td class="bilangan"><a href="<?= site_url("sid_core/warga_p/$data[id]") ?>"><?= $data['jumlah_warga_p'] ?></a></td>
																	<td class="bilangan"><a href="<?= site_url("sid_core/warga_kk/$data[id]") ?>"><?= $data['jumlah_kk'] ?></a></td>
																	<td class="bilangan"><a href="<?= site_url("sid_core/warga/$data[id]") ?>"><?= $data['jumlah_warga'] ?></a></td>
																</tr>
															<?php
																$total['total_dusun'] += $data['jumlah_dusun'];
																$total['total_rw'] += $data['jumlah_rw'];
																$total['total_rt'] += $data['jumlah_rt'];
																$total['total_warga_l'] += $data['jumlah_warga_l'];
																$total['total_warga_p'] += $data['jumlah_warga_p'];
																$total['total_kk'] += $data['jumlah_kk'];
																$total['total_warga'] += $data['jumlah_warga'];
															endforeach;
															?>
														</tbody>
														<tfoot>
															<tr>
																<th colspan="5"><label>TOTAL</label></th>
																<th class="bilangan"><?= $total['total_dusun'] ?></th>
																<th class="bilangan"><?= $total['total_rw'] ?></th>
																<th class="bilangan"><?= $total['total_rt'] ?></th>
																<th class="bilangan"><?= $total['total_warga_l'] ?></th>
																<th class="bilangan"><?= $total['total_warga_p'] ?></th>
																<th class="bilangan"><?= $total['total_kk'] ?></th>
																<th class="bilangan"><?= $total['total_warga'] ?></th>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
										</div>
									</form>
									<?php $this->load->view('global/paging'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php $this->load->view('global/confirm_delete'); ?>
<script src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/js/validasi.js"></script>
<script src="<?= base_url() ?>assets/js/localization/messages_id.js"></script>