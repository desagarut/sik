<!-- widget Kategori-->
<!--
<div class="single_bottom_rightbar">
	<h2> Kategori</h2>
	<ul id="ul-menu" class="sidebar-latest">
		<?php foreach ($menu_kiri as $data) : ?>
			<li>
				<a href="<?= site_url("artikel/kategori/$data[slug]"); ?>">
					<?= $data['kategori']; ?><?php (count($data['submenu']) > 0) and print('<span class="caret"></span>'); ?>
				</a>
				<?php if (count($data['submenu']) > 0) : ?>
					<ul class="nav submenu">
						<?php foreach ($data['submenu'] as $submenu) : ?>
							<li><a href="<?= site_url("artikel/kategori/$submenu[slug]"); ?>"><?= $submenu['kategori'] ?></a></li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
						-->
<aside class="single_sidebar_widget post_category_widget">
	<h4 class="widget_title">Category</h4>
	<ul class="list cat-list">
		<?php foreach ($menu_kiri as $data) : ?>
			<li>
				<a href="<?= site_url("artikel/kategori/$data[slug]"); ?>" class="d-flex">
					<p><?= $data['kategori']; ?><?php (count($data['submenu']) > 0) and print('<span class="caret"></span>'); ?></p>
					<p>(37)</p>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
</aside>