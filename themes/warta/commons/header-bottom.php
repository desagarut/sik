<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="header-bottom header-sticky">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-8 col-lg-8 col-md-12 header-flex">
                <!-- sticky -->
                <div class="sticky-logo">
                    <h4 style="color: white; font-family:'Segoe UI', Tahoma"><a href="<?= site_url('first') ?>"><img src="<?= logo_web($desa['logo']) ?>" style="width:30px" alt="<?= $this->setting->website_title ?>">&nbsp;<?= $this->setting->website_title ?></a></h4>
                </div>
                <!-- Main-menu -->
                <div class="main-menu d-none d-md-block">
                    <nav>
                        <ul id="navigation">
                            <li><a href="<?= site_url('first') ?>">Home</a></li>
                            <?php if (menu_atas) : ?>
                                <?php foreach ($menu_atas as $menu) : ?>
                                    <li><a href="<?= $menu['link'] ?>"><?= $menu['nama'] ?></a>
                                        <?php if (count($menu['submenu']) > 0) : ?>
                                            <ul class="submenu">
                                            <?php foreach ($menu['submenu'] as $submenu) : ?>
                                                <li><a href="<?= $submenu['link'] ?>"><?= $submenu['nama'] ?></a></li>
                                                <?php endforeach ?>
                                            </ul>
                                        <?php endif ?>
                                    </li>
                                <?php endforeach ?>
                            <?php endif ?>
                            <!--<li><a href="<?= site_url('mandiri_web') ?>">Login</a></li>-->
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="header-right f-right d-none d-lg-block">
                <?php $this->load->view($folder_themes . '/widgets/social_media') ?>

                    <!-- Search Nav -->
                    <div class="nav-search search-switch">
                        <i class="fa fa-search"></i>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu -->
            <div class="col-12">
                <div class="mobile_menu d-block d-md-none"></div>
            </div>
        </div>
    </div>
</div>