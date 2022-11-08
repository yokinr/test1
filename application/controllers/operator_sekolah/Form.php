<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	public function index()
	{
		if($this->input->post('halaman')&&$this->input->post('data')){
			echo $file = $this->input->post('halaman');
			$folder = strtolower(str_replace(' ', '_', $this->session->userdata('peran_id_str')));
			$jml = count($this->input->post('data'));
			if($jml>0){
				foreach ($this->input->post('data') as $key => $value) {
					$vl = $this->encryption->decrypt($value);
					echo "<pre>";
					print_r ($vl);
					echo "</pre>";
				}
			}else{
				echo "Tidak ada item yang dipilih";
			}
			// $this->load->view('View File', $data, FALSE);
		}
	}

	function post()
	{
		echo "Berhasil";
	}

}

/* End of file Form.php */
/* Location: ./application/controllers/operator_sekolah/Form.php */