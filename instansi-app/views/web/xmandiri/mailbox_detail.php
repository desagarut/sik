<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

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

    <div class="card">
        <div class="row">
            <div class="col-md-3">
                <?php $this->load->view('web/mandiri/mailbox_menu.php');?>
            </div>
            <div class="col-md-9">
              
                <div class="card-header">
                    <h3 class="card-title">Layanan Surat</h3>
                    <?php if($pesan) : ?>
                        <form action="<?= site_url('mailbox_web/form') ?>" class="form-horizontal" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box no-border">
                                        <div class="card-header">
                                            <a href="<?= site_url("mandiri_web/mandiri/1/3/$kat")?>" class="btn btn-box btn-info btn-sm btn-sm "  title="Tambah Artikel">
                                                <i class="fa fa-arrow-circle-left "></i>Kembali ke <?= $tipe_mailbox ?>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="owner"><?= $owner ?></label>
                                                <div class="col-sm-9">
                                                    <div class="form-control input-sm"><?= $pesan['owner']?></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="email">NIK</label>
                                                <div class="col-sm-9">
                                                    <div class="form-control input-sm"><?= $pesan['email']?></div>
                                                    <input type="hidden" name="nik" value="<?= $pesan['email']?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="subjek">Subjek</label>
                                                <div class="col-sm-9">
                                                    <div class="form-control input-sm"><?= $pesan['subjek']?></div>
                                                    <input type="hidden" name="subjek" value="<?= $pesan['subjek']?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label" for="pesan">Pesan</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control input-sm" readonly id="pesan"><?= $pesan['komentar']?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='card-footer'>
                                            <div class='col-xs-12'>
                                                <button type="submit" class='btn btn-box btn-info btn-sm pull-right confirm'><i class='fa fa-reply'></i> Balas Pesan</button>
                                            </div>
                                        </div>
                
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php else : ?>
                            <div class="alert alert-danger inline-block"><i class="fa fa-warning"></i> Ups, terjadi kesalahan!</div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
	$(document).ready(function() {
		const sHeight = parseInt($("#pesan").get(0).scrollHeight) + 30;
		$('#pesan').attr('style', `height:${sHeight}px; resize:none`);
	})
</script>