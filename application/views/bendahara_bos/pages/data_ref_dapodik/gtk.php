<?php
if($gtk){
	echo "Menampilkan: ".(count($gtk))." Data";
	?>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Pilih</th>
					<th>No</th>
					<th>Nama</th>
					<th>Jenis PTK</th>
					<th>NIP</th>
					<th>NIK</th>
					<th>NUPTK</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($gtk as $key => $value) {
					$key++;
					$dataID = $this->encryption->encrypt(json_encode($value));
					?>
					<td>
						<input type="checkbox" name="pilih_data[]" class="form-check-input" id="<?= $this->encryption->encrypt('getgtk') ?>" data-id="<?= $dataID ?>">
					</td>
					<?php
					echo "<td>$key</td>";
					echo "<td>$value->nama</td>";
					echo "<td>$value->jenis_ptk_id_str</td>";
					echo "<td>$value->nip</td>";
					echo "<td>$value->nik</td>";
					echo "<td>$value->nuptk</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<?php
}else{
	echo "<div class='alert alert-info'>0 Results</div>";
}