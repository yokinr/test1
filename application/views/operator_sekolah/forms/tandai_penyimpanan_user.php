<?php
if($form){
	?>
	<form>
		<input type="hidden" name="page" value="taindai_penyimpanan_user">
		<input type="hidden" name="q" value="<?= $this->input->post('data') ?>">
		<div class="form-floating mb-3">
			<select name="tanda" class="form-select" id="floatingSelect">
				<?php
				for ($i=0; $i < 4; $i++) { 
					?>
					<option value="<?= $i ?>"><?= $i ?></option>
					<?php
				}
				?>
			</select>
			<label for="floatingSelect">Pilih</label>
		</div>
		<div class="d-grid">
			<button class="btn btn-primary"><i class="fas fa-save"></i> Tandai</button>
		</div>
	</form>
	<?php
}