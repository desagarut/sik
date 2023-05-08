        <!-- Start Video Area -->
        <!--<div class="youtube-area video-padding d-none d-sm-block">-->
        <div class="youtube-area video-padding d-sm-block">
            <div class="container">
                <!--<div class="row">
                    <div class="col-12">
                        <div class="video-items-active">
                            <div class="video-items text-center d-flex wow fadeInUp" data-wow-delay="0.2s">
                                <video controls>
                                    <source src="<?= base_url("$this->theme_folder/$this->theme/assets/video/news2.mp4") ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                    </div>
                </div>-->
                <div class="video-info slider-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="testmonial-nav text-center">
                                <?php foreach ($gallery as $data) :
                                ?>
                                    <?php if ($data['link']) :
                                    ?>
                                        <div class="d-flex wow fadeInUp" data-wow-delay="0.2s">
                                            <div class="single-video" style="padding:10px 10px 10px 10px">
                                                <iframe height="200px" width="100%" class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $data["link"]; ?>" title="<?= $data['nama'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                <div class="video-intro d-flex dot-style wow fadeInUp" data-wow-delay="0.2s">
                                                    <h4><?= $data['nama'] ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif;
                                    ?>
                                <?php endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Start Video area-->