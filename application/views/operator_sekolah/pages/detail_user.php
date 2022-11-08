<?php
if($user){
	$user_id = $user['peserta_didik_id'];
	?>
	<div class="row">
		<div class="col-5">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<td>Nama</td>
						<td><?= $user['nama'] ?></td>
					</tr>
					<tr>
						<td>Rombel</td>
						<td><?= $user['nama_rombel'] ?></td>
					</tr>
				</table>
			</div>
		</div>
		<?php
		if($mapping){
			?>
			<div class="col-7">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Nominal</th>
								<th>Semester ID</th>
								<th>Tanggal Bayar</th>
								<th>Jumlah Bayar</th>
								<th>Opsi</th>
							</tr>
						</thead>
						<?php
						$no=0;
						foreach ($mapping as $key => $value) {
							$no++;
							foreach ($value as $key1 => $value1) {
								$rombongan_belajar_id = $value1->rombongan_belajar_id;
								$uniq_iuran = $value1->uniq_iuran;
								$detail_mapping = $this->m_iuran->detail_mapping($uniq_iuran);
								$detail_iuran = json_decode(json_encode($detail_mapping));
								if($detail_iuran->jenis_iuran=='2'){
									$cek_pembayaran_perItem = $this->m_iuran->cek_pembayaran_perItem($user_id, $value1->uniq_iuran);
									$nominalBayar = $detail_iuran->nominal - $cek_pembayaran_perItem['nominal'];
									$object = array(
										'peserta_didik_id' => $user_id,
										'uniq_iuran' => $value1->uniq_iuran,
										'semester_id' => $value1->semester_id,
										'nominal' => $nominalBayar
									);
									$dataID = $this->encryption->encrypt(json_encode($object));
									?>
									<tr>
										<td><?= $no ?></td>
										<td><?= $detail_iuran->nama ?></td>
										<td class="text-right">Rp. <?= number_format($detail_iuran->nominal,0,',','.') ?></td>
										<td><?= $value1->semester_id ?></td>
										<?php
										if($cek_pembayaran_perItem['tanggal']){
											?>
											<td><?= $cek_pembayaran_perItem['tanggal'] ?></td>
											<?php
											if($cek_pembayaran_perItem['nominal'] < $detail_iuran->nominal){
												?>
												<td class="text-right text-danger">Rp. <?= number_format($cek_pembayaran_perItem['nominal'],0,',','.') ?></td>
												<td><button class="btn btn-link btn-sm tombol-1" id="iuran_tambah_pembayaran_perItem" data-id="<?= $dataID ?>"><i class="fas fa-plus-circle"></i></button></td>
												<?php
											}else{
												?>
												<td class="text-right text-primary">Rp. <?= number_format($cek_pembayaran_perItem['nominal'],0,',','.') ?></td>
												<?php
											}
										}else{
											?>
											<td>-</td>
											<td>-</td>
											<td><button class="btn btn-link btn-sm tombol-1" id="iuran_tambah_pembayaran_perItem" data-id="<?= $dataID ?>"><i class="fas fa-plus-circle"></i></button></td>
											<?php
										}
										?>
										
									</tr>
									<?php
								}
							}
						}
						?>
					</table>
				</div>
			</div>
			<?php
		}
		if($mapping){
			echo "<div class='col-12'>";
			echo "<div class='row'>";
			foreach ($mapping as $key => $value) {
				foreach ($value as $key1 => $value1) {
					$bulan = $this->bulan->nama_bulan();
					$uniq_iuran = $value1->uniq_iuran;
					$detail_mapping = $this->m_iuran->detail_mapping($uniq_iuran);
					$detail_iuran = json_decode(json_encode($detail_mapping));
					if($detail_iuran->jenis_iuran=='1'){
						?>
						<div class="col border p-2">
							<h5 class="text-center"><?= $detail_iuran->nama.' '.$value1->semester_id ?></h5>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>Pilih</th>
											<th>Bulan</th>
											<th>Nominal</th>
											<th>Tanggal Bayar</th>
											<th>Jumlah Bayar</th>
										</tr>
									</thead>
									<?php
									$semester = substr($value1->semester_id, 4);
									if($semester=='1'){
										for ($i=7; $i < 13; $i++) { 
											$cek_pembayaran_rutin = $this->m_iuran->cek_pembayaran_rutin($user_id, $value1->uniq_iuran, $i, $value1->semester_id);
											$object1 = array(
												'peserta_didik_id' => $user_id,
												'uniq_iuran' => $value1->uniq_iuran,
												'bulan_rutin' => $i,
												'nominal' => $detail_iuran->nominal,
												'semester_id' => $value1->semester_id
											);
											$dataID1 = $this->encryption->encrypt(json_encode($object1));
											?>
											<tr>
												<td><input type="checkbox" name="pilih_data[]" id="<?= $this->encryption->encrypt('iuran_pembayaran') ?>" data-id="<?= $dataID1 ?>" class="form-check-input form-check"></td>
												<td><?= $bulan[$i] ?></td>
												<td><?= number_format($detail_iuran->nominal,0,',','.') ?></td>
												<?php
												if ($cek_pembayaran_rutin->tanggal){
													?>
													<td><?= $cek_pembayaran_rutin->tanggal ?></td>
													<td><?= $cek_pembayaran_rutin->nominal ?></td>
													<?php
												}else{
													?>
													<td>-</td>
													<td>-</td>
													<?php
												}
												?>
											</tr>
											<?php
										}
									}
									if($semester=='2'){
										for ($j=1; $j < 7; $j++) { 
											$cek_pembayaran_rutin = $this->m_iuran->cek_pembayaran_rutin($user_id, $value1->uniq_iuran, $j, $value1->semester_id);
											$object2 = array(
												'peserta_didik_id' => $user_id,
												'uniq_iuran' => $value1->uniq_iuran,
												'bulan_rutin' => $j,
												'nominal' => $detail_iuran->nominal,
												'semester_id' => $value1->semester_id
											);
											$dataID2 = $this->encryption->encrypt(json_encode($object2));
											?>
											<tr>
												<td><input type="checkbox" name="pilih_data[]" id="<?= $this->encryption->encrypt('iuran_pembayaran') ?>" data-id="<?= $dataID2 ?>" class="form-check-input form-check"></td>
												<td><?= $bulan[$j] ?></td>
												<td><?= number_format($detail_iuran->nominal,0,',','.') ?></td>
												<?php
												if ($cek_pembayaran_rutin->tanggal){
													?>
													<td><?= $cek_pembayaran_rutin->tanggal ?></td>
													<td><?= $cek_pembayaran_rutin->nominal ?></td>
													<?php
												}else{
													?>
													<td>-</td>
													<td>-</td>
													<?php
												}
												?>
											</tr>
											<?php
										}
									}
									?>
								</table>
							</div>
						</div>
						<?php
					}
				}
			}
			echo "</div>";
			echo "</div>";
		}
		?>
	</div>
	<?php
}else{
	echo "Tidak ditemukan data User";
}