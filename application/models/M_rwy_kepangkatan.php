<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rwy_kepangkatan extends CI_Model {

	function rwy_kepangkatan_byId()
	{
		return $this->db->get_where('rwy_kepangkatan', array('ptk_id'=>$this->session->userdata('ptk_id')))->result();
	}

}

/* End of file M_rwy_kepangkatan.php */
/* Location: ./application/models/M_rwy_kepangkatan.php */