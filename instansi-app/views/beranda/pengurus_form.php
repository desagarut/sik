<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Form Pegawai</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
            <li class="breadcrumb-item"><a href="<?= site_url('profil_kecamatan') ?>">Identitas Instansi</a></li>
            <li class="breadcrumb-item"><a href="#!">Form Pegawai</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header"> <a href="<?= site_url() ?>pengurus" class="btn btn-box btn-info btn-sm "><i class="fa fa-arrow-circle-o-left"></i> Kembali Ke Daftar Staf</a> </div>
            <div class="card-body">
              <div class="form-group row">
                <label class="col-sm-3 control-label kiri" for="status">Sumber Data Pegawai</label>
                <div class="btn-group col-sm-9 kiri" data-toggle="buttons">
                  <label for="pengurus_1" class="btn btn-info btn-box btn-sm col-sm-3 form-check-label <?php if (empty($pamong) or !empty($individu)) : ?>active<?php endif ?>">
                    <input id="pengurus_1" type="radio" name="pengurus" class="form-check-input" type="radio" value="1" <?php if (empty($pamong) or !empty($individu)) : ?>checked<?php endif; ?> autocomplete="off" onchange="pengurus_asal(this.value);">
                    Database Penduduk </label>
                  <label for="pengurus_2" class="btn btn-info btn-box btn-sm col-sm-3 form-check-label <?php if (!empty($pamong) and empty($individu)) : ?>active<?php endif; ?>">
                    <input id="pengurus_2" type="radio" name="pengurus" class="form-check-input" type="radio" value="2" <?php if (!empty($pamong) and empty($individu)) : ?>checked<?php endif; ?> autocomplete="off" onchange="pengurus_asal(this.value);">
                    Tidak Terdata </label>
                </div>
              </div>
              <form action="" id="main" name="main" method="POST" class="form-horizontal">
                <div class="form-group row">
                  <label class="col-sm-3 label" for="id_pend">NIK / Nama Penduduk </label>
                  <div class="col-sm-9">
                    <select class="form-control select2" id="id_pend" name="id_pend" onchange="formAction('main')" style="width:100%">
                      <option selected="selected">-- Silakan Masukan NIK / Nama--</option>
                      <?php foreach ($penduduk as $data) : ?>
                        <option value="<?= $data['id'] ?>" <?php if ($individu['id'] == $data['id']) : ?>selected<?php endif; ?>>NIK :
                          <?= $data['nik'] . " - " . $data['nama'] . " - " . $data['dusun'] ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
        <input type="hidden" name="id_pend" value="<?= $individu['id'] ?>">
        <div class="row">
          <div class="col-md-3">
            <div class="card">
              <div class="card-body" align="center">
                <?php if ($pamong['foto']) : ?>
                  <img class="img-responsive" style="width: 200px; height: 200px; align: center" src="<?= AmbilFoto($pamong['foto']) ?>" alt="Foto">
                <?php else : ?>
                  <img class="img-responsive" style="width: 200px; height: 200px" src="<?= base_url() ?>assets/files/user_pict/kuser.png" alt="Foto">
                <?php endif; ?>
                <br />
                <p class="text-muted"><code>(Kosongkan jika tidak ingin mengubah foto)</code></p>
                <br />
                <div class="input-group-sm row">
                  <input type="text" class="form-control col-sm-8" id="file_path2" name="foto">
                  <input type="file" class="hidden" id="file2" name="foto">
                  <input type="hidden" name="old_foto" value="<?= $pamong['foto'] ?>">
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-info btn-sm pull-center" id="file_browser2"><i class="fa fa-search"></i> Cari</button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="card">
              <div class="card-body">
                <div class="form-group row">
                  <label class="col-sm-4 control-label" for="pamong_nama">Nama Lengkap & Gelar
                  </label>
                  <div class="col-sm-8">
                    <input type="hidden" name="pamong_status" value="1">
                    <input name="pamong_kecamatan" class="form-control input-sm pengurus_terdata" type="text" placeholder="Nama Lengkap & Gelar" value="<?= ($individu['nama']) ?>" disabled="disabled">
                    </input>
                    <input id="pamong_nama" name="pamong_nama" class="form-control input-sm pengurus_tidak_terdata <?= !empty($individu) ?: 'required' ?>" type="text" placeholder="Nama" value="<?= ($pamong['pamong_nama']) ?>" style="display: none;">
                    </input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label" for="pamong_nik"><small>Nomor Induk Kependudukan</small></label>
                  <div class="col-sm-4">
                    <input class="form-control input-sm pengurus_terdata" type="text" placeholder="Nomor Induk Kependudukan" value="<?= $individu['nik'] ?>" disabled="disabled">
                    </input>
                    <input id="pamong_nik" name="pamong_nik" class="form-control input-sm pengurus_tidak_terdata nik" type="text" maxlength="16" placeholder="Nomor Induk Kependudukan" value="<?= $pamong['pamong_nik'] ?>" style="display: none;">
                    </input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label" for="pamong_niap"><small>NIDN/NIDK/NUPN/NUTK</small></label>
                  <div class="col-sm-4">
                    <input id="pamong_niap" name="pamong_niap" class="form-control input-sm digits" type="text" maxlength="25" placeholder="NIDN/NIDK/NUPN/NUTK" value="<?= $pamong['pamong_niap'] ?>">
                    </input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label" for="pamong_nip"><small>Nomor Induk Karyawan</small></label>
                  <div class="col-sm-7">
                    <input id="pamong_nip" name="pamong_nip" class="form-control input-sm digits" type="text" maxlength="20" placeholder="Nomor Induk Karyawan" value="<?= $pamong['pamong_nip'] ?>">
                    </input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label" for="pamong_tempatlahir"><small>Tempat Lahir</small></label>
                  <div class="col-sm-7">
                    <input class="form-control input-sm pengurus_terdata" type="text" placeholder="Tempat Lahir" value="<?= strtoupper($individu['tempatlahir']) ?>" disabled="disabled">
                    </input>
                    <input name="pamong_tempatlahir" class="form-control input-sm pengurus_tidak_terdata" type="text" placeholder="Tempat Lahir" value="<?= strtoupper($pamong['pamong_tempatlahir']) ?>" style="display: none;">
                    </input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label" for="pamong_tanggallahir"><small>Tanggal Lahir</small></label>
                  <div class="col-sm-3">
                    <input class="form-control input-sm pengurus_terdata" type="text" placeholder="Tanggal Lahir" value="<?= strtoupper($individu['tanggallahir']) ?>" disabled="disabled">
                    </input>
                    <div class="input-group date pengurus_tidak_terdata" id="pamong_tanggallahir" data-target-input="nearest" style="display: none;">
                      <input type="text" class="form-control datetimepicker-input tgl_1" data-target="#pamong_tanggallahir" name="pamong_tanggallahir" value="<?= tgl_indo_out($pamong['pamong_tanggallahir']) ?>" />
                      <div class="input-group-append" data-target="#pamong_tanggallahir" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>

                    <!--<div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                    <input class="form-control input-sm pull-right tgl_1" name="pamong_tanggallahir" type="text" value="<?= tgl_indo_out($pamong['pamong_tanggallahir']) ?>">-->
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label" for="pamong_sex"><small>Jenis Kelamin</small></label>
                  <div class="col-sm-7">
                    <input class="form-control input-sm pengurus_terdata" type="text" placeholder="Jenis Kelamin" value="<?= $individu['sex'] ?>" disabled="disabled">
                    </input>
                    <select class="form-control input-sm pengurus_tidak_terdata" name="pamong_sex" onchange="show_hide_hamil($(this).find(':selected').val());" style="display: none;">
                      <option value="">Jenis Kelamin</option>
                      <option value="1" <?php selected($pamong['pamong_sex'], '1'); ?>>Laki-Laki</option>
                      <option value="2" <?php selected($pamong['pamong_sex'], '2'); ?>>Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label" for="pamong_pendidikan"><small>Pendidikan</small></label>
                  <div class="col-sm-7">
                    <input class="form-control input-sm pengurus_terdata" type="text" placeholder="Pendidikan" value="<?= $individu['pendidikan_kk'] ?>" disabled="disabled">
                    </input>
                    <select class="form-control input-sm pengurus_tidak_terdata" name="pamong_pendidikan" style="display: none;">
                      <option value="">Pilih Pendidikan (Dalam KK) </option>
                      <?php foreach ($pendidikan_kk as $data) : ?>
                        <option value="<?= $data['id'] ?>" <?php selected($pamong['pamong_pendidikan'], $data['id']); ?>>
                          <?= strtoupper($data['nama']) ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label" for="pamong_agama"><small>Agama</small></label>
                  <div class="col-sm-7">
                    <input class="form-control input-sm pengurus_terdata" type="text" placeholder="Agama" value="<?= $individu['agama'] ?>" disabled="disabled">
                    </input>
                    <select class="form-control input-sm pengurus_tidak_terdata" name="pamong_agama" style="display: none;">
                      <option value="">Pilih Agama</option>
                      <?php foreach ($agama as $data) : ?>
                        <option value="<?= $data['id'] ?>" <?php selected($pamong['pamong_agama'], $data['id']); ?>>
                          <?= strtoupper($data['nama']) ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label" for="pamong_pangkat"><small>Pangkat / Golongan</small></label>
                  <div class="col-sm-7">
                    <input name="pamong_pangkat" class="form-control input-sm" type="text" placeholder="Pangkat / Golongan" value="<?= $pamong['pamong_pangkat'] ?>">
                    </input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label" for="pamong_nosk"><small>Nomor SK Pengangkatan</small></label>
                  <div class="col-sm-7">
                    <input name="pamong_nosk" class="form-control input-sm" type="text" maxlength="30" placeholder="Nomor SK Pengangkatan" value="<?= $pamong['pamong_nosk'] ?>">
                    </input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label" for="pamong_tglsk"><small>Tanggal SK Pengangkatan</small></label>
                  <div class="col-sm-3 input-group date" id="pamong_tglsk" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input tgl_1" data-target="#pamong_tglsk" name="pamong_tglsk" value="<?= tgl_indo_out($pamong['pamong_tglsk']) ?>" />
                    <div class="input-group-append" data-target="#pamong_tglsk" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label" for="pamong_nohenti"><small>Nomor SK Pemberhentian</small></label>
                  <div class="col-sm-7">
                    <input name="pamong_nohenti" class="form-control input-sm" type="text" placeholder="Nomor SK Pemberhentian" value="<?= $pamong['pamong_nohenti'] ?>">
                    </input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label" for="pamong_tglhenti"><small>Tanggal SK Pemberhentian</small></label>
                  <div class="col-sm-3">
                    <div class="input-group date" id="pamong_tglhenti" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input tgl_1" data-target="#pamong_tglhenti" name="pamong_tglhenti" value="<?= tgl_indo_out($pamong['pamong_tglhenti']) ?>" />
                      <div class="input-group-append" data-target="#pamong_tglhenti" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                    <!--<div class="input-group input-group-sm date">
                    <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                    <input class="form-control input-sm pull-right tgl_1" name="pamong_tglhenti" type="text" value="<?= tgl_indo_out($pamong['pamong_tglhenti']) ?>">
                  </div>-->
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label" for="pamong_masajab"><small>Masa Jabatan (Usia/Periode)</small></label>
                  <div class="col-sm-7">
                    <input name="pamong_masajab" class="form-control input-sm" type="text" placeholder="Contoh: 6 Tahun Periode Pertama (2015 s/d 2021)" value="<?= $pamong['pamong_masajab'] ?>">
                    </input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label" for="jabatan"><small>Jabatan</small></label>
                  <div class="col-sm-7">
                    <input id="jabatan" name="jabatan" class="form-control input-sm required" type="text" placeholder="Jabatan" value="<?= $pamong['jabatan'] ?>">
                    </input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label bagan" for="atasan"><small>Atasan</small></label>
                  <div class="col-sm-7">
                    <select class="form-control select2" name="atasan">
                      <option value="">Pilih Atasan</option>
                      <?php foreach ($atasan as $data) : ?>
                        <option value="<?= $data['id'] ?>" <?php selected($pamong['atasan'], $data['id']); ?>>
                          <?= $data['nama'] ?>
                          (
                          <?= $data['jabatan'] ?>
                          )</option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label bagan" for="jabatan"><small>Bagan - Tingkat</small></label>
                  <div class="col-sm-7">
                    <input name="bagan_tingkat" class="form-control input-sm number" type="text" placeholder="Angka menunjukkan tingkat di bagan organisasi. Contoh: 2" value="<?= $pamong['bagan_tingkat'] ?>">
                    </input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label bagan" for="jabatan"><small>Bagan - Offset</small></label>
                  <div class="col-sm-7">
                    <input name="bagan_offset" class="form-control input-sm number" type="text" placeholder="Angka menunjukkan persentase geser kiri (-n) atau kanan (+n). Contoh: 75%" value="<?= $pamong['bagan_offset'] ?>">
                    </input>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 control-label bagan" for="jabatan"><small>Bagan - Layout</small></label>
                  <div class="col-sm-7">
                    <select class="form-control input-sm" name="bagan_layout">
                      <option value="">Tidak Ada Layout</option>
                      <option value="hanging" <?php selected($pamong['bagan_layout'], 'hanging'); ?>>Hanging</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-sm-4 bagan"><small>Bagan - Warna</small></label>
                  <div class="col-sm-7">
                    <div class="input-group my-colorpicker2">
                      <input type="text" name="bagan_warna" class="form-control input-sm" placeholder="#FFFFFF" value="<?= $pamong['bagan_warna'] ?>">
                      <div class="input-group-addon input-sm"> <i></i> </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-xs-12 col-sm-4 col-lg-4 control-label" for="status">Status Pegawai</label>
                  <div class="btn-group col-xs-12 col-sm-8" data-toggle="buttons">
                    <label id="sx3" class="btn btn-info btn-box btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label <?php if ($pamong['pamong_status'] == '1' or $pamong['pamong_status'] == NULL) : ?>active<?php endif ?>">
                      <input id="group1" type="radio" name="pamong_status" class="form-check-input" type="radio" value="1" <?php if ($pamong['pamong_status'] == '1' or $pamong['pamong_status'] == NULL) : ?>checked <?php endif ?> autocomplete="off">
                      Aktif </label>
                    <label id="sx4" class="btn btn-info btn-box btn-sm col-xs-6 col-sm-5 col-lg-3 form-check-label <?php if ($pamong['pamong_status'] == '2') : ?>active<?php endif ?>">
                      <input id="group2" type="radio" name="pamong_status" class="form-check-input" type="radio" value="2" <?php if ($pamong['pamong_status'] == '2') : ?>checked<?php endif ?> autocomplete="off">
                      Tidak Aktif </label>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <div class='col-xs-12'>
                  <button type='reset' class='btn btn-box btn-danger btn-sm' onclick="reset_form($(this).val());"><i class='fa fa-times'></i> Batal</button>
                  <button type='submit' class='btn btn-box btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
