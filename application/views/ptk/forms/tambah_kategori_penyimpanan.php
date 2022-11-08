<?php
$decrypt = $this->encryption->decrypt($this->input->post('data'));
$decode_json = json_decode($decrypt ,true);
$jml = count($decode_json);
if($jml>0){

	?>
	<form>
		<input type="hidden" name="page" value="tambah_kategori_penyimpanan">
		<div class="form-floating mb-3">
			<input type="text" name="nama_kategori" class="form-control" id="floatingNama" placeholder="Nama Kategori Penyimpanan">
			<label for="floatingNama">Nama Kategori Penyimpanan</label>
		</div>
		<div class="mb-3">
			<button class="btn btn-primary btn-block"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</form>
	<?php
}
?>