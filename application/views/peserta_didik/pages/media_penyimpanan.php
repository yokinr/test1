
<div class="row">
	<?php
	if($kategori_user){
		?>
		<?php foreach ($kategori_user as $key => $value): ?>
			<?php
			$uniqKategori = $value->uniq;
			$cekUpload = $this->m_penyimpanan->penyimpanan_user($uniqKategori,$user);
			if($cekUpload){
				?>
				<div class="col-12">
					<h5><i class="fas fa-file-alt"></i> <?= $value->nama ?></h5>
					<div class="table-responsive">
						<table class="table">
							<?php foreach ($cekUpload as $key1 => $value1): ?>
								<?php 
								$size=$value1->size / 1024; 
								if($size > 1000){
									$size = $size / 1000;
									$size = number_format($size,0,',','.').' MB';
								}else{
									$size = number_format($size,0,',','.')." KB";
								}
								$dataID = $this->encryption->encrypt(json_encode($value1));
								// $strpos = strpos($value1->type, '/') + 1;
								// $substr = substr($value1->type, $strpos);
								// $this->db->where(array('uniq'=>$value1->uniq));
								// $this->db->update('upload_file', array('ext'=>$substr));
								?>
								<tr>
									<td>
										<input type="checkbox" name="pilih_data[]" id="<?= $this->encryption->encrypt('upload_file') ?>" data-id="<?= $dataID ?>" class="form-check-input">
										<label for="<?= $value1->uniq ?>"></label>
									</td>
									<td><i class="fas fa-calendar-alt"></i> <?= date('d m Y H:i:s', strtotime($value1->tanggal)) ?></td>
									<td><?= $value1->nama_file ?></td><!-- 
									<td><?= $value1->type ?></td>
									<td><?= $value1->ext ?></td> -->
									<td class="text-end"><?= $size ?></td>
									<td class="text-center align-middle"><button class="btn btn-link btn-sm tombol-1" id="tampil_file_upload" data-id="<?= $dataID ?>" md-v="modal-xl"> <i class="fas fa-eye"></i></button></td>
								</tr>
							<?php endforeach ?>
						</table>
					</div>
				</div>
				<?php
			}
			?>
		<?php endforeach ?>
		<?php
	}
	?>
</div>
