<?php
if($sekolah){
	$sekolah = json_decode(json_encode($sekolah), true);
	?>
	<div class="card">
		<div class="card-header">
			<div class="card-title"><h4><i class="fa fa-home"></i> <?= $title ?></h4></div>
		</div>
		<div class="card-body">
			<table>
				<?php foreach ($sekolah[0] as $key => $value): if($key!='id'&&$key!='sekolah_id'&&$key!='is_sks'){ ?>
					<tr>
						<td><?= strtoupper(str_replace(array('id_str','_str','_id','_'), ' ', $key)) ?></td>
						<td><?= $value ?></td>
					</tr>
				<?php } endforeach ?>
			</table>
		</div>
	</div>
	<?php
}else{
	echo "0 Result";
}
?>