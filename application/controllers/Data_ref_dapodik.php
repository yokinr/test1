<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ref_dapodik extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('ptk_id')){
			redirect('','refresh');
		}
	}

	function index()
	{
		$this->sync_data();
	}

	function sync_data()
	{
		$conn = $this->encryption->encrypt(json_encode($this->web_service->conn()));
		$data = array(
			'title' => 'Ambil Data Dapodik',
			'load' => $this->encryption->encrypt('sync_data'),
			'tombol' => array(
				'0' => array(
					'name' => '',
					'id' => 'edit_koneksi',
					'data-id' => $conn,
					'class' => 'btn btn-outline-secondary tombol-1 text-dark',
					'icon' => 'fas fa-cog',
					'md_v' => ''
				),
				'1' => array(
					'name' => '',
					'id' => 'kosongkan_database',
					'data-id' => '0',
					'class' => 'btn btn-outline-secondary tombol-2 text-danger',
					'icon' => 'fas fa-trash',
					'md_v' => ''
				)
			)
		);
		$this->load->view('templates', $data, FALSE);
	}

	function sekolah()
	{
		$data = array(
			'title' => 'Data Sekolah',
			'load' => $this->encryption->encrypt('sekolah'),
			'tombol' => '',
		);
		$this->load->view('templates', $data, FALSE);
	}

	function ptk()
	{
		$data = array(
			'title' => 'Data PTK',
			'load' => $this->encryption->encrypt('ptk'),
			'tombol' => array(
				'0' => array(
					'name' => '',
					'id' => 'atur_koneksi',
					'data-id' => '',
					'class' => 'btn btn-outline-secondary tombol-1',
					'icon' => 'fas fa-cog',
					'md_v' => ''
				),
				'1' => array(
					'name' => '',
					'id' => 'hapus_ptk',
					'data-id' => '0',
					'class' => 'btn btn-outline-secondary tombol-2',
					'icon' => 'fas fa-trash',
					'md_v' => ''
				),
			)
		);
		$this->load->view('templates', $data, FALSE);
	}
	
	function pd()
	{
		$data = array(
			'title' => 'Data Peserta Didik',
			'load' => $this->encryption->encrypt('pd'),
			'tombol' => array(
				'0' => array(
					'name' => '',
					'id' => 'import_siswa',
					'data-id' => '0',
					'class' => 'btn btn-outline-secondary tombol-1',
					'icon' => 'fas fa-upload',
					'md_v' => ''
				)
			)
		);
		$this->load->view('templates', $data, FALSE);
	}

	function rombel()
	{
		$data = array(
			'title' => 'Data Rombongan Belajar',
			'load' => $this->encryption->encrypt('rombel'),
			'tombol' => '',
		);
		$this->load->view('templates', $data, FALSE);
	}

	function pengguna()
	{
		$data = array(
			'title' => 'Data Pengguna',
			'load' => $this->encryption->encrypt('pengguna'),
			'tombol' => '',
		);
		$this->load->view('templates', $data, FALSE);
	}

}

/* End of file Data_ref_dapodik.php */
			/* Location: ./application/controllers/Admin/Data_ref_dapodik.php */