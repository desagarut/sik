<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<style>
  .table {
    font-size: 14px;
  }
</style>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0">Profil Kecamatan</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= site_url() ?>beranda">Beranda</a></li>

            <li class="breadcrumb-item active"><a href="#!">Profil Kecamatan</a></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <section class="content" id="maincontent">
    <!-- [ Main Content ] start -->
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-3">
            <div class="card">
              <div class="card-body text-center">
                <img class="img-fluid card-img-top" src="<?= logo_web($main['logo']); ?>" alt="Logo">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <?php $this->load->view('profil_kecamatan/peta.php'); ?>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <img class="img-fluid card-img-top" src="<?= logo_web($main['foto_camat']); ?>" alt="Foto Camat">
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <form id="mainform" name="mainform" action="" method="post">
      <div class="card">
        <div class="card-header">
          <div class="col-md-12">
            <div class="text-right">
              <?php if ($this->CI->cek_hak_akses('h')) : ?>
                <a href="<?= site_url('profil_kecamatan/form'); ?>" class="btn btn-sm btn-warning" title="Ubah Data"><i class="fa fa-edit"></i> Ubah Data</a>
                <!--<a href="<?= site_url('profil_kecamatan/maps/kantor'); ?>" class="btn btn-box bg-purple btn-sm "><i class='fa fa-map-marker'></i> Lokasi Kantor <?= $kecamatan; ?></a>-->
                <a href="<?= site_url('profil_kecamatan/maps/kantor'); ?>" class="btn btn-sm btn-success " title="Ubah Lokasi Kantor"><i class="fa fa-map-marker"></i> Lokasi Kantor
                </a>
                <!--<a href="<?= site_url('profil_kecamatan/maps/wilayah'); ?>" class="btn btn-box btn-info btn-sm btn-sm "><i class='fa fa-map'></i> Peta Wilayah <?= $kecamatan; ?></a>-->
                <a href="<?= site_url('profil_kecamatan/maps/wilayah'); ?>" class="btn btn-sm btn-primary" title="Ubah Wilayah"><i class="fa fa-map"></i> Peta Wilayah </a>
                <!--<a href="<?= site_url('profil_kecamatan/maps_openstreet/wilayah'); ?>" class="btn btn-secondary" title="Ubah Wilayah Desa"><i class='feather mr-2 icon-map'></i> Wilayah Desa | OSM</a>-->
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="table-border-style">
            <div class="table-responsive">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <th colspan="3" class="bg-info"><strong>
                        IDENTITAS
                      </strong></th>
                  </tr>
                  <tr>
                    <td width="300">Nama Kecamatan</td>
                    <td width="1">:</td>
                    <td><?= $main['nama_kecamatan']; ?></td>
                  </tr>
                  <tr>
                    <td>Kode Kecamatan</td>
                    <td>:</td>
                    <td><?= kode_wilayah($main['kode_kecamatan']); ?></td>
                  </tr>
                  <tr>
                    <td>Kode Pos</td>
                    <td>:</td>
                    <td><?= $main['kode_pos']; ?></td>
                  </tr>
                  <tr>
                    <td>Nama Camat</td>
                    <td>:</td>
                    <td><?= $main['nama_camat']; ?></td>
                  </tr>
                  <tr>
                    <td>NIP Camat</td>
                    <td>:</td>
                    <td><?= $main['nip_camat']; ?></td>
                  </tr>
                  <tr>
                    <td>Alamat Kantor</td>
                    <td>:</td>
                    <td><?= $main['alamat_kecamatan']; ?></td>
                  </tr>
                  <tr>
                    <td>E-Mail</td>
                    <td>:</td>
                    <td><?= $main['email_kecamatan']; ?></td>
                  </tr>
                  <tr>
                    <td>Telepon</td>
                    <td>:</td>
                    <td><?= $main['telepon_kecamatan']; ?></td>
                  </tr>
                  <tr>
                    <td>Website</td>
                    <td>:</td>
                    <td><?= $main['url_kecamatan']; ?></td>
                  </tr>
                  <tr>
                    <th colspan="3" class="bg-info"><strong>
                        PROFIL SINGKAT</strong></th>
                  </tr>
                  <tr>
                    <td>Profil
                    </td>
                    <td>:</td>
                    <td><?= $main['profil_singkat']; ?></td>
                  </tr>
                  <tr>
                    <td>Visi</td>
                    <td>:</td>
                    <td><?= $main['visi']; ?></td>
                  </tr>
                  <tr>
                    <td>Misi </td>
                    <td>:</td>
                    <td><?= $main['misi']; ?></td>
                  </tr>
                  <tr>
                    <td>Strategi</td>
                    <td>:</td>
                    <td><?= $main['strategi']; ?></td>
                  </tr>
                  <tr>
                    <td>Sambutan</td>
                    <td>:</td>
                    <td><?= $main['sambutan']; ?></td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
</div>