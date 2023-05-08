<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<!-- Team Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase"><?= ucfirst($this->setting->sebutan_kecamatan).' '.ucwords($desa['nama_kecamatan']) ?></h5>
                <h1 class="mb-0">Struktur Pemerintahan</h1>
            </div>
            <div class="row g-5">

            <?php foreach ($aparatur_desa['daftar_perangkat'] as $data) : ?>

                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="<?= $data['foto'] ?>" width="200px" height="230px" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary"><?= $data['nama'] ?></h4>
                            <h6 class="text-primary"><?= $data['jabatan'] ?></h6>

                            <p class="text-uppercase m-0"><?= $data['pamong_niap'] ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <!-- Team End -->
