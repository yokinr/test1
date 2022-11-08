
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | Log in</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

	<link rel="stylesheet" href="<?= base_url('dist') ?>/plugins/fontawesome-free/css/all.min.css">

	<link rel="stylesheet" href="<?= base_url('dist') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

	<link rel="stylesheet" href="<?= base_url('dist') ?>/css/adminlte.min.css?v=3.2.0">

</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="<?= base_url() ?>"><b>Admin</b>LTE</a>
		</div>

		<div class="card">
			<div class="card-header text-center">
				<?php
				if($this->input->post('username')||$this->input->post('password')){
					echo $this->session->flashdata('login');
				}
				?>
			</div>
			<div class="card-body login-card-body">
				<p class="login-box-msg">Registrasi</p>
				<form action="<?= base_url() ?>" method="post">
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="URL DAPODIK" name="url">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Token" name="token">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="number" class="form-control" placeholder="NPSN" name="npsn">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<input type="checkbox" id="remember">
								<label for="remember">
									Remember Me
								</label>
							</div>
						</div>

						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Registrasi</button>
						</div>

					</div>
				</form>
			</div>

		</div>
	</div>


	<script src="<?= base_url('dist') ?>/plugins/jquery/jquery.min.js"></script>

	<script src="<?= base_url('dist') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script src="<?= base_url('dist') ?>/js/adminlte.min.js?v=3.2.0"></script>
</body>
</html>
