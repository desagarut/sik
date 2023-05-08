                <!-- Most Recent Area -->
                <div class="most-recent-area wow fadeInUp" data-wow-delay="0.2s">
                    <!-- Section Tittle -->
                    <div class="small-tittle mb-20">
                        <h4>Most Recent</h4>
                    </div>
                    <!-- Details -->
                    <div class="most-recent mb-40">
                        <div class="most-recent-img">
                        <?php if($arsip) :?>
                            <img src="<?= base_url(LOKASI_FOTO_ARTIKEL . 'kecil_' . $arsip['gambar']) ?>" alt="" style="width: 90px; height: 90px;">>
                            <?php endif;?>
                            <div class="most-recent-cap">
                                <span class="bgbeg">Vogue</span>
                                <h4><a href="latest_news.html">What to Wear: 9+ Cute Work <br>
                                        Outfits to Wear This.</a></h4>
                                <p>Jhon | 2 hours ago</p>
                            </div>
                        </div>
                    </div>
                    <!-- Tab content -->
                    <div class="row">
                        <div class="col-12">
                            <!-- Nav Card -->
                            <div class="tab-content" id="nav-tabContent">
                                <!-- card one -->
                                <?php foreach (array('terkini' => 'arsip_terkini', 'populer' => 'arsip_populer', 'acak' => 'arsip_acak') as $jenis => $jenis_arsip) : ?>

                                    <div class="tab-pane fade show <?php ($jenis == 'populer') and print('active') ?>" id="<?= $jenis ?>" role="tabpanel" aria-labelledby="nav-terkini-tab">
                                        <div class="row">
                                            <!-- Right single caption -->
                                            <div class="col-xl-12 col-lg-12 col-md-6">
                                                <div class="row">
                                                    <!-- single -->
                                                    <?php foreach ($$jenis_arsip as $arsip) : ?>
                                                        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6">
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
                                                                    <h6><a href="<?= site_url('artikel/' . buat_slug($arsip)) ?>"><?= potong_teks($arsip['isi'], 50); ?></a></h6>
                                                                    <p><?= tgl_indo($arsip['tgl_upload']); ?></p>
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
