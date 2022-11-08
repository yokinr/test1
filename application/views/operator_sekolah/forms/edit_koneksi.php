<?php
if($form){
	$data = $form;
	?>
	<form>
		<input type="hidden" name="page" value="edit_koneksi">
		<div class="form-floating">
			<input type="text" name="host" class="form-control" id="floadingHost" value="<?= $data->url ?>">
			<label for="floadingHost">Host</label>
		</div>
		<div class="form-floating">
			<input type="text" name="token" class="form-control" id="floatingToken" value="<?= $data->token ?>">
			<label for="floatingToken">Token</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" name="npsn" class="form-control" id="floatingNPSN" value="<?= $data->npsn ?>">
			<label for="floatingNPSN">NPSN</label>
		</div>
		<div class="d-grid">
			<button class="btn btn-block btn-primary"><i class="fa fa-save"></i> Simpan</button>
		</i>
	</form>
	<?php
}else{
	echo "Terjadi kesalahan sistem";
}
?>
