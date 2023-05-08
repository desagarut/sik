<aside class="single_sidebar_widget popular_post_widget">
    <h3 class="widget_title">Recent Post</h3>
    <?php foreach (array('populer' => 'arsip_populer') as $jenis => $jenis_arsip) : ?>
        <?php foreach ($$jenis_arsip as $arsip) : ?>
            <div class="media post_item <?php ($jenis == 'populer') and print('active') ?>" id="<?= $jenis ?>">
                <?php if ($arsip['gambar']) : ?>
                    <a href="<?= site_url('artikel/' . buat_slug($arsip)) ?>"><img src="<?= base_url(LOKASI_FOTO_ARTIKEL . 'kecil_' . $arsip['gambar']) ?>" alt="<?= $arsip['judul'] ?>" style="width: 90px; height: 90px;"></a>
                <?php else : ?>
                    <a href="<?= site_url('artikel/' . buat_slug($arsip)) ?>"><img src="<?= base_url("$this->theme_folder/$this->theme/assets/img/blog/blog_4.png") ?>" alt="<?= $arsip['judul'] ?>" style="width: 90px; height: 90px;"></a>
                <?php endif ?>

                <div class="media-body">
                    <a href="single-blog.html">
                        <h3><?= $arsip['judul'] ?>...</h3>
                    </a>
                    <p><?= tgl_indo($arsip['tgl_upload']); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
</aside>