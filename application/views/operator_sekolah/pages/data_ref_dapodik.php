<?php
if($conn){
	$folder = strtolower(str_replace(' ', '_', $this->session->userdata('peran_id_str')));
	$conn = $this->encryption->encrypt(json_encode($conn));
	?>
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col"><div class="card-title"><h4><i class="fas fa-sync-alt"></i> <?= $title ?></h4></div></div>
				<div class="col-2">
					<div class="position-absolute end-0">
						<div class="btn-group">
							<button class="btn btn-outline-primary buka-modal" id="edit_koneksi" data-id='<?= $conn ?>'><i class="fas fa-cog"></i></button>
							<button class="btn btn-outline-danger buka-modal" id="empty_all_data" data-id="<?= $this->session->userdata('semester_id'); ?>"><i class="fa fa-trash"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="progress mb-2 border">
				<div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"></div>
			</div>
			<div class="row">
				<div class="col-5">
					<div class="load-data" data-id="operator_sekolah/sync_data/load"></div>
				</div>
				<div class="col-7">
					<div class="response text-wrap" style="max-height: 400px;overflow: auto;">
						<fieldset class="text-wrap">
							<legend>Server</legend>
							<?php
							echo "<pre>";
							print_r ($ip_client);
							echo "</pre>";
							?>
						</fieldset>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}else{
	?>
	<div class="card">
		<div class="card-header"><div class="card-title"><i class="fas fa-cog"></i> <?= $title ?></div></div>
		<div class="card-body">
			<form id="pengaturan_koneksi" method="POST" action="<?= base_url('operator_sekolah/form/post') ?>">
				<input type="hidden" name="page" value="pengaturan_koneksi">
				<div class="form-group">
					<input type="text" name="host" class="form-control" placeholder="Host">
				</div>
				<div class="form-group">
					<input type="text" name="token" class="form-control" placeholder="Token">
				</div>
				<div class="form-group">
					<input type="text" name="npsn" class="form-control" placeholder="NPSN">
				</div>
				<div class="form-group text-right">
					<button type="reset" name="reset" class="btn btn-secondary"><i class="fas fa-sync"></i> Reset</button>
					<button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
				</div>
			</form>
		</div>
	</div>
	<?php
}
?>
<script src="<?= base_url('dist/') ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('dist/plugins/toastr/toastr.min.js') ?>"></script>
<script type="text/javascript">
	$('.load-data').load("<?= base_url('operator_sekolah/sync_data/load') ?>");
	$('.load-data').on('click', '.getData', function(){
		var dataid = $(this).attr('data-id');
		$('.m-dialog').css('display','flex');
		$.ajax({
			xhr: function() {
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function(evt) {
					if (evt.lengthComputable) {
						var percentComplete = ((evt.loaded / evt.total) * 100);
						percentComplete = Math.round(percentComplete);
						$(".progress-bar").width(percentComplete + '%');
						$(".progress-bar").html(percentComplete+'%');
					}
				}, false);
				return xhr;
			},
			url : 'form/post',
			data : {page:'update_dapodik',data:dataid},
			type : 'post',
			cache: false,
			beforeSend:function(){
				$('.response').html("Harap Tunggu");
				$('.progress').removeClass('d-none');
				$(".progress-bar").width('0%');
				$('.progress-bar').addClass('bg-primary');
			},
			error:function(){
				$('.response').text(resp);
				$('.progress-bar').addClass('bg-danger');
				$('.load-data').load("<?= base_url('operator_sekolah/sync_data/load') ?>");
			},
			success: function(resp){
				// $('.progress').addClass('d-none');
				$('.progress-bar').addClass('bg-success');
				$('.load-data').load("<?= base_url('operator_sekolah/sync_data/load') ?>");
				$('.response').html(resp);
			}
		});
	});
</script>