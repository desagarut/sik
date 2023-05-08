<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4 class="m-0">Wilayah <?= ucwords($this->setting->sebutan_desa) ?> <?= $id_desa ?></h4>
				</div>
				<div class="col-sm-6">
					<small>
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
							<li class="breadcrumb-item"><a href="<?= site_url() ?>sid_core">Desa</a></li>
							<li class="breadcrumb-item"><a href="<?= site_url() ?>sid_core/sub_dusun">Kewilayahan</a></li>
							<li class="breadcrumb-item active"><a href="#!">Data</a></li>
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
						<i>Data <?= ucwords($this->setting->sebutan_dusun) ?> </i>
						<div class="float-right">
							<a href="<?= site_url("sid_core/") ?>" class="btn btn-info btn-sm btn-sm " title="Kembali Ke Daftar Desa/Kelurahan">
								<i class="fa fa-arrow-circle-left "></i> Kembali
							</a>
							<?php if ($this->CI->cek_hak_akses('h')) : ?>
								<a href="<?= site_url("sid_core/form_dusun/$id_desa/$id_dusun") ?>" class="btn btn-success btn-sm " title="Tambah Data"><i class="fa fa-plus"></i> Tambah Wilayah</a>
							<?php endif; ?>
							<a href="<?= site_url("sid_core/cetak_rw/$id_dusun") ?>" class="btn bg-purple btn-sm " title="Cetak Data" target="_blank"><i class="fa fa-print "></i> Cetak</a>
							<a href="<?= site_url("sid_core/excel_rw/$id_dusun") ?>" class="btn btn-warning btn-sm " title="Unduh Data" target="_blank"><i class="fa fa-download"></i> Unduh</a>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="table-responsive">
									<table id="example1" class="table table-bordered table-striped table-hover">
										<thead>
											<tr>
												<th class="padat">No</th>
												<th wlass="padat">Aksi</th>
												<th width="25%"> Dusun / Wilayah</th>
												<th width="35%"> Kadus / Kawil</th>
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
														<a href="<?= site_url("sid_core/sub_rw/$data[id]") ?>" class="btn bg-purple btn-box btn-sm" title="Rincian RW"><i class="fa fa-search"></i> RW</a>
														<?php if ($this->CI->cek_hak_akses('h')) : ?>
															<a href="<?= site_url("sid_core/form/$data[id]") ?>" class="btn bg-orange btn-box btn-sm" title="Ubah"><i class="fa fa-edit"></i></a>
															<a href="#" data-href="<?= site_url("sid_core/delete/dusun/$data[id]") ?>" class="btn bg-maroon btn-box btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
															<a href="<?= site_url("sid_core/ajax_kantor_dusun_maps_google/$data[id]") ?>" class="btn btn-info btn-box btn-sm" title="Lokasi Kantor"><i class="fa fa-map-marker"></i></a>
															<a href="<?= site_url("sid_core/ajax_wilayah_dusun_maps_google/$data[id]") ?>" class="btn btn-primary btn-box btn-sm" title="Peta Google"><i class="fa fa-map"></i></a>
															<a href="<?= site_url("sid_core/ajax_wilayah_dusun_openstreet_maps/$data[id]") ?>" class="btn btn-info btn-box btn-sm" title="Peta Openstreet"><i class="fa fa-map-o"></i></a>
														<?php endif; ?>
													</td>
													<td><?= strtoupper($data['dusun']) ?></td>
													<td nowrap><strong><?= strtoupper($data['nama_kadus']) ?></strong> - <?= $data['nik_kades'] ?></td>
													<td class="bilangan"><a href="<?= site_url("sid_core/sub_rw/$data[id]") ?>" title="Rincian RW"><?= $data['jumlah_rw'] ?></a></td>
													<td class="bilangan"><?= $data['jumlah_rt'] ?></td>
													<td class="bilangan"><a href="<?= site_url("sid_core/warga_l/$data[id]") ?>"><?= $data['jumlah_warga_l'] ?></a></td>
													<td class="bilangan"><a href="<?= site_url("sid_core/warga_p/$data[id]") ?>"><?= $data['jumlah_warga_p'] ?></a></td>
													<td class="bilangan"><a href="<?= site_url("sid_core/warga_kk/$data[id]") ?>"><?= $data['jumlah_kk'] ?></a></td>
													<td class="bilangan"><a href="<?= site_url("sid_core/warga/$data[id]") ?>"><?= $data['jumlah_warga'] ?></a></td>
												</tr>
											<?php
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
												<th colspan="4"><label>TOTAL</label></th>
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
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php $this->load->view('global/confirm_delete'); ?>