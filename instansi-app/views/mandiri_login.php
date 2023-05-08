<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<style>
  .fa-keyboard-o {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
</style>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>
    <?= $this->setting->login_title
      . get_dynamic_title_page_from_path();
    ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/jquery-ui.min.css">

  <!-- Jquery UI -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/jquery-ui.min.css">

  <?php if (is_file(LOKASI_LOGO_INSTANSI . "favicon.ico")) : ?>
    <link rel="shortcut icon" href="<?= base_url() ?><?= LOKASI_LOGO_INSTANSI ?>favicon.ico" />
  <?php else : ?>
    <link rel="shortcut icon" href="<?= base_url() ?>favicon.ico" />
  <?php endif; ?>
  <!-- Keyboard Default (Ganti dengan keyboard-dark.min.css untuk tampilan lain)-->
  <link rel="stylesheet" href="<?= base_url("assets/css/keyboard.min.css") ?>">
  <link rel="stylesheet" href="<?= base_url("assets/front/css/mandiri-keyboard.css") ?>">
  <script src="<?= base_url() ?>assets/bootstrap/js/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/bootstrap/js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/validasi.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/localization/messages_id.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/login.css">
  <link rel="stylesheet" href="http://cdn.materialdesignicons.com/5.4.55/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <?php if ($cek_anjungan) : ?>
    <!-- keyboard widget css & script -->
    <script src="<?= base_url("assets/js/jquery.keyboard.min.js") ?>"></script>
    <script src="<?= base_url("assets/js/jquery.mousewheel.min.js") ?>"></script>
    <script src="<?= base_url("assets/js/jquery.keyboard.extension-all.min.js") ?>"></script>
    <script src="<?= base_url("assets/front/js/mandiri-keyboard.js") ?>"></script>
  <?php endif; ?>
  <?php require __DIR__ . '/head_tags.php' ?>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!--<div class="login-logo">
    <a href="#"><span class="logo-mini logo-text" style="padding-top:7px"><img src="<?= logo_web($header['logo']); ?>" class="img-logo" style="height:50px; width:50px" alt="User Image"></span> </a>
  </div>-->

    <div class="card">
      <div class="card-body login-card-body">
        <div class="brand-wrapper" align="center"> <a href="<?= site_url('first'); ?>"><img src="<?= logo_web($header['logo']); ?>" alt="<?= $header['nama_kecamatan'] ?>" class="img-responsive" /></a> </div>
        <p class="login-box-msg">
          LOGIN MAHASISWA<br/>
          <?= strtoupper($this->setting->website_title) ?>
        </p>

        <form id="validasi" class="login-form" action="<?= site_url('mandiri_web/auth'); ?>" method="post">
          <?php if ($this->session->mandiri_wait == 1) : ?>
            <div class="error login-footer-top">
              <p id="countdown" style="color:red; text-transform:uppercase"></p>
            </div>
          <?php else : ?>
            <div class="input-group mb-3">
              <input class="form-username form-control required <?= jecho($cek_anjungan, TRUE, 'kbvnumber'); ?>" name="nik" id="nik" type="text" placeholder="NIK" <?= jecho($this->session->mandiri_wait, 1, "disabled") ?> value="">
            </div>
            <div class="input-group mb-3">
              <input class="form-username form-control required <?= jecho($cek_anjungan, TRUE, 'kbvnumber'); ?>" name="pin" id="pin" type="password" placeholder="PIN" <?= jecho($this->session->mandiri_wait, 1, "disabled") ?> value="">
            </div>
            <div class="input-group mb-3">
              <input type="checkbox" id="checkbox" class="form-checkbox">&nbsp;Tampilkan PIN
            </div>
            <button type="submit" class="btn btn-danger btn-block">MASUK</button>
            <?php if ($this->session->mandiri == -1 && $this->session->mandiri_try < 4) : ?>
              <div class="error">
                <p style="color:red; text-transform:uppercase">Login Gagal.<br />
                  NIK atau PIN yang Anda masukkan salah!<br />
                  <?php if ($this->session->mandiri_try) : ?>
                    Kesempatan mencoba
                    <?= ($this->session->mandiri_try - 1); ?>
                    kali lagi.</p>
              <?php endif; ?>
              </div>
            <?php elseif ($this->session->mandiri == -2) : ?>
              <div class="error"> Redaksi belum boleh masuk, SID belum memiliki sambungan internet! </div>
            <?php endif; ?>
          <?php endif; ?>
        </form>
        <div class="col-md-12" align="center"> <a href="<?= site_url('insidega'); ?>">login Manajemen </a> | <a href="<?= site_url('first'); ?>"> Ke Beranda</a> </div>
      </div>
    </div>
    <div class="credit text-center" style="color:black"> &copy; <a href="#">
        <?= $this->setting->website_title ?>
      </a>
    </div>
  </div>
  </main>
</body>

</html>

<script>
  function start_countdown() {
    var times = eval(<?= json_encode($this->session->mandiri_timeout) ?>) - eval(<?= json_encode(time()) ?>);
    var menit = Math.floor(times / 60);
    var detik = times % 60;
    timer = setInterval(function() {
      detik--;
      if (detik <= 0 && menit >= 1) {
        detik = 60;
        menit--;
      }
      if (menit <= 0 && detik <= 0) {
        clearInterval(timer);
        location.reload();
      } else {
        document.getElementById("countdown").innerHTML = "<b>Gagal 3 kali silakan coba kembali dalam " + menit + " MENIT " + detik + " DETIK </b>";
      }
    }, 1000)
  }

  $('document').ready(function() {
    var pass = $("#pin");
    $('#checkbox').click(function() {
      if (pass.attr('type') === "password") {
        pass.attr('type', 'text');
      } else {
        pass.attr('type', 'password')
      }
    });

    if ($('#countdown').length) {
      start_countdown();
    }
  });
</script>