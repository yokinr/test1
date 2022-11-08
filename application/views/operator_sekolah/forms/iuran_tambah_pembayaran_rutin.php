<?php
if($this->input->post('data')){
	$cara_bayar = $this->m_keuangan->cara_bayar();
	?>
	<form>
		<input type="hidden" name="page" value="iuran_tambah_pembayaran_rutin">
		<?php
		foreach ($this->input->post('data') as $key => $value) {
			$explode = explode(',', $value);
			$table = $this->encryption->decrypt($explode[0]);
			$dt = json_decode($this->encryption->decrypt($explode[1]));
			?>
			<div class="form-floating mb-3">
				<input type="hidden" name="peserta_didik_id" value="<?= $dt->peserta_didik_id ?>">
				<input type="hidden" name="semester_id[]" value="<?= $dt->semester_id ?>">
				<input type="hidden" name="bulan_rutin[]" value="<?= $dt->bulan_rutin ?>">
				<input type="hidden" name="iuran[]" value="<?= $dt->uniq_iuran ?>">
				<input type="number" name="nominal[]" class="form-control" id="floatingNominal" value="<?= $dt->nominal ?>">
				<label for="floatingNominal"><?= $this->bulan->nama_bulan()[$dt->bulan_rutin] ?></label>
			</div>
			<?php
		}
		?>
		<div class="form-floating mb-3">
			<select name="cara_bayar" class="form-select" id="floatingCaraBayar">
				<?php foreach ($cara_bayar as $key => $value): ?>
					<option value="<?= $value->uniq ?>"><?= $value->nama ?></option>
				<?php endforeach ?>
			</select>
			<label for="floatingCaraBayar">Jenis Pembayaran</label>
		</div>
		<div class="d-grid">
			<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
		</div>
		<div id="test"></div>
	</form>
	<?php
}
?>
<script type="text/javascript">
	var data_pilih_akun = $('#data_pilih_akun option:selected').val();
	// $('#test').text(data_pilih_akun);
</script>