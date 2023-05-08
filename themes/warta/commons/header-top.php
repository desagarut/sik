<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="header-top black-bg d-none d-sm-block">
    <div class="container">
        <div class="col-xl-12">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="header-info-left">
                    <ul>
                        <li class="title"><span class="flaticon-energy"></span> trending-title</li>
                        <li><?php $this->load->view($folder_themes . '/widgets/running_text') ?></li>
                    </ul>
                </div>
                <div class="header-info-right">
                    <ul class="header-date">
                        <li><span class="flaticon-calendar"></span> <?= $desa['email_kecamatan']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>