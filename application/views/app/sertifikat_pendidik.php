<?php
foreach ($sertifikat_pendidik as $key => $value) {
	?>
	<div class="mb-3">
		<?php
		$this->db->order_by('tahun_ajaran_id', 'desc');
		$cek_getk = $this->db->get_where('getgtk', array('ptk_id'=>$value->ptk_id))->row_array();
		$nomor_sertifikat = $this->db->get_where('sertifikat_pendidik', array('ptk_id' => $value->ptk_id))->result();
		?>
		<div class="p-2 bg-primary text-light fw-bold"><?= $cek_getk['nama'] ?></div>
		<table class="table">
			<?php foreach ($nomor_sertifikat as $key1 => $value1): ?>
				<?php
				echo $kode_sertifikat = substr($value1->nomor_sertifikat, 5, 3);
				$penataan_linearitas = $this->db->get_where('penataan_linearitas', array('kode_sertifikat'=>$kode_sertifikat))->result();
				$jml = count($penataan_linearitas)+1;
				?>
				<tr>
					<td rowspan="<?= $jml ?>"><?= $value1->nomor_sertifikat ?></td>
					<?php foreach ($penataan_linearitas as $key2 => $value2): ?>
						<tr>
							<td><?= $value2->program_keahlian ?></td>
							<td><?= $value2->nama_mapel ?></td>
						</tr>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
	<?php
}
