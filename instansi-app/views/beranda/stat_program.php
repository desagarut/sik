<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
?>

<div class="col-md-4">

        <div class="col-md-12">
            <a href="<?= site_url('sid_core') ?>" title="Lihat Desa">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-3"><i class="fas fa-map"></i></span>
                    <?php foreach ($pegawai as $data) : ?>
                        <div class="info-box-content">
                            <span class="info-box-text">Jumlah Pegawai</span>
                            <span class="info-box-number"><?= $data['jumlah'] ?> <small>orang</small></span>
                        <?php endforeach; ?>
                        </div>
                </div>
            </a>
        </div>

        <div class="col-md-12">
            <a href="<?= site_url('penduduk/clear') ?>" title="Lihat Daftar Penduduk">
                <div class="info-box  mb-3">
                    <span class="info-box-icon bg-info elevation-3"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Data Kependudukan</span>
                        <?php foreach ($penduduk as $data) : ?>
                            <span class="info-box-number">
                                <?= $data['jumlah'] ?>
                                <small>Orang</small>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-12">
            <a href="<?= site_url('web') ?>" class="small-card-footer" title="Artikel">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-3"><i class="fas fa-envelope-open"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Artikel</span>
                        <?php foreach ($artikel as $data) : ?>
                            <span class="info-box-number"><?= $data['jumlah'] ?>
                                <small>buah</small>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-12">
            <a href="<?= site_url('surat_masuk') ?>" class="small-card-footer" title="Administrasi Surat">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-3"><i class="fas fa-envelope"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text"></span>
                        <?php foreach ($surat_masuk as $data) : ?>
                            <span class="info-box-number"><small>Surat Masuk:</small> <?= $data['jumlah'] ?>
                                <small>buah</small>
                            </span>
                        <?php endforeach; ?>
                        <?php foreach ($surat_keluar as $data) : ?>
                            <span class="info-box-number"><small>Surat Keluar:</small> <?= $data['jumlah'] ?>
                                <small>buah</small>
                            </span>
                        <?php endforeach; ?>

                    </div>
                </div>
            </a>
        </div>

</div>
