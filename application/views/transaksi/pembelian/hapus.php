<?php foreach ($detail as $data) { ?>
	<div class="bs-component">
		<div class="modal" id="hapus<?= $data['kode_bahan']; ?>">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title text-danger">Hapus</h5>
					</div>
					<div class="modal-body">
						Apakah anda yakin ingin menghapus <?= "<b>".$data['kode_bahan']." ".$data['nama']."</b> "; ?>dari tabel ?
			            <div class="text-right">
			              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tidak</button>
			              &nbsp;&nbsp;
			              <a href="<?= site_url('pembelian/hapusPembelian/'.$beli['kode_pembelian'].'/'.$data['kode_bahan']); ?>" class="btn btn-outline-primary">Iya</a>
			            </div>
			        </div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>