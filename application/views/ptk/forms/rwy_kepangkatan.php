<?php
$CI =& get_instance();
$json = $this->encryption->decrypt($this->input->post('data'));
$dataArray = json_decode($json, true);
$this->load->model('m_data_ref_dapodik');
$rwy_kepangkatan = $CI->m_data_ref_dapodik->rwy_kepangkatan_byId($dataArray['ptk_id']);
if($rwy_kepangkatan){
	?>
	<table class="table table-striped table-responsive-sm">
		<thead>
			<tr>
				<th>Nomor SK</th>
				<th>Tanggal SK</th>
				<th>TMT</th>
				<th>Masa Kerja Gol Tahun</th>
				<th>Masa Kerja Gol Bulan</th>
				<th>Pangkat/Gol</th>
				<th>Semester ID</th>
			</tr>
		</thead>
		<?php foreach ($rwy_kepangkatan as $key => $value): ?>
			<tr>
				<td><?= $value->nomor_sk ?></td>
				<td><?= date('d-m-Y', strtotime($value->tanggal_sk)) ?></td>
				<td><?= date('d-m-Y', strtotime($value->tmt_pangkat)) ?></td>
				<td><?= $value->masa_kerja_gol_tahun ?></td>
				<td><?= $value->masa_kerja_gol_bulan ?></td>
				<td><?= $value->pangkat_golongan_id_str ?></td>
				<td><?= $value->semester_id ?></td>
			</tr>
		<?php endforeach ?>
	</table>
	<?php
}else{
	echo "0 Results";
}