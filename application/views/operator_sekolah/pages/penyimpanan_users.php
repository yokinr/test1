<?php if($pengguna){ ?>
	<div class="table-responsive">
		<table class="table">
			<?php foreach ($pengguna as $key => $value): ?>
				<?php
				$dataID = $this->encryption->encrypt(json_encode($value));
				if($value['status']=='1'){
					$trclass = 'bg-light';
				}else{
					$trclass='bg-secondary';
				}
				?>
				<tr class="<?= $trclass ?>">
					<td class="align-middle"><?= $value['nama'] ?></td>
					<td class="align-middle"><?= $value['peran_id_str'] ?></td>
					<td class="align-middle"><?= $value['status'] ?></td>
					<td class="align-middle">
						<button class="btn btn-link tombol-1" id="penyimpanan_user" data-id="<?= $dataID ?>" md-v="modal-fullscreen"><i class='fas fa-eye'></i></button>
						<button class="btn btn-link tombol-1 text-danger" id="tandai_penyimpanan_user" data-id="<?= $dataID ?>" md-v="modal-lg"><i class='fas fa-check-circle'></i></button>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
	<?php
}else{echo "<div class='alert alert-danger'>0 Results</div>";} ?>