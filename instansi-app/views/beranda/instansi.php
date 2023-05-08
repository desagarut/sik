<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0">Beranda</h4>
        </div>
        <!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <?php $this->load->view('beranda/peta.php'); ?>
        <?php $this->load->view('beranda/stat_program.php'); ?>
        <?php //$this->load->view('beranda/progress.php'); 
        ?>
      </div>

      <div class="row">
        <?php //$this->load->view('beranda/stat_bidang.php'); 
        ?>
        <?php $this->load->view('beranda/kependudukan.php'); ?>
      </div>


      <div class='row'>
        <?php //$this->load->view('beranda/warga_login.php'); 
        ?>
        <?php $this->load->view('beranda/aparat_login.php'); ?>
        <?php $this->load->view('beranda/pengunjung.php'); ?>
      </div>

      <div class='row'>
        <?php //$this->load->view('beranda/helpdesk.php'); 
        ?>
        <?php //$this->load->view('beranda/changelog.php'); 
        ?>
      </div>

      <div class='row'>
        <?php //$this->load->view('beranda/teks_berjalan.php'); 
        ?>
      </div>
    </div>
  </section>
</div>