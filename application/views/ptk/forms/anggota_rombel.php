<?php
$CI =& get_instance();
$json = $this->encryption->decrypt($this->input->post('data'));
$dataArray = json_decode($json, true);
$rombongan_belajar_id = $dataArray['rombongan_belajar_id'];
$this->load->model('m_data_ref_dapodik');
$anggota_rombel = $CI->m_data_ref_dapodik->anggota_rombel_byId($dataArray['rombongan_belajar_id'], $dataArray['semester_id']);
if($anggota_rombel){
	echo "<table class='table table-striped table-sm'>";
	foreach ($anggota_rombel as $key => $value) {
		$key++;
		$pd = $CI->m_data_ref_dapodik->getpesertadidik_byId($value->peserta_didik_id, $dataArray['semester_id']);
		echo "<tr>";
		if($pd){
			echo "<td>".$key."</td>";
			echo "<td>".$pd['nisn']."</td>";
			echo "<td>".$pd['nama']."</td>";
			echo "<td>".$pd['jenis_kelamin']."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}else{
	echo "<div class='alert alert-warning'>Tidak ditemukan data !</div>";
}