        <!--   Weekly2-News start -->
        <div class="weekly2-news-area pt-50 pb-30 gray-bg">
            <div class="container">
                <div class="weekly2-wrapper">
                    <div class="row">
                        <!-- Banner -->
                        <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="home-banner2 d-none d-lg-block">
                                <img src="<?= base_url("$this->theme_folder/$this->theme/assets/img/gallery/body_card2.png") ?>" alt="">
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="slider-wrapper wow fadeInUp" data-wow-delay="0.2s">
                                <!-- section Tittle -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="small-tittle mb-30">
                                            <h4>Most Popular</h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- Slider -->
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="weekly2-news-active">
                                            <?php foreach (array('terkini' => 'arsip_terkini', 'populer' => 'arsip_populer', 'acak' => 'arsip_acak') as $jenis => $jenis_arsip) : ?>
                                                <!-- Single -->
                                                <?php foreach ($$jenis_arsip as $arsip) : ?>
                                                    <div class="col-md-4 weekly2-single <?php ($jenis == 'populer') and print('active') ?>">
                                                        <div class="weekly2-img">
                                                            <?php if ($arsip['gambar']) : ?>
                                                                <img src="<?= base_url(LOKASI_FOTO_ARTIKEL . 'kecil_' . $arsip['gambar']) ?>" alt="<?= $arsip['judul'] ?>">
                                                            <?php else : ?>
                                                                <img src="<?= base_url("$this->theme_folder/$this->theme/assets/img/blog/blog_4.png") ?>" alt="<?= $arsip['judul'] ?>">
                                                            <?php endif ?>
                                                        </div>
                                                        <div class="weekly2-caption">
                                                            <h4><a href="<?= site_url('artikel/' . buat_slug($arsip)) ?>"><?= $arsip['judul'] ?></a>
                                                            </h4>
                                                            <p><?= tgl_indo($arsip['tgl_upload']); ?></p>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Weekly-News -->