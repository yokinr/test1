<?php
$CI =& get_instance();
$json = $this->encryption->decrypt($this->input->post('data'));
$dataArray = json_decode($json, true);
$this->load->model('m_data_ref_dapodik');
$semester_id = $this->session->userdata('semester_id');
$rwy_kepangkatan = $CI->m_data_ref_dapodik->rwy_pend_formal_byId($dataArray['ptk_id'], $semester_id);
if($rwy_kepangkatan){
	?>
	<table class="table table-striped table-responsive-sm">
		<thead>
			<tr>
				<th>Satuan Pendidikan</th>
				<th>Tahun Masuk</th>
				<th>Tahun Lulus</th>
				<th>Jenjang Pendidikan</th>
			</tr>
		</thead>
		<?php foreach ($rwy_kepangkatan as $key => $value): ?>
			<tr>
				<td><?= $value->satuan_pendidikan_formal ?></td>
				<td><?= $value->tahun_masuk ?></td>
				<td><?= $value->tahun_lulus ?></td>
				<td><?= $value->jenjang_pendidikan_id_str ?></td>
			</tr>
		<?php endforeach ?>
	</table>
	<?php
}else{
	echo "0 Results";
}