<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Jenis Transaksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($cara_bayar as $key => $value): ?>
				<?php
				$dataID = $this->encryption->encrypt(json_encode($value));
				?>
				<tr>
					<td><?= $value->nama ?></td>
					<td><?= $value->jenis_transaksi ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>