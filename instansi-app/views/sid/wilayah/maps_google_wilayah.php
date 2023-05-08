<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOKTzsvtw8j-TJI8dmJ228bXASq4C-S7U&callback=initMap&v=weekly" defer></script>
<script>
  $(document).ready(function() {
    $('#simpan_wilayah').click(function() {
      var path = $('#path').val();
      $.ajax({
          type: "POST",
          url: "<?= $form_action ?>",
          dataType: 'json',
          data: {
            path
          },
        })
        .always(function(e) {
          alert('Perubahan yang dilakukan telah berhasil disimpan! Klik Kembali untuk pindah ke halaman sebelumnya!')
        });
    });
  });

  var batasWilayah
  var map
  var gmaps

  var daerah_desa = <?= $wil_ini['path'] ?: 'null' ?>

  daerah_desa && daerah_desa[0].map((arr, i) => {
    daerah_desa[i] = {
      lat: arr[0],
      lng: arr[1]
    }
  })

  function initMap() {
    gmaps = google.maps

    <?php if (!empty($wil_ini['lat']) && !empty($wil_ini['lng'])) : ?>
      var center = {
        lat: <?= $wil_ini['lat'] ?>,
        lng: <?= $wil_ini['lng'] ?>
      }
    <?php else : ?>
      var center = {
        lat: <?= $wil_atas['lat'] ?>,
        lng: <?= $wil_atas['lat'] ?>
      }
    <?php endif; ?>


    var zoom = 13;
    map = new gmaps.Map($('#map')[0], {
      center,
      zoom,
      streetViewControl: true,
      mapTypeId: google.maps.MapTypeId.HYBRID,
    })

    <?php if (!empty($wil_ini['path'])) : ?>
      //Style polygon
      batasWilayah = new gmaps.Polygon({
        paths: daerah_desa,
        strokeColor: '#d10563',
        strokeOpacity: 1,
        strokeWeight: 3,
        fillColor: '#0028ea',
        fillOpacity: 0.15,
        editable: true,
        draggable: false
      });

      batasWilayah.setMap(map)
      batasWilayah.addListener('mouseup', editPath)
      batasWilayah.addListener('dragend', editPath)
    <?php endif; ?>
  }

  function editPath() {
    const PATHS = this.getPath()
    const NEWPATH = []

    for (var i = 0; i < PATHS.getLength(); i++) {
      const {
        lat,
        lng
      } = PATHS.getAt(i)
      NEWPATH.push([lat(), lng()])
    }

    $('#path').val(JSON.stringify([NEWPATH]))
  }

  function polygonDelete() {
    batasWilayah.setMap(null)
    batasWilayah = null
    $('#path').val(null);
  }

  function polygonAdd() {
    const {
      lat,
      lng
    } = map.getCenter()

    // Clear existing polygon
    if (batasWilayah) polygonDelete()

    // Re new polygon in new position
    batasWilayah = new gmaps.Polygon({
      paths: [{
          lat: lat() - 0.001,
          lng: lng() - 0.002
        }, // Left
        {
          lat: lat() + 0.001,
          lng: lng() - 0.002
        }, // Right
        {
          lat: lat() + 0.001,
          lng: lng()
        }, // Top
      ],
      strokeColor: '#d10563',
      strokeOpacity: 1,
      strokeWeight: 3,
      fillColor: '#0028ea',
      fillOpacity: 0.15,
      editable: true,
      draggable: false
    });

    batasWilayah.setMap(map)
    batasWilayah.addListener('mouseup', editPath)
    batasWilayah.addListener('dragend', editPath)
  }

  function polygonReset() {
    // Clear existing polygon
    polygonDelete()

    // Create initial / last saved polygon
    batasWilayah = new gmaps.Polygon({
      paths: daerah_desa,
      strokeColor: '#d10563',
      strokeOpacity: 1,
      strokeWeight: 3,
      fillColor: '#0028ea',
      fillOpacity: 0.15,
      editable: true,
      draggable: false
    });

    batasWilayah.setMap(map)
    batasWilayah.addListener('mouseup', editPath)
    batasWilayah.addListener('dragend', editPath)
  }
