<div class="col-lg-12 col-md-12">
  <div class="card btn-page">
    <div class="card-header">
      <h5>Layanan</h5>
      <div class="card-tools"> <span class="badge badge-danger">Peta Desa</span>
        <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove"> <i class="fas fa-times"></i> </button>
      </div>
    </div>
    <div class="card-body">
      <a href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('web') ?><?php endif; ?>" title="Tulis Berita"> <button type="button" class="btn  btn-primary">Berita <span class="badge badge-light"></span></button></a>
      <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('surat') ?><?php endif; ?>" title="Buat Surat"> <button type="button" class="btn  btn-secondary">Buat Surat <span class="badge badge-light"><?= $jumlah_surat ?></span></button>
        <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('surat_masuk') ?><?php endif; ?>" title="Surat Masuk"><button type="button" class="btn  btn-success">Surat Masuk <span class="badge badge-light"></span></button></a>
        <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('surat_keluar') ?><?php endif; ?>" title="Surat Keluar"><button type="button" class="btn  btn-danger">Surat Keluar <span class="badge badge-light"></span></button></a>
        <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('permohonan_surat_admin') ?><?php endif; ?>"> <button type="button" class="btn  btn-warning">Surat Online <span class="badge badge-light"><?= $permohonan_surat ?></span></button></a>
        <a href="<?php if ($this->CI->cek_hak_akses('h')) : ?><?= site_url('mandiri') ?><?php endif; ?>" title="Buat PIN Layanan Warga "><button type="button" class="btn  btn-info">Buat PIN <span class="badge badge-light"></span></button></a>
        <a href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('mailbox') ?><?php endif; ?>"><button type="button" class="btn  btn-info">Pesan <span class="badge badge-light"><?= $status ?></span></button></a>
        <a href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('komentar') ?><?php endif; ?>"><button type="button" class="btn  btn-info">Komentar <span class="badge badge-light"><?= $komentar ?></span></button></a>
        <a href="<?php if ($this->CI->cek_hak_akses('u')) : ?><?= site_url('covid19_vaksin') ?><?php endif; ?>"><button type="button" class="btn  btn-info">Pendataan Vaksin <span class="badge badge-light"></span></button></a>
    </div>
  </div>
</div>