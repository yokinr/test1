<?php
if($this->input->post('data')){
	?>
	<form>
		<input type="hidden" name="page" value="hapus_kategori_penyimpanan_mapping">
		<ul class="list-group mb-3">
			<?php
			foreach ($this->input->post('data') as $key => $value) {
				echo "<li class='list-group-item'>";
				$explode = explode(',', $value);
				$table = $this->encryption->decrypt($explode[0]);
				$dataHapus[$table][] = json_decode($this->encryption->decrypt($explode[1]));
				echo $dataHapus[$table][$key]->nama;
				echo "</li>";
			}
			?>
		</ul>
		<textarea name="dataHapus" class="form-control d-none"><?= $this->encryption->encrypt(json_encode($dataHapus)) ?></textarea>
		<div class="d-grid">
			<button class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
		</div>
	</form>
	<?php
}