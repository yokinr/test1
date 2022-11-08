<?php
if($this->input->post('data')){
	?>
	<form>
		<input type="hidden" name="page" value="iuran_hapus_kategori">
		<ul class="list-group mb-3">
			<?php
			foreach ($this->input->post('data') as $key => $value) {
				$explode = explode(',', $value);
				$table = $this->encryption->decrypt($explode[0]);
				$dataHapus[$table][] = json_decode($this->encryption->decrypt($explode[1]));
				echo "<li class='list-group-item'>".$dataHapus[$table][$key]->nama."</li>";
			}
			?>
		</ul>
		<textarea class="form-control d-none" name="dataHapus"><?= $this->encryption->encrypt(json_encode($dataHapus)) ?></textarea>
		<div class="d-grid">
			<button class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
		</div>
	</form>
	<?php
}