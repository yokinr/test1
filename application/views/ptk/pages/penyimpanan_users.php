<?php if($pengguna){ ?>
	<div class="table-responsive">
		<table class="table">
			<?php foreach ($pengguna as $key => $value): ?>
				<?php
				$dataID = $this->encryption->encrypt(json_encode($value));
				?>
				<tr class="tombol-1" id="penyimpanan_user" data-id="<?= $dataID ?>" md-v="modal-fullscreen" style="cursor: pointer;">
					<td><?= $value['nama'] ?></td>
					<td><?= $value['peran_id_str'] ?></td>
					<!-- <td><button class="btn btn-link tombol-1" id="penyimpanan_user" data-id="<?= $dataID ?>" md-v="modal-fullscreen"><i class='fas fa-eye'></i></button></td> -->
				</tr>
			<?php endforeach ?>
		</table>
	</div>
	<?php
}else{echo "<div class='alert alert-danger'>0 Results</div>";} ?>