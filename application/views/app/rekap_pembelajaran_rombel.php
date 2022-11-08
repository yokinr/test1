<?php
if($semester_id){
	if($rombel){
		?>
		<div class="row p-2">
			<?php foreach ($rombel as $key => $value): ?>
				<div class="col-12 bg-primary mb-3 p-2 text-light rounded shadow"><h5><?= $value->nama ?></h5></div>
				<?php
				$pembelajaran = $this->m_home->pembelajaran_rombel($value->rombongan_belajar_id, $value->semester_id);
				if($pembelajaran){
					?>
					<div class="table-responsive">
						<table class="table table-sm table-striped table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Matpel</th>
									<th>Mata Pelajaran</th>
									<th>Mata Pelajaran Lokal</th>
									<th>PTK</th>
									<th>JJM</th>
									<th>Status di Kurikulum</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($pembelajaran as $key1 => $value1): $key1++; ?>
									<?php
									$jjm[$value->rombongan_belajar_id][] = $value1->jam_mengajar_per_minggu;
									?>
									<tr>
										<td><?= $key1 ?></td>
										<td><?= $value1->mata_pelajaran_id ?></td>
										<td><?= $value1->mata_pelajaran_id_str ?></td>
										<td><?= $value1->nama_mata_pelajaran ?></td>
										<td><?= $value1->nama ?></td>
										<td><?= $value1->jam_mengajar_per_minggu ?></td>
										<td><?= $value1->status_di_kurikulum_str ?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
							<tfoot>
								<tr class="fw-bold">
									<td colspan="5">Total</td>
									<td><?= array_sum($jjm[$value->rombongan_belajar_id]) ?></td>
									<td></td>
								</tr>
							</tfoot>
						</table>
					</div>
					<?php
				}
				?>
			<?php endforeach ?>
		</div>
		<?php
	}else{
		echo "<div class='alert alert-danger'>0 Data Rombel</div>";
	}
}