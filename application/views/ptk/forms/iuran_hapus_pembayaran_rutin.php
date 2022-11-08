<?php
if($this->input->post('data')){
	?>
	<form>
		<input type="hidden" name="page" value="iuran_hapus_pembeyaran_rutin">
		<div class="table-responsive">
			<table class="table">
				<?php foreach ($this->input->post('data') as $key => $value): ?>
					<?php
					$explode = explode(',', $value);
					$table = $this->encryption->decrypt($explode[0]);
					$dt = json_decode($this->encryption->decrypt($explode[1]));
					$dataHapus[$table][] = $dt;
					?>
					<tr>
						<td><?= $this->bulan->nama_bulan()[$dt->bulan_rutin] ?></td>
						<td><?= $dt->semester_id ?></td>
					</tr>
				<?php endforeach ?>
			</table>
		</div>
		<textarea name="dataHapus" class="d-none"><?= $this->encryption->encrypt(json_encode($dataHapus)) ?></textarea>
		<div class="d-grid">
			<button class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
		</div>
	</form>
	<?php
}