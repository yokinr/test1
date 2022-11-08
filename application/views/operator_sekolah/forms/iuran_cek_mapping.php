<?php
$form = $this->input->post('data');
if($form){
	$cekMapping = $this->m_keuangan->mapping($form, $this->session->userdata('semester_id'));
	?>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Nominal</th>
					<th>Jenis Iuran</th>
				</tr>
			</thead>
			<?php foreach ($cekMapping as $key => $value): ?>
				<?php
				$key++;
				$detail_mapping = $this->m_keuangan->detail_mapping($value->uniq_iuran);
				$dataID = $this->encryption->encrypt(json_encode($value));
				?>
				<tr>
					<td><?= $key ?></td>
					<td class="align-middle"><?= $detail_mapping['nama'] ?></td>
					<td class="align-middle"><?= number_format($detail_mapping['nominal'],0,',','.') ?></td>
					<td class="align-middle"><?php
					if($detail_mapping['jenis_iuran']=='1'){
						echo "Iuran Rutin Bulanan";
					}else{
						echo "Iuran Peritem";
					}
					?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
	<?php
}
?>