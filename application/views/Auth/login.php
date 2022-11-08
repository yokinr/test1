
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
	<main class="form-signin">
		<form id="form_login">
			<div class="text-center">
				<img class="mb-4 rounded-circle shadow p-2" src="<?= base_url('assets/img/Logo1.png') ?>" alt="" width="130" height="130">
				<h1 class="h3 mb-3 fw-normal"><img src="<?= base_url('assets/img/logo_dapodik.png') ?>" width="50"></i> Please Sign In</h1>
			</div>
			<div class="form-floating">
				<input type="email" name="username" class="form-control" id="floatingInput" placeholder="name@example.com">
				<label for="floatingInput">Email address</label>
			</div>
			<div class="form-floating">
				<input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
				<label for="floatingPassword">Password</label>
			</div>
			<?php
			if($semester_id){
				if(is_array($semester_id)){
					?>
					<div class="form-floating mb-3">
						<select name="semester_id" class="form-select" id="floatingSelect">
							<?php foreach ($semester_id as $key => $value): ?>
								<?php
								$tahun = substr($value->semester_id, 0,4);
								$tahun1 = $tahun + 1;
								$tahun2 = $tahun.'/'.$tahun1;
								$semester = substr($value->semester_id, -1);
								?>
								<option value="<?= $value->semester_id ?>"><?= $tahun2.' Semester '.$semester ?></option>
							<?php endforeach ?>
						</select>
						<label for="floatingSelect">Tahun Ajaran</label>
					</div>
					<?php
				}else{
					?> <input type="hidden" name="semester_id" value="<?= $semester_id ?>"> <?php
				}
			}
			?>
			<!-- <div class="checkbox mb-3">
				<label>
					<input type="checkbox" value="remember-me"> Remember me
				</label>
			</div> -->
			<button class="w-100 btn btn-lg btn-primary" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
			<p class="mt-5 mb-3 text-muted text-center">&copy; 2022–<?= date('Y') ?></p>
			<p class="mb-3 text-muted text-center">SMK NEGERI 1 PAYAKUMBUH</p>
		</form>
	</main>

	<script src="<?= base_url('assets/jquery.js') ?>"></script>
	<script src="<?= base_url('assets/bootstrap.bundle.js') ?>"></script>


	<script type="text/javascript">
		$('#form_login').on('submit', function(e){
			e.preventDefault();
			var xhr = new XMLHttpRequest();
			xhr.open("POST", 'auth/login', true);
			xhr.onreadystatechange = function() {
				if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
					let text = xhr.responseText;
					let cari = text.search('Berhasil');
					console.log(cari);
					if(cari == '0'){
						window.location.reload();
					}else{
						alert(xhr.responseText);
					}
				}
			}
			var formData = new FormData(this);
			xhr.send(formData);
		});
	</script>
</body>
</html>
