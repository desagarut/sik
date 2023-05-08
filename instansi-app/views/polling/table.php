<div class="content-wrapper">
	<section class="content-header">
		<h1>Polling</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Polling</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
		<form id="mainform" name="mainform" action="" method="post">
			<div class="row">
				<div class="col-md-9">
					<div class="card card-info">
					<div class="box-header with-border">
							<a href="<?= site_url("polling/form")?>" data-title="Tambah Polling"  class="btn btn-social btn-flat btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"><i class='fa fa-plus'></i> Tambah Polling</a>
						</div>

						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
											<div class="row">
												<div class="col-sm-12">
													<div class="table-responsive">
														<table id="tabel1" class="table table-bordered dataTable table-hover">
															<thead class="bg-gray disabled color-palette">
																<tr>
																	<th>No</th>
																	<th>Aksi</th>
																	<th>Pertanyaan</th>
																	<th>Aktif</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($main as $key => $data){ ?>
																	<tr>
																		<td><?=$key+1?></td>
																		<td nowrap>
																			<a href="<?= site_url("polling/hasil/$data[id]")?>" class="btn bg-green btn-flat btn-sm"  title="Lihat Hasil Polling"><i class="fa fa-search"></i></a>
																			<a href="<?= site_url("polling/pilihan/$data[id]")?>" class="btn bg-purple btn-flat btn-sm"  title="Pilihan"><i class="fa fa-bars"></i></a>
																			<a href="<?= site_url("polling/form/$data[id]")?>" class="btn btn-warning btn-flat btn-sm"  title="Ubah"><i class="fa fa-edit"></i></a>
																			<?php if ($data['status'] == '0'){ ?>
																				<a href="<?= site_url("polling/ubah_polling_status/".$data['id'].'/1')?>" class="btn bg-navy btn-flat btn-sm"  title="Aktifkan"><i class="fa fa-lock">&nbsp;</i></a>
																			<?php }elseif ($data['status'] == '1'){ ?>
																				<a href="<?= site_url("polling/ubah_polling_status/".$data['id'].'/0')?>" class="btn bg-navy btn-flat btn-sm"  title="Non Aktifkan"><i class="fa fa-unlock"></i></a>
																				<a href="<?= site_url("polling/ajax_add_pilihan/$data[id]")?>" class="btn bg-olive btn-flat btn-sm" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Tambah Pilihan" title="Tambah Pilihan"><i class="fa fa-plus"></i></a>
																			<?php } ?>
																			<a href="#" data-href="<?= site_url("polling/delete/$data[id]")?>" class="btn bg-maroon btn-flat btn-sm"  title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
																		</td>
																		<td width="50%"><?= $data['pertanyaan']?></td>
																		<td><?=($data['status']==0) ? 'Tidak' : 'Ya'?></td>
																	</tr>
																<?php } ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
									</div>
								</div>
							</div>

							<div class='modal fade' id='confirm-delete' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
								<div class='modal-dialog'>
									<div class='modal-content'>
										<div class='modal-header'>
											<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
											<h4 class='modal-title' id='myModalLabel'><i class='fa fa-exclamation-triangle text-red'></i> Konfirmasi</h4>
										</div>
										<div class='modal-body btn-info'>
											Apakah Anda yakin ingin menghapus data ini?
										</div>
										<div class='modal-footer'>
											<button type="button" class="btn btn-social btn-flat btn-warning btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
											<a class='btn-ok'>
												<button type="button" class="btn btn-social btn-flat btn-danger btn-sm" id="ok-delete"><i class='fa fa-trash'></i> Hapus</button>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>

