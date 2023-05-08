<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="col-md-12 col-sm-4 col-xs-4">
    <div class="row">
        <!-- seo start -->

        <div class="col-md-3 col-sm-3 col-xs-3">
            <a href="<?= site_url('sid_core') ?>" title="Lihat Desa">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-map"></i></span>
                    <?php foreach ($dusun as $data) : ?>
                        <div class="info-box-content">
                            <span class="info-box-text">Asal Daerah</span>
                            <span class="info-box-number"><?= $data['jumlah'] ?> <small></small></span>
                        <?php endforeach; ?>
                        </div>
                        <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-3 col-xs-3">
            <a href="<?= site_url('penduduk/clear') ?>" title="Lihat Daftar Penduduk">
                <div class="info-box  mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Mahasiswa</span>
                        <?php foreach ($penduduk as $data) : ?>
                            <span class="info-box-number">
                                <?= $data['jumlah'] ?>
                                <small>Orang</small>
                            </span>
                        <?php endforeach; ?>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>

        <!-- /.col -->
        <div class="col-md-3 col-sm-3 col-xs-3">
            <a href="<?= site_url('surat_keluar') ?>" class="small-card-footer" title="Lihat Daftar Keluarga">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Surat Keluar</span>
                        <?php foreach ($keluarga as $data) : ?>
                            <span class="info-box-number"><?= $data['jumlah'] ?>
                                <small>buah</small>
                            </span>
                        <?php endforeach; ?>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
        <div class="col-md-3 col-sm-3 col-xs-3">
            <a href="<?= site_url('rtm/clear') ?>" class="small-card-footer" title="Lihat Rumah Tangga">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-home"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Surat</span>
                        <?php foreach ($rtm as $data) : ?>
                            <span class="info-box-number">Masuk : <?= $data['jumlah'] ?>
                                <small>buah</small>
                            </span>
                        <?php endforeach; ?>
                        <?php foreach ($rtm as $data) : ?>
                            <span class="info-box-number">Keluar : <?= $data['jumlah'] ?>
                                <small>buah</small>
                            </span>
                        <?php endforeach; ?>

                    </div>
                </div>
            </a>
        </div>
    </div>

</div>