</div>
<script>
  $('document').ready(function() {
    $("input[name='pengurus']:checked").change();
    if ($("#validasi input[name='id_pend']").val() != '') {
      $('#pamong_nama').removeClass('required');
    }
  });

  function reset_form() {
    <?php if ($pamong['pamong_status'] == '1' or $pamong['pamong_status'] == NULL) : ?>
      $("#sx3").addClass('active');
      $("#sx4").removeClass("active");
    <?php endif ?>
    <?php if ($pamong['pamong_status'] == '2') : ?>
      $("#sx4").addClass('active');
      $("#sx3").removeClass("active");
    <?php endif ?>
  };

  function pengurus_asal(asal) {
    if (asal == 1) {
      $('#main').show();
      $('.pengurus_tidak_terdata').hide();
      $('.pengurus_terdata').show();
      $('#pamong_nama').val('');
    } else {
      $('#main').hide();
      $("input[name='id_pend']").val('');
      $('.pengurus_tidak_terdata').show();
      $('.pengurus_terdata').hide();
      $('#pamong_nama').addClass('required');
    }
  }
</script>
<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#pamong_tanggallahir').datetimepicker({
      format: 'L'
    });

    //Date picker
    $('#pamong_tglsk').datetimepicker({
      format: 'L'
    });

    //Date picker
    $('#pamong_tglhenti').datetimepicker({
      format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({
      icons: {
        time: 'far fa-clock'
      }
    });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function() {
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() {
      myDropzone.enqueueFile(file)
    }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>