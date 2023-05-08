<?php if ($this->CI->cek_hak_akses('u')): ?>

	<div id="confirm-delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel">Konfirmasi Hapus Penduduk</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<p class="mb-0">Anda akan menghapus data penduduk.</p>
					<p><b>Apakah Anda yakin ingin menghapus data ini?</b></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn  btn-secondary" data-dismiss="modal">Batal</button>
					<button type="button" class="btn  btn-danger">Ya Hapus</button>
				</div>
			</div>
		</div>
	</div>



	<div class="modal fade" id="confirm-status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-triangle text-red"></i>&nbsp; Konfirmasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-sign-out"></i> Tutup</button>
					<a class="btn-ok">
						<button type="button" class="btn btn-info btn-sm" id="ok-delete"><i class="fa fa-check"></i> Simpan</button>
					</a>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>
