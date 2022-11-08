<?php
if($profil||$rwy_pend_formal||$rwy_kepangkatan){
	?>
	<div class="card">
		<div class="card-header bg-secondary text-light">
			<div class="card-title"><i class="fas fa-user"></i> <?= $page ?></div>
		</div>
		<div class="card-body">
			<div class="row">
				<?php
				if($profil){
					?>
					<div class="col">
						<h3>Profil</h3>
						<div class="table-responsive-sm">
							<table>
								<?php foreach ($profil as $key => $value): ?>
									<tr>
										<td><?= $key ?></td>
										<td><?= $value ?></td>
									</tr>
								<?php endforeach ?>
							</table>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
	<?php
}