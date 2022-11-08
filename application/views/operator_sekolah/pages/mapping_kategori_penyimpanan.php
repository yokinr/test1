<?php
if($peran){
	echo "<div class='row'>";
	foreach ($peran as $key => $value) {
		echo "<div class='col-lg-4'>";
		$kategori = $this->m_penyimpanan->kategori_penyimpanan_peran($value->peran);
		echo "<h4>".$value->peran."</h4>";
		if($kategori){
			?>
			<ul class="list-group">
				<?php foreach ($kategori as $key1 => $value1): ?>
					<?php
					$dataID = $this->encryption->encrypt(json_encode($value1));
					?>
					<li class="list-group-item d-flex justify-content-start"><input type="checkbox" name="pilih_data[]" class="form-check-input" id="<?= $this->encryption->encrypt('kategori_penyimpanan_mapping') ?>" value="<?= $dataID ?>" data-id="<?= $dataID ?>"> <label for="<?= $value1->uniq ?>"> <?= $value1->nama; ?></label></li>	
				<?php endforeach ?>
			</ul>
			<?php
		}
		echo "</div>";
	}
	echo "</div>";
}