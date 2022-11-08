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
					<th>Ruang</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($rombel as $key => $value) {
					$key++;
					$detail_value = $this->encryption->encrypt(json_encode($value));
					echo "<tr>";
					echo "<td>$key</td>";
					echo "<td>$value->nama</td>";
					echo "<td>$value->tingkat_pendidikan_id</td>";
					echo "<td>$value->jenis_rombel_str</td>";
					echo "<td>$value->kurikulum_id_str</td>";
					echo "<td>$value->ptk_id_str</td>";
					echo "<td>$value->id_ruang_str</td>";
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