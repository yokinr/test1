<?php
$json = $this->encryption->decrypt($this->input->post('data'));
$dataArray = json_decode($json, true);
$peserta_didik_id = $dataArray['peserta_didik_id'];
$upload_file = $this->db->get('upload_file', array('pengguna_id'=>$peserta_didik_id))->result();
if($upload_file){
	?>
	<div class="alert alert-info">
		Pastikan data yang diajukan sesuai dengan Kartu Keluarga, Ijazah SD/SMP/MTs
	</div>
	<form>
		<input type="hidden" name="page" value="pengajuan_perbaikan_data_pd">
		<?php foreach ($dataArray as $key => $value): ?>
			<?php if($key != '__ci_last_regenerate'&&$key != 'id'&&$key != 'pengguna_id'&&$key != 'peserta_didik_id'&&$key != 'sekolah_id'&&$key != 'peran_id_str'&&$key != 'ptk_id'&&$key != 'registrasi_id'&&$key != 'jenis_pendaftaran_id'&&$key != 'jenis_pendaftaran_id_str'&&$key != 'tanggal_masuk_sekolah'&&$key != 'agama_id'&&$key != 'pekerjaan_ayah_id'&&$key != 'pekerjaan_ibu_id'&&$key != 'pekerjaan_wali_id'&&$key != 'semester_id'&&$key != 'anggota_rombel_id'&&$key != 'rombongan_belajar_id'&&$key != 'tingkat_pendidikan_id'&&$key != 'kurikulum_id'&&$key != 'kurikulum_id_str'&&$key != 'password'&&$key != 'nama_rombel'&&$key != 'username'&&$key != 'alamat'&&$key != 'no_telepon'&&$key != 'no_hp'){ ?>
				<?php
				$key2 = ucwords(str_replace(array('_str','_id','_'), ' ', $key));
				?>
				<div class="form-floating mb-1">
					<input type="text" name="<?= $key ?>" id="float<?=$key2?>" class="form-control" placeholder="<?= $key2 ?>" value="<?= $value ?>">
					<label for="float<?=$key2?>"><?= $key2 ?></label>
				</div>
				<?php 
			}else{
				if($key=='peserta_didik_id'){
					?>
					<input type="hidden" name="<?= $key ?>" value="<?= $value ?>">
					<?php
				}
			}
			?>
		<?php endforeach ?>
		<div class="form-floating mb-1">
			<textarea class="form-control" name="komentar" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
			<label for="floatingTextarea">Comments</label>
		</div>
		<div class="d-grid gap-2">
			<button class="btn btn-primary btn-block"><i class="fas fa-save"></i> Kirim</button>
		</div>
	</form>
	<?php
}else{
	echo "<div class='alert alert-danger'>Untuk pengajuan perubahan data, silahkan unggah dokumen yang dibutuhkan pada menu <a href=".base_url('media_penyimpanan')."><i class='fas fa-link'></i> Media Penyimpanan</a> terlebih dahulu.</div>";
}