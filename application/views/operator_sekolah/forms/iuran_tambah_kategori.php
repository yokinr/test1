<?php
$jenis_iuran = array(
	'1' => 'Iuran Rutin Bulanan',
	'2' => 'Iuran Per Item'
);
?>
<form>
	<input type="hidden" name="page" value="iuran_tambah_kategori">
	<div class="form-floating mb-3">
		<input type="text" name="nama" class="form-control" id="floatingNama" placeholder="Nama" autocomplete="off">
		<label for="floatingNama">Nama Iuran</label>
	</div>
	<div class="form-floating mb-3">
		<select name="jenis_iuran" class="form-select" id="floatingJenisIuran">
			<option value="">....</option>
			<?php foreach ($jenis_iuran as $key => $value): ?>
				<option value="<?= $key ?>"><?= $value ?></option>
			<?php endforeach ?>
		</select>
		<label for="floatingJenisIuran">Jenis Iuran</label>
	</div>
	<div class="form-floating mb-3">
		<input type="number" class="form-control" name="nominal" id="floatingNominal" placeholder="Nominal">
		<label for="floatingNominal">Nominal</label>
	</div>
	<div class="d-grid">
		<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
	</div>
</form>