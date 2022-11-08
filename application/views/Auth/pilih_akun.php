
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#333">
	<title>SMKN 1 PAYAKUMBUH | Log In</title>

	<link rel="stylesheet" href="<?= base_url('assets/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/fontawesome-free/css/all.css') ?>">
	<link rel="icon" type="image/png" href="<?= base_url('assets/img/Logo1.png') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login.css') ?>">
</head>
<body class="hold-transition login-page">
	<main class="form-signin border">
		<form id="form_pilih_peran" method="POST">
			<div class="text-center">
				<img class="mb-4 rounded-circle shadow p-2" src="<?= base_url('assets/img/Logo1.png') ?>" alt="" width="130" height="130">
				<h2 class="h3 mb-3 fw-normal"><img src="<?= base_url('assets/img/logo_dapodik.png') ?>" width="50"> <?= $akun[0]['nama'] ?></h2>
			</div>
			<div class="fw-bold mt-2 mb-2">
				Masuk Sebagai:
			</div>
			<div class="mb-3">
				<ul class="list-group">
					<?php foreach ($akun as $key => $value): ?>
						<?php
						$dataID = $this->encryption->encrypt(json_encode($value));
						?>
						<li class="list-group-item">
							<input type="radio" name="akun[]" class="form-check-input" data-id="<?= $dataID ?>" id="<?= $value['peran_id_str'] ?>">
							<label for="<?= $value['peran_id_str'] ?>" required><?= $value['peran_id_str'] ?></label>
						</li>
					<?php endforeach ?>
				</ul>
			</div>
			<div class="row">
				<div class="col d-grid">
					<button class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Masuk</button>
				</div>
				<div class="col d-grid">
					<a href="<?= base_url('auth/keluar') ?>" class="btn btn-danger">Keluar</a>
				</div>
			</div>
		</form>
		<p class="mt-5 mb-3 text-muted text-center">&copy; 2022–<?= date('Y') ?></p>
		<p class="mb-3 text-muted text-center">SMK NEGERI 1 PAYAKUMBUH</p>
	</main>
	<script src="<?= base_url('assets/jquery.js') ?>"></script>
	<script src="<?= base_url('assets/bootstrap.bundle.js') ?>"></script>
	<script type="text/javascript">
		$('#form_pilih_peran').on('submit', function(e){
			e.preventDefault();
			var radio = $('input[type="radio"]:checked').attr('data-id');
			$.ajax({
				url:"<?= base_url('auth/pilih_akun') ?>",
				type: 'post',
				data: {data_pilih_akun:radio},
				error:function(result){
					alert(result);
				},
				success:function(result){
					if(result=='Berhasil mengambil data'){
						location.reload();
					}else{
						alert(result);
					}
				}
			});
		});
	</script>
</body>
</html>
