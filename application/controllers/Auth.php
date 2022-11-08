<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			$pilih = $this->db->get_where('getpengguna', array('username'=>$this->input->post('username')))->result_array();
			if($pilih){
				$pass = $this->input->post('password');
				foreach ($pilih as $key => $value) {
					if(password_verify($pass, $value['password'])){
						$tahun_ajaran_id = substr($this->input->post('semester_id'), 0,4);
						$semester_id = array('semester_id'=>$this->input->post('semester_id'),'tahun_ajaran_id'=>$tahun_ajaran_id);
						$merge = array_merge($value,$semester_id);
						$rst[] = $merge;
					}else{
						$rst = array();
						echo "Kombinasi Username dan Password tidak cocok";
					}
				}
				if(count($rst)>0){
					$array = array(
						'akun' => $rst
					);
					$this->session->set_userdata( $array );
					echo "Berhasil Login";
				}
			}else{
				echo "Username: ".$this->input->post('username')." tidak ditemukan";
			}
		}
	}

	function pilih_akun()
	{
		if($this->input->post('data_pilih_akun')){
			$pilih = json_decode($this->encryption->decrypt($this->input->post('data_pilih_akun')), true);
			if(is_array($pilih)){
				$semester_id = $pilih['semester_id'];
				if($pilih['peran_id_str']=='Peserta Didik'){
					$this->db->order_by('semester_id', 'desc');
					$biodata = $this->db->get_where('getpesertadidik', array('peserta_didik_id'=>$pilih['peserta_didik_id']))->row_array();
				}else{
					$biodata = $this->db->get_where('getgtk', array('ptk_id'=>$pilih['ptk_id'], 'tahun_ajaran_id' => $pilih['tahun_ajaran_id']))->row_array();
				}
				if(!$biodata)
				{
					$biodata = array();
				}
				$merge = array_merge($biodata, $pilih);
				$this->session->set_userdata( $merge );
				echo "Berhasil mengambil data";
			}else{
				echo "Gagal mengambil data";
			}
		}else{
			echo "Pilih jenis akun!";
		}
	}

	function pengguna_ganti_hak_akses()
	{
		$data = array(
			'title' => 'Data Pengguna',
			'load' => $this->encryption->encrypt('pengguna'),
			'tombol' => '',
		);
		$this->load->view('auth/pengguna_ganti_hak_akses', $data, FALSE);
	}

	function proses_ganti_pengguna()
	{
		if($this->input->post('akun')){
			$decrypt = json_decode($this->encryption->decrypt($this->input->post('akun')), true);
			$this->session->set_userdata( $decrypt );
			echo "Berhasil mengambil data";
		}else{
			echo "Tidak ada akun yg dipilih";
		}
	}

	function cari_pengguna()
	{
		if($this->input->post('cari')){
			$pengguna = $this->m_data_ref_dapodik->getpengguna();
			?>
			<div class="mb-3">
				<ul class="list-group">
					<?php foreach ($pengguna as $key => $value): ?>
						<?php
						$dataID = $this->encryption->encrypt(json_encode($value));
						?>
						<li class="list-group-item d-flex justify-content-between align-items-left">
							<input type="radio" name="akun[]" class="form-check-input" data-id="<?= $dataID ?>" id="<?= $value->pengguna_id ?>">
							<label for="<?= $value->pengguna_id ?>" required><?= $value->nama ?></label>
							<span class="badge bg-primary rounded-pill"><?= $value->peran_id_str ?></span>
						</li>
					<?php endforeach ?>
					<div class="col d-grid">
						<button class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Masuk</button>
					</div>
				</ul>
			</div>
			<?php
		}
	}

	function keluar()
	{
		$this->session->sess_destroy();
		redirect('','refresh');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */