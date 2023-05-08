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
          <h4 class="m-0">Pengguna</h4>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
            <li class="breadcrumb-item active"><a href="#!">Pengaturan</a></li>
            <li class="breadcrumb-item active"><a href="#!">Pengguna</a></li>
          </ol>
        </div>
        <!-- /.col --> 
      </div>
      <!-- /.row --> 
    </div>
    <!-- /.container-fluid --> 
  </div>
  <!-- /.content-header -->
  
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header"> <a href="<?= site_url('man_user/form') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Pengguna Baru</a> <a href="#confirm-delete" title="Hapus Data" onclick="deleteAllBox('mainform','<?= site_url("man_user/delete_all/$p/$o") ?>')" class="btn btn-danger hapus-terpilih"><i class='fa fa-trash'></i> Hapus Data Terpilih</a> </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-12">
                  <form id="mainform" name="mainform" action="" method="post">
                    <div class="row">
                      <div class="col-sm-6">
                        <select class="form-control input-sm" name="filter" onchange="formAction('mainform','<?= site_url('man_user/filter') ?>')">
                          <option value="">Semua</option>
                          <?php foreach ($user_group as $item) : ?>
                          <option <?php selected($filter, $item['id']); ?> value="<?= $item[id] ?>">
                          <?= $item['nama'] ?>
                          </option>
                          <?php endforeach ?>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <div class="card-tools">
                          <div class="input-group input-group-sm pull-right">
                            <input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?= html_escape($cari) ?>" onkeypress="if (event.keyCode == 13) {$('#'+'mainform').attr('action','<?= site_url('man_user/search') ?>');$('#'+'mainform').submit();}">
                            <div class="input-group-btn">
                              <button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action','<?= site_url("man_user/search") ?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="card-body table-border-style">
                          <div class="table-responsive">
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th><input type="checkbox" id="checkall" /></th>
                                  <th>No</th>
                                  <th>Aksi</th>
                                  <?php if ($o == 2) : ?>
                                  <th nowrap><a href="<?= site_url("man_user/index/$cat/$p/1") ?>">Username <i class='fa fa-sort-asc fa-sm'></i></a></th>
                                  <?php elseif ($o == 1) : ?>
                                  <th nowrap><a href="<?= site_url("man_user/index/$cat/$p/2") ?>">Username <i class='fa fa-sort-desc fa-sm'></i></a></th>
                                  <?php else : ?>
                                  <th nowrap><a href="<?= site_url("man_user/index/$cat/$p/1") ?>">Username <i class='fa fa-sort fa-sm'></i></a></th>
                                  <?php endif; ?>
                                  <?php if ($o == 4) : ?>
                                  <th width='50%'><a href="<?= site_url("man_user/index/$cat/$p/3") ?>">Nama <i class='fa fa-sort-asc fa-sm'></i></a></th>
                                  <?php elseif ($o == 3) : ?>
                                  <th width='50%'><a href="<?= site_url("man_user/index/$cat/$p/4") ?>">Nama <i class='fa fa-sort-desc fa-sm'></i></a></th>
                                  <?php else : ?>
                                  <th width='50%'><a href="<?= site_url("man_user/index/$cat/$p/3") ?>">Nama <i class='fa fa-sort fa-sm'></i></a></th>
                                  <?php endif; ?>
                                  <?php if ($o == 6) : ?>
                                  <th><a href="<?= site_url("man_user/index/$cat/$p/5") ?>">Group <i class='fa fa-sort-asc fa-sm'></i></a></th>
                                  <?php elseif ($o == 5) : ?>
                                  <th><a href="<?= site_url("man_user/index/$cat/$p/6") ?>">Group <i class='fa fa-sort-desc fa-sm'></i></a></th>
                                  <?php else : ?>
                                  <th><a href="<?= site_url("man_user/index/$cat/$p/5") ?>">Group <i class='fa fa-sort fa-sm'></i></a></th>
                                  <?php endif; ?>
                                  <th>Login Terakhir</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($main as $data) : ?>
                                <tr>
                                  <td><?php if ($data['id'] != 1) : ?>
                                    <input type="checkbox" name="id_cb[]" value="<?= $data['id'] ?>" />
                                    <?php endif; ?></td>
                                  <td><?= $data['no'] ?></td>
                                  <td nowrap><a href="<?= site_url("Man_user/form/$p/$o/$data[id]") ?>" class="btn btn-warning" title="Ubah"><i class="fa fa-edit"></i></a>
                                    <?php if ($data['id'] != 1) : ?>
                                    <?php if ($data['active'] == '0') : ?>
                                    <a href="<?= site_url('Man_user/user_unlock/' . $data['id']) ?>" class="btn btn-secondary" title="Aktifkan Pengguna"><i class="fa fa-lock">&nbsp;</i></a>
                                    <?php elseif ($data['active'] == '1') : ?>
                                    <a href="<?= site_url('Man_user/user_lock/' . $data['id']) ?>" class="btn btn-success" title="Non Aktifkan Pengguna"><i class="fa fa-unlock"></i></a>
                                    <?php endif; ?>
                                    <a href="#" data-href="<?= site_url("Man_user/delete/$p/$o/$data[id]") ?>" class="btn btn-danger" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                                    <?php endif; ?></td>
                                  <td><?= $data['username'] ?></td>
                                  <td><?= $data['nama'] ?></td>
                                  <td><?= $data['grup'] ?></td>
                                  <td><?= tgl_indo($data['last_login']) ?></td>
                                </tr>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <!--<div class="row">
                                    <div class="col-sm-6">
                                        <div class="dataTables_length">
                                            <form id="paging" action="<?= site_url("man_user") ?>" method="post" class="form-horizontal">
                                                <label>
                                                    Tampilkan
                                                    <select name="per_page" class="form-control input-sm" onchange="$('#paging').submit()">
                                                        <option value="20" <?php selected($per_page, 20); ?> >20</option>
                                                        <option value="50" <?php selected($per_page, 50); ?> >50</option>
                                                        <option value="100" <?php selected($per_page, 100); ?> >100</option>
                                                    </select>
                                                    Dari
                                                    <strong><?= $paging->num_rows ?></strong>
                                                    Total Data
                                                </label>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="dataTables_paginate paging_simple_numbers">
                                            <ul class="pagination">
                                                <?php if ($paging->start_link) : ?>
                                                    <li><a href="<?= site_url("man_user/index/$paging->start_link/$o") ?>" aria-label="First"><span aria-hidden="true">Awal</span></a></li>
                                                <?php endif; ?>
                                                <?php if ($paging->prev) : ?>
                                                    <li><a href="<?= site_url("man_user/index/$paging->prev/$o") ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                                                <?php endif; ?>
                                                <?php for ($i = $paging->start_link; $i <= $paging->end_link; $i++) : ?>
                                                    <li><a href="<?= site_url("man_user/index/$cat/$i/$o") ?>"><?= $i ?></a></li>
                                                <?php endfor; ?>
                                                <?php if ($paging->next) : ?>
                                                    <li><a href="<?= site_url("man_user/index/$paging->next/$o") ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                                                <?php endif; ?>
                                                <?php if ($paging->end_link) : ?>
                                                    <li><a href="<?= site_url("man_user/index/$paging->end_link/$o") ?>" aria-label="Last"><span aria-hidden="true">Akhir</span></a></li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>--> 
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
