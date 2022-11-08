
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Username</th>
				<th>Peran</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if($pengguna){
				foreach ($pengguna as $key => $value) {
					$key++;
					$encrypt = $this->encryption->encrypt(json_encode($value));
					echo "<tr>";
					echo "<td>$key</td>";
					echo "<td>$value->nama</td>";
					echo "<td>$value->username</td>";
					echo "<td>$value->peran_id_str</td>";
					echo "</tr>";
				}
			}else{
				echo "<td class='alert alert-info' colspan='6'>0 Results</td>";
			}
			?>
		</tbody>
	</table>
</div>