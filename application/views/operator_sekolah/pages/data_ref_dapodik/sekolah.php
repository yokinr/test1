<?php
if($sekolah){
	?>
	<div class="table-responsive">
		<table class="table">
			<?php foreach ($sekolah[0] as $key => $value): if($key!='id'&&$key!='sekolah_id'&&$key!='is_sks'){ ?>
				<tr>
					<td><?= strtoupper(str_replace(array('id_str','_str','_id','_'), ' ', $key)) ?></td>
					<td><?= $value ?></td>
				</tr>
			<?php } endforeach ?>
		</table>
	</div>
	<?php
}else{
	echo "0 Result";
}
?>