<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rwy_pend_formal extends CI_Model {

	function rwy_pend_formal_byId()
	{
		return $this->db->get_where('rwy_pend_formal', array('ptk_id'=>$this->session->userdata('ptk_id')))->result();
	}	

}

/* End of file M_rwy_pend_formal.php */
/* Location: ./application/models/M_rwy_pend_formal.php */