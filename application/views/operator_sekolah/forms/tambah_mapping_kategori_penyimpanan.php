<?php
$peran = $this->m_penyimpanan->peran();
$kategori = $form;
if($kategori&&$form){
	?>
	<form>
		<input type="hidden" name="page" value="tambah_mapping_kategori_penyimpanan">
		<div class="form-floating mb-3">
			<select name="peran" class="form-select" id="floatingPeran">
				<option value="">Pilih ...</option>
				<?php foreach ($peran as $key => $value): ?>
					<option><?= $value->peran ?></option>
				<?php endforeach ?>
			</select>
			<label for="floatingPeran">Peran</label>
		</div>
		<div class="form-floating mb-3" id="floatingKategori">
			<select name="kategori" class="form-select" id="floatingPeran">
				<option value="">Pilih ... </option>
				<?php foreach ($kategori as $key1 => $value1): ?>
					<option value="<?= $value1->uniq ?>"><?= $value1->nama ?></option>
				<?php endforeach ?>
			</select>
			<label for="floatingKategori">Kategori Penyimpanan</label>
		</div>
		<div class="d-grid">
			<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</form>
	<?php
}