<form method="POST">
	<table class="table table-sm">
		<?php
		foreach ($vervalpd1 as $key => $value) {
			$ket = $this->db->get_where('vervalpd', array('nik'=>$value->nik))->row_array();
			$key++;
			// if(!$ket['ket']){
			?>
			<tr>
				<td><?= $key ?></td>
				<td><?= $value->nik ?></td>
				<td><?= $value->nisn ?></td>
				<td><?= $value->nama ?></td>
				<td><?= $value->nama_rombel ?></td>
				<td class="input"><input type="text" name="ket[<?=  $value->nik ?>][]" value="<?= $ket['ket'] ?>" class="form-control"></td>
				<td><?= $value->ket ?></td>
			</tr>
			<?php
			// }
		}
		?>
	</table>
	<button class="d-none">Simpan</button>
</form>