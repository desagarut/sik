<div class="card card-primary box-solid">
	<div class="card-header">
		<h3 class="card-title"><i class="fa fa-bars"></i> Kategori</h3>
	</div>
	<div class="card-body">
		<ul id="ul-menu" class="main">
			<?php foreach($menu_kiri as $data): ?>
				<li><a href="<?= site_url("artikel/kategori/$data[slug]"); ?>"><?= $data['kategori']; ?></a>
					<?php if(count($data['submenu']) > 0): ?>
						<ul class="submenu">
							<?php foreach($data['submenu'] as $submenu): ?>
								<li><a href="<?= site_url("artikel/kategori/$submenu[slug]"); ?>"><?= $submenu['kategori']?></a></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
