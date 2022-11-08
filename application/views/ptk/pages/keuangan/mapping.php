<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>Tingkat Pendidikan</th>
				<th>Nama Rombel</th>
				<th>Wali Kelas</th>
				<th>Jumlah Pembayaran</th>
				<th>Detail</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($rombel as $key => $value): ?>
				<?php
				$dataID = $this->encryption->encrypt(json_encode($value));
				$detailMapping = $value->rombongan_belajar_id;
				$cekMapping = $this->m_keuangan->mapping($value->rombongan_belajar_id, $this->session->userdata('semester_id'));
				?>
				<tr>
					<td>
						<input type="checkbox" name="pilih_data[]" id="<?= $this->encryption->encrypt('iuran_mapping') ?>" data-id="<?= $dataID  ?>" class="form-check-input">
						<label><?= $value->nama ?></label>
					</td>
					<td><?= $value->tingkat_pendidikan_id ?></td>
					<td><?= $value->ptk_id_str ?></td>
					<td><?= count($cekMapping) ?></td>
					<td><button class="btn btn-sm btn-link tombol-1" id="iuran_cek_mapping" data-id="<?= $detailMapping ?>"><i class="fas fa-eye"></i></button></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>