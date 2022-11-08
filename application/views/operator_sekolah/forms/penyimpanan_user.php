<div class="row">
	<style type="text/css">
		ul li{
			cursor: pointer;
		}

		.rotate-90 {
			-webkit-transform: rotate(-90deg);
			-moz-transform: rotate(-90deg);
			-o-transform: rotate(-90deg);
			-ms-transform: rotate(-90deg);
			transform: rotate(-90deg);
		}

		.rotate90 {
			-webkit-transform: rotate(90deg);
			-moz-transform: rotate(90deg);
			-o-transform: rotate(90deg);
			-ms-transform: rotate(90deg);
			transform: rotate(90deg);
		}

		.rotate180 {
			-webkit-transform: rotate(180deg);
			-moz-transform: rotate(180deg);
			-o-transform: rotate(180deg);
			-ms-transform: rotate(180deg);
			transform: rotate(180deg);
		}

		.rotate270 {
			-webkit-transform: rotate(270);
			-moz-transform: rotate(270);
			-o-transform: rotate(270);
			-ms-transform: rotate(270);
			transform: rotate(270);
		}
	</style>
	<div class="col-lg-8" id="tampil_document">
		<div class="text-center"><img src="<?= base_url('assets/img/Logo1.png') ?>" width="40%;"></div>
	</div>
	<div class="col" style="max-height: 35rem;overflow: auto;">
		<div class="btn-group">
			<button class="btn btn-primary btn-rotate-90"><i class="fa fa-rotate-left"></i>-90</button>
			<button class="btn btn-primary btn-rotate90"><i class="fa fa-rotate-right"></i>90</button>
			<button class="btn btn-primary btn-rotate180"><i class="fa fa-rotate-right"></i>180</button>
			<button class="btn btn-primary btn-rotate270"><i class="fa fa-rotate-right"></i>270</button>
		</div>
		<h4 class="border-bottom"><?= $form->nama." (".$form->peran_id_str.')'; ?></h4>
		<?php
		if($form->ptk_id){
			$user = $form->ptk_id;
		}else{
			$user = $form->peserta_didik_id;
		}
		$peran = $form->peran_id_str;
		$kategori = $this->m_penyimpanan->kategori_penyimpanan_peran($peran);
		if($kategori){
			foreach ($kategori as $key => $value) {
				$uniqKategori = $value->uniq;
				$penyimpanan = $this->m_penyimpanan->penyimpanan_user($uniqKategori, $user);
				if($penyimpanan){
					echo "<h5 class='m-2'><i class='fas fa-clipboard-list'></i> $value->nama </h5>";
					?>
					<ul class="list-group">
						<?php foreach ($penyimpanan as $key1 => $value1): ?>
							<?php $dataID = $this->encryption->encrypt(json_encode($value1)); ?>
							<li class="tombol4 list-group-item d-flex justify-content-between align-items-center" id="tampil_file_upload" data-id="<?= $dataID ?>" md-v="modal-xl"><?= $value1->nama_file ?><span class="badge text-dark"><?= "<i class='fas fa-calendar-alt text-dark'></i> ".date('d-m-Y H:i:s', strtotime($value1->tanggal)) ?></span></li>
						<?php endforeach ?>
					</ul>
					<?php
				}
			}
		}
		?>
	</div>
</div>
<script type="text/javascript">
	$('.modal').on('click', '.tombol4', function(){
		$('.tombol4').removeClass('bg-primary text-light');
		var dataID = $(this).attr('data-id');
		$(this).addClass('bg-primary text-light');
		$.post('tampil_penyimpanan_user', {data:dataID}, function(result){
			$('#tampil_document').html(result);
		});
	});
	$('.modal').on('click', '.btn-rotate-90', function(){
		$('object').addClass('rotate-90');
		$('object').removeClass('rotate90');
		$('object').removeClass('rotate180');
		$('object').removeClass('rotate270');
	});
	$('.modal').on('click', '.btn-rotate90', function(){
		$('object').removeClass('rotate-90');
		$('object').addClass('rotate90');
		$('object').removeClass('rotate180');
		$('object').removeClass('rotate270');
	});
	$('.modal').on('click', '.btn-rotate180', function(){
		$('object').removeClass('rotate-90');
		$('object').removeClass('rotate90');
		$('object').addClass('rotate180');
		$('object').removeClass('rotate270');
	})
	$('.modal').on('click', '.btn-rotate270', function(){
		$('object').removeClass('rotate-90');
		$('object').removeClass('rotate90');
		$('object').removeClass('rotate180');
		$('object').addClass('rotate270');
	})
</script>