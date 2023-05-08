<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pesan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pesan</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class='col-md-12'>
          <div class="card">
            <div class="row">
              <div class="col-md-3">
                <?php $this->load->view('layanan_masyarakat/pesan/mailbox_menu.php');?>
              </div>
              
              <!-- /.col -->
              
              <div class="col-md-9">
                <div class="card-header">
                  <h3 class="card-title">Pesan</h3>
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                      <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                
                <!-- /.card-header-->
                
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>Aksi</th>
                      <th>Subyek</th>
                      <th>Status</th>
                      <th>Waktu</th>
                    </tr>
                    <?php foreach($main_list as $data) : ?>
                    <tr class="<?php ($data['status']!=1) and print('unread')?>">
                      <td><?=$data['no']?></td>
                      <td nowrap><a href="<?=site_url("mailbox_web/baca_pesan/{$kat}/{$data['id']}")?>" class="btn bg-navy btn-box btn-sm" title="Baca pesan"><i class="fa fa-envelope-o"></i> Baca</a>
                        <?php if($kat != 2) : ?>
                        <?php if ($data['status'] == 1): ?>
                        <a href="<?=site_url('mailbox_web/pesan_unread/'.$data['id'])?>" class="btn bg-navy btn-box btn-sm" title="Tandai sebagai belum dibaca"><i class="fa fa-envelope-o"></i></a>
                        <?php else : ?>
                        <a href="<?=site_url('mailbox_web/pesan_read/'.$data['id'])?>" class="btn bg-navy btn-box btn-sm" title="Tandai sebagai sudah dibaca"><i class="fa fa-envelope-open-o"></i></a>
                        <?php endif; ?>
                        <?php endif ?></td>
                      <td width="40%"><?=$data['subjek']?></td>
                      <td><?=$data['status'] == 1 ? 'Sudah Dibaca' : 'Belum Dibaca' ?></td>
                      <td nowrap><?=tgl_indo2($data['tgl_upload'])?></td>
                    </tr>
                    <?php endforeach ?>
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
