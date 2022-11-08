<?php
if($kategori){
	$kategori = json_decode(json_encode($kategori));
	?>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr class="text-center">
					<th class='align-middle' rowspan="2">No</th>
					<th class='align-middle' rowspan="2">NISN</th>
					<th class='align-middle' rowspan="2">Nama</th>
					<th class='align-middle' rowspan="2">Rombel</th>
					<?php foreach ($kategori as $key => $value): ?>
						<?php
						echo "<th class='align-middle' class='text-wrap' colspan='2'>".$value->nama.'<br>'.number_format($value->nominal,0,',','.')."</th>";
						?>
					<?php endforeach ?>
				</tr>
				<tr class="text-center">
					<?php foreach ($kategori as $key => $value): ?>
						<th class='align-middle'>Tgl Bayar</th>
						<th class='align-middle'>Jml Bayar</th>
					<?php endforeach ?>
				</tr>
			</thead>
			<tbody>
				<?php
				if($this->input->post('cari')){
					$tanggal = $this->input->post('cari');
				}else{
					$tanggal = date('Y-m-d');
				}
				$this->db->distinct();
				$this->db->select('peserta_didik_id');
				$this->db->like('tanggal', $tanggal, 'BOTH');
				$pesertadidik = $this->db->get('iuran_pembayaran')->result();
				?>
				<?php foreach ($pesertadidik as $key => $value): $key++;?>
					<?php
					$pd = $this->m_data_ref_dapodik->getpesertadidik_byId($value->peserta_didik_id, $this->session->userdata('semester_id'));
					?>
					<tr>
						<td><?= $key ?></td>
						<td><?= $pd['nisn'] ?></td>
						<td><a href="<?= base_url('keuangan/detail_user/'.$value->peserta_didik_id) ?>"><?= $pd['nama'] ?></a></td>
						<td><?= $pd['nama_rombel'] ?></td>
						<?php foreach ($kategori as $key1 => $value1): ?>
							<?php
							$sql = $this->db->query("SELECT sum(nominal) as nominal, tanggal from iuran_pembayaran where peserta_didik_id='$value->peserta_didik_id' and uniq_iuran='$value1->uniq'")->row_array();
							if($sql['tanggal']){
								?>
								<td class="text-end"><?= date('d-m-Y', strtotime($sql['tanggal'])) ?></td>
								<td class="text-end"><?= number_format($sql['nominal'],0,',','.') ?></td>
								<?php
							}else{
								?>
								<td class="text-center">-</td>
								<td class="text-center">-</td>
								<?php
							}
							?>
						<?php endforeach ?>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<?php
}else{
	echo "<div class='alert alert-danger'>0 Results</div>";
}
?>