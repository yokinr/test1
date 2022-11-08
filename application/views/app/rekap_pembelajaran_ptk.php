
<?php
if($semester_id&&$ptk){
	?>
	<div class="row p-2">
		<div class="col-lg-4">
			<form method="get" class="mb-3">
				<div class="row g-3">
					<div class="col-lg-6">
						<div class="form-floating">
							<select name="ptk" class="form-control" id="floatingPTK">
								<?php foreach ($ptk as $key => $value): $key++; ?>
									<?php
									$detail_ptk = $this->db->query("SELECT nama from getgtk where ptk_id='$value->ptk_id'")->row_array();
									if($this->input->get('ptk')){
										if($this->input->get('ptk')==$value->ptk_id){
											?>
											<option value="<?= $value->ptk_id ?>" selected><?= $detail_ptk['nama'] ?></option>
											<?php
										}else{
											?>
											<option value="<?= $value->ptk_id ?>"><?= $detail_ptk['nama'] ?></option>
											<?php
										}
									}else{
										?>
										<option value="<?= $value->ptk_id ?>"><?= $detail_ptk['nama'] ?></option>
										<?php
									}
									?>

								<?php endforeach ?>
							</select>
							<label for="floatingPTK">PTK</label>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-floating">
							<select name="semester" class="form-control" id="floatingSemester">
								<?php foreach ($semester_id as $key => $value): $key++; ?>
									<?php
									$th1 = substr($value->semester_id, 0, 4);
									$th2 = $th1 + 1;
									$sm = substr($value->semester_id, 4);
									$thn_ajr = $th1.' / '.$th2.' Semester '.$sm;
									if($this->input->get('semester')){
										if($this->input->get('semester')==$value->semester_id){
											?>
											<option value="<?= $value->semester_id ?>" selected><?= $thn_ajr ?></option>
											<?php
										}else{
											?>
											<option value="<?= $value->semester_id ?>"><?= $thn_ajr ?></option>
											<?php
										}
									}else{
										?>
										<option value="<?= $value->semester_id ?>"><?= $thn_ajr ?></option>
										<?php
									}
									?>

								<?php endforeach ?>
							</select>
							<label for="floatingSemester">Tahun Ajar</label>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="d-grid">
							<button class="btn btn-primary"><i class="fas fa-search"></i> Cari</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="col-lg-8">
			<?php
			if($pembelajaran){
				?>
				<div class="table-responsive">
					<table class="table table-striped table-sm table-bordered shadow">
						<thead class="bg-primary text-light align-middle">
							<tr>
								<th>No</th>
								<th>Tingkat</th>
								<th>Nama Rombel</th>
								<th>Nama Matpel</th>
								<th>JJM</th>
								<th>Status di Kurikulum</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($pembelajaran as $key => $value): $key++; ?>
								<?php
								$detailRombel = $this->db->get_where('getrombonganbelajar', array('rombongan_belajar_id'=>$value->rombongan_belajar_id, 'semester_id'=>$value->semester_id))->row_array();
								$jjm[] = $value->jam_mengajar_per_minggu;
								?>
								<tr>
									<td><?= $key ?></td>
									<td><?= $detailRombel['tingkat_pendidikan_id'] ?></td>
									<td><?= $detailRombel['nama'] ?></td>
									<td><?= $value->nama_mata_pelajaran ?></td>
									<td><?= $value->jam_mengajar_per_minggu ?></td>
									<td><?= $value->status_di_kurikulum_str ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
						<tfoot>
							<tr class="fw-bold">
								<td colspan="4">Total</td>
								<td><?= array_sum($jjm) ?></td>
								<td></td>
							</tr>
						</tfoot>
					</table>
				</div>
				<?php
			}
			?>
		</div>
	</div>
	<?php
}
?>
