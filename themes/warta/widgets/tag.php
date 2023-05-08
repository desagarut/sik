<!-- widget Kategori-->
<!--
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
</aside>-->

<aside class="single_sidebar_widget tag_cloud_widget">
	<h4 class="widget_title">Tag Clouds</h4>
	<ul class="list">
		<?php foreach ($menu_kiri as $data) : ?>
			<li>
				<a href="<?= site_url("artikel/kategori/$data[slug]"); ?>"><?= $data['kategori']; ?><?php (count($data['submenu']) > 0) and print('<span class="caret"></span>'); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</aside>