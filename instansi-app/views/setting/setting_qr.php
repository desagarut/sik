<style type="text/css">
.tetap {
	resize: none;
}
.btn-margin {
	margin-right: 5px;
}
</style>
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
        <div class="row">
          <div class="col-md-7">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Buat QR Code</h3>
            </div>
            <form id="mainform" name="mainform" action="" method="post">
              <div class="card-body">
                <div class="form-group">
                  <label for="namaqr">Nama File :</label>
                  <input class="form-control input-sm nama_terbatas required" type="text" id="namaqr" name="namaqr" maxlength="15" value="<?= $qrcode['namaqr']; ?>">
                  </input>
                </div>
                <div class="form-group">
                  <label for="isiqr">Isi Kode :</label>
                  <textarea class="form-control input-sm tetap required" rows="5" id="isiqr" name="isiqr" maxlength="300"><?= $qrcode['isiqr']; ?>
</textarea>
                </div>
                <div class="row">
                  <div class="form-group col-md-4">
                    <div class="form-group">
                      <label for="changeqr" >Sisipkan Logo :</label>
                      <select class="form-control input-sm" id="changeqr" name="changeqr" onchange="load(this.value);">
                        <?php foreach ($list_changeqr as $key => $list): ?>
                        <option value="<?= $key + 1; ?>" <?= selected($qrcode['changeqr'], $key + 1); ?>>
                        <?= $list; ?>
                        </option>
                        <?php endforeach;?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-8" id="change_key">
                    <div class="form-group">
                      <label for="logoqr"><code> Kosongkan untuk QR Code polos </code></label>
                      <div class="input-group">
                        <input type="text" class="form-control input-sm" id="logoqr" name="logoqr">
                        <span class="input-group-btn">
                        <button type="button" class="btn btn-info btn-box btn-danger btn-sm" id="kosongkan"><i class="fa fa-refresh" title="Kosongkan"></i>&nbsp;</button>
                        <button type="button" class="btn btn-info btn-box btn-info btn-sm" id="file_browser1" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i>&nbsp;</button>
                        </span> </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="sizeqr" >Ukuran :</label>
                    <select class="form-control input-sm" id="sizeqr" name="sizeqr">
                      <?php foreach ($list_sizeqr as $key => $list): ?>
                      <option value="<?= $key + 1; ?>" <?= selected($qrcode['sizeqr'], $key + 1); ?>>
                      <?= $list.' x '.$list.'px'; ?>
                      </option>
                      <?php endforeach;?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="foreqr">Warna :</label>
                    <div class="input-group my-colorpicker2">
                      <div class="input-group-addon input-sm"> <i></i> </div>
                      <input type="text" id="foreqr" name="foreqr" class="form-control input-sm" value="<?= $qrcode['foreqr'] ?: $qrcode['backqr']; ?>">
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button type="reset" class="btn btn-box btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
                <button id="generate" class="btn btn-box btn-info btn-sm pull-right"><i class="fa fa-check"></i> Simpan</button>
              </div>
            </form>
          </div>
          </div>
          
        <div class="col-md-5">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Scan QR Code</h5>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="pathqr"></label>
              <center>
                <a href="<?= site_url("setting/qrcode/clear"); ?>" class="btn btn-box btn-success btn-sm" title="Baru"><i class="fa fa-plus"></i> Baru</a> <a href="<?= site_url("setting/qrcode/hapus/$qrcode[namaqr1]"); ?>" class="btn btn-box btn-danger btn-sm <?= jecho($qrcode['pathqr'], '', 'disabled'); ?>" title="Buat Baru"><i class="fa fa-trash"></i> Hapus</a> <a href="<?= site_url("setting/qrcode/unduh/$qrcode[namaqr1]"); ?>" class="btn btn-box bg-navy btn-sm <?= jecho($qrcode['pathqr'], '', 'disabled'); ?>" title="Unduh"><i class="fa fa-download"></i> Unduh</a> <a href="#" class="btn btn-box bg-purple btn-sm" title="Atur" data-toggle="modal" data-target="#myModal"><i class="fa fa-file"></i> Atur</a>
                <?php if ($qrcode['namaqr1']) : ?>
                <br>
                <br>
                <img class="img-thumbnail" src="<?= $qrcode['pathqr']; ?>">
                <?php endif; ?>
              </center>
            </div>
          </div>
        </div>
          </div>
    </div>
    </div>
  </section>
</div>

<!-- File Manager -->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
        <h4 class='modal-title' id='myModalLabel'>Atur QR Code</h4>
      </div>
      <div class="modal-body">
        <iframe width="100%" height="400px" src="../../assets/filemanager/dialog.php?type=1&lang=id&field_id=logoqr&fldr=&akey=<?= $this->session->fm_key?>" frameborder="0" style="overflow: scroll; overflow-x: hidden; overflow-y: scroll; "></iframe>
      </div>
    </div>
  </div>
</div>
<script src="<?= base_url()?>assets/bootstrap/js/jquery.min.js"></script> 
<script>
	$('document').ready(function() {
		$('#changeqr').change();
	});

	function load(key) {
		if (key == 1) {
			$('#change_key').hide();
			$('#logoqr').val('');
		} else {
			$('#change_key').show();
			$('#logoqr').val('<?= $qrcode['logoqr']; ?>');
		}

	}

	$('#kosongkan').on('click', function() {
		$('#logoqr').val('');
	});

	$('#generate').on('click', function() {
		if (!$('#mainform').valid()) return false;

		var namaqr = $('#namaqr').val();
		var isiqr = $('#isiqr').val();
		var changeqr = $('#changeqr').val();
		var logoqr = $('#logoqr').val();
		var sizeqr = $('#sizeqr').val();
		var foreqr = $('#foreqr').val();

		$.ajax({
			url : 'qrcode_generate',
			type : 'POST',
			data : {namaqr:namaqr, isiqr:isiqr, changeqr:changeqr, logoqr:logoqr, sizeqr:sizeqr, foreqr:foreqr},
			success: function(data){
			}
		}).then(function() {
			location.reload();
		});
		return false;
	});
</script> 
