<?php
if($rombel){
	?>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Tingkat</th>
					<th>Nama Rombel</th>
					<th>Link</th>
				</tr>
			</thead>
			<?php foreach ($rombel as $key => $value): $key++; ?>
				<?php
				$dataID = $this->encryption->encrypt(json_encode($value));
				?>
				<tr>
					<td><?= $key ?></td>
					<td><?= $value->tingkat_pendidikan_id ?></td>
					<td><?= $value->nama ?></td>
					<td><a class="btn btn-link btn-sm" href="<?= base_url('keuangan/detail_rombel/'.$value->rombongan_belajar_id) ?>"><i class="fas fa-link"></i></a></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
	<?php
}