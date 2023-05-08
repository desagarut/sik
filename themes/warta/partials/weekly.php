        <!--   Weekly3-News start -->
        <div class="weekly3-news-area pt-40 pb-130">
            <div class="container">
                <div class="weekly3-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="slider-wrapper">
                                <!-- Slider -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="weekly3-news-active dot-style d-flex  wow fadeInUp" data-wow-delay="0.2s">
                                            <?php foreach (array('acak' => 'arsip_acak') as $jenis => $jenis_arsip) : ?>
                                                <?php foreach ($$jenis_arsip as $arsip) : ?>
                                                    <div class="weekly3-single">
                                                        <a href="<?= site_url('artikel/' . buat_slug($arsip)) ?>">
                                                            <div class="weekly3-img">
                                                                <?php if ($arsip['gambar']) : ?>
                                                                    <img src="<?= base_url(LOKASI_FOTO_ARTIKEL . 'kecil_' . $arsip['gambar']) ?>" alt="<?= $arsip['judul'] ?>">
                                                                <?php else : ?>
                                                                    <img src="<?= base_url("$this->theme_folder/$this->theme/assets/img/blog/blog_4.png") ?>" alt="<?= $arsip['judul'] ?>">
                                                                <?php endif ?>
                                                            </div>
                                                            <div class="weekly3-caption">
                                                                <h4><a href="<?= site_url('artikel/' . buat_slug($arsip)) ?>"><?= $arsip['judul'] ?></a></h4>
                                                                <p><?= tgl_indo($arsip['tgl_upload']); ?></p>
                                                            </div>
                                                        </a>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endforeach ?>

                                        </div>



                                        <!--
                                        <div class="weekly3-news-active dot-style d-flex  wow fadeInUp" data-wow-delay="0.2s">
                                            <div class="weekly3-single">
                                                <div class="weekly3-img">
                                                    <img src="<?= base_url("$this->theme_folder/$this->theme/assets/img/gallery/weekly2News1.png") ?>" alt="">
                                                </div>
                                                <div class="weekly3-caption">
                                                    <h4><a href="latest_news.html">What to Expect From the 2020 Oscar
                                                            Nomin ations</a></h4>
                                                    <p>19 Jan 2020</p>
                                                </div>
                                            </div>
                                            <div class="weekly3-single">
                                                <div class="weekly3-img">
                                                    <img src="<?= base_url("$this->theme_folder/$this->theme/assets/img/gallery/weekly2News2.png") ?>" alt="">
                                                </div>
                                                <div class="weekly3-caption">
                                                    <h4><a href="latest_news.html">What to Expect From the 2020 Oscar
                                                            Nomin ations</a></h4>
                                                    <p>19 Jan 2020</p>
                                                </div>
                                            </div>
                                            <div class="weekly3-single">
                                                <div class="weekly3-img">
                                                    <img src="<?= base_url("$this->theme_folder/$this->theme/assets/img/gallery/weekly2News3.png") ?>" alt="">
                                                </div>
                                                <div class="weekly3-caption">
                                                    <h4><a href="latest_news.html">What to Expect From the 2020 Oscar
                                                            Nomin ations</a></h4>
                                                    <p>19 Jan 2020</p>
                                                </div>
                                            </div>
                                            <div class="weekly3-single">
                                                <div class="weekly3-img">
                                                    <img src="<?= base_url("$this->theme_folder/$this->theme/assets/img/gallery/weekly2News4.png") ?>" alt="">
                                                </div>
                                                <div class="weekly3-caption">
                                                    <h4><a href="latest_news.html">What to Expect From the 2020 Oscar
                                                            Nomin ations</a></h4>
                                                    <p>19 Jan 2020</p>
                                                </div>
                                            </div>
                                            <div class="weekly3-single">
                                                <div class="weekly3-img">
                                                    <img src="<?= base_url("$this->theme_folder/$this->theme/assets/img/gallery/weekly2News2.png") ?>" alt="">
                                                </div>
                                                <div class="weekly3-caption">
                                                    <h4><a href="latest_news.html">What to Expect From the 2020 Oscar
                                                            Nomin ations</a></h4>
                                                    <p>19 Jan 2020</p>
                                                </div>
                                            </div>
                                                            -->


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