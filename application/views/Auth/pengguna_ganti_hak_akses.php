
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
		<form id="ganti_pengguna">
			<div class="text-center">
				<img class="mb-4 rounded-circle shadow p-2" src="<?= base_url('assets/img/Logo1.png') ?>" alt="" width="130" height="130">
				<h1 class="h3 mb-3 fw-normal"><img src="<?= base_url('assets/img/logo_dapodik.png') ?>" width="50"></i> Please Sign In</h1>
			</div>
			<div class="form-floating mb-3">
				<input type='text' name="cari" class="form-control" id="floatingInput">
				<label for="floatingInput">Pengguna</label>
			</div>
			<div id="pengguna"></div>
		</form>
		<p class="mt-5 mb-3 text-muted text-center">&copy; 2022–<?= date('Y') ?></p>
		<p class="mb-3 text-muted text-center">SMK NEGERI 1 PAYAKUMBUH</p>
	</main>

	<script src="<?= base_url('assets/jquery.js') ?>"></script>
	<script src="<?= base_url('assets/bootstrap.bundle.js') ?>"></script>


	<script type="text/javascript">
		$('#ganti_pengguna').on('submit', function(e){
			e.preventDefault();
			var radio = $('input[type="radio"]:checked').attr('data-id');
			$.ajax({
				url:"<?= base_url('auth/proses_ganti_pengguna') ?>",
				type: 'post',
				data: {akun:radio},
				error:function(result){
					alert(result);
				},
				success:function(result){
					if(result=='Berhasil mengambil data'){
						location.assign('../app');
					}else{
						alert(result);
					}
				}
			});
		})
		$('#floatingInput').on('change', function(e){
			var cari = $('#floatingInput').val();4
			$.post('cari_pengguna',{cari:cari}, function(result){
				$('#pengguna').html(result);
			})
		});
	</script>
</body>
</html>
