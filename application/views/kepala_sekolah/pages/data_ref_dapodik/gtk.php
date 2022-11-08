<?php
if($gtk){
	?>
	<div class="card">
		<div class="card-header">
			<div class="card-title"><i class="fas fa-border-all"></i> <?= $title ?></div>
		</div>
		<div class="card-body">
			<table>
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Jenis PTK</th>
						<th>NIP</th>
						<th>NIK</th>
						<th>NUPTK</th>
						<th>Ditel</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($gtk as $key => $value) {
						$key++;
						echo "<tr>";
						echo "<td>$key</td>";
						echo "<td>$value->nama</td>";
						echo "<td>$value->jenis_ptk_id_str</td>";
						echo "<td>$value->nip</td>";
						echo "<td>$value->nik</td>";
						echo "<td>$value->nuptk</td>";
						$detail_value = $this->encryption->encrypt(json_encode($value));
						echo "<td class='text-center'>
						<button class='btn btn-link btn-sm text-info buka-modal' id='detail_value' data-id='$detail_value'><i class='fas fa-eye'></i></button>
						<button class='btn btn-link btn-sm text-dark buka-modal' id='rwy_pend_formal' data-id='$detail_value'><i class='fas fa-graduation-cap'></i></button>
						<button class='btn btn-link btn-sm text-dark buka-modal' id='rwy_kepangkatan' data-id='$detail_value'><i class='fab fa-black-tie'></i></button>
						</td>";
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<?php
}else{
	echo "<div class='alert alert-info'>0 Results</div>";
}