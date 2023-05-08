<footer>
    <!-- Footer Start-->
    <div class="footer-main footer-bg">
        <div class="footer-area footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                <h1 style="color: white; font-family:'Segoe UI', Tahoma"><a href="<?= site_url('') ?>"><img src="<?= logo_web($desa['logo']) ?>" style="width:50px" alt="<?= $this->setting->website_title ?>">&nbsp;<?= $this->setting->website_title ?></a></h1>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p class="info1"><?= $desa['profil_singkat']; ?></p>
                                        <p class="info2">Email: <?= $desa['email_kecamatan']; ?></p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Popular post</h4>
                            </div>
                            <!-- Popular post -->
                            <div class="whats-right-single mb-20">
                                <div class="whats-right-img">
                                    <img src="<?= base_url("$this->theme_folder/$this->theme/assets/img/gallery/footer_post1.png") ?>" alt="">
                                </div>
                                <div class="whats-right-cap">
                                    <h4><a href="latest_news.html">Scarlett’s disappointment at latest accolade</a></h4>
                                    <p>Jhon | 2 hours ago</p>
                                </div>
                            </div>
                            <!-- Popular post -->
                            <div class="whats-right-single mb-20">
                                <div class="whats-right-img">
                                    <img src="<?= base_url("$this->theme_folder/$this->theme/assets/img/gallery/footer_post2.png") ?>" alt="">
                                </div>
                                <div class="whats-right-cap">
                                    <h4><a href="latest_news.html">Scarlett’s disappointment at latest accolade</a></h4>
                                    <p>Jhon | 2 hours ago</p>
                                </div>
                            </div>
                            <!-- Popular post -->
                            <div class="whats-right-single mb-20">
                                <div class="whats-right-img">
                                    <img src="<?= base_url("$this->theme_folder/$this->theme/assets/img/gallery/footer_post3.png") ?>" alt="">
                                </div>
                                <div class="whats-right-cap">
                                    <h4><a href="latest_news.html">Scarlett’s disappointment at latest accolade</a></h4>
                                    <p>Jhon | 2 hours ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                        <div class="single-footer-caption mb-50">
                            <div class="banner">
                                <img src="<?= base_url("$this->theme_folder/$this->theme/assets/img/gallery/body_card4.png") ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom aera -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-12 ">
                            <div class="footer-copy-right text-center">
                                <p>
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> | <?= $this->setting->website_title ?>
                                    </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>
<!-- Search model Begin -->
<div class="search-model-box">
    <div class="d-flex align-items-center h-100 justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Searching key.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- JS here -->

<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/vendor/modernizr-3.5.0.min.js") ?>"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/vendor/jquery-1.12.4.min.js") ?>"></script>
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/popper.min.js") ?>"></script>
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/bootstrap.min.js") ?>"></script>
<!-- Jquery Mobile Menu -->
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/jquery.slicknav.min.js") ?>"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/owl.carousel.min.js") ?>"></script>
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/slick.min.js") ?>"></script>
<!-- Date Picker -->
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/gijgo.min.js") ?>"></script>
<!-- One Page, Animated-HeadLin -->
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/wow.min.js") ?>"></script>
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/animated.headline.js") ?>"></script>
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/jquery.magnific-popup.js") ?>"></script>

<!-- Scrollup, nice-select, sticky -->
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/jquery.scrollUp.min.js") ?>"></script>
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/jquery.nice-select.min.js") ?>"></script>
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/jquery.sticky.js") ?>"></script>

<!-- contact js -->
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/contact.js") ?>"></script>
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/jquery.form.js") ?>"></script>
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/jquery.validate.min.js") ?>"></script>
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/mail-script.js") ?>"></script>
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/jquery.ajaxchimp.min.js") ?>"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/plugins.js") ?>"></script>
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/main.js") ?>"></script>