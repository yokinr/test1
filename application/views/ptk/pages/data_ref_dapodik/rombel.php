<?php
if($rombel){
	?>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Tingkat</th>
					<th>Jenis Rombel</th>
					<th>Kurikulum</th>
					<th>Walas</th>
					<th>Tampil Data</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($rombel as $key => $value) {
					$key++;
					echo "<tr>";
					echo "<td>$key</td>";
					echo "<td>$value->nama</td>";
					echo "<td>$value->tingkat_pendidikan_id</td>";
					echo "<td>$value->jenis_rombel_str</td>";
					echo "<td>$value->kurikulum_id_str</td>";
					echo "<td>$value->ptk_id_str</td>";
					$detail_value = $this->encryption->encrypt(json_encode($value));
					echo "<td class='text-center'>
					<button class='btn btn-link btn-sm text-primary tombol-1' id='detail_value' data-id='$detail_value'><i class='fas fa-eye'></i></button>
					<button class='btn btn-outline-dark tombol-1' id='anggota_rombel' data-id='$detail_value'><i class='fas fa-child'></i></button>
					</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
	<?php
}else{
	echo "<div class='alert alert-info'>0 Results</div>";
}