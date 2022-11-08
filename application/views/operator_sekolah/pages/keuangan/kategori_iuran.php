<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Jenis</th>
				<th>Nominal</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($kategori_iuran as $key => $value): $key++; ?>
				<?php
				$dataID = $this->encryption->encrypt(json_encode($value));
				?>
				<tr>
					<td>
						<input type="checkbox" name="pilih_data[]" class="form-check-input" id="<?= $this->encryption->encrypt('iuran_kategori') ?>" data-id="<?= $dataID ?>">
						<label for="<?= $this->encryption->encrypt('iuran_kategori') ?>"><?= $value->nama ?></label>
					</td>
					<td><?php if($value->jenis_iuran=='1'){echo "Iuran Rutin Bulanan";}else if($value->jenis_iuran==2){echo "Iuran Per Item";}else{echo $value->jenis_iuran;} ?></td>
					<td><?= number_format($value->nominal,0,',','.') ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>