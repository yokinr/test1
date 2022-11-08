
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Jenis PTK</th>
				<th>NIP</th>
				<th>NIK</th>
				<th>NUPTK</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if($gtk){
				foreach ($gtk as $key => $value) {
					$key++;
					echo "<tr>";
					echo "<td>$key</td>";
					echo "<td>$value->nama</td>";
					echo "<td>$value->jenis_ptk_id_str</td>";
					echo "<td>$value->nip</td>";
					echo "<td>$value->nik</td>";
					echo "<td>$value->nuptk</td>";
					echo "</tr>";
				}
			}else{
				echo "<div class='alert alert-info'>0 Results</div>";
			}
			?>
		</tbody>
	</table>
</div>