<?php
$data = $this->input->post('data');
if($data){
	echo "<ul class='list-group'>";
	foreach ($data as $key => $value) {
		$explode = explode(',', $value);
		$table = $explode[0];
		$dataDelete[$table][] = json_decode($this->encryption->decrypt($explode[1]), true);
	}
	$dataSukses[] = 0;
	$dataGagal[] = 0;
	echo "<form method='post'>";
	echo "<input type='hidden' name='page' value='kosongkan_database'>";
	echo "<ul class='list-group mb-3'>";
	$encrypt = array();
	foreach ($dataDelete as $key => $value) {
		echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
		echo $key;
		foreach ($value as $key1 => $value1) {
			echo "<span class='badge bg-primary rounded-pill'>".count($value1)."</span>";
			if($value1){
				foreach ($value1 as $key2 => $value2) {
					$table1 = $this->encryption->encrypt($key);
					$encrypt[$table1][] = $this->encryption->encrypt(json_encode($value2));
				}
			}
		}
		echo "</li>";
	}
	echo "</ul>";
	$kirimValue = json_encode($encrypt);
	?>
	<textarea name="dataKirim" class="d-none"><?= $kirimValue ?></textarea>
	<div class="d-grid">
		<button class="btn btn-danger"><i class="fas fa-trash"></i> Kosongkan Data</button>
	</div>
	<?php
	echo "</form>";
}
?>