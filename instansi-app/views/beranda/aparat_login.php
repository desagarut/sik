<div class="col-md-4">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Pegawai Login</h3>
      <div class="card-tools">
        <?php if ($this->CI->cek_hak_akses('h')) : ?>
          <a href="<?= site_url('man_user') ?>"><span class="label label-default"> Detail</span></a>
        <?php endif; ?>
        <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove"> <i class="fas fa-times"></i> </button>
      </div>
    </div>
    <div class="card-body">
      <ul class="users-list clearfix">
        <?php foreach ($last_login_operator as $key => $data) { ?>
          <li>

            <?php if ($data['foto']) : ?>
              <!--<img src="dist/img/user1-128x128.jpg" alt="Warga">-->
              <img src="<?= AmbilFoto($data['foto']) ?>" alt="Foto">
            <?php else : ?>
              <img class="user-image" src="<?= base_url() ?>assets/files/user_pict/kuser.png" alt="Foto">
            <?php endif; ?>

            <a class="users-list-name" href="#"><?= $data['nama'] ?><br /><?= $data['grup'] ?></a>
            <span class="users-list-date"><?= tgl_indo2($data['last_login']) ?></span>
          </li>
        <?php } ?>
      </ul>
      <div class="card-footer text-center">
        <a href="<?= site_url('man_user') ?>" class="uppercase">Lihat semua pengguna</a>
      </div>
    </div>
  </div>
</div>
