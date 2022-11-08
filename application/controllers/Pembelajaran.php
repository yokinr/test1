<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelajaran extends CI_Controller {

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
		$data = array(
			'title' => 'Data Pembelajaran',
			'load' => $this->encryption->encrypt('pembelajaran'),
			'tombol' => '',
		);
		$this->load->view('templates', $data, FALSE);
	}

}

/* End of file Pembelajaran.php */
/* Location: ./application/controllers/Pembelajaran.php */