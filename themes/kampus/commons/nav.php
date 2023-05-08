<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="<?= site_url('first') ?>" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h2 class="m-0 text-primary"><img src="<?= gambar_institusi($desa['logo']) ?>" style="padding-bottom: 5px; width:58px;" alt="<?= $this->setting->website_title ?>"> <?= $this->setting->website_title ?></h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="<?= site_url('first') ?>" class="nav-item nav-link active">Home</a>
            <?php if (menu_atas) : ?>
                <?php foreach ($menu_atas as $menu) : ?>

                    <div class="nav-item dropdown">
                        <a href="<?= $menu['link'] ?>" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><?= $menu['nama'] ?></a>
                        <?php if (count($menu['submenu']) > 0) : ?>
                        <?php endif ?>

                        <?php if (count($menu['submenu']) > 0) : ?>
                            <div class="dropdown-menu fade-down m-0">
                                <?php foreach ($menu['submenu'] as $submenu) : ?>
                                    <a href="<?= $submenu['link'] ?>" class="dropdown-item"><?= $submenu['nama'] ?></a>
                                <?php endforeach ?>
                            </div>
                        <?php endif ?>

                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
        <a href="<?= site_url('mandiri_web') ?>" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">LOGIN<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
<!-- Navbar End -->