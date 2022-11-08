<?php
if($pd){ 
	echo "Menampilkan: ".(count($pd))." Data";
	?>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>NISN</th>
					<th>JK</th>
					<th>Nama Rombel</th>
					<th>Tanggal Lahir</th>
					<th>Nama Ibu Kandung</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($pd as $key => $value) {
					$key++;
					$idSiswa = $this->encryption->encrypt($value->peserta_didik_id.','.$value->semester_id);
					echo "<tr>";
					echo "<td>$key</td>";
					if($value->jenis_kelamin=="L"){
						echo "<td><input type='checkbox' name='pilih_data[]' id='$value->peserta_didik_id' data-id='$idSiswa' class='form-check-input'> <label class='form-check-label' for='$value->peserta_didik_id'><i style='font-size:20px;' class='fas fa-male'></i> $value->nama</label></td>";
					}else{
						echo "<td><input type='checkbox' name='pilih_data[]' id='$value->peserta_didik_id' data-id='$idSiswa' class='form-check-input'> <label class='form-check-label' for='$value->peserta_didik_id'><i style='font-size:20px;' class='fas fa-female'></i> $value->nama</label></td>";
					}
					echo "<td>$value->nisn</td>";
					echo "<td>$value->jenis_kelamin</td>";
						// echo "<td>".date('d-m-Y', strtotime($value->tanggal_masuk_sekolah))."</td>";
					echo "<td>$value->nama_rombel</td>";
					echo "<td>$value->tanggal_lahir</td>";
					echo "<td>$value->nama_ibu</td>";
				}
				?>
			</tbody>
		</table>
	</div>
	<?php
}else{
	echo "<div class='alert alert-danger'>0 Results</div>";
}