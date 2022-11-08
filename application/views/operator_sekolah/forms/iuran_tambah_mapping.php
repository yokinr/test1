<?php
if($this->input->post('data')){
	$kategori_iuran = $this->m_keuangan->kategori_iuran();
	?>
	<form>
		<input type="hidden" name="page" value="tambah_mapping_iuran">
		<div class="table-responsive">
			<table class="table">
				<?php foreach ($this->input->post('data') as $key => $value): ?>
					<?php
					$explode = explode(',', $value);
					$table = $this->encryption->decrypt($explode[0]);
					$rombel = json_decode($this->encryption->decrypt($explode[1]));
					?>
					<tr>
						<td>
							<?= $rombel->nama ?>
						</td>
						<td>
							<select name="kategori_iuran[]" class="form-select">
								<option value="">....</option>
								<?php foreach ($kategori_iuran as $key1 => $value1): ?>
									<?php
									$dataSimpan = $this->encryption->encrypt($table.','.$rombel->rombongan_belajar_id.','.$value1->uniq);
									?>
									<option value="<?= $dataSimpan ?>"><?= $value1->nama ?></option>
								<?php endforeach ?>
							</select>
						</td>
					</tr>
				<?php endforeach ?>
			</table>
		</div>
		<div class="d-grid">
			<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</form>
	<?php
}