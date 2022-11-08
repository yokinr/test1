<div class="row">
	<style type="text/css">
		ul li{
			cursor: pointer;
		}
	</style>
	<div class="col-lg-8" id="tampil_document">
		<div class="text-center"><img src="<?= base_url('assets/img/Logo1.png') ?>" width="40%;"></div>
	</div>
	<div class="col" style="max-height: 35rem;overflow: auto;">
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
							<li class="tombol-1 list-group-item d-flex justify-content-between align-items-center" id="tampil_file_upload" data-id="<?= $dataID ?>" md-v="modal-xl">
								<?= date('d-m-Y H:i:s', strtotime($value1->tanggal)) ?>
								<span class="badge text-dark"><?= $value1->nama_file ?></span>
								
							</li>
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
	$('.modal').on('click', '.tombol-1', function(){
		var dataID = $(this).attr('data-id');
		$(this).addClass('bg-secondary text-light');
		$.post('tampil_penyimpanan_user', {data:dataID}, function(result){
			$('#tampil_document').html(result);
		});
	});
</script>