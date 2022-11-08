<?php
if($form){
	?>
	<div class="row">
		<div class="col">
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
		<div class="form-group mb-3">
			<button class="btn btn-primary btn-block"><i class="fas fa-upload"></i> Unggah</button>
		</div>
	</form>
</div>
<div class="col">
	<div class="alert alert-warning">
		Persyaratan dokumen yang diizinkan untuk diunggah:
		<ul class="list-group bg-waning">
			<li class="list-group-item d-flex justify-content-between align-items-center">Berextensi: Pdf, png, jpg, jpeg</li>
			<li class="list-group-item d-flex justify-content-between align-items-center">Dokumen berupa hasil scan bukan hasil foto</li>
			<li class="list-group-item d-flex justify-content-between align-items-center">Contoh dokumen yang diizinkan <span class="badge"><a href="https://intim.news/wp-content/uploads/2020/02/IMG_20200205_072354.jpg" target="_blank">Klik disini</a></span></li>
			<li class="list-group-item d-flex justify-content-between align-items-center">Contoh dokumen yang tidak diizinkan <span class="badge"><a href="https://s1.bukalapak.com/img/13342848752/s-330-330/data.jpeg.webp" target="_blank">Klik disini</a></span></li>
			<!-- <li class="list-group-item d-flex justify-content-between align-items-center">Boleh menggunakan aplikasi Scanner dari Hp <span class="badge"><a href="https://play.google.com/store/apps/details?id=com.intsig.camscanner" target="_blank">Download</a></span></li> -->
		</ul>
	</div>
</div>
</div>
<?php
}
?>