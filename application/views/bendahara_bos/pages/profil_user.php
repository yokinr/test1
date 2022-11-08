<?php
if($profil||$rwy_pend_formal||$rwy_kepangkatan){
	?>
	<div class="card">
		<div class="card-header bg-secondary text-light">
			<div class="card-title"><i class="fas fa-user"></i> <?= $page ?></div>
		</div>
		<div class="card-body">
			<div class="row">
				<?php
				if($profil){
					?>
					<div class="col">
						<h3>Profil</h3>
						<div class="table-responsive-sm">
							<table>
								<?php foreach ($profil as $key => $value): ?>
									<tr>
										<td><?= $key ?></td>
										<td><?= $value ?></td>
									</tr>
								<?php endforeach ?>
							</table>
						</div>
					</div>
					<?php
				}
				if($rwy_pend_formal){
					?>
					<div class="col">
						<h3>Rwy Pendidikan Formal</h3>
						<div class="table-responsive-sm">
							<table class="table table-striped">
								<?php foreach ($rwy_pend_formal as $key => $value): $key++; ?>
									<tr>
										<td><?= $key ?></td>
										<td><?= $value->satuan_pendidikan_formal ?></td>
										<td><?= $value->fakultas ?></td>
										<td><?= $value->kependidikan ?></td>
										<td><?= $value->tahun_masuk ?></td>
										<td><?= $value->tahun_lulus ?></td>
										<td><?= $value->nim ?></td>
										<td><?= $value->bidang_studi_id_str ?></td>
										<td><?= $value->jenjang_pendidikan_id_str ?></td>
										<td><?= $value->gelar_akademik_id_str ?></td>
									</tr>
								<?php endforeach ?>
							</table>
						</div>
					</div>
					<?php
				}

				if($rwy_kepangkatan){
					?>
					<div class="col">
						<h3>Rwy Kepangkatan</h3>
						<div class="table-responsive-sm">
							<table class="table table-striped">
								<?php foreach ($rwy_kepangkatan as $key => $value): $key++; ?>
									<tr>
										<td><?= $key ?></td>
										<td><?= $value->nomor_sk ?></td>
										<td><?= $value->tanggal_sk ?></td>
										<td><?= $value->tmt_pangkat ?></td>
										<td><?= $value->masa_kerja_gol_tahun ?></td>
										<td><?= $value->masa_kerja_gol_bulan ?></td>
										<td><?= $value->pangkat_golongan_id_str ?></td>
										<td><?= $value->semester_id ?></td>
									</tr>
								<?php endforeach ?>
							</table>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
	<?php
}