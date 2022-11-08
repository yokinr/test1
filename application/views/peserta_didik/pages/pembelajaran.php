<?php
if($pembelajaran){
	// echo "<pre>";
	// print_r ($pembelajaran);
	// echo "</pre>";
	// exit();
	?>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<td>No</td>
				<!-- <th>Tingkat Pendidikan</th>
					<th>Nama Rombel</th> -->
					<th>Kode Matpel</th>
					<th>Nama Matpel</th>
					<th>PTK</th>
					<th>JJM</th>
					<th>Status di Kurikulum</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($pembelajaran as $key => $value): $key++; ?>
					<?php
					$jjm[] = $value->jam_mengajar_per_minggu;
					?>
					<tr>
						<td><?= $key ?></td>
					<!-- <td><?= $value->tingkat_pendidikan_id ?></td>
						<td><?= $value->nama_rombel ?></td> -->
						<td><?= $value->mata_pelajaran_id ?></td>
						<td><?= $value->mata_pelajaran_id_str ?></td>
						<td><?= $value->nama ?></td>
						<td><?= $value->jam_mengajar_per_minggu ?></td>
						<td><?= $value->status_di_kurikulum_str ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4">Total</td>
					<td><?= array_sum($jjm) ?></td>
				</tr>
			</tfoot>
		</table>
	</div>
	<?php
}