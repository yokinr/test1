<?php
if($this->input->post('data')){
	$form = $this->input->post('data');
	echo "<form>";
	echo "<ul class='list-group mb-3'>";
	echo "<input type='hidden' name='page' value='hapus_file_upload'>";
	foreach ($form as $key => $value) {
		$explode = explode(',', $value);
		$table = $this->encryption->decrypt($explode[0]);
		$decrypt = json_decode($this->encryption->decrypt($explode[1]));
		$hapus[$table][] = $decrypt;
		echo "<li class='list-group-item'>";
		echo $decrypt->nama_file;
		echo "</li>";
	}
	echo "</ul>";
	$kirimHapus = $this->encryption->encrypt(json_encode($hapus));
	?>
	<textarea name="dataHapus" class="form-control d-none"><?= $kirimHapus ?></textarea>
	<div class="d-grid">
		<button class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
	</div>
	<?php
	echo "</form>";
}