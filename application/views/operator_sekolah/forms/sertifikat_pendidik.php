<?php
$ptk_id = $form->ptk_id;
$penataan_linearitas = $this->db->get_where('sertifikat_pendidik', array('ptk_id'=>$ptk_id))->result();
echo $form->nama;
?>
<hr>

<form>
	<input type="hidden" name="page" value="tambah_sertifikat_pendidik">
	<input type="hidden" name="ptk_id" value="<?= $ptk_id ?>">
	<?php foreach ($penataan_linearitas as $key => $value): ?>
		<div class="form-floating mb-3">
			<input type="text" name="nomor_sertifikat[]" class="form-control" placeholder="Nomor Sertifikat" id="nomor_sertifikat" value="<?= $value->nomor_sertifikat ?>">
			<label for="nomor_sertifikat">Nomor Sertifikat</label>
		</div>
	<?php endforeach ?>
	<div class="form-floating mb-3">
		<input type="text" name="nomor_sertifikat[]" class="form-control" placeholder="Nomor Sertifikat" id="nomor_sertifikat">
		<label for="nomor_sertifikat">Nomor Sertifikat</label>
	</div>
	<div class="d-grid">
		<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
	</div>
</form>