<div class="col-md-3">
	
		<div class="card-header">
			<h3 class="card-title">Kategori</h3>
			<div class="box-tools">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
		</div>
		<div class="card-body no-padding">
			<ul class="nav nav-pills nav-stacked">
				<?php foreach($submenu as $id => $nama_menu) : ?>
					<li class="<?php ($_SESSION['submenu'] == $id) and print('active') ?>">
						<a href="<?= site_url("mailbox/clear/$id") ?>"><?= $nama_menu ?></a>
					</li>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
</div>