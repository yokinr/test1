<?php
/**
 * 
 */
class Tampil_data
{
	function tampilkan_data($data)
	{
		$CI =& get_instance();
		$dt = $this->opsi($data);
		$loadPage = $dt['folder'].'/pages/'.$dt['file'];
		$CI->load->view($loadPage, $data, FALSE);
	}

	function opsi($data)
	{
		$CI =& get_instance();
		return $ambilData = array(
			'folder' => strtolower(str_replace(' ', '_', $CI->session->userdata('peran_id_str'))),
			'file' => $data['page']
		);
		
	}
}