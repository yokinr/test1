
<div class="table-responsive">
	<table class="table">
		<?php
		foreach ($this->session->all_userdata() as $key => $value) {
			if($key!='akun'){
				if($key!='id'&&$key!='__ci_last_regenerate'&&$key!='sekolah_id'&&$key!='ptk_id'&&$key!='pengguna_id'&&$key!='ptk_terdaftar_id'&&$key!='password'&&$key!='peserta_didik_id'&&$key!='registrasi_id'&&$key!='anggota_rombel_id'&&$key!='rombongan_belajar_id'&&$key!='kurikulum_id'&&$key!='agama_id'&&$key!='pekerjaan_ayah_id'&&$key!='pekerjaan_ibu_id'&&$key!='pekerjaan_wali_id'&&$key!='jenis_ptk_id'){
					echo "<tr>";
					echo "<td>".ucwords(str_replace(array('_str','_id','_'), ' ', $key))."</td>";
					echo "<td>$value</td>";
					echo "</tr>";
				}
			}
		}
		?>
	</table>
</div>