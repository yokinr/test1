<?php
if($this->input->post('data')){
	$data = $this->input->post('data');
	$data = $this->encryption->decrypt($data);
	$data = json_decode($data, true);
	if(is_array($data)){
		?>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-responsive-sm table-sm">
				<?php foreach ($data as $key => $value): if($key!='id'&&$key!='password'&&$key!='sekolah_id'&&$key!='pengguna_id'&&$key!='tahun_ajaran_id'&&$key!='ptk_terdaftar_id'&&$key!='ptk_id'&&$key!='agama_id'&&$key!='jenis_ptk_id'&&$key!='status_kepegawaian_id'&&$key!='registrasi_id'&&$key!='jenis_pendaftaran_id'&&$key!='peserta_didik_id'&&$key!='anggota_rombel_id'&&$key!='rombongan_belajar_id'&&$key!='id_ruang'){ ?>
					<tr>
						<?php
						$key1 = str_replace(array('_id_str','_id','_'), ' ', $key);
						$key = ucwords($key1);
						?>
						<td><?= $key ?></td>
						<td><?= $value ?></td>
					</tr>
				<?php } endforeach ?>
			</table>
		</div>
		<?php
	}else{
		echo "Terjadi kesalahan sistem";
	}
}else{
	echo "Terjadi kesalahan sistem";
}