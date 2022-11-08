<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>SMKN 1 PAYAKUMBUH</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Rekap Data Pembelajaran">
	<link rel="icon" type="image/png" href="<?= base_url('assets/img/Logo1.png') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/fontawesome-free/css/all.css') ?>">
	<style type="text/css">
		*{
			font-size: 12px;
		}
	</style>
</head>
<body class="bg-dark">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top mb-3 shadow border-bottom border-primary">
			<div class="container-fluid">
				<a class="navbar-brand" href="#"><img src="<?= base_url('assets/img/logo1.png') ?>" width="30"></a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="<?= base_url('pbm') ?>"><i class="fas fa-home"></i> Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('pbm/pembagian_tugas') ?>"><i class="fas fa-users"></i> Pembagian Tugas</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('pbm/rekap_pembelajaran_rombel') ?>"><i class="fas fa-list"></i> Pembelajaran</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url() ?>"><i class="fas fa-sign-in-alt"></i> Masuk</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="bg-light rounded">