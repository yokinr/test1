<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_ref_dapodik extends CI_Model {

	function getkurikulum()
	{
		return $getkurikulum = $this->db->query("SELECT DISTINCT(kurikulum_id_str) as kurikulum_id_str, kurikulum_id,tingkat_pendidikan_id from getrombonganbelajar where semester_id='".$this->session->userdata('semester_id')."'")->result();
	}

	function getsekolah()
	{
		$getsekolah = $this->db->get_where('getsekolah', array('semester_id'=>$this->session->userdata('semester_id')))->result();
		return $getsekolah;
	}

	function getgtk()
	{
		$tahun_ajaran_id = $this->session->userdata('tahun_ajaran_id');
		if($this->input->post('cari')){
			$cari = $this->input->post('cari');
			$this->db->like('nama', $cari);
			$this->db->where(array('tahun_ajaran_id'=>$tahun_ajaran_id,'status'=>1));
			$this->db->or_like('jenis_ptk_id_str', $cari, 'BOTH');
			$this->db->where(array('tahun_ajaran_id'=>$tahun_ajaran_id,'status'=>1));
			$this->db->or_like('nik', $cari, 'BOTH');
			$this->db->where(array('tahun_ajaran_id'=>$tahun_ajaran_id,'status'=>1));
		}
		return $getgtk = $this->db->get_where('getgtk', array('tahun_ajaran_id'=>$tahun_ajaran_id,'status'=>1))->result();
	}

	function getgtk_byId()
	{
		
	}

	function rwy_pend_formal()
	{
		$getgtk = $this->db->get_where('rwy_pend_formal', array('semester_id'=>$this->session->userdata('semester_id')))->result();
		return $getgtk;
	}

	function rwy_pend_formal_byId($ptk_id, $semester_id)
	{
		return $this->db->get_where('rwy_pend_formal', array('ptk_id'=>$ptk_id, 'semester_id'=> $semester_id))->result();
	}

	function rwy_kepangkatan()
	{
		$getgtk = $this->db->get_where('rwy_kepangkatan', array('semester_id'=>$this->session->userdata('semester_id')))->result();
		return $getgtk;
	}

	function rwy_kepangkatan_byId($ptk_id, $semester_id)
	{
		return $this->db->get_where('rwy_kepangkatan', array('ptk_id'=>$ptk_id, 'semester_id'=>$semester_id))->result();
	}


	function getpesertadidik()
	{
		if($this->input->post('cari')){
			$cari = $this->input->post('cari');
			$this->db->like('nama', $this->input->post('cari'), 'BOTH');
			$this->db->where('semester_id', $this->session->userdata('semester_id'));
			$this->db->or_like('nisn', $this->input->post('cari'), 'BOTH');
			$this->db->where('semester_id', $this->session->userdata('semester_id'));
			$this->db->or_like('nama_rombel', $cari, 'BOTH');
			$this->db->where('semester_id', $this->session->userdata('semester_id'));
			$this->db->or_like('nik', $cari, 'BOTH');
			$this->db->where('semester_id', $this->session->userdata('semester_id'));
		}
		$this->db->order_by('nama_rombel', 'asc');
		$this->db->order_by('nama', 'asc');
		return $getpesertadidik = $this->db->get_where('getpesertadidik', array('semester_id'=>$this->session->userdata('semester_id'),'status'=>1), 50)->result();
	}

	function semuapesertadidik()
	{
		return $this->db->get_where('getpesertadidik', array('semester_id'=>$this->session->userdata('semester_id'),'status'=>1))->result();
	}

	function getpesertadidik_byId($peserta_didik_id, $semester_id)
	{
		return $this->db->get_where('getpesertadidik', array('peserta_didik_id'=>$peserta_didik_id, 'semester_id'=>$semester_id))->row_array();
	}

	function getpengguna()
	{
		if($this->input->post('cari')){
			$cari = $this->input->post('cari');
			$this->db->like('nama', $cari);
			$this->db->or_like('username', $cari, 'BOTH');
			$this->db->or_like('peran_id_str', $cari, 'BOTH');
		}
		$this->db->order_by('nama', 'asc');
		return $getpengguna = $this->db->get_where('getpengguna', array('status'=>1),160)->result();
	}

	function semua_pengguna()
	{
		return $getpengguna = $this->db->get_where('getpengguna', array('status'=>1))->result();
	}

	function getrombonganbelajar()
	{
		if($this->input->post('cari')){
			$cari = $this->input->post('cari');
			$this->db->like('nama', $cari, 'BOTH');
			$this->db->where('semester_id', $this->session->userdata('semester_id'));
			$this->db->or_like('tingkat_pendidikan_id', $cari, 'BOTH');
			$this->db->where('semester_id', $this->session->userdata('semester_id'));
		}
		$this->db->order_by('nama', 'asc');
		$getrombonganbelajar = $this->db->get_where('getrombonganbelajar', array('semester_id'=>$this->session->userdata('semester_id'),'jenis_rombel'=>1))->result();
		return $getrombonganbelajar;
	}

	function siswa_rombel($rombongan_belajar_id)
	{
		$this->db->order_by('nama', 'asc');
		return $this->db->get_where('getpesertadidik', array('rombongan_belajar_id'=>$rombongan_belajar_id, 'semester_id'=>$this->session->userdata('semester_id')))->result();
	}

	function anggota_rombel()
	{
		$getrombonganbelajar = $this->db->get_where('anggota_rombel', array('semester_id'=>$this->session->userdata('semester_id'),'status'=>1))->result();
		return $getrombonganbelajar;
	}

	function anggota_rombel_byId($rombongan_belajar_id, $semester_id)
	{
		return $this->db->get_where('anggota_rombel', array('rombongan_belajar_id'=>$rombongan_belajar_id, 'semester_id'=>$semester_id))->result();
	}

	function pembelajaran()
	{
		$getrombonganbelajar = $this->db->get_where('pembelajaran', array('semester_id'=>$this->session->userdata('semester_id')))->result();
		return $getrombonganbelajar;
	}

	function detail_user($peserta_didik_id)
	{
		return $cekPesertaDidik = $this->db->get_where('getpesertadidik', array('peserta_didik_id'=>$peserta_didik_id,'semester_id'=>$this->session->userdata('semester_id')))->row_array();
	}

	function jejak_rombel($peserta_didik_id)
	{
		$sql = $this->db->query("SELECT rombongan_belajar_id, nama_rombel, semester_id from getpesertadidik where peserta_didik_id='$peserta_didik_id'")->result();
		if($sql){
			foreach ($sql as $key => $value) {
				$rombel[] = $this->db->get_where('getrombonganbelajar', array('rombongan_belajar_id'=>$value->rombongan_belajar_id, 'semester_id'=>$value->semester_id))->row_array();
			}
		}else{
			$rombel = array();
		}
		return json_decode(json_encode($rombel));
	}

}

/* End of file Data_ref_dapodik.php */
/* Location: ./application/models/Data_ref_dapodik.php */