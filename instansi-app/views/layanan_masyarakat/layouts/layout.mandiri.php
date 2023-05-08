<style type="text/css">
div.modal-header.bg-primary {
	padding: 10px;
}
#wrapper-mandiri .tdk-permohonan {
	display: none !important;
}
a.btn {
	color: #fff;
}
.unread > td {
	background-color: #ffeeaa !important;
}
</style>

<?php $this->load->view('layanan_masyarakat/commons/header.php') ?>

<?php include('instansi-app/views/layanan_masyarakat/commons/menu.php'); ?>
<?php if (empty($views_partial_layout)): ?>
<?php 

	switch ($m) {

	  case 1:

		$views_partial_layout = 'layanan_masyarakat/mandiri';

		break;

	  case 2:

		$views_partial_layout = 'layanan_masyarakat/layanan_surat';

		break;

	  case 3:

		$views_partial_layout = 'layanan_masyarakat/pesan/mailbox';

		break;

	  case 4:

		$views_partial_layout = 'layanan_masyarakat/bantuan';

		break;

	  case 5:

		$views_partial_layout = 'layanan_masyarakat/surat';

		break;

	  case 6:

		$views_partial_layout = 'layanan_masyarakat/profil/index';

		break;
		
	  case 7:

		$views_partial_layout = 'layanan_masyarakat/mandiri_dokumen';

		break;

	  case 8:

		$views_partial_layout = 'layanan_masyarakat/mandiri_polling';

		break;

	  default:

		$views_partial_layout = 'layanan_masyarakat/mandiri';

	}

  ?>
<?php else: ?>
<?php $data['mandiri'] = 1; ?>
<?php endif; ?>
<?php $this->load->view($views_partial_layout, $data);?>
<?php $this->load->view('layanan_masyarakat/commons/footer.php') ?>

