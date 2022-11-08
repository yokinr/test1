<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')&&!$this->session->userdata('password')){
			$this->session->sess_destroy();
			redirect('','refresh');
		}
	}

	public function index()
	{
		if($this->input->post('data')){
			$post = $this->input->post('data');
			$decrypt = '_'.$this->encryption->decrypt($post);
			$this->$decrypt();
		}else{
			redirect('','refresh');
		}
	}

	private function _dashboard()
	{
		$data['page'] = 'dashboard';
		$this->tampil_data->tampilkan_data($data);
	}

	// User
	function _profil_user()
	{
		$data['page'] = 'profil_user';
		$profil = array();
		if($this->session->userdata('peran_id_str')=='Peserta Didik'){
			$profil = $this->db->get_where('getpesertadidik', array('peserta_didik_id'=>$this->session->userdata('peserta_didik_id')))->row_array();
			$data['profil1'] = $this->db->get_where('getpesertadidik1', array('peserta_didik_id'=>$this->session->userdata('peserta_didik_id')))->row_array();
		}else{
			$profil = $this->db->get_where('getgtk', array('ptk_id'=>$this->session->userdata('ptk_id')))->row_array();
			$data['rwy_kepangkatan'] = $this->db->get_where('rwy_kepangkatan', array('ptk_id'=>$this->session->userdata('ptk_id'),'semester_id'=>$this->session->userdata('semester_id')))->result();
			$data['rwy_pend_formal'] = $this->db->get_where('rwy_pend_formal', array('ptk_id'=>$this->session->userdata('ptk_id'),'semester_id'=>$this->session->userdata('semester_id')))->result();
		}
		$data['profil'] = $profil;
		$this->tampil_data->tampilkan_data($data);
	}

	private function _detail_user()
	{
		$url = $_SERVER['HTTP_REFERER'];
		$id_user = str_replace('http://'.$_SERVER['HTTP_HOST'].'/keuangan/detail_user/', '', $url);
		$user = $this->m_data_ref_dapodik->detail_user($id_user);
		if($user){
			$data['user'] = $user;
			$data['jejak_rombel'] = $this->m_data_ref_dapodik->jejak_rombel($id_user);
			foreach ($data['jejak_rombel'] as $key => $value) {
				$mapping[] = $this->m_keuangan->mapping($value->rombongan_belajar_id, $value->semester_id);
			}
			$data['mapping'] = $mapping;
		}else{
			$data['user'] = 0;
		}
		$data['page'] = 'keuangan_user';
		$this->tampil_data->tampilkan_data($data);
	}

	// Data Ref Dapodik
	private function _sync_data()
	{
		$this->load->library('web_service');
		$data['ip_client'] = $_SERVER;
		$data = array(
			'sekolah' => $this->m_data_ref_dapodik->getsekolah(),
			'gtk' => $this->m_data_ref_dapodik->getgtk(),
			'rwy_pend_formal' => $this->m_data_ref_dapodik->rwy_pend_formal(),
			'rwy_kepangkatan' => $this->m_data_ref_dapodik->rwy_kepangkatan(),
			'pd' => $this->m_data_ref_dapodik->semuapesertadidik(),
			'rombel' => $this->m_data_ref_dapodik->getrombonganbelajar(),
			'anggota_rombel' => $this->m_data_ref_dapodik->anggota_rombel(),
			'pembelajaran' => $this->m_data_ref_dapodik->pembelajaran(),
			'pengguna' => $this->m_data_ref_dapodik->semua_pengguna(),
			'kurikulum' => $this->m_data_ref_dapodik->getkurikulum()
		);

		if($this->session->userdata('paran_id_str')!=='Peserta Didik'){
			if($this->session->userdata('jenis_ptk_id')=='11'){
				$data['page'] = 'data_ref_dapodik/sync_data';
			}else{
				$data['page'] = 'bukan_hak_akses';
			}
		}else{
			$data['page'] = 'bukan_hak_akses';
		}
		$this->tampil_data->tampilkan_data($data);
	}

	private function _sekolah()
	{
		$data['page'] = 'data_ref_dapodik/sekolah';
		$data['sekolah'] = $this->m_data_ref_dapodik->getsekolah();
		$this->tampil_data->tampilkan_data($data);
	}

	private function _ptk()
	{
		$data['page'] = 'data_ref_dapodik/gtk';
		$data['gtk'] = $this->m_data_ref_dapodik->getgtk();
		$this->tampil_data->tampilkan_data($data);
	}

	private function _pd()
	{
		$data['page'] = 'data_ref_dapodik/pd';
		$data['pd'] = $this->m_data_ref_dapodik->getpesertadidik();
		$this->tampil_data->tampilkan_data($data);
	}

	private function _rombel()
	{
		$data['page'] = 'data_ref_dapodik/rombel';
		$semester_id = $this->session->userdata('semester_id');
		$data['rombel'] = $this->m_data_ref_dapodik->getrombonganbelajar();
		$this->tampil_data->tampilkan_data($data);
	}

	private function _pengguna()
	{
		$data['page'] = 'data_ref_dapodik/pengguna';
		$data['pengguna'] = $this->m_data_ref_dapodik->getpengguna();
		$this->tampil_data->tampilkan_data($data);
	}

	private function _kurikulum()
	{
		$data['page'] = 'data_ref_dapodik/kurikulum';
		$semester_id = $this->session->userdata('semester_id');
		$data['rombel'] = $this->m_data_ref_dapodik->getrombonganbelajar($semester_id);
		$this->tampil_data->tampilkan_data($data);
	}

	// Pembelajaran
	private function _pembelajaran()
	{
		$data['page'] = 'pembelajaran';
		$semester_id = $this->session->userdata('semester_id');
		$this->load->library('peran_id_str');
		$peran = $this->peran_id_str->pembelajaran();
		$pembelajaran = $peran[$this->session->userdata('peran_id_str')];
		$data['pembelajaran'] = $this->m_pembelajaran->$pembelajaran($semester_id);
		if($this->session->userdata('rombongan_belajar_id')){
			$rombongan_belajar_id = $this->session->userdata('rombongan_belajar_id');
			$data['matpel_rombel'] = $this->m_pembelajaran->pembelajaran_wali_kelas($rombongan_belajar_id, $semester_id);
		}else{
			$data['matpel_rombel'] = 0;
		}
		$this->tampil_data->tampilkan_data($data);
	}

	// Media Penyimpanan
	private function _kategori_penyimpanan()
	{
		$data['page'] = "kategori_penyimpanan";
		$data['kategori_penyimpanan'] = $this->m_penyimpanan->kategori_penyimpanan();
		$this->tampil_data->tampilkan_data($data);
	}
	private function _mapping_kategori_penyimpanan()
	{
		$data['peran'] = $this->m_penyimpanan->peran();
		$data['page'] ='mapping_kategori_penyimpanan';
		$this->tampil_data->tampilkan_data($data);
	}

	private function _media_penyimpanan()
	{
		if($this->session->userdata('peran_id_str')=='Peserta Didik'){
			$dir = 'upload/'.$this->session->userdata('peserta_didik_id');
			$user_id = $this->session->userdata('peserta_didik_id');
		}else{
			$dir = 'upload/'.$this->session->userdata('ptk_id');
			$user_id = $this->session->userdata('ptk_id');
		}
		$data['page'] ='media_penyimpanan';
		$peran = $this->session->userdata('peran_id_str');
		$data['kategori_user'] = $this->m_penyimpanan->kategori_penyimpanan_peran($peran);
		$data['user'] = $user_id;
		$this->tampil_data->tampilkan_data($data);
	}

	private function _penyimpanan_users()
	{
		$data['pengguna'] = $this->m_penyimpanan->penyimpanan_users();
		if($this->session->userdata('jenis_ptk_id')=='11'){
			$data['page'] ='penyimpanan_users';
		}else{
			$data['page'] = 'bukan_hak_akses';
		}
		$this->tampil_data->tampilkan_data($data);
	}

	// Keuangan Siswa

	private function _kategori_iuran()
	{
		$data['page'] = 'keuangan/kategori_iuran';
		$data['kategori_iuran'] = $this->m_keuangan->kategori_iuran();
		$this->tampil_data->tampilkan_data($data);
	}

	private function _cara_bayar()
	{
		$data['page'] = 'keuangan/cara_bayar';
		$data['cara_bayar'] = $this->m_keuangan->cara_bayar();
		$this->tampil_data->tampilkan_data($data);
	}

	private function _mapping_iuran()
	{
		$data['page'] = 'keuangan/mapping';
		$data['rombel'] = $this->m_data_ref_dapodik->getrombonganbelajar();
		$this->tampil_data->tampilkan_data($data);
	}

	private function _laporan_keuangan()
	{
		$data['page'] = 'keuangan/laporan_keuangan';
		$kategori = $this->m_keuangan->laporan_keuangan();
		if($kategori){
			foreach ($kategori as $key => $value) {
				$dt[] = $this->m_keuangan->detail_mapping($value->uniq_iuran);
			}
		}else{
			$dt = array();
		}
		$data['kategori'] = $dt;
		$this->tampil_data->tampilkan_data($data);
	}

	private function _laporan_keuangan_rombel()
	{
		$data['page'] = 'keuangan/laporan_keuangan_rombel';
		$data['rombel'] = $this->m_data_ref_dapodik->getrombonganbelajar();
		$this->tampil_data->tampilkan_data($data);
	}

	private function _detail_keuagan_rombel()
	{
		$url = $_SERVER['HTTP_REFERER'];
		$rombongan_belajar_id = str_replace(base_url('keuangan/detail_rombel/'), '', $url);
		$data['peserta_didik'] = $this->m_data_ref_dapodik->siswa_rombel($rombongan_belajar_id);
		$data['mapping'] = $this->m_keuangan->mapping($rombongan_belajar_id, $this->session->userdata('semester_id'));
		$data['page'] = 'keuangan/laporan_keuangan_rombel_byId';
		$this->tampil_data->tampilkan_data($data);
	}

}

/* End of file Pages.php */
/* Location: ./application/controllers/Pages.php */