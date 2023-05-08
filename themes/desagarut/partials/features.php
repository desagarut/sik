<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Features Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Prioritas Program</h5>
            <h1 class="mb-0"><?= ucfirst($this->setting->sebutan_kecamatan) . ' ' . ucwords($desa['nama_kecamatan']) ?></h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-4">
                <div class="row g-5">
                    <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-cubes text-white"></i>
                        </div>
                        <h4>Bidang Pemerintahan</h4>
                        <p class="mb-0">Prioritas Program Bidang Pemerintahan</p>
                    </div>
                    <div class="col-12 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-award text-white"></i>
                        </div>
                        <h4>Bidang Kesejahteraan Masyarakat</h4>
                        <p class="mb-0">Prioritas Program Bidang Kesejahteraan Masyarakat</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                <div class="col-12 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                        <i class="fa fa-award text-white"></i>
                    </div>
                    <h4>Bidang Pemberdayaan Masyarakat</h4>
                    <p class="mb-0">Prioritas Program Bidang Pemberdayaan Masyarakat</p>
                </div>

                <!--<div class="position-relative h-100">
                    <img class="position-absolute w-100 h-90 rounded wow zoomIn" data-wow-delay="0.1s" src="<?= base_url("$this->theme_folder/$this->theme/assets/img/logo_pemda_garut.png") ?>" style="object-fit: cover;">
                </div>-->
            </div>
            <div class="col-lg-4">
                <div class="row g-5">
                    <div class="col-12 wow zoomIn" data-wow-delay="0.4s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-users-cog text-white"></i>
                        </div>
                        <h4>Bidang Ketenteraman dan Ketertiban Umum</h4>
                        <p class="mb-0">Prioritas Program Bidang Ketentraman dan Ketertiban Umum</p>
                    </div>
                    <div class="col-12 wow zoomIn" data-wow-delay="0.8s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <h4>Bidang Pelayanan</h4>
                        <p class="mb-0">Prioritas Program Bidang Pelayanan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Features Start -->