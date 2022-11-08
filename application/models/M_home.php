<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

	function semester_id()
	{
		return $this->db->query("SELECT DISTINCT(semester_id) as semester_id from pembelajaran order by semester_id DESC")->result();
	}

	function ptk()
	{
		return $sql = $this->db->query("SELECT DISTINCT(ptk_id) as ptk_id, nama from getgtk where jenis_ptk_id='4' or jenis_ptk_id='5' order by nama asc")->result();
	}

	function rombel($semester)
	{
		$this->db->order_by('nama', 'asc');
		return $this->db->get_where('getrombonganbelajar', array('semester_id'=>$semester))->result();
	}

	function rekap_pembelajaran_ptk($ptk_id, $semester_id)
	{
		return $this->db->get_where('pembelajaran', array('ptk_id'=>$ptk_id, 'semester_id'=> $semester_id))->result();
	}	

	function pembelajaran_rombel($rombongan_belajar_id, $semester_id)
	{
		$thn_ajr = substr($semester_id, 0, 4);
		return $this->db->query("SELECT pembelajaran.*, getgtk.nama from pembelajaran,getgtk where pembelajaran.rombongan_belajar_id='$rombongan_belajar_id' and pembelajaran.semester_id='$semester_id' and pembelajaran.ptk_id=getgtk.ptk_id and getgtk.tahun_ajaran_id='$thn_ajr' order by pembelajaran.status_di_kurikulum")->result();
	}

}

/* End of file M_home.php */
/* Location: ./application/models/M_home.php */