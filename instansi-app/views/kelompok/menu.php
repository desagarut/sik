<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<script>
  $(function() {

    var keyword = <?= $keyword ?>;

    $("#cari").autocomplete({

      source: keyword,

      maxShowItems: 10,

    });

  });
</script>

<div class="col-md-3">
  <div class="card">
    <div id="kelompok" class="card-info">
      <div class="card-header">
        <h3 class="card-title">Kategori Kelompok</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"> <i class="fas fa-times"></i> </button>
        </div>
      </div>
      <div class="card-body">
        <div class="nav nav-pills flex-column">
          <ul class="nav flex-column">
            <?php if ($this->CI->cek_hak_akses('h')) : ?>
              <?php foreach ($list_master as $data) : ?>
                
                <li class="<?= jecho($filter, $data['id'], 'active'); ?> nav-item"> <a href="<?= site_url("kelompok/to_master/$data[id]"); ?>">
                    <?= $data['kelompok']; ?>
                  </a> </li>
              <?php endforeach; ?>
              <li> <a class="btn btn-box bg-purple btn-sm" href="<?= site_url("kelompok_master"); ?>"><i class="fa fa-plus"></i> Kelola Kategori Kelompok</a> </li>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>