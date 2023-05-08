<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="pcoded-main-container">
	<div class="pcoded-content">

    <!-- Content Header (Page header) -->
    <div class="page-header">
      <h5 class="m-b-10">
        Mailbox
        <small>13 new messages</small>
      </h5>
      <ul class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mailbox</li>
      </ul>
    </div>

    <!-- Main content -->
    <div class="card">
      <div class="row">
        <div class="col-md-3">
			<?php $this->load->view('web/mandiri/mailbox_menu.php');?>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          
            <div class="card-header">
                <a href="<?= site_url("mandiri_web/mandiri/1/3")?>" class="btn btn-box btn-info btn-sm btn-sm "  title="Tambah Artikel">
                    <i class="fa fa-arrow-circle-left "></i>Kembali ke halaman Kotak Pesan
                </a>
            </div>
            <div class="card-body">
                <form action="<?= $form_action ?>" class="form form-horizontal" id="validasi" method="POST">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">NIK</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control input-sm required" id="email" name="email" value="<?= $individu['nik'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="owner">Nama Pengirim</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control input-sm required" id="owner" name="owner" value="<?= $individu['nama'] ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="subjek">Subjek</label>
                            <div class="col-sm-10">
                                <div class="input-group col-sm-10">
                                    <input class="form-control input-sm required <?= jecho($cek_anjungan, TRUE, 'kbvtext'); ?>" id="subjek" name="subjek" value="<?php $subjek and print($subjek) ?>"></input>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="komentar">Pesan</label>
                            <div class="col-sm-10">
                                <div class="input-group col-sm-10">
                                    <textarea class="form-control input-sm required <?= jecho($cek_anjungan, TRUE, 'kbvtext'); ?>" name="komentar" id="komentar"></textarea>
                                </div>
                            </div>
                        </div>                
                    <div class='card-footer'>
                        <div class='col-md-12'>
                            <button type="submit" class='btn btn-box btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Kirim Pesan</button>
                        </div>
                    </div>
                </form> 			
            </div>
        </div>
        </div>
    </div>
  </div>  
<script>
	$(document).ready(function() {
		const sHeight = parseInt($("#komentar").get(0).scrollHeight) + 30;
		$('#komentar').attr('style', `height:${sHeight}px;`);
	})
</script>
