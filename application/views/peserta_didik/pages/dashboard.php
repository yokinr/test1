<?php
// echo "<pre>";
// print_r ($this->session->all_userdata());
// echo "</pre>";
?>
<div class="text-end mb-3">
	<button class="btn btn-primary tombol-1" id="perubahan_data" data-id="<?= $this->encryption->encrypt(json_encode($this->session->all_userdata())) ?>" md-v="modal-md"><i class="fas fa-edit"></i> Ajukan Perubahan Data</button>
</div>
<div class="row">
	<div class="col">
		<div class="card">
			<div class="card-header">
				<div class="card-title"><h3><i class="fas fa-id-card-alt"></i> Data Peserta Didik</h3></div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<h4>Data Pribadi</h4>
					<table class="table">
						<tr>
							<td>Nama</td>
							<td><?= $this->session->userdata('nama'); ?></td>
						</tr>
						<tr>
							<td>NISN</td>
							<td><?= $this->session->userdata('nisn'); ?></td>
						</tr>
						<tr>
							<td>NIPD</td>
							<td><?= $this->session->userdata('nipd'); ?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td><?= $this->session->userdata('nik'); ?></td>
						</tr>
						<tr>
							<td>Nomor KK</td>
							<td><?= $this->session->userdata('no_kk'); ?></td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td><?= $this->session->userdata('jenis_kelamin'); ?></td>
						</tr>
						<tr>
							<td>Tempat/Tanggal Lahir</td>
							<td><?= $this->session->userdata('tempat_lahir').' / '.date('d-m-Y', strtotime($this->session->userdata('tanggal_lahir'))) ?></td>
						</tr>
						<tr>
							<td>Agama</td>
							<td><?= $this->session->userdata('agama_id_str'); ?></td>
						</tr>
						<tr>
							<td>No Telp Seluler</td>
							<td><?= $this->session->userdata('nomor_telepon_seluler'); ?></td>
						</tr>
						<tr>
							<td>E-Mail</td>
							<td><?= $this->session->userdata('email'); ?></td>
						</tr>
						<tr>
							<td>Tinggi Badan</td>
							<td><?= $this->session->userdata('tinggi_badan'); ?></td>
						</tr>
						<tr>
							<td>Berat Badan</td>
							<td><?= $this->session->userdata('berat_badan'); ?></td>
						</tr>
						<tr>
							<td>Lingkar_Kepala</td>
							<td><?= $this->session->userdata('lingkar_kepala'); ?></td>
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
							<td><?= $this->session->userdata('anak_keberapa'); ?> (Berdasarkan KK)</td>
						</tr>
						<tr>
							<td>Jumlah Saudara</td>
							<td><?= $this->session->userdata('jml_saudara'); ?> (Berdasarkan KK)</td>
						</tr>
					</table>
				</div>

				<div class="table-responsive">
					<h4>Data Alamat</h4>
					<table class="table">
						<tr>
							<td>Alamat Jalan</td>
							<td><?= $this->session->userdata('alamat_jalan'); ?></td>
						</tr>
						<tr>
							<td>Dusun</td>
							<td><?= $this->session->userdata('Dusun'); ?></td>
						</tr>
						<tr>
							<td>RT</td>
							<td><?= $this->session->userdata('RT'); ?></td>
						</tr>
						<tr>
							<td>RW</td>
							<td><?= $this->session->userdata('RW'); ?></td>
						</tr><tr>
							<td>Kelurahan</td>
							<td><?= $this->session->userdata('Kelurahan'); ?></td>
						</tr>
						<tr>
							<td>Kecamatan</td>
							<td><?= $this->session->userdata('Kecamatan'); ?></td>
						</tr>
						<tr>
							<td>Kode POS</td>
							<td><?= $this->session->userdata('Kode_Pos'); ?></td>
						</tr>
						<tr>
							<td>Jenis Tinggal</td>
							<td><?= $this->session->userdata('Jenis_Tinggal'); ?></td>
						</tr>
						<tr>
							<td>Alat Transportasi</td>
							<td><?= $this->session->userdata('Alat_Transportasi'); ?></td>
						</tr>
						<tr>
							<td>Lintang</td>
							<td><?= $this->session->userdata('Lintang'); ?></td>
						</tr>
						<tr>
							<td>Bujur</td>
							<td><?= $this->session->userdata('Bujur'); ?></td>
						</tr>
					</table>
				</div>

				<div class="table-responsive">
					<h4>Data Registrasi</h4>
					<table class="table">
						<tr>
							<td>SKHUN</td>
							<td><?= $this->session->userdata('SKHUN'); ?></td>
						</tr>
						<tr>
							<td>No Peserta Ujian Nasional</td>
							<td><?= $this->session->userdata('No_Peserta_Ujian_Nasional'); ?></td>
						</tr>
						<tr>
							<td>No Seri Ijazah</td>
							<td><?= $this->session->userdata('No_Seri_Ijazah'); ?></td>
						</tr>
						<tr>
							<td>No Registrasi Akta Lahir</td>
							<td><?= $this->session->userdata('No_Registrasi_Akta_Lahir'); ?></td>
						</tr>
						<tr>
							<td>Tanggal Masuk Sekolah</td>
							<td><?= date('d-m-Y', strtotime($this->session->userdata('tanggal_masuk_sekolah'))); ?></td>
						</tr>
						<tr>
							<td>Jenis Pendaftaran</td>
							<td><?= $this->session->userdata('jenis_pendaftaran_id_str'); ?></td>
						</tr>
						<tr>
							<td>Sekolah Asal</td>
							<td><?= $this->session->userdata('sekolah_asal'); ?></td>
						</tr>
					</table>
				</div>

				<div class="table-responsive">
					<h4>Data Kesejahteraan</h4>
					<table class="table">
						<tr>
							<td>Penerima KPS</td>
							<td><?= $this->session->userdata('Penerima_KPS'); ?></td>
						</tr>
						<tr>
							<td>Nomor KPS</td>
							<td><?= $this->session->userdata('Nomor_KPS'); ?></td>
						</tr>
						<tr>
							<td>Penerima KIP</td>
							<td><?= $this->session->userdata('Penerima_KIP'); ?></td>
						</tr>
						<tr>
							<td>Nomor KIP</td>
							<td><?= $this->session->userdata('Nomor_KIP'); ?></td>
						</tr>
						<tr>
							<td>Nama_di_KIP</td>
							<td><?= $this->session->userdata('Nama_di_KIP'); ?></td>
						</tr>
						<tr>
							<td>Nomor KKS</td>
							<td><?= $this->session->userdata('Nomor_KKS'); ?></td>
						</tr>
						<tr>
							<td>Layak PIP (Usulan dari Sekolah)</td>
							<td><?= $this->session->userdata('Layak_PIP_usulan_dari_sekolah'); ?></td>
						</tr>
						<tr>
							<td>Alasan Layak PIP</td>
							<td><?= $this->session->userdata('Alasan_Layak_PIP'); ?></td>
						</tr>
						<tr>
							<td>Kebutuhan_Khusus</td>
							<td><?= $this->session->userdata('Kebutuhan_Khusus'); ?></td>
						</tr>
					</table>
				</div>

			</div>
		</div>
	</div>
	<div class="col">
		<div class="card">
			<div class="card-header">
				<div class="card-title"><h3><i class="fas fa-id-card-alt"></i> Data Orang Tua</h3></div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<h4>Data Ayah</h4>
					<table class="table">
						<tr>
							<td>Nama</td>
							<td><?= $this->session->userdata('nama_ayah'); ?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td><?= $this->session->userdata('NIK_Ayah'); ?></td>
						</tr>
						<tr>
							<td>Tahun Lahir</td>
							<td><?= $this->session->userdata('Tahun_Lahir_Ayah'); ?></td>
						</tr>
						<tr>
							<td>Pendidikan</td>
							<td><?= $this->session->userdata('Jenjang_Pendidikan_Ayah'); ?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td><?= $this->session->userdata('pekerjaan_ayah_id_str'); ?></td>
						</tr>
						<tr>
							<td>Penghasilan</td>
							<td><?= $this->session->userdata('Penghasilan_Ayah'); ?></td>
						</tr>
					</table>
				</div>

				<div class="table-responsive">
					<h4>Data Ibu</h4>
					<table class="table">
						<tr>
							<td>Nama</td>
							<td><?= $this->session->userdata('nama_ibu'); ?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td><?= $this->session->userdata('NIK_Ibu'); ?></td>
						</tr>
						<tr>
							<td>Tahun Lahir</td>
							<td><?= $this->session->userdata('Tahun_Lahir_Ibu'); ?></td>
						</tr>
						<tr>
							<td>Pendidikan</td>
							<td><?= $this->session->userdata('Jenjang_Pendidikan_Ibu'); ?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td><?= $this->session->userdata('pekerjaan_ibu_id_str'); ?></td>
						</tr>
						<tr>
							<td>Penghasilan</td>
							<td><?= $this->session->userdata('Penghasilan_Ibu'); ?></td>
						</tr>
					</table>
				</div>

				<div class="table-responsive">
					<h4>Data Wali</h4>
					<table class="table">
						<tr>
							<td>Nama</td>
							<td><?= $this->session->userdata('nama_wali'); ?></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td><?= $this->session->userdata('NIK_Wali'); ?></td>
						</tr>
						<tr>
							<td>Tahun Lahir</td>
							<td><?= $this->session->userdata('Tahun_Lahir_Wali'); ?></td>
						</tr>
						<tr>
							<td>Pendidikan</td>
							<td><?= $this->session->userdata('Jenjang_Pendidikan_Wali'); ?></td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td><?= $this->session->userdata('pekerjaan_wali_id_str'); ?></td>
						</tr>
						<tr>
							<td>Penghasilan</td>
							<td><?= $this->session->userdata('Penghasilan_Wali'); ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>