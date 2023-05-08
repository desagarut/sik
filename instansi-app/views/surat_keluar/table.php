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
					<h4 class="m-0">Pengaturan Surat <?= $detail['nama']; ?></h4>
				</div>
				<!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Home</a></li>
						<li class="breadcrumb-item active">Format Surat Desa</li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>

	<!-- Content Wrapper. Contains page content -->
	<form id="mainform" name="mainform" action="" method="post">

		<div class="card-header">
			<div class="row">
				<div class="col-md-12">
					<a href='<?= site_url("{$this->controller}/form") ?>' title="Tambah Surat Keluar Baru" class="btn btn-box bg-olive btn-sm "><i class="fa fa-plus"></i> Tambah Surat Keluar Baru</a>
					<a href="#confirm-delete" title="Hapus Data" title="Hapus Data Terpilih" onclick="deleteAllBox('mainform','<?= site_url("{$this->controller}/delete_all/$p/$o") ?>')" class="btn btn-box	btn-danger btn-sm  hapus-terpilih"><i class='fa fa-trash'></i> Hapus Data Terpilih</a>
					<a href="<?= site_url("{$this->controller}/dialog_cetak/$o") ?>" class="btn btn-box btn-secondary btn-sm " title="Cetak Agenda Surat Keluar" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Agenda Surat Keluar"><i class="fa fa-print "></i> Cetak</a>
					<a href="<?= site_url("{$this->controller}/dialog_unduh/$o") ?>" title="Unduh Agenda Surat Keluar" class="btn btn-box btn-secondary btn-sm " title="Unduh Agenda Surat Keluar" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Agenda Surat Keluar"><i class="fa fa-download"></i> Unduh</a>
				</div>
			</div><br />
			<div class="row">
				<div class="col-sm-3">
					<select class="form-control form-control-sm " name="filter" onchange="formAction('mainform','<?= site_url($this->controller . '/filter') ?>')">
						<option value="">Tahun</option>
						<?php foreach ($tahun_surat as $tahun) : ?>
							<option value="<?= $tahun['tahun'] ?>" <?php selected($filter, $tahun['tahun']) ?>><?= $tahun['tahun'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="col-sm-3">
					<div class="input-group input-group-sm pull-right">
						<input name="cari" id="cari" class="form-control form-control-navbar" placeholder="Cari..." type="search" value="<?= html_escape($cari) ?>" onkeypress="if (event.keyCode == 13){$('#'+'mainform').attr('action', '<?= site_url("{$this->controller}/search") ?>');$('#'+'mainform').submit();}">
						<div class="input-group-btn">
							<button type="submit" class="btn btn-sm btn-default" onclick="$('#'+'mainform').attr('action', '<?= site_url("{$this->controller}/search") ?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="card-body table-responsive p-0">
			<div class="col-md-12">
				<table class="table table-head-fixed text-nowrap table-hover">
					<thead>
						<tr>
							<th class="nostretch"><input type="checkbox" id="checkall" /></th>
							<?php if ($o == 2) : ?>
								<th class="nostretch"><a href="<?= site_url("{$this->controller}/index/$p/1") ?>">No.<i class='fa fa-sort-asc fa-sm'></i></a></th>
							<?php elseif ($o == 1) : ?>
								<th class="nostretch"><a href="<?= site_url("{$this->controller}/index/$p/2") ?>">No.<i class='fa fa-sort-desc fa-sm'></i></a></th>
							<?php else : ?>
								<th class="nostretch"><a href="<?= site_url("{$this->controller}/index/$p/1") ?>">No.<i class='fa fa-sort fa-sm'></i></a></th>
							<?php endif; ?>
							<th class="nostretch">Aksi</th>
							<th class="nostretch">Nomor Surat</th>
							<?php if ($o == 4) : ?>
								<th><a href="<?= site_url("{$this->controller}/index/$p/3") ?>">Tanggal Surat <i class='fa fa-sort-asc fa-sm'></i></a></th>
							<?php elseif ($o == 3) : ?>
								<th><a href="<?= site_url("{$this->controller}/index/$p/4") ?>">Tanggal Surat <i class='fa fa-sort-desc fa-sm'></i></a></th>
							<?php else : ?>
								<th><a href="<?= site_url("{$this->controller}/index/$p/3") ?>">Tanggal Surat <i class='fa fa-sort fa-sm'></i></a></th>
							<?php endif; ?>
							<?php if ($o == 6) : ?>
								<th nowrap><a href="<?= site_url("{$this->controller}/index/$p/5") ?>">Ditujukan Kepada <i class='fa fa-sort-asc fa-sm'></i></a></th>
							<?php elseif ($o == 5) : ?>
								<th nowrap><a href="<?= site_url("{$this->controller}/index/$p/6") ?>">Ditujukan Kepada <i class='fa fa-sort-desc fa-sm'></i></a></th>
							<?php else : ?>
								<th nowrap><a href="<?= site_url("{$this->controller}/index/$p/5") ?>">Ditujukan Kepada <i class='fa fa-sort fa-sm'></i></a></th>
							<?php endif; ?>
							<th width="30%">Isi Singkat</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($main as $data) : ?>
							<tr>
								<td><input type="checkbox" name="id_cb[]" value="<?= $data['id'] ?>" /></td>
								<td class="nostretch text-center"><?= $data['nomor_urut'] ?></td>
								<td class="nostretch">
									<a href="<?= site_url("{$this->controller}/form/$p/$o/$data[id]") ?>" class="btn bg-orange btn-box btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a>
									<?php if ($data['berkas_scan']) : ?>
										<a href='<?= site_url("{$this->controller}/unduh_berkas_scan/$data[id]") ?>' class="btn bg-purple btn-box btn-sm" title="Unduh Berkas Surat" target="_blank"><i class="fa fa-download"></i></a>
									<?php endif; ?>
									<?php if ($data['ekspedisi']) : ?>
										<a href='<?= site_url("ekspedisi/index/") ?>' class="btn bg-info btn-box btn-sm" title="Buku Ekspedisi"><i class="fa fa-envelope-open"></i></a>
									<?php else : ?>
										<a href='<?= site_url("{$this->controller}/untuk_ekspedisi/$p/$o/$data[id]") ?>' class="btn bg-blue btn-box btn-sm" title="Tambahkan ke Buku Ekspedisi"><i class="fa fa-envelope-open"></i></a>
									<?php endif; ?>
									<a href="#" data-href="<?= site_url("{$this->controller}/delete/$p/$o/$data[id]") ?>" class="btn btn-danger btn-box btn-sm" title="Hapus Data" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
								</td>
								<td class="nostretch"><?= $data['nomor_surat'] ?></td>
								<td nowrap><?= tgl_indo_out($data['tanggal_surat']) ?></td>
								<td><?= $data['tujuan'] ?></td>
								<td><?= $data['isi_singkat'] ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>

		</div>
		<div class="card-footer">
			<div class="row">
				<div class="col-sm-6">
					<div class="dataTables_length">
						<form id="paging" action="<?= site_url("surat_keluar") ?>" method="post" class="form-horizontal">
							<label><small>
									Tampilkan
									<select name="per_page" class="form-control input-sm" onchange="$('#paging').submit()">
										<option value="20" <?php selected($per_page, 20); ?>>20</option>
										<option value="50" <?php selected($per_page, 50); ?>>50</option>
										<option value="100" <?php selected($per_page, 100); ?>>100</option>
									</select>
									Dari
									<strong><?= $paging->num_rows ?></strong>
									Total Data</small>
							</label>
						</form>
					</div>
				</div>
				<div class="col-sm-6">

					<?php $this->load->view('global/paging'); ?>
					<!--<div class="dataTables_paginate paging_simple_numbers">
					<ul class="pagination">
						<?php if ($paging->start_link) : ?>
							<li><a href="<?= site_url("{$this->controller}/index/$paging->start_link/$o") ?>" aria-label="First"><span aria-hidden="true">Awal</span></a></li>
						<?php endif; ?>
						<?php if ($paging->prev) : ?>
							<li><a href="<?= site_url("{$this->controller}/index/$paging->prev/$o") ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
						<?php endif; ?>
						<?php for ($i = $paging->start_link; $i <= $paging->end_link; $i++) : ?>
							<li <?= jecho($p, $i, "class='active'") ?>><a href="<?= site_url("{$this->controller}/index/$i/$o") ?>"><?= $i ?></a></li>
						<?php endfor; ?>
						<?php if ($paging->next) : ?>
							<li><a href="<?= site_url("{$this->controller}/index/$paging->next/$o") ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
						<?php endif; ?>
						<?php if ($paging->end_link) : ?>
							<li><a href="<?= site_url("{$this->controller}/index/$paging->end_link/$o") ?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a></li>
						<?php endif; ?>
					</ul>
				</div>-->
				</div>
			</div>
		</div>
	</form>
</div>

<?php $this->load->view('global/confirm_delete'); ?>