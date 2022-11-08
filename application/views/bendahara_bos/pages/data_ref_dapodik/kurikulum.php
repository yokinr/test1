<?php
if($kurikulum){
	?>
	<div class="card">
		<div class="card-header">
			<div class="card-title"><i class="fas fa-border-all"></i> <?= $title ?></div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table>
					<thead>
						<tr>
							<th>No</th>
							<th>Tingkat Pendidikan</th>
							<th>Kode Kurikulum</th>
							<th>Kurikulum</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($kurikulum as $key => $value) {
							$key++;
							echo "<tr>";
							echo "<td>$key</td>";
							echo "<td>$value->tingkat_pendidikan_id</td>";
							echo "<td>$value->kurikulum_id</td>";
							echo "<td>$value->kurikulum_id_str</td>";
							echo "</tr>";
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php
}else{
	echo "<div class='alert alert-info'>0 Results</div>";
}