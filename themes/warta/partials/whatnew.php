<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Whats New Start -->
<section class="whats-news-area pt-50 pb-20 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="whats-news-wrapper">
                    <!-- Heading & Nav Button -->
                    <div class="row justify-content-between align-items-end mb-15  d-flex wow fadeInUp" data-wow-delay="0.2s">
                        <div class="col-xl-4">
                            <div class="section-tittle mb-30">
                                <h3>Yang Baru</h3>
                            </div>
                        </div>
                        <div class="col-xl-8 col-md-9">
                            <div class="properties__button">
                                <!--Nav Button  -->
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-terkini-tab" data-toggle="tab" href="#terkini" role="tab" aria-controls="nav-terkini" aria-selected="true">Terkini</a>
                                        <a class="nav-item nav-link" id="nav-populer-tab" data-toggle="tab" href="#populer" role="tab" aria-controls="nav-populer" aria-selected="false">Populer</a>
                                        <a class="nav-item nav-link" id="nav-acak-tab" data-toggle="tab" href="#acak" role="tab" aria-controls="nav-acak" aria-selected="false">Random</a>
                                        <a class="nav-item nav-link" href="<?= site_url('arsip') ?>" role="tab" >Selengkapnya</a>
                                    </div>
                                </nav>
                                <!--End Nav Button  -->
                            </div>
                        </div>
                    </div>
                    <!-- Tab content -->
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <div class="tab-content  d-flex wow fadeInUp" data-wow-delay="0.2s" id="nav-tabContent">
                                <!-- card one -->
                                <?php foreach (array('terkini' => 'arsip_terkini', 'populer' => 'arsip_populer', 'acak' => 'arsip_acak') as $jenis => $jenis_arsip) : ?>

                                    <div class="tab-pane fade show <?php ($jenis == 'terkini') and print('active') ?>" id="<?= $jenis ?>" role="tabpanel" aria-labelledby="nav-terkini-tab">
                                        <div class="row">
                                            <!-- Left Details Caption -->
                                            <div class="col-xl-6 col-lg-12">
                                                <?php $this->load->view($folder_themes . '/partials/headline') ?>
                                            </div>
                                            <!-- Right single caption -->
                                            <div class="col-xl-6 col-lg-12">
                                                <div class="row">
                                                    <!-- single -->
                                                    <?php foreach ($$jenis_arsip as $arsip) : ?>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                            <div class="whats-right-single mb-20">
                                                                <div class="whats-right-img">
                                                                    <?php if ($arsip['gambar']) : ?>
                                                                        <a href="<?= site_url('artikel/' . buat_slug($arsip)) ?>"><img src="<?= base_url(LOKASI_FOTO_ARTIKEL . 'kecil_' . $arsip['gambar']) ?>" alt="<?= $arsip['judul'] ?>" style="width: 90px; height: 90px;"></a>
                                                                    <?php else : ?>
                                                                        <a href="<?= site_url('artikel/' . buat_slug($arsip)) ?>"><img src="<?= base_url("$this->theme_folder/$this->theme/assets/img/blog/blog_4.png") ?>" alt="<?= $arsip['judul'] ?>" style="width: 90px; height: 90px;"></a>
                                                                    <?php endif ?>
                                                                </div>
                                                                <div class="whats-right-cap">
                                                                <a href="<?= site_url('artikel/' . buat_slug($arsip)) ?>"><span class="colorb"><?= $arsip['judul'] ?></span></a>
                                                                    <h4><a href="<?= site_url('artikel/' . buat_slug($arsip)) ?>"><?= potong_teks($arsip['isi'], 50); ?></a></h4>
                                                                    <p><?= tgl_indo($arsip['tgl_upload']); ?> - <?= $arsip['hit'] ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                            <!-- End Nav Card -->
                        </div>
                    </div>
                </div>
                <?php $this->load->view($folder_themes . '/widgets/banner1') ?>
            </div>
            <div class="col-lg-4">
                <?php $this->load->view($folder_themes . '/widgets/flow-social') ?>
                <?php $this->load->view($folder_themes . '/widgets/most-recent-mini') ?>
            </div>
        </div>
    </div>
</section>
<!-- Whats New End -->