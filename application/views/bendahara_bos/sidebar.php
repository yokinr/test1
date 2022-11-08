<?php
if($this->session->userdata('peran_id_str')=='Bendahara BOS')
{
	?>
	<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
		<span>Data Referensi Dapodik</span>
		<a class="link-secondary" href="#" aria-label="Add a new report">
			<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
		</a>
	</h6>

	<li class="nav-item">
		<a class="nav-link" aria-current="page" href="<?= base_url('data_ref_dapodik/sekolah') ?>">
			<span class="fas fa-home"></span>
			Sekolah
		</a>
	</li>

	<li class="nav-item">
		<a class="nav-link" aria-current="page" href="<?= base_url('data_ref_dapodik/ptk') ?>">
			<span class="fas fa-users"></span>
			GTK
		</a>
	</li>

	<li class="nav-item">
		<a class="nav-link" aria-current="page" href="<?= base_url('data_ref_dapodik/pd') ?>">
			<span class="fas fa-child"></span>
			PD
		</a>
	</li>

	<li class="nav-item">
		<a class="nav-link" aria-current="page" href="<?= base_url('data_ref_dapodik/rombel') ?>">
			<span class="fas fa-table"></span>
			Rombel
		</a>
	</li>

	<?php
}
?>