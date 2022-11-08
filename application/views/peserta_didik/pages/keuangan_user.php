<?php
if($user){
	?>
	<div class="row">
		<div class="col">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<td>Nama</td>
						<td><?= $user['nama'] ?></td>
					</tr>
					<tr>
						<td>NISN</td>
						<td><?= $user['nisn'] ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td><?= $user['jenis_kelamin'] ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="col">
			<div class="table-responsive">
				<table class="table">
					<tr>
						<td>Tingkat Pendidikan</td>
						<td><?= $user['tingkat_pendidikan_id'] ?></td>
					</tr>
					<tr>
						<td>Rombel</td>
						<td><?= $user['nama_rombel'] ?></td>
					</tr>
					<tr>
						<td>Kurikulum</td>
						<td><?= $user['kurikulum_id_str'] ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<?php
	if($mapping){
		?>
		<div class="row">
			<div class="col-12">
				<div class="table-responsive">
					<table class="table">
						<?php foreach ($mapping as $key => $value): ?>
							<?php
							foreach ($value as $key1 => $value1) {
								$uniq_iuran = $value1->uniq_iuran;
								$detail_mapping = $this->m_keuangan->detail_mapping($uniq_iuran);
								if($detail_mapping['jenis_iuran']=='2'){
									$cek_pembayaran_perItem = $this->m_keuangan->cek_pembayaran_perItem($user['peserta_didik_id'], $uniq_iuran);
									?>
									<tr>
										<td><?= $detail_mapping['nama'] ?></td>
										<td><?= $detail_mapping['nominal'] ?></td>
										<?php
										if($cek_pembayaran_perItem['tanggal']){
											if($cek_pembayaran_perItem['nominal'] < $detail_mapping['nominal']){
												?>
												<td><?= $cek_pembayaran_perItem['tanggal'] ?></td>
												<td class='text-danger'><?= number_format($cek_pembayaran_perItem['nominal'],0,',','.') ?></td>
												<?php
											}else{
												?>
												<td><?= $cek_pembayaran_perItem['tanggal'] ?></td>
												<td class="text-primary"><?= number_format($cek_pembayaran_perItem['nominal'],0,',','.') ?></td>
												<?php
											}
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
						<?php endforeach ?>
					</table>
				</div>
			</div>
			<?php foreach ($mapping as $key => $value): ?>
				<?php
				foreach ($value as $key1 => $value1) {
					$uniq_iuran = $value1->uniq_iuran;
					$detail_mapping = $this->m_keuangan->detail_mapping($uniq_iuran);
					if($detail_mapping['jenis_iuran']=='1'){
						$bulan = $this->bulan->nama_bulan();
						$semester = substr($value1->semester_id, 4);
						?>
						<div class="col border p-2 m-2">
							<div class="text-center m-1">
								<label><?= $detail_mapping['nama'].' '.$value1->semester_id ?></label>
							</div>
							<table class="table">
								<head>
									<tr>
										<th>Bulan</th>
										<th>Nominal</th>
										<th>Tanggal Bayar</th>
										<th>Jumlah Bayar</th>
									</tr>
								</head>
								<tbody>
									<?php
									if($semester=='1'){
										for ($i=7; $i < 13; $i++) { 
											$cek_pembayaran_rutin = $this->m_keuangan->cek_pembayaran_rutin($user['peserta_didik_id'], $uniq_iuran, $i, $value1->semester_id)
											?>
											<tr>
												<td><?= $bulan[$i] ?></td>
												<td class="text-end"><?= number_format($detail_mapping['nominal'],0,',','.') ?></td>
												<?php
												if($cek_pembayaran_rutin->tanggal){
													if($cek_pembayaran_rutin->nominal < $detail_mapping['nominal']){
														?>
														<td class="text-end"><?=  $cek_pembayaran_rutin->tanggal ?></td>
														<td class="text-end text-danger"><?=  number_format($cek_pembayaran_rutin->nominal,0,',','.') ?></td>
														<?php
													}else{
														?>
														<td class="text-end"><?=  $cek_pembayaran_rutin->tanggal ?></td>
														<td class="text-end"><?=  number_format($cek_pembayaran_rutin->nominal,0,',','.') ?></td>
														<?php
													}
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
										for ($i=1; $i < 7; $i++) { 
											$cek_pembayaran_rutin = $this->m_keuangan->cek_pembayaran_rutin($user['peserta_didik_id'], $uniq_iuran, $i, $value1->semester_id)
											?>
											<tr>
												<td><?= $bulan[$i] ?></td>
												<td class="text-end"><?= number_format($detail_mapping['nominal'],0,',','.') ?></td>
												<?php
												if($cek_pembayaran_rutin->tanggal){
													if($cek_pembayaran_rutin->nominal < $detail_mapping['nominal']){
														?>
														<td class="text-end"><?=  $cek_pembayaran_rutin->tanggal ?></td>
														<td class="text-end text-danger"><?=  number_format($cek_pembayaran_rutin->nominal,0,',','.') ?></td>
														<?php
													}else{
														?>
														<td class="text-end"><?=  $cek_pembayaran_rutin->tanggal ?></td>
														<td class="text-end"><?=  number_format($cek_pembayaran_rutin->nominal,0,',','.') ?></td>
														<?php
													}
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
								</tbody>
							</table>
						</div>
						<?php
					}
				}
				?>
			<?php endforeach ?>
		</div>
		<?php
	}else{
		echo "Belum ada data iuran";
	}
}else{
	echo "Gagal menemukan data user";
}