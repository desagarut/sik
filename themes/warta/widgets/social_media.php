<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<!-- Heder social -->
<ul class="header-social">
	<?php foreach ($sosmed as $data) : ?>
		<?php if (!empty($data["link"])) : ?>
			<li><a href="<?= $data['link'] ?>" target="_blank"><i class="fab fa-<?= $data['nama'] ?>"></i></a></li>
		<?php endif; ?>
	<?php endforeach; ?>
</ul>