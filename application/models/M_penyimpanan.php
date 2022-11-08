<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penyimpanan extends CI_Model {

	function peran()
	{
		return $this->db->query("SELECT DISTINCT(peran_id_str) as peran from getpengguna")->result();
	}

	function kategori_penyimpanan()
	{
		$this->db->order_by('nama', 'ASC');
		return $this->db->get('kategori_penyimpanan')->result();
	}

	function kategori_penyimpanan_peran($peran)
	{
		return $this->db->query("SELECT kategori_penyimpanan_mapping.uniq,kategori_penyimpanan_mapping.uniq_kategori,kategori_penyimpanan_mapping.peran_id_str,kategori_penyimpanan.nama from kategori_penyimpanan_mapping,kategori_penyimpanan where kategori_penyimpanan_mapping.uniq_kategori=kategori_penyimpanan.uniq and kategori_penyimpanan_mapping.peran_id_str='$peran'")->result();
	}

	function kategori_user()
	{
		$this->db->order_by('nama', 'ASC');
		return $this->db->get_where('kategori_penyimpanan', array('peran_id_str'=>$this->session->userdata('peran_id_str')))->result();
	}

	function penyimpanan_user($uniqKategori, $user)
	{
		if($this->input->post('cari')){
			$cari = $this->input->post('cari');
			$this->db->like('nama_file', $cari, 'BOTH');
			$this->db->where('pengguna_id', $user);
		}
		$this->db->order_by('tanggal', 'desc');
		return $sql = $this->db->get_where('upload_file', array('pengguna_id'=>$user,'kategori_penyimpanan'=>$uniqKategori))->result();
	}

	function penyimpanan_users()
	{
		$sql = $this->db->query("SELECT DISTINCT(pengguna_id) as pengguna_id, peran_id_str from upload_file order by tanggal DESC")->result();
		if($sql){
			foreach ($sql as $key => $value) {
				$pengguna[] = $cekPengguna = $this->db->query("SELECT * from getpengguna where ptk_id='$value->pengguna_id' and peran_id_str='$value->peran_id_str' or peserta_didik_id='$value->pengguna_id' and peran_id_str='$value->peran_id_str'")->row_array();
			}
			return $pengguna;
		}
	}	

}

/* End of file M_penyimpanan.php */
/* Location: ./application/models/M_penyimpanan.php */