</script>
<style>
  #float-btn {
    position: absolute;
    top: 10px;
    right: 15%;
    z-index: 5;
    font-family: 'Roboto', 'sans-serif';
  }

  #float-btn button {
    line-height: 20px;
    margin: 1px 0;
    margin-right: -5px;
    padding: 10px 15px;
    background: #ffffff;
    border: none;
    border-radius: 2px;
    font-size: initial;
    box-shadow: 1px 1px 4px 0px silver;
  }

  #float-btn button:hover {
    background: #ddd
  }

  #map {
    width: 100%;
    height: 450px;
    border: 1px solid #000;
  }
</style>

<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0">Peta Wilayah Kerja</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
            <li class="breadcrumb-item active"><a href="<?= site_url() ?>profil_kecamatan">Identitas Instansi</a></li>
            <li class="breadcrumb-item active"><a href="#!">Peta wilayah kerja</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->
  <section class="content">
    <form action="<?= $form_action ?>" method="post" id="validasi" enctype="multipart/form-data">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <div id="float-btn">
                <button type="button" onclick="polygonAdd()">Tambah</button>
                <button type="button" onclick="polygonDelete()">Hapus</button>
                <button type="button" onclick="polygonReset()">Reset</button>
              </div>
              <div id="map"></div>
              <input type="hidden" id="path" name="path" value="<?= $wil_ini['path'] ?>">
              <input type="hidden" name="id" id="id" value="<?= $wil_ini['id'] ?>" />
            </div>
          </div>
        </div>
        <div class="modal-body">
            <div class="form-group row">
            <div class="col-md-4">
            <div class="form-group">

              <label class="col-sm-4">Warna blok</label>
              <div class="input-group my-colorpicker1 col-sm-6">
                  <input type="text" id="warna" name="warna" class="form-control input-sm required" placeholder="#FFFFFF" value="<?= $wil_ini['warna'] ?>">
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                  </div>
                </div>
            </div>
            </div>
              <div class="col-md-4">
                <label class="col-sm-4 control-label " for="lat">Lat: </label>
                <input type="text" class="col-md-6" name="lat" id="lat" value="<?= $wil_ini['lat'] ?>" /><br />
                <label class="col-sm-4 control-label " for="lng"> Lng: </label>

                <input type="text" class="col-md-6" name="lng" id="lng" value="<?= $wil_ini['lng'] ?>" />
              </div>

              <div class="col-sm-4">
                <label class="col-sm-4" for="zoom"> Zoom: </label>

                <input type="text" class="col-md-6" width="5px" name="zoom" id="zoom" value="<?= $wil_ini['zoom'] ?>" /><br />
                <label class="col-sm-4" for="map_tipe"> Map Tipe: </label>

                <select class="input-sm pull-left" name="map_tipe" id="map_tipe">
                  <option value="ROADMAP" <?php selected($map_tipe, 'ROADMAP'); ?>>ROADMAP</option>
                  <option value="SATELLITE" <?php selected($map_tipe, 'SATELLITE'); ?>>SATELLITE</option>
                  <option value="HYBRID" <?php selected($map_tipe, 'HYBRID'); ?>>HYBRID</option>
                </select>
                <!-- <input type="text" class="col-md-6" width="5px" name="map_tipe" id="map_tipe" value="<?= $wil_ini['map_tipe'] ?>" />-->
              </div>
            </div>
          <div class="card-footer">
            <div class="float-right">
              <?php if ($this->CI->cek_hak_akses('h')) : ?>
                <a href="<?= $tautan['link'] ?>" class="btn btn-box bg-purple btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" title="Kembali"><i class="fa fa-arrow-circle-o-left"></i> Kembali</a> <a href="#" class="btn btn-box btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block" download="SIDeha.gpx" id="exportGPX"><i class='fa fa-download'></i> Export ke GPX</a>
                <button type="reset" class="btn btn-box btn-danger btn-sm" data-dismiss="modal"><i class='fa fa-sign-out'></i> Tutup</button>
                <!--<button type="submit" class="btn btn-box btn-info btn-sm" data-dismiss="modal" id="simpan_wilayah"><i class='fa fa-check'></i> Simpan</button>-->
                <button type="submit" class="btn btn-box btn-info btn-sm"><i class='fa fa-check'></i> Simpan</button>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
</div>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

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
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
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

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
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
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
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