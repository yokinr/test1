<?php
$form = $this->input->post('data');
if($form){
	?>
	<form>
		<input type="hidden" name="page" value="hapus_ptk">
		<ul class="list-group mb-3">
			<?php
			foreach ($form as $key => $value) {
				$explode = explode(',', $value);
				$table = $this->encryption->decrypt($explode[0]);
				$dataHapus[$table][] = json_decode($this->encryption->decrypt($explode[1]));
				echo "<li class='list-group-item'>";
				echo $dataHapus[$table][$key]->nama;
				echo "</li>";
			}
			$encrypt = $this->encryption->encrypt(json_encode($dataHapus));
			?>
		</ul>
		<textarea name="dataHapus" class="form-control mb-3 d-none"><?= $encrypt ?></textarea>
		<div class="d-grid">
			<button class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
		</div>
	</form>
	<?php
}else{
	echo "Tidak ada data yang dipilih";
}
