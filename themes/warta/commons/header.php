<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <?php $this->load->view($folder_themes . '/commons/header-top') ?>
            <?php $this->load->view($folder_themes . '/commons/header-mid') ?>
            <?php $this->load->view($folder_themes . '/commons/header-bottom') ?>
        </div>
    </div>
    <!-- Header End -->
</header>