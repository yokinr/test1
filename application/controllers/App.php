<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$getpengguna = $this->db->get_where('getpengguna',array('peran_id_str'=>'Operator Sekolah'))->result();
		if(!$getpengguna){
			$object = array(
				'pengguna_id' => uniqid(),
				'username' => 'admin@admin.id',
				'password' => password_hash('123456', PASSWORD_DEFAULT),
				'nama' => 'Administrator',
				'peran_id_str' => 'Operator Sekolah',
				'ptk_id' => uniqid().'-'.uniqid().'-'.uniqid(),
				'alamat' => 'Alamat Administrator',
				'no_telepon' => '09090',
				'no_hp' => '000000000000'
			);
			$this->db->insert('getpengguna', $object);
			redirect('','refresh');
		}else{
			$akun = $this->session->userdata('akun');
			if($akun&&$this->session->userdata('username')&&$this->session->userdata('password')){
				$this->_dashboard();
			}else{
				if($akun&&!$this->session->userdata('username')&&!$this->session->userdata('password')){
					$data['akun'] = $akun;
					$this->load->view('auth/pilih_akun', $data, FALSE);
				}else{
					$this->_login();
					// $this->load->view('templates1');
				}
			}
		}
	}

	private function _login()
	{
		$data['title'] = 'Login';
		$semester_id = $this->db->query("SELECT DISTINCT(semester_id) as semester_id from getrombonganbelajar order by id DESC")->result();
		if($semester_id){
			$data['semester_id'] = $semester_id;
		}
		else{
			if(date('m')>6){
				$semester = date('Y').'1';
			}else
			if(date('m')<7){
				$semester = date('Y')-1;
				$semester = $semester.'2';
			}
			$data['semester_id'] = $semester;
		}
		$this->load->view('auth/login', $data, FALSE);
	}

	private function _dashboard()
	{
		$data = array(
			'title' => 'Dashboard',
			'load' => $this->encryption->encrypt('dashboard'),
			'tombol' => '',
		);
		$this->load->view('templates', $data, FALSE);
	}
}
