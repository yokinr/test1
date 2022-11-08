<?php
$jenis_transaksi = array(
	'1' => 'Uang Tunai',
	'2' => 'Transfer Online',
	'3' => 'Voucher',
	'4' => 'Bea Siswa'
);
?>
<form>
	<input type="hidden" name="page" value="iuran_tambah_cara_bayar">
	<div class="form-floating mb-3">
		<input type="text" name="nama" class="form-control" id="floatingNama" placeholder="Nama" autocomplete="off">
		<label for="floatingNama">Nama</label>
	</div>
	<div class="form-floating mb-3">
		<select name="jenis_transaksi" class="form-select" id="floatingJenisTransaksi">
			<option value="">....</option>
			<?php foreach ($jenis_transaksi as $key => $value): ?>
				<option value="<?= $key ?>"><?= $value ?></option>
			<?php endforeach ?>
		</select>
		<label for="floatingJenisTransaksi">Jenis Transaksi</label>
	</div>
	<div class="d-grid">
		<button class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
	</div>
</form>