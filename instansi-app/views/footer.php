</div>
<footer class="main-footer">
	<div class="float-right d-none d-sm-block hidden-xs"> <b>Version</b>
		<?= AmbilVersi() ?> <span class="logo-mini logo-text" style="padding-top:7px"><img src="<?= logo_web($desa['logo']); ?>" class="img-circle logo-desa" alt="User Image" width="30px"></span>
	</div>
	<span class="logo-mini logo-text" style="padding-top:7px"><img src="<?= logo_web($desa['logo']); ?>" class="img-logo" alt="User Image" width="30px"></span> <a href="#" target="_blank"></a> Sistem Informasi <?= $this->setting->website_title ?><strong><a href="#" target="_blank"></a>.</strong>
</footer>

<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>

<!-- ChartJS -->
<script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url() ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>

<script src="<?= base_url() ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url() ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url() ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?= base_url() ?>assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?= base_url() ?>assets/plugins/dropzone/min/dropzone.min.js"></script>

<!-- jQuery Mapael -->
<script src="<?= base_url() ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?= base_url() ?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>



<script src="<?= base_url() ?>assets/js/validasi.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/js/localization/messages_id.js"></script>
<!-- Numeral js -->
<script src="<?= base_url() ?>assets/js/numeral.min.js"></script>
<!-- Script-->
<script src="<?= base_url() ?>assets/js/script.js"></script>

<!-- NOTIFICATION-->

<script type="text/javascript">
	$('document').ready(function() {
		setTimeout(function() {
			refresh_badge($("#b_permohonan_surat"), "<?= site_url('notif/permohonan_surat'); ?>");
			refresh_badge($("#b_komentar"), "<?= site_url('notif/komentar'); ?>");
			refresh_badge($("#b_inbox"), "<?= site_url('notif/inbox'); ?>");
		}, 500);
		if ($('#success-code').val() == 1) {
			notify = 'success';
			notify_msg = 'Data berhasil disimpan';
		} else if ($('#success-code').val() == -1) {
			notify = 'error';
			notify_msg = 'Data gagal disimpan <?= $_SESSION["error_msg"] ?>';
		} else if ($('#success-code').val() == -2) {
			notify = 'error';
			notify_msg = 'Data gagal disimpan, nama id sudah ada!';
		} else if ($('#success-code').val() == -3) {
			notify = 'error';
			notify_msg = 'Data gagal disimpan, nama id sudah ada!';
		} else if ($('#success-code').val() == 4) {
			notify = 'success';
			notify_msg = 'Data berhasil dihapus';
		} else if ($('#success-code').val() == -4) {
			notify = 'error';
			notify_msg = 'Data gagal dihapus';
		} else {
			notify = '';
			notify_msg = '';
		}
		notification(notify, notify_msg);
		$('#success-code').val('');
	});
</script>
<?php $_SESSION['success'] = 0; ?>
</body>

</html>