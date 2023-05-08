<div class="content-wrapper"> 
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h5>Info Sistem</h5>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
            <li class="breadcrumb-item"><a href="#!">Penagturan</a></li>
            <li class="breadcrumb-item active"><a href="#!">Info Sistem</a></li>
          </ol>
        </div>
        <!-- /.col --> 
      </div>
      <!-- /.row --> 
    </div>
    <!-- /.container-fluid --> 
  </div>
  <!-- /.content-header --> 

<!-- /.content-header -->
<section class="content">
<div class="container-fluid">
<div class="row" >
<div class="col-md-12">
<div class="card card-primary">
<div class="card-body">
  <a data-toggle="tab" href="#ekstensi" class="btn btn-success">Kebutuhan Sistem</a>
  <a data-toggle="tab" href="#info_sistem" class="btn btn-primary">Info Sistem</a>

<div class="tab-content">
<div id="ekstensi" class="tab-pane fade in active">
  <?php if ($mysql['sudah_ok']): ?>
  <div class="alert alert-success" role="alert">
    <p>Versi MYSQL terpasang
      <?= $mysql['versi']?>
      sudah memenuhi syarat.</p>
  </div>
  <?php else: ?>
  <div class="alert alert-danger" role="alert">
    <p>Versi MYSQL terpasang
      <?= $mysql['versi']?>
      tidak memenuhi syarat.</p>
    <p>Update versi MYSQL supaya minimal
      <?= $mysql['versi_minimal']?>
      .</p>
  </div>
  <?php endif;?>
  <?php if ($php['sudah_ok']): ?>
  <div class="alert alert-success" role="alert">
    <p>Versi PHP terpasang
      <?= $php['versi']?>
      sudah memenuhi syarat.</p>
  </div>
  <?php else: ?>
  <div class="alert alert-danger" role="alert">
    <p>Versi PHP terpasang
      <?= $php['versi']?>
      tidak memenuhi syarat.</p>
    <p>Update versi PHP supaya minimal
      <?= $php['versi_minimal']?>
      .</p>
  </div>
  <?php endif;?>
  <?php if ( ! $ekstensi['lengkap']): ?>
  <div class="alert alert-danger" role="alert">
    <p>Ada beberapa ekstensi PHP wajib yang tidak tersedia di sistem anda.
      Karena itu, mungkin ada fungsi yang akan bermasalah.</p>
    <p>Aktifkan ekstensi PHP yang belum ada di sistem anda.</p>
  </div>
  <?php else: ?>
  <p> Semua ekstensi PHP yang diperlukan sudah aktif di sistem anda. </p>
  <?php endif;?>
  <?php foreach ($ekstensi['ekstensi'] as $key => $value): ?>
  <div class="form-group">
    <div class="input-group col-xs-3"> <span>
      <?= $key?>
      </span> <span class="input-group-btn">
      <button class="btn <?= $value ? 'btn-success' : 'btn-danger'?>" type="button"><i class="fa fa-<?= $value ? 'check' : 'times'?> fa-lg"></i></button>
      </span> </div>
  </div>
  <?php endforeach; ?>
</div>
<div id="info_sistem" class="tab-pane fade in">
<?php
										ob_start();
										phpinfo();
										$phpinfo = array('phpinfo' => array());
										if (preg_match_all('#(?:<h2>(?:<a name=".*?">)?(.*?)(?:</a>)?</h2>)|(?:<tr(?: class=".*?")?><t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>(?:<t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>(?:<t[hd](?: class=".*?")?>(.*?)\s*</t[hd]>)?)?</tr>)#s', ob_get_clean(), $matches, PREG_SET_ORDER)):
											foreach ($matches as $match):
												if (strlen($match[1])):
													$phpinfo[$match[1]] = array();
												elseif (isset($match[3])):
													$phpinfo[end(array_keys($phpinfo))][$match[2]] = isset($match[4]) ? array($match[3], $match[4]): $match[3];
												else:
													$phpinfo[end(array_keys($phpinfo))][] = $match[2];
												endif;
											endforeach;
									?>
<?php $i = 0;?>
<?php foreach ($phpinfo as $name => $section): ?>
<?php $i++;?>
<?php if ($i==1): ?>
<div class='table-responsive'>
<table class='table table-bordered dataTable table-hover'>
<?php else: ?>
<h3>
  <?=$name?>
</h3>
<div class='table-responsive'>
  <table class='table table-bordered dataTable table-hover'>
    <?php endif ?>
    <?php foreach ($section as $key => $val): ?>
    <?php if (is_array($val)): ?>
    <tr>
      <td class="col-md-4 info"><?=$key?></td>
      <td><?=$val[0]?></td>
      <td><?=$val[1]?></td>
    </tr>
    <?php elseif (is_string($key)): ?>
    <tr>
      <td class="col-md-4 info"><?=$key?></td>
      <td colspan='2'><?=$val?></td>
    </tr>
    <?php else: ?>
    <tr>
      <td class="btn-primary" colspan='3'><?=$val?></td>
    </tr>
    <?php endif; ?>
    <?php endforeach;?>
  </table>
</div>
<?php endforeach;?>
<?php endif; ?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
