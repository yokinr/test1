<?php
if($form){
	?>
	<form>
		<input type="hidden" name="page" value="iuran_tambah_pembayaran">
		<input type="hidden" name="peserta_didik_id" value="<?= $form->peserta_didik_id ?>">
		<input type="hidden" name="uniq_iuran" value="<?= $form->uniq_iuran ?>">
		<input type="hidden" name="semester_id" value="<?= $form->semester_id ?>">
		<div class="form-floating mb-3">
			<input type="date" name="tanggal" class="form-control" value="<?= date('Y-m-d') ?>" id="floatingTanggal">
			<label for="floatingTanggal">Tanggal Bayar</label>
		</div>
		<div class="form-floating mb-3">
			<input type="number" name="nominal" value="<?= $form->nominal ?>" class="form-control" placeholder="Nominal" id="floatingNominal">
			<label for="floatingNominal">Nominal</label>
		</div>
		<div class="d-grid">
			<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</form>
	<?php
}