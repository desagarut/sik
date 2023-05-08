<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="pcoded-main-container">
	<div class="pcoded-content">

	<div class="card">
        <div class="row">
			<div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Layanan Permohonan Surat</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <input type="hidden" id="tab" value="<?= $tab?>">
                        <div class="card card-solid" align="left">
                          <ul class="nav nav-tabs">
                            <a href="#daftar_rekam" class="active" data-toggle="tab" ><button class="btn btn-box btn-info">Riwayat </button></a>
                            <a href="#permohonan_surat" data-toggle="tab"><button class="btn btn-box btn-info">Status </button></a>
                            <a href="<?=site_url("mandiri_web/mandiri_surat")?>" ><button class="btn btn-box btn-success">Buat Permohonan</button></a> 
                            
                          </ul>
                          <div class="tab-content">
                            <div class="tab-pane" id="permohonan_surat">
                              <h5 align="center"><strong>STATUS PERMOHONAN SURAT</strong></h5>
                              <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable-polos tabel-daftar" id="list-permohonan">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th>Aksi</th>
                                      <th>Jenis Surat</th>
                                      <th>Tanggal Kirim</th>
                                      <th>Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach($permohonan as $key => $data): ?>
                                    <tr>
                                      <td class="padat"><?= ($key + 1); ?></td>
                                      <td class="aksi"><?php if ($data['status_id'] == 1): ?>
                                        <a href="<?= site_url("mandiri_web/mandiri_surat/$data[id]")?>" title="Lengkapi Surat" class="btn bg-orange btn-box btn-sm"><i class="fa fa-edit"></i></a>
                                        <?php endif; ?>
                                        <?php if (in_array($data['status_id'], array('0', '1'))): ?>
                                        <a href="<?= site_url("permohonan_surat/batalkan/$data[id]")?>" title="Batalkan" class="btn bg-maroon btn-box btn-sm"><i class="fa fa-times"></i></a>
                                        <?php endif; ?></td>
                                      <td><?=$data['jenis_surat']?></td>
                                      <td nowrap><?=tgl_indo2($data['created_at'])?></td>
                                      <td align="center"><a href="#" class="btn bg-aqua btn-box btn-sm">
                                        <?=$data['status']?>
                                        </a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                            <div class="tab-pane active" id="daftar_rekam">
                              <h5 align="center"><strong>RIWAYAT PEMBUATAN SURAT</strong></h5>
                              <div class="table-responsive">
                                <table class="table table-bordered table-striped datatable-polos tabel-daftar" id="list-rekam">
                                  <thead>
                                    <tr>
                                      <th>No</th>
                                      <th align="left">Tanggal</th>
                                      <th align="left">Nomor</th>
                                      <th align="left">Jenis Surat</th>
                                      <th align="left">Ditandatangani Oleh</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach($surat_keluar as $key => $data): ?>
                                    <tr>
                                      <td class="padat"><?= ($key + 1); ?></td>
                                      <td nowrap><?= tgl_indo2($data['tanggal'])?></td>
                                      <td class="padat"><?= $data['no_surat']?></td>
                                      <td><?= $data['format']?></td>
                                      <td><?= $data['pamong']?></td>
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
    </div>
</div>    
    
<script type="text/javascript">
	$('document').ready(function() {
		if ($('#tab').val() == 2) {
			$('.nav-tabs a[href="#permohonan_surat"]').tab('show');
		}
	});
</script> 
