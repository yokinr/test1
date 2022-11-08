<?php
if($mapping){
	$bulan = $this->bulan->nama_bulan();
	if($peserta_didik){
		$semester = substr($this->session->userdata('semester_id'), 4);
		if($semester=='1'){
			$start = 6; $end = 12;
		}else{
			$start = 1; $end = 6;
		}
		?>
		<div class="table-responsive">
			<table class="table table-bordered table-striped table-sm">
				<thead>
					<tr class="text-center">
						<th class='align-middle' rowspan="3">No</th>
						<th class='align-middle' rowspan="3">Nama</th>
						<th class='align-middle' rowspan="3">NISN</th>
						<th class='align-middle' rowspan="3">JK</th>
						<?php foreach ($mapping as $key => $value): ?>
							<?php
							$detail_mapping = $this->m_keuangan->detail_mapping($value->uniq_iuran);
							if($detail_mapping['jenis_iuran']==2){
								echo "<th class='align-middle' colspan='2'>".$detail_mapping['nama']."</th>";
							}else
							if($detail_mapping['jenis_iuran']==1){
								for ($i=$start; $i <= $end; $i++) { 
									echo "<th class='align-middle' colspan='2'>".$bulan[$i]."</th>";
								}
							}
							?>
						<?php endforeach ?>
					</tr>
					<tr class="text-center">
						<?php foreach ($mapping as $key => $value): ?>
							<?php
							$detail_mapping = $this->m_keuangan->detail_mapping($value->uniq_iuran);
							if($detail_mapping['jenis_iuran']==1){
								for ($i=$start; $i <= $end; $i++) { 
									?>
									<th class='align-middle'>Tgl</th>
									<th class='align-middle'>Jml</th>
									<?php
								}
							}else{
								?>
								<th class='align-middle'>Tgl Bayar</th>
								<th class='align-middle'>Jml Bayar</th>
								<?php
							}
							?>
						<?php endforeach ?>
					</tr>
				</thead>
				<?php foreach ($peserta_didik as $key => $value): $key++; ?>
					<tr>
						<td><?= $key ?></td>
						<td><?= $value->nama ?></td>
						<td><?= $value->nisn ?></td>
						<td><?= $value->jenis_kelamin ?></td>
						<?php
						if($mapping){
							?>
							<?php foreach ($mapping as $key1 => $value1): ?>
								<?php
								$detail_mapping = $this->m_keuangan->detail_mapping($value1->uniq_iuran);
								if($detail_mapping['jenis_iuran']=='2'){
									$cek_pembayaran_perItem = $this->m_keuangan->cek_pembayaran_perItem($value->peserta_didik_id, $detail_mapping['uniq']);
									if($cek_pembayaran_perItem['tanggal']){
										?>
										<td class="text-end"><?= date('d-m-Y', strtotime($cek_pembayaran_perItem['tanggal'])) ?></td>
										<td class="text-end"><?= number_format($cek_pembayaran_perItem['nominal'],0,',','.') ?></td>
										<?php
									}else{
										?>
										<td class="text-end">-</td>
										<td class="text-end">-</td>
										<?php
									}
								}else
								if($detail_mapping['jenis_iuran']=='1'){
									for ($i=$start; $i <= $end; $i++) { 
										$cek_pembayaran_rutin = $this->m_keuangan->cek_pembayaran_rutin($value->peserta_didik_id, $detail_mapping['uniq'], $i, $this->session->userdata('semester_id'));
										if($cek_pembayaran_rutin->tanggal){
											?>
											<td class="text-end"><?= date('d-m-Y', strtotime($cek_pembayaran_rutin->tanggal)) ?></td>
											<td class="text-end"><?= number_format($cek_pembayaran_rutin->nominal,0,',','.') ?></td>
											<?php
										}else{
											?>
											<td class="text-end">-</td>
											<td class="text-end">-</td>
											<?php
										}
									}
								}
								?>
							<?php endforeach ?>
							<?php
						}
						?>
					</tr>
				<?php endforeach ?>
			</table>
		</div>
		<?php
	}else{
		echo "Rombel ini belum memiliki data peserta didik";
	}
}else{
	echo "Rombel ini belum memiliki data iuran";
}
?>