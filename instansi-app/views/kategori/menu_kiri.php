<div class="card">
	<div class="card-header">
		<h3 class="card-title">Kategori Menu</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
			<button type="button" class="btn btn-tool" data-card-widget="remove">
				<i class="fas fa-times"></i>
			</button>
		</div>
	</div>
	<div class="card-body">
		<div class="nav nav-pills flex-column">
			<a href="<?= site_url('menu/index/1') ?>" <?php if ($tip == 1) : ?>class="nav-link active" aria-selected="true" <?php endif; ?>>Menu Statis</a>
			<a href="<?= site_url('kategori/clear') ?>" <?php if ($tip == 2) : ?>class="nav-link active" aria-selected="true" <?php endif; ?>>Menu Dinamis</a>
		</div>
	</div>
</div>