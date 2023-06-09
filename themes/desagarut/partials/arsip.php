<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
  <div class="row py-5">
    <div class="col-12 pt-lg-5 mt-lg-5 text-center">
      <h1 class="display-4 text-white animated zoomIn">Berita</h1>
      <a href="" class="h5 text-white">Home</a>
      <i class="far fa-circle text-white px-2"></i>
      <a href="" class="h5 text-white">Berita</a>
    </div>
  </div>
</div>

<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
  <div class="container py-5">
    <div class="row g-5">
      <!-- Blog list Start -->
      <div class="col-lg-8">
        <div class="row g-5">
          <?php if (count($farsip) > 0) : ?>
            <?php foreach ($farsip as $data) : ?>
              <div class="col-md-6 wow slideInUp" data-wow-delay="0.1s">
                <div class="blog-item bg-light rounded overflow-hidden">
                  <div class="blog-img position-relative overflow-hidden">
                    <img class="img-fluid" src="<?= AmbilFotoArtikel($data['gambar' . $i], 'sedang') ?>" title="<?= $data['nama'] ?>" alt="<?= $data['nama'] ?>">
                    <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="<?= site_url('artikel/' . buat_slug($data)) ?>"><?= $data["kategori"] ?></a>
                  </div>
                  <div class="p-4">
                    <div class="d-flex mb-3">
                      <small class="me-3"><i class="far fa-user text-primary me-2"></i><?= $data["owner"] ?></small>
                      <small><i class="far fa-calendar-alt text-primary me-2"></i><?= mdate($data["tgl_upload"]) ?></small>
                    </div>
                    <h4 class="mb-3"><?= $data["judul"] ?></h4>
                    <p><?= $data['isi'] ?></p>
                    <a class="text-uppercase" href="<?= site_url('artikel/' . buat_slug($data)) ?>">Read More <i class="bi bi-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else : ?>
            Belum ada artikel web. coba beberapa saat lagi.
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>