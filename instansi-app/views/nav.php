<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<aside class="main-sidebar sidebar-light-maroon elevation-4">
  <!-- Brand Logo -->
  <a href="<?= site_url() ?>first" target="_blank" class="brand-link">
    <img src="<?= logo_web($desa['logo']); ?>" alt="Logo <?= $this->setting->website_title ?>" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><?= ucfirst($this->setting->sebutan_kecamatan_singkat).' '.ucwords($desa['nama_kecamatan']) ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= AmbilFoto($foto); ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info text-sm">
        <a href="#" class="d-block"><small>login as</small> <strong><?= $nama ?></strong><br /></a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <?php foreach ($modul as $mod) : ?>
          <?php if ($this->CI->cek_hak_akses('b', $mod['url'])) : ?>
            <?php if (count($mod['submodul']) == 0) : ?>

              <li class="nav-item <?= jecho($this->modul_ini, $mod['id'], 'menu-open'); ?>">
                <a href="<?= site_url("$mod[url]"); ?>" class="nav-link <?= jecho($this->modul_ini, $mod['id'], 'menu-open active'); ?>">
                  <i class="nav-icon fa <?= $mod['ikon']; ?> <?= jecho($this->modul_ini, $mod['id'], 'text-white'); ?>"></i>
                  <p>
                    <?= $mod['modul']; ?>
                  </p>
                </a>
              </li>

            <?php else : ?>
              <li class="nav-item <?= jecho($this->modul_ini, $mod['id'], 'menu-open'); ?>">
                <a href="<?= site_url("$mod[url]"); ?>" class="nav-link <?= jecho($this->modul_ini, $mod['id'], 'menu-open active'); ?>">
                  <i class="nav-icon fa <?= $mod['ikon']; ?> <?= jecho($this->modul_ini, $mod['id'], 'text-white'); ?>"></i>
                  <p>
                    <?= $mod['modul']; ?>
                  </p>
                </a>
                <ul class="nav nav-treeview <?= jecho($this->modul_ini, $mod['id'], 'menu-open active'); ?>">
                  <?php foreach ($mod['submodul'] as $submod) : ?>
                    <li class="nav-item <?= jecho($this->modul_ini, $mod['id'], 'menu-open'); ?>">
                      <a href="<?= site_url("$submod[url]"); ?>" class="nav-link <?= jecho($this->sub_modul_ini, $submod['id'], 'active'); ?>">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p><?= $submod['modul']; ?></p>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
              </li>


            <?php endif; ?>
          <?php endif; ?>
        <?php endforeach; ?>
      </ul>
    </nav>
</aside>