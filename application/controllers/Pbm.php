<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pbm extends CI_Controller {

	public function index()
	{
		$this->rekap_pembelajaran_rombel();
	}

	public function pembagian_tugas()
	{
		$this->load->model('m_home');
		$data['semester_id'] = $this->m_home->semester_id('semester_id');
		$data['ptk'] = $this->m_home->ptk();
		if($this->input->get('ptk')&&$this->input->get('semester')){
			$data['pembelajaran'] = $this->m_home->rekap_pembelajaran_ptk($this->input->get('ptk'),$this->input->get('semester'));
		}else{
			$data['pembelajaran'] = array();
		}
		$this->load->view('app/header', $data, FALSE);
		$this->load->view('app/rekap_pembelajaran_ptk', $data, FALSE);
		$this->load->view('app/footer', $data, FALSE);
	}

	public function rekap_pembelajaran_rombel()
	{
		$this->load->model('m_home');
		$semester_id = $this->m_home->semester_id('semester_id');
		if($semester_id){
			$data['semester_id'] = $semester_id;
			if($this->input->get('semester')){
				$semester = $this->input->get('semester');
			}else{
				$semester = $semester_id[0]->semester_id;
			}
			$data['rombel'] = $this->m_home->rombel($semester);
		}else{
			$data['semester_id'] = array();
		}
		$this->load->view('app/header', $data, FALSE);
		$this->load->view('app/rekap_pembelajaran_rombel', $data, FALSE);
		$this->load->view('app/footer', $data, FALSE);
	}

	public function sertifikat_pendidik()
	{
		$data['sertifikat_pendidik'] = $this->db->query("SELECT DISTINCT(ptk_id) as ptk_id from sertifikat_pendidik")->result();
		$this->load->view('app/header', $data, FALSE);
		$this->load->view('app/sertifikat_pendidik', $data, FALSE);
		$this->load->view('app/footer', $data, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */