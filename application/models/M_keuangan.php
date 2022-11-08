<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_keuangan extends CI_Model {

	function kategori_iuran()
	{
		return $this->db->get('iuran_kategori')->result();
	}	

	function cara_bayar()
	{
		return $this->db->get('iuran_cara_bayar')->result();
	}

	function mapping($rombongan_belajar_id, $semester_id)
	{
		return $sql = $this->db->get_where('iuran_mapping', array('rombongan_belajar_id'=>$rombongan_belajar_id))->result();
	}

	function detail_mapping($uniq_iuran)
	{
		return $this->db->get_where('iuran_kategori', array('uniq'=>$uniq_iuran))->row_array();
	}

	function cek_pembayaran_perItem($user_id, $uniq_iuran)
	{
		return $this->db->query("SELECT sum(nominal) as nominal, tanggal from iuran_pembayaran where peserta_didik_id='$user_id' and uniq_iuran='$uniq_iuran'")->row_array();
	}

	function cek_pembayaran_rutin($user_id, $uniq_iuran, $bulan_rutin, $semester_id)
	{
		$this->db->select('*');
		$this->db->select_sum('nominal');
		$this->db->where(array('peserta_didik_id'=>$user_id,'uniq_iuran'=>$uniq_iuran,'bulan_rutin'=>$bulan_rutin,'semester_id'=>$semester_id));
		$sql = $this->db->get('iuran_pembayaran')->row_array();
		return json_decode(json_encode($sql));
	}

	function laporan_keuangan()
	{
		if($this->input->post('cari')){
			$cari = $this->input->post('cari');
			$this->db->like('tanggal', $cari, 'BOTH');
		}else{
			$this->db->like('tanggal', date('Y-m-d'));
		}
		$this->db->distinct();
		$this->db->select('uniq_iuran');
		return $this->db->get('iuran_pembayaran')->result();
	}

}

/* End of file M_iuran.php */
/* Location: ./application/models/M_iuran.php */