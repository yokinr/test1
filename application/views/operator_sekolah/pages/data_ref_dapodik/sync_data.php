
<table class="table">
	<tr>
		<td>
			<?php
			$json = json_encode($sekolah);
			$encrypt = $this->encryption->encrypt($json);
			?>
			<input type="checkbox" class="form-check-input" name="pilih_data[]" data-id="<?= $encrypt ?>" id='getsekolah'>
			<label for="sekolah" class="form-check-label">Sekolah</label>
		</td>
		<td><?= count($sekolah) ?></td>
		<td class="text-center">
			<button class="btn btn-success getData" data-id="getSekolah"><i class="fas fa-sync-alt"></i></button>
		</td>
	</tr>
	<tr>
		<td>
			<?php
			$json1 = json_encode($gtk);
			$encrypt1 = $this->encryption->encrypt($json1);
			?>
			<input type="checkbox" class="form-check-input" name="pilih_data[]" data-id="<?= $encrypt1 ?>" id='getgtk'>
			<label for="getgtk" class="form-check-label">PTK</label>
		</td>
		<td><?= count($gtk) ?></td>
		<td class="text-center">
			<button class="btn btn-success getData" data-id="getGtk"><i class="fas fa-sync-alt"></i></button>
		</td>
	</tr>
	<tr>
		<td>
			<?php
			$json2 = json_encode($rwy_pend_formal);
			$encrypt2 = $this->encryption->encrypt($json2);
			?>
			<input type="checkbox" class="form-check-input" name="pilih_data[]" data-id="<?= $encrypt2 ?>" id='rwy_pend_formal'>
			<label for="rwy_pend_formal" class="form-check-label">Rwy Pendidikan Formal</label>
		</td>
		<td><?= count($rwy_pend_formal) ?></td>
		<td></td>
	</tr>
	<tr>
		<td>
			<?php
			$json3 = json_encode($rwy_kepangkatan);
			$encrypt3 = $this->encryption->encrypt($json3);
			?>
			<input type="checkbox" class="form-check-input" name="pilih_data[]" data-id="<?= $encrypt3 ?>" id='rwy_kepangkatan'>
			<label for="rwy_kepangkatan" class="form-check-label">Rwy Kepangkatan</label>
		</td>
		<td><?= count($rwy_kepangkatan) ?></td>
		<td></td>
	</tr>
	<tr>
		<td>
			<?php
			$json4 = json_encode($pd);
			$encrypt4 = $this->encryption->encrypt($json4);
			?>
			<input type="checkbox" class="form-check-input" name="pilih_data[]" data-id="<?= $encrypt4 ?>" id='getpesertaDidik'>
			<label for="getpesertaDidik" class="form-check-label">Peserta Didik</label>
		</td>
		<td><?= count($pd) ?></td>
		<td class="text-center">
			<button class="btn btn-success getData" data-id="getPesertaDidik"><i class="fas fa-sync-alt"></i></button>
		</td>
	</tr>
	<tr>
		<td>
			<?php
			$json5 = json_encode($rombel);
			$encrypt5 = $this->encryption->encrypt($json5);
			?>
			<input type="checkbox" class="form-check-input" name="pilih_data[]" data-id="<?= $encrypt5 ?>" id='getrombonganbelajar'>
			<label for="getrombonganbelajar" class="form-check-label">Rombongan Belajar</label>
		</td>
		<td><?= count($rombel) ?></td>
		<td class="text-center">
			<button class="btn btn-success getData" data-id="getRombonganBelajar"><i class="fas fa-sync-alt"></i></button>
		</td>
	</tr>
	<tr>
		<td>
			<?php
			$json6 = json_encode($anggota_rombel);
			$encrypt6 = $this->encryption->encrypt($json6);
			?>
			<input type="checkbox" class="form-check-input" name="pilih_data[]" data-id="<?= $encrypt6 ?>" id='anggota_rombel'>
			<label for="anggota_rombel" class="form-check-label">Anggota Rombel</label>
		</td>
		<td><?= count($anggota_rombel) ?></td>
		<td></td>
	</tr>
	<tr>
		<td>
			<?php
			$json7 = json_encode($pembelajaran);
			$encrypt7 = $this->encryption->encrypt($json7);
			?>
			<input type="checkbox" class="form-check-input" name="pilih_data[]" data-id="<?= $encrypt7 ?>" id='pembelajaran'>
			<label for="pembelajaran" class="form-check-label">Pembelajaran</label>
		</td>
		<td><?= count($pembelajaran) ?></td>
		<td></td>
	</tr>
	<tr>
		<td>
			<?php
			$json8 = json_encode($kurikulum);
			$encrypt8 = $this->encryption->encrypt($json8);
			?>
			<input type="checkbox" class="form-check-input" id='kurikulum' disabled>
			<label for="kurikulum" class="form-check-label">Kurikulum</label>
		</td>
		<td><?= count($kurikulum) ?></td>
		<td></td>
	</tr>
	<tr>
		<td>
			<?php
			$json9 = json_encode($pengguna);
			$encrypt9 = $this->encryption->encrypt($json9);
			?>
			<input type="checkbox" class="form-check-input" name="pilih_data[]" data-id="<?= $encrypt9 ?>" id='getpengguna'>
			<label for="pengguna" class="form-check-label">Pengguna</label>
		</td>
		<td><?= count($pengguna) ?></td>
		<td class="text-center"><button class="btn btn-success getData" data-id="getPengguna"><i class="fas fa-sync-alt"></i></button></td>
	</tr>
</table>