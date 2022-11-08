<table>
	<thead>
		<tr>
			<th>No</th>
			<th>NISN</th>
			<th>Nama</th>
			<th>Jenis Pendaftaran</th>
			<th>Tanggal Masuk</th>
			<th>Nama Rombel</th>
			<th>Detail</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if($pd){
			foreach ($pd as $key => $value) {
				$key++;
				echo "<tr>";
				echo "<td>$key</td>";
				echo "<td>$value->nisn</td>";
				echo "<td>$value->nama</td>";
				echo "<td>$value->jenis_pendaftaran_id_str</td>";
				echo "<td>".date('d-m-Y', strtotime($value->tanggal_masuk_sekolah))."</td>";
				echo "<td>$value->nama_rombel</td>";
				$detail_value = $this->encryption->encrypt(json_encode($value));
				echo "<td class='text-center'><button class='btn btn-link btn-sm text-info buka-modal' id='detail_value' data-id='$detail_value'><i class='fas fa-eye'></i></button></td>";
				echo "</tr>";
			}
		}else{
			echo "<div class='alert alert-info'>0 Results</div>";
		}
		?>
	</tbody>
</table>