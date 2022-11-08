<?php
if($form){
	?>
	<form enctype="multipart/form-data">
		<input type="hidden" name="page" value="upload_file">
		<input type="hidden" name="q" value="<?= $this->session->userdata('pengguna_id'); ?>">

		<div class="d-grid mb-3">
			<input type="file" name="fileToUpload" class="form-control" id="floatingFile" accept=".pdf,.png,.jpg">
		</div>
		<div class="form-floating mb-3">
			<select name="kategori_penyimpanan" class="form-control" id="floatingKategori">
				<option value=""></option>
				<?php
				foreach ($form as $key => $value) {
					echo "<option value='$value->uniq'>$value->nama</option>";
				}
				?>
			</select>
			<label for="floatingKategori">Pilih Kategori File</label>
		</div>
		<!-- <div class="form-floating mb-3">
			<input type="text" class="form-control" name="nama_file" placeholder="Nama File" id="floatingNama" autocomplete="off">
			<label for="floatingNama">Nama File</label>
		</div> -->
		<div class="form-group">
			<button class="btn btn-primary btn-block"><i class="fas fa-save"></i> Simpan</button>
		</div>
	</form>
	<?php
}
?>