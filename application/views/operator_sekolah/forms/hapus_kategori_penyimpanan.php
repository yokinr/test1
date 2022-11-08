<?php
if($this->input->post('data')){
	echo "<form>";
	echo "<input type='hidden' name='page' value='hapus_kategori_penyimanan'>";
	echo "<ul class='list-group mb-3'>";
	foreach ($this->input->post('data') as $key => $value) {
		$explode = explode(',', $value);
		$table = $this->encryption->decrypt($explode[0]);
		$decrypt = json_decode($this->encryption->decrypt($explode[1]));
		echo "<li class='list-group-item'>{$decrypt->nama}</li>";
		$dataHapus[$table][] = $decrypt;
	}
	echo "</ul>";
	echo "<textarea name='dataHapus' class='d-none'>".$encrypt = $this->encryption->encrypt(json_encode($dataHapus))."</textarea>";
	echo "<div class='d-grid'>";
	echo "<button class='btn btn-danger'><i class='fas fa-trash'>Hapus</button>";
	echo "</div>";
	echo "</button>";
}else{
	echo "Tidak Ada Data";
}