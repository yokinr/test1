<?php
if($this->input->post('data')){
	$post = json_decode($this->encryption->decrypt($this->input->post('data')));
	if($post->peserta_didik_id&&$post->uniq_iuran&&$post->semester_id){
		$dataHapus = array(
			'peserta_didik_id' => $post->peserta_didik_id,
			'uniq_iuran' => $post->uniq_iuran,
			'semester_id' => $post->semester_id
		);
		$dataHapus = $this->encryption->encrypt(json_encode($dataHapus));
		?>
		<form>
			<input type="hidden" name="page" value="iuran_hapus_pembayaran_perItem">
			<div class="mb-3 alert alert-danger">
				<?php 
				echo "<pre>";
				print_r ($post);
				echo "</pre>";
				?>
			</div>
			<textarea name="dataHapus" class="d-none"><?= $dataHapus ?></textarea>
			<div class="d-grid">
				<button class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
			</div>
		</form>
		<?php
	}
}else{
	echo "Terjadi kesalahan sistem";
}