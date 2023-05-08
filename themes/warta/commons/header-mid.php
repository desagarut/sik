<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="header-mid gray-bg">
    <div class="container">
        <div class="row d-flex align-items-center">
            <!-- Logo -->
            <div class="col-xl-3 col-lg-3 col-md-3 d-none d-md-block">
                <div class="logo">
                    <h1 style="color: dark; font-family:'Segoe UI', Tahoma"><a href="<?= site_url('first') ?>"><img src="<?= logo_web($desa['logo']) ?>" style="width:50px" alt="<?= $this->setting->website_title ?>"><!--&nbsp;Kecamatan&nbsp;<h1><?= $this->setting->website_title ?></h1>--></a></h1>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9">
                <?php $this->load->view($folder_themes . '/widgets/header-banner') ?>
            </div>
        </div>
    </div>
</div>