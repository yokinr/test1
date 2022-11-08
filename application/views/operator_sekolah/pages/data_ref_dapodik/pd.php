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
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($pd as $key => $value) {
					$key++;
					$idSiswa = $this->encryption->encrypt(json_encode($value));
					echo "<tr>";
					echo "<td class='align-middle'>$key</td>";
					if($value->jenis_kelamin=="L"){
						echo "<td class='align-middle'><input type='checkbox' name='pilih_data[]' id='$value->peserta_didik_id' data-id='$idSiswa' class='form-check-input'> <label class='form-check-label' for='$value->peserta_didik_id'><i style='font-size:20px;' class='fas fa-male text-primary'></i> $value->nama</label></td>";
					}else{
						echo "<td class='align-middle'><input type='checkbox' name='pilih_data[]' id='$value->peserta_didik_id' data-id='$idSiswa' class='form-check-input'> <label class='form-check-label' for='$value->peserta_didik_id'><i style='font-size:20px;' class='fas fa-female text-danger'></i> $value->nama</label></td>";
					}
					echo "<td class='align-middle'>$value->nisn</td>";
					echo "<td class='align-middle'>$value->jenis_kelamin</td>";
						// echo "<td class='align-middle'>".date('d-m-Y', strtotime($value->tanggal_masuk_sekolah))."</td>";
					echo "<td class='align-middle'>$value->nama_rombel</td>";
					echo "<td class='align-middle'>$value->tanggal_lahir</td>";
					echo "<td class='align-middle'>$value->nama_ibu</td>";
					echo "<td class='align-middle'><button class='btn btn-link tombol-1' id='detail_value' data-id='$idSiswa' md-v='modal-md'><i class='fas fa-eye'></i></button> <a class='btn btn-link' id='detail_pd' href='".base_url('keuangan/detail_user/'.$value->peserta_didik_id)."' md-v='modal-md'><i class='fas fa-link'></i></button></td>";
				}
				?>
			</tbody>
		</table>
	</div>
	<?php
}else{
	echo "<div class='alert alert-danger'>0 Results</div>";
}
?>