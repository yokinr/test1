<form>
	<div class="form-floating mb-3">
		<select name="peran_id_str" class="form-select" id="floatingPeran">
			<option value="">Pilih</option>
			<?php
			foreach ($decode_json as $key => $value) {
				echo "<option value='{$value['peran']}'>{$value['peran']}</option>";
			}
			?>
		</select>
		<label for="floatingPeran">Pilih Peran</label>
	</div>
</form>