<?php
$dataArray = $form;
$strpos = strpos($dataArray->type, '/') + 1;
$substr = substr($dataArray->type, $strpos);
if($this->session->userdata('peran_id_str')=="Peserta Didik"){
	$folder = $this->session->userdata('peserta_didik_id');
}else{
	$folder = $this->session->userdata('ptk_id');
}
// $file = base_url('upload/').$folder.'/'.$dataArray->nama_file;
$file = 'upload/'.$folder.'/'.$dataArray->nama_file;
if($file){
	if(file_exists($file)){
		$size = number_format(round($dataArray->size / 1024),0,',','.');
		if($substr=='pdf'){
			?>
			<div id="example1"></div>
			<script>
				var options = {
					height: "36rem",
					pdfOpenParams: { view: 'FitV', page: '1' }
				};
				PDFObject.embed("<?= $file ?>", "#example1", options);
			</script>
			<?php
		}else{
			?>
			<div class="text-center">
				<object data="<?= $file ?>" type="<?= $dataArray->type ?>" style="max-width: 70%"></object>
			</div>
			<?php
		}
	}else{
		echo "<div class='alert alert-danger'>File tidak ditemukan!</div>";
	}
}
?>
