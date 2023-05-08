<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h4 class="m-0">Pengaturan Sosmed</h4>
				</div>
				<!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= site_url('beranda') ?>"><i class="fa fa-home"></i> Home</a></li>
						<li class="breadcrumb-item active"> Pengaturan <?= str_replace('-', ' ', ucwords($media)) ?></li>
					</ol>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<section class="content">
		<div class="container-fluid">
			<div class="card">
				<form id="validasi" action="<?= $form_action ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
					<div class="row">
						<div class="col-md-3">

							<div class="card-header">
								<h3 class="card-title">Media Sosial</h3>
								<div class="box-tools">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
								</div>
							</div>
							<div class="card-body no-padding">
								<ul class="nav nav-pills nav-stacked">
									<?php foreach ($list_sosmed as $list) : ?>
										<?php $nama = str_replace(' ', '-', strtolower($list['nama'])) ?>
										<li class="<?php ($media === $nama) and print('active') ?>"><a href="<?= site_url("sosmed/tab/$nama") ?>"><i class="fa fa-<?= $nama ?>"></i> <?= $list['nama'] ?></a></li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-9">

						<?php $this->load->view('sosmed/' . $media); ?>
						<div class='card-footer'>
							<div class='col-xs-12'>
								<button type='reset' class='btn btn-box btn-danger btn-sm reset' onclick="reset_form($(this).val());"><i class='fa fa-times'></i> Batal</button>
								<button type='submit' class='btn btn-box btn-info btn-sm pull-right confirm'><i class='fa fa-check'></i> Simpan</button>
							</div>
						</div>
					</div>
			</div>
		</div>
		</form>
	</section>
</div>
<script>
	$('document').ready(function() {
		$('#tipe').change();
	});

	<?php if ($media === 'facebook') : ?>

		function ubah_pesan(tipe) {
			if (tipe == 1) {
				$('#link').attr('placeholder', ' Personal / Halaman, contoh : https://web.facebook.com/desagarut.net \n\n Isi kolom ini dengan username : desagarut.net');
			} else {
				$('#link').attr('placeholder', ' Group, contoh : https://web.facebook.com/groups/desagarut.net \n\n Isi kolom ini dengan username : desagarut.net');
			}
		};
	<?php endif ?>

	<?php if ($media === 'whatsapp') : ?>

		function ubah_pesan(tipe) {
			if (tipe == 1) {
				$('#link').attr('placeholder', ' Personal chat, contoh : 082317883161 (Nomor HP)) \n\n Isi kolom ini dengan nomor HP : 082317883161');
			} else {
				$('#link').attr('placeholder', ' Group chat, contoh : https://chat.whatsapp.com/CryQ1VyOXghEVJUTFpwFPb \n\n Isi kolom ini dengan id chat : CryQ1VyOXghEVJUTFpwFPb');
			}
		};
	<?php endif ?>

	<?php if ($media === 'telegram') : ?>

		function ubah_pesan(tipe) {
			if (tipe == 1) {
				$('#link').attr('placeholder', ' Personal chat, contoh  : https://t.me/DesaGarut \n\n Isi kolom ini dengan username : DesaGarut');
			} else {
				$('#link').attr('placeholder', ' Group chat, contoh  : https://t.me/joinchat/I5antRHvea8ohaU7_RsYYQ \n\n Isi kolom ini dengan id chat : I5antRHvea8ohaU7_RsYYQ');
			}
		};
	<?php endif ?>

	function reset_form() {
		<?php if ($main['enabled'] == '1') : ?>
			$("#sx3").addClass('active');
			$("#sx4").removeClass("active");
		<?php endif ?>
		<?php if ($main['enabled'] == '2') : ?>
			$("#sx4").addClass('active');
			$("#sx3").removeClass("active");
		<?php endif ?>
	};
</script>