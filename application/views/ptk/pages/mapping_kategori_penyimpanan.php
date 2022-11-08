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
					<li class="list-group-item"><?= $value1->nama; ?></li>	
				<?php endforeach ?>
			</ul>
			<?php
		}
		echo "</div>";
	}
	echo "</div>";
}