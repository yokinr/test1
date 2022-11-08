<?php
if($kategori_penyimpanan){
	?>
	<?php foreach ($kategori_penyimpanan as $key => $value): ?>
		<?php
		$dataID = $this->encryption->encrypt(json_encode($value));
		?>
		<ul class="list-group">
			<li class="list-group-item m-2"><input type="checkbox" class="form-check-input" name="pilih_kategori_penyimapan[]" value="<?= $this->encryption->encrypt('kategori_penyimpanan') ?>" id="<?= $this->encryption->encrypt('kategori_penyimpanan') ?>" data-id="<?= $dataID ?>"> <label class="form-check-label" for="<?= $value->uniq ?>"><?= $value->nama ?></label></li>
		</ul>
	<?php endforeach ?>
	<?php
}
?>