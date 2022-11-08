<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fontawesome-free/css/all.css') ?>">
	<style type="text/css">
		*{
			font-size: 11px;
		}
	</style>
</head>
<body>
	<div class="container border">
		<div class="mb-3 d-none">
			<form method="get" class="row">
				<div class="form-floating col-lg-2 col-10">
					<select name="nama_rombel" class="form-control" id="rombel">
						<?php foreach ($rombel as $key => $value): ?>
							<?php
							if($this->input->get('nama_rombel')){
								if($this->input->get('nama_rombel')==$value->nama_rombel){
									?>
									<option selected><?= $value->nama_rombel ?></option>
									<?php
								}else{
									?>
									<option><?= $value->nama_rombel ?></option>
									<?php
								}
							}else{
								?>
								<option><?= $value->nama_rombel ?></option>
								<?php
							}
							?>
						<?php endforeach ?>
					</select>
					<label for="rombel">Rombel</label>
				</div>
				<div class="col-1">
					<button class="btn btn-primary"><i class="fas fa-search"></i></button>
				</div>
			</form>
		</div>
		<div>
			<div class="row">
				<form method="POST">
					<?php foreach ($invalid as $key => $value): ?>
						<div class="col mb-3">
							<h5 class="p-2 bg-dark text-light"><i class="fas fa-arrow-right"></i> <?= $key ?></h5>
							<div class="table-responsive">
								<table class="table table-sm table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>NISN</th>
											<th>NIK</th>
											<th>Nama</th>
											<th>Tempat Lahir</th>
											<th>Tanggal Lahir</th>
											<th>Nama Ibu</th>
											<th>JK</th>
											<th>Keterangan</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($value as $key1 => $value1): $key1++; ?>
											<?php
											$rombel_sebelumnya = $this->db->get_where('getpesertadidik', array('nik'=>$value1->nik,'semester_id'=>20212))->row_array();
											?>
											<tr>
												<td><?= $key1 ?></td>
												<td><?=  $value1->nisn ?></td>
												<td><?=  $value1->nik ?></td>
												<td><?=  $value1->nama ?></td>
												<td><?=  $value1->tempat_lahir ?></td>
												<td><?=  $value1->tanggal_lahir ?></td>
												<td><?= $value1->nama_ibu ?></td>
												<td><?=  $value1->jenis_kelamin ?></td>
												<!-- <td class="input"><input type="text" name="ket[<?=  $value1->nik ?>][]" value="<?= $value1->ket ?>" class="form-control"></td> -->
												<td><?= $value1->ket ?></td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</div>
							<div class="">
								Untuk memastikan kebenaran penulisan data masing-masing Peserta Didik, silahkan kunjungi Halaman: <b><a href='http://server.smkn1payakumbuh.sch.id:4430' target="_blank">http://server.smkn1payakumbuh.sch.id:4430</b></a><br>
								dengan: 
								<table>
									<tr>
										<td>Username/<br>Email Address</td>
										<td>NISN@10303912.pd.id</td>
									</tr>
									<tr>
										<td>Password</td>
										<td>Tanggal Lahir (Y-m-d)<br>Contoh: 2004-05-27</td>
									</tr>
								</table>
							</div>
						</div>
					<?php endforeach ?>
					<button class="btn d-none">Simpan</button>
				</form>
			</div>
		</div>
		
	</div>
	<script type="text/javascript" src="<?= base_url('assets/jquery.js') ?>"></script>
	<script type="text/javascript">
	</script>
</body>
</html>