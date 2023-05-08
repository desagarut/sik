<div class="content-wrapper">
	<section class="content-header">
		<h1>Hasil Polling</h1>
		<ol class="breadcrumb">
			<li><a href="<?= site_url('hom_sid')?>"><i class="fa fa-home"></i> Home</a></li>
			<li><a href="<?= site_url('polling')?>"> Daftar Polling</a></li>
			<li class="active">Hasil Polling</li>
		</ol>
	</section>
	<section class="content" id="maincontent">
			<div class="row">
				<div class="col-md-8">
				<div class="box">
				<div class="box-header with-border">
							<a href="<?= site_url("polling")?>" class="btn btn-social btn-flat btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block"  title="Tambah Artikel">
								<i class="fa fa-arrow-circle-left "></i>Kembali ke Daftar Polling
							</a>
						</div>

					<div class="card-body">
						<table id="tabel1" class="table table-bordered dataTable table-hover">
															<thead class="bg-gray disabled color-palette">
																<tr>
																	<th width="25">No</th>
																	<th width="50">Aksi</th>
																	<th width="100">Tanggal</th>
																	<th width="200">Pilihan</th>
																	<th>Alasan</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($datas as $key => $data): ?>
																	<tr>
																		<td><?=$key+1?></td>
																		<td nowrap>
																		<a href="#" data-href="<?= site_url("polling/delete_hasil/$polling/$data[id]")?>" class="btn bg-maroon btn-flat btn-sm" title="Hapus Hasil Vote" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
																		</td>
																			<td><?=tgl_indo( $data['created'] )?></td>
																			<td><?= $data['nama']?></td>
																			<td><?=$data['alasan']?></td>
																		</tr>
																	<?php endforeach; ?>
																</tbody>
															</table>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card card-info">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-12">
									<h4>Ringkasan Hasil Polling</h4>
									<div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
										<form id="mainform" name="mainform" action="" method="post">
											<div class="row">
												<div class="col-sm-12">
													<div class="table-responsive">
														<table class="table table-bordered dataTable table-hover">
															<thead class="bg-gray disabled color-palette">
																<tr>
																	<th width="25">No</th>
																	<th>Nama Pilihan</th>
																	<th>Jumlah Vote</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($pilihan as $key => $data): ?>
																	<tr>
																		<td><?=$key+1?></td>
																			<td width="50%"><?= $data['nama']?></td>
																			<td><?=$this->poll->count_vote( $data['id'] )?></td>
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
		</section>
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