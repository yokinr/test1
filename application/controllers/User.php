<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')&&!$this->session->userdata('password')){
			$this->session->sess_destroy();
			redirect('','refresh');
		}
	}

	public function profil()
	{
		$data = array(
			'title' => 'Profil User',
			'load' => $this->encryption->encrypt('profil_user'),
			'tombol' => '',
		);
		$this->load->view('templates', $data, FALSE);
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */