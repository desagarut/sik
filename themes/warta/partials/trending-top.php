                    <!-- Trending Top -->
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="trending-top mb-30 d-flex wow fadeInUp" data-wow-delay="0.2s">
                                <div class="trend-top-img">

                                    <?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
                                    <?php $abstract = potong_teks($headline['isi'], 150); ?>
                                    <?php $url = site_url('artikel/' . buat_slug($headline)); ?>
                                    <?php $image = ($headline['gambar'] && is_file(LOKASI_FOTO_ARTIKEL . 'kecil_' . $headline['gambar'])) ?
                                        AmbilFotoArtikel($headline['gambar'], 'kecil') :
                                        base_url($this->theme_folder . '/' . $this->theme . '/assets/images/placeholder.png') ?>


                                    <img src="<?= $image ?>" alt="<?= $headline['judul'] ?>">
                                    <div class="trend-top-cap trend-top-cap2">
                                        <span class="bgb"><?= $gambar['id_kategori'] ?></span>
                                        <h2><a href="<?= $url; ?>"><?= $headline['judul'] ?></a></h2>
                                        <p><?= $headline['owner'] ?> - <?= tgl_indo($headline['tgl_upload']); ?> - <?= hit($headline['hit']); ?></p>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="trending-top mb-30 d-flex wow fadeInUp" data-wow-delay="0.7s">
                                <div class="trend-top-img">
                                    <img src="<?= base_url("$this->theme_folder/$this->theme/assets/img/trending/trending_top4.jpg") ?>" alt="">
                                    <div class="trend-top-cap trend-top-cap2">
                                        <span class="bgg">TECH </span>
                                        <h2><a href="latest_news.html">Secretart for Economic Air plane that looks like</a></h2>
                                        <p>by Alice cloe - Jun 19, 2020</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>