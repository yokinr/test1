<?php
if($form){
	?>
	<div class="row">
		<div class="alert alert-primary text-center">Mohon maaf, fitur ini sedang dalam masa pengembangan.<br>Jika ada kesalahan dalam penulisan data silahkan hubungi segera Operator Dapodik Sekolah untuk melakukan perbaikan data.</div>
		<?php
		exit();
		?>
		<div class="col">
			<div class="table-responsive">
				<table class="table table-striped">
					<tr>
						<td>Nama</td>
						<td><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $form->nama ?>" required></td>
					</tr>
					<tr>
						<td>NISN</td>
						<td><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $form->nisn ?>" required></td>
					</tr>
					<tr>
						<td>NIPD</td>
						<td><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $form->nipd ?>" required></td>
					</tr>
					<tr>
						<td>NIK</td>
						<td><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $form->nik ?>" required></td>
					</tr>
					<tr>
						<td>Nomor KK</td>
						<td><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $form->no_kk ?>" required></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $form->jenis_kelamin ?>" required></td>
					</tr>
					<tr>
						<td>Tempat/Tanggal Lahir</td>
						<td><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $form->tempat_lahir ?>" required>
							<input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $form->tanggal_lahir ?>" required></td>
						</tr>
						<tr>
							<td>Agama</td>
							<td><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $form->agama_id_str ?>" required></td>
						</tr>
						<tr>
							<td>No Telp Seluler</td>
							<td><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $form->nomor_telepon_seluler ?>" required></td>
						</tr>
						<tr>
							<td>E-Mail</td>
							<td><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $form->email ?>" required></td>
						</tr>
						<tr>
							<td>Tinggi Badan</td>
							<td><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $form->tinggi_badan ?>" required></td>
						</tr>
						<tr>
							<td>Berat Badan</td>
							<td><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $form->berat_badan ?>" required></td>
						</tr>
						<tr>
							<td>Lingkar Kepala</td>
							<td><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $form->lingkar_kepala ?>" required></td>
						</tr>
						<tr>
							<td>Tingkat Pendidikan</td>
							<td><?= $this->session->userdata('tingkat_pendidikan_id'); ?></td>
						</tr>
						<tr>
							<td>Rombel</td>
							<td><?= $this->session->userdata('nama_rombel'); ?></td>
						</tr>
						<tr>
							<td>Kurikulum</td>
							<td><?= $this->session->userdata('kurikulum_id_str'); ?></td>
						</tr>
						<tr>
							<td>Anak Keberapa</td>
							<td><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $form->anak_keberapa ?>" required> (Berdasarkan KK)</td>
						</tr>
						<tr>
							<td>Jumlah Saudara</td>
							<td><input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= $form->jml_saudara ?>" required> (Berdasarkan KK)</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="col">
				Test
			</div>
		</div>
		<?php
	}else{
		echo "Terjadi kesalahan";
	}