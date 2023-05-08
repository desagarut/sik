<script>
	$(function() {
		var keyword = <?= $keyword?> ;
		$( "#cari" ).autocomplete({
			source: keyword,
			maxShowItems: 10,
		});
	});
</script>
<style type="text/css">
.table-responsive {
	min-height: 350px;
}
td.nowrap {
	white-space: nowrap;
}
</style>

<div class="content-wrapper"> 
  
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0">Data Pegawai</h4>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#!">Data Instansi</a></li>
            <li class="breadcrumb-item active"><a href="#!">Data Pegawai</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <?php if ($this->CI->cek_hak_akses('h')): ?>
          <a href="<?= site_url('pengurus/form')?>" class="btn btn-box btn-success btn-sm btn-sm" title="Tambah Pegawai"> <i class="fa fa-plus"></i> Tambah Pegawai </a>
          <?php endif;?>
          <?php if ($this->CI->cek_hak_akses('h')): ?>
          <div class="btn-group btn-group-vertical"> <a class="btn btn-box btn-info btn-sm" data-toggle="dropdown"><i class='fa fa-arrow-circle-down'></i> Aksi Data Terpilih</a>
            <ul class="dropdown-menu" role="menu">
              <li> <a href="<?= site_url("pengurus/atur_bagan")?>" title="Ubah Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Atur Struktur Bagan" class="btn btn-box btn-block btn-sm aksi-terpilih" ><i class="fa fa-sitemap"></i> Atur Struktur Bagan</a> </li>
              <li> <a href="#confirm-delete" class="btn btn-box btn-block btn-sm hapus-terpilih" title="Hapus Data" onclick="deleteAllBox('mainform', '<?=site_url("pengurus/delete_all")?>')"><i class="fa fa-trash"></i> Hapus Data Terpilih</a> </li>
            </ul>
          </div>
          <?php endif; ?>
          <a href="<?= site_url("pengurus/dialog/cetak")?>" class="btn btn-box bg-purple btn-sm " title="Cetak Data" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Cetak Data"><i class="fa fa-print "></i> Cetak</a> 
          <a href="<?= site_url("pengurus/dialog/unduh")?>" title="Unduh Data" class="btn btn-box bg-navy btn-sm " data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Unduh Data"><i class="fa fa-download"></i> Unduh</a>
          <?php if ($this->CI->cek_hak_akses('h')): ?>
          <div class="btn-group btn-group-vertical"> <a class="btn btn-secondary btn-sm " data-toggle="dropdown"><i class='fa fa-arrow-circle-down'></i> Bagan Organisasi</a>
            <ul class="dropdown-menu" role="menu">
              <li> <a href="<?= site_url("pengurus/bagan")?>" title="Bagan Tanpa BPD" class="btn btn-sm" ><i class="fa fa-sitemap"></i> Bagan Tanpa BPD</a> </li>
              <li> <a href="<?= site_url("pengurus/bagan/bpd")?>" title="Bagan Dengan BPD" class="btn btn-sm" ><i class="fa fa-sitemap"></i> Bagan Dengan BPD</a> </li>
              <li> <a href="<?= site_url("pengurus/atur_bagan_layout")?>" title="Atur Ukuran Bagan" data-remote="false" data-toggle="modal" data-target="#modalBox" data-title="Atur Ukuran Bagan" class="btn btn-sm" ><i class="fa fa-cogs"></i> Atur Ukuran Bagan</a> </li>
            </ul>
          </div>
          <?php endif; ?>
        </div>
        <div class="card-body table-card">
          <div class="row">
            <div class="col-sm-12">
              <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <form id="mainform" name="mainform" action="" method="post">
                  <div class="row">
                    <div class="col-sm-6">
                      <select class="form-control input-sm" name="status" onchange="formAction('mainform','<?= site_url('pengurus/filter/status')?>')">
                        <option value="">Semua</option>
                        <option value="1" <?php selected($status, 1); ?>>Aktif</option>
                        <option value="2" <?php selected($status, 2); ?>>Tidak Aktif</option>
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <div class="box-tools">
                        <div class="input-group input-group-sm pull-right">
                          <input name="cari" id="cari" class="form-control" placeholder="Cari..." type="text" value="<?=html_escape($cari)?>" onkeypress="if (event.keyCode == 13) {$('#'+'mainform').attr('action','<?= site_url('pengurus/filter/cari')?>');$('#'+'mainform').submit();}">
                          <div class="input-group-btn">
                            <button type="submit" class="btn btn-default" onclick="$('#'+'mainform').attr('action','<?= site_url("pengurus/filter/cari")?>');$('#'+'mainform').submit();"><i class="fa fa-search"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th><input type="checkbox" id="checkall" ></th>
                            <th>No</th>
                            <?php if ($this->CI->cek_hak_akses('h')): ?>
                            <th class="padat">Aksi</th>
                            <?php endif;?>
                            <th class="text-center">Foto</th>
                            <th>Nama, NIP/NIK</th>
                            <th>Jabatan / Pangkat/Golongan</th>
                            <th>Pendidikan Terakhir</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($main as $key => $data): ?>
                          <tr data-widget="expandable-table" aria-expanded="false">
                            <td class="text-center"><input type="checkbox" name="id_cb[]" value="<?=$data['pamong_id']?>" /></td>
                            <td class="text-center"><?=$data['no']?></td>
                            <?php if ($this->CI->cek_hak_akses('h')): ?>
                            <td nowrap><a href="<?=site_url("pengurus/urut/$paging->page/$data[pamong_id]/1")?>" class="btn bg-olive btn-box btn-sm <?php ($data['no'] == $paging->num_rows) and print('disabled'); ?>" title="Pindah Posisi Ke Bawah"><i class="fa fa-arrow-down"></i></a> <a href="<?=site_url("pengurus/urut/$paging->page/$data[pamong_id]/2")?>" class="btn bg-olive btn-box btn-sm <?php ($data['no'] == 1 AND $paging->page == $paging->start_link) and print('disabled'); ?>" title="Pindah Posisi Ke Atas"><i class="fa fa-arrow-up"></i></a> <a href="<?= site_url("pengurus/form/$data[pamong_id]")?>" class="btn bg-orange btn-box btn-sm" title="Ubah Data"><i class="fa fa-edit"></i></a> <a href="#" data-href="<?= site_url("pengurus/delete/$data[pamong_id]")?>" class="btn bg-maroon btn-box btn-sm" title="Hapus" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash"></i></a>
                              <?php if ($data['pamong_status'] == '1'): ?>
                                <br/>
                              <a href="<?= site_url("pengurus/lock/$data[pamong_id]/2")?>" class="btn bg-navy btn-box btn-sm"  title="Non Aktifkan"><i class="fa fa-unlock"></i></a>
                              <?php else: ?>
                              <a href="<?= site_url("pengurus/lock/$data[pamong_id]/1")?>" class="btn bg-navy btn-box btn-sm"  title="Aktifkan"><i class="fa fa-lock"></i></a>
                              <?php endif ?>
                              
                              <?php if ($data['pamong_ttd'] == '1'): ?>
                              <a href="<?= site_url("pengurus/ttd/$data[pamong_id]/2")?>" class="btn bg-navy btn-box btn-sm" title="Bukan TTD a.n">a.n</a>
                              <?php else: ?>
                              <a href="<?= site_url("pengurus/ttd/$data[pamong_id]/1")?>" class="btn bg-purple btn-box btn-sm" title="Jadikan TTD a.n">a.n</a>
                              <?php endif ?>
                              <?php if ($data['pamong_ub'] == '1'): ?>
                              <a href="<?= site_url("pengurus/ub/$data[pamong_id]/2")?>" class="btn bg-navy btn-box btn-sm" title="Bukan TTD u.b">u.b</a>
                              <?php else: ?>
                              <a href="<?= site_url("pengurus/ub/$data[pamong_id]/1")?>" class="btn bg-purple btn-box btn-sm" title="Jadikan TTD u.b">u.b</a>
                              <?php endif ?></td>
                            <?php endif;?>
                            <td class="text-center"><div class="user-panel">
                                <div class="image2">
                                  <?php if ($data['foto']): ?>
                                  <img src="<?=AmbilFoto($data['foto'])?>" style="width:80px" class="img-responsive" alt="User Image"/>
                                  <?php else: ?>
                                  <img src="<?= base_url()?>assets/files/user_pict/kuser.png" class="img-responsive" alt="User Image"/>
                                  <?php endif ?>
                                </div>
                              </div></td>
                            <td nowrap><?= $data['nama']?>
                              <p class='text-blue'>
                                <?php if (!empty($data['pamong_nip']) and $data['pamong_nip'] != '-'): ?>
                                <i>NIP :
                                <?=$data['pamong_nip']?>
                                </i></br>
                                <?php else: ?>
                                <i>
                                <?= $this->setting->sebutan_nip_desa  ?>
                                :
                                <?=$data['pamong_niap']?>
                                <br/>
                                </i>
                                <?php endif; ?>
                                <i>NIK :
                                <?=$data['nik']?>
                                </i> </p></td>
                            <td><?= $data['jabatan']?>
                              <br/>
                              <?= $data['pamong_pangkat']?></td>
                            <td><?= $data['pendidikan_kk']?></td>
                          </tr>
                          <tr class="expandable-body">
                            <td colspan="8"><p> Tempat Tanggal Lahir :
                                <?= $data['tempatlahir'].' '.tgl_indo_out($data['tanggallahir'])?>
                                <br/>
                                Jenis Kelamin:
                                <?= $data['sex']?>
                                <br/>
                                Agama :
                                <?= $data['agama']?>
                                <br/>
                                Nomor SK Pengangkatan :
                                <?= $data['pamong_nosk']?>
                                | Tanggal SK Pengangkatan :
                                <?= tgl_indo_out($data['pamong_tglsk'])?>
                                <br/>
                                Nomor SK Pemberhentian :
                                <?= $data['pamong_nohenti']?>
                                | Tanggal SK Pemberhentian :
                                <?= tgl_indo_out($data['pamong_tglhenti'])?>
                                <br/>
                                Masa Jabatan :
                                <?= $data['pamong_masajab']?>
                              </p>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </form>
                <?php $this->load->view('global/paging');?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php $this->load->view('global/confirm_delete');?>
