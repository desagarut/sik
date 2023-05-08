<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h5>Pengaturan Menu Dinamis</h5>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
						<li class="breadcrumb-item"><a href="#!">Web</a></li>
						<li class="breadcrumb-item active"><a href="#!">Pengaturan Menu Dinamis</a></li>
					</ol>
				</div>
			</div>
		</div>
	</div>

	<section class="content">
		<div class="container-fluid">
			<form id="mainform" name="mainform" action="" method="post">
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
								<a href="<?= site_url("kategori/ajax_add_sub_kategori/$kategori") ?>" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah Sub Kategori" class="btn btn-box btn-success btn-sm "><i class='fa fa-plus'></i> Tambah Sub Kategori</a>
								<a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform', '<?= site_url("kategori/delete_all_sub_kategori/$kategori") ?>')" class="btn btn-box btn-danger btn-sm  hapus-terpilih"><i class='fa fa-trash'></i> Hapus Data Terpilih</a>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
										<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<form id="mainform" name="mainform" action="" method="post">
												<div class="row">
													<div class="col-sm-12">
														<div class="table-responsive">
															<table class="table table-bordered dataTable table-hover">
																<thead>
																	<tr>
																		<th><input type="checkbox" id="checkall" /></th>
																		<th>No</th>
																		<th>Aksi</th>
																		<th>Nama Sub Menu</th>
																		<th>Aktif</th>
																		<th>Link</th>
																	</tr>
																</thead>
																<tbody>
																	<?php foreach ($subkategori as $data) : ?>
																		<tr>
																			<td><input type="checkbox" name="id_cb[]" value="<?= $data['id'] ?>" /></td>
																			<td><?= $data['no'] ?></td>
																			<td nowrap>
																				<a href="<?= site_url("kategori/urut/$data[id]/1/$kategori") ?>" class="btn bg-olive btn-box btn-sm" title="Pindah Posisi Ke Bawah"><i class="fa fa-arrow-down"></i></a>
																				<a href="<?= site_url("kategori/urut/$data[id]/2/$kategori") ?>" class="btn bg-olive btn-box btn-sm" title="Pindah Posisi Ke Atas"><i class="fa fa-arrow-up"></i></a>
																				<a href="<?= site_url("kategori/ajax_add_sub_kategori/$kategori/$data[id]") ?>" class="btn bg-orange btn-box btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Ubah Data" title="Ubah Data"><i class="fa fa-edit"></i></a>
																				<?php if ($data['enabled'] == '2') : ?>
																					<a href="<?= site_url("kategori/kategori_lock_sub_kategori/$kategori/$data[id]") ?>" class="btn bg-navy btn-box btn-sm" title="Aktifkan"><i class="fa fa-lock">&nbsp;</i></a>
																				<?php elseif ($data['enabled'] == '1') : ?>
																					<a href="<?= site_url("kategori/kategori_unlock_sub_kategori/$kategori/$data[id]") ?>" class="btn bg-navy btn-box btn-sm" title="Non Aktifkan"><i class="fa fa-unlock"></i></a>
																				<?php endif; ?>
																				<a href="#" data-href="<?= site_url("kategori/delete_sub_kategori/$kategori/$data[id]") ?>" class="btn bg-maroon btn-box btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
																			</td>
																			<td width="50%"><?= $data['kategori'] ?></td>
																			<td><?= $data['aktif'] ?></td>
																			<td>-</td>
																		</tr>
																	<?php endforeach; ?>
																</tbody>
															</table>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</section>
</div>
<?php $this->load->view('global/confirm_delete'); ?>