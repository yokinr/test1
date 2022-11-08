<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembelajaran extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function semua_pembelajaran($semester_id)
	{
		// $this->db->order_by('nama_rombel', 'asc');
		return $this->db->get_where('pembelajaran', array('semester_id'=>$semester_id))->result();
	}

	function pembelajaran_wali_kelas($rombongan_belajar_id, $semester_id)
	{
		return $this->db->get_where('pembelajaran', array('rombongan_belajar_id'=>$rombongan_belajar_id, 'semester_id'=>$semester_id))->result();
	}

	function pembelajaran_ptk($semester_id)
	{
		return $this->db->get_where('pembelajaran', array('ptk_id'=>$this->session->userdata('ptk_id'),'semester_id'=>$semester_id))->result();
	}

	function pembelajaran_pd($semester_id)
	{
		$tahun_ajaran_id = substr($this->session->userdata('semester_id'), 0, 4);
		$this->db->order_by('status_di_kurikulum', 'asc');
		return $this->db->query("SELECT pembelajaran.*, getgtk.nama from pembelajaran,getgtk where pembelajaran.rombongan_belajar_id='".$this->session->userdata('rombongan_belajar_id')."' and pembelajaran.ptk_id=getgtk.ptk_id and getgtk.tahun_ajaran_id='$tahun_ajaran_id'")->result();
	}

}

/* End of file M_pembelajran.php */
/* Location: ./application/models/M_pembelajran.php */