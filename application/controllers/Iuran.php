<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Iuran extends CI_Controller {

	public function data_iuran()
	{
		$data = array(
			'title' => 'Data Iuran',
			'load' => $this->encryption->encrypt('kategori_iuran'),
			'tombol' => array(
				'0' => array(
					'name' => '',
					'id' => 'iuran_tambah_kategori',
					'data-id' => '0',
					'class' => 'btn btn-outline-secondary tombol-1',
					'icon' => 'fas fa-plus-circle',
					'md_v' => 'modal-md'
				),
				'1' => array(
					'name' => '',
					'id' => 'iuran_hapus_kategori',
					'data-id' => '0',
					'class' => 'btn btn-outline-secondary tombol-2',
					'icon' => 'fas fa-trash',
					'md_v' => 'modal-md'
				)
			)
		);
		$this->load->view('templates', $data, FALSE);
	}

	function cara_bayar()
	{
		$data = array(
			'title' => 'Metode Pembayaran Iuran',
			'load' => $this->encryption->encrypt('cara_bayar'),
			'tombol' => array(
				'0' => array(
					'name' => '',
					'id' => 'iuran_tambah_cara_bayar',
					'data-id' => '0',
					'class' => 'btn btn-outline-secondary tombol-1',
					'icon' => 'fas fa-plus-circle',
					'md_v' => 'modal-md'
				),
				'1' => array(
					'name' => '',
					'id' => 'iuran_hapus_cara_bayar',
					'data-id' => '0',
					'class' => 'btn btn-outline-secondary tombol-2',
					'icon' => 'fas fa-trash',
					'md_v' => 'modal-md'
				)
			)
		);
		$this->load->view('templates', $data, FALSE);
	}

	function mapping()
	{
		$data = array(
			'title' => 'Mapping Iuran',
			'load' => $this->encryption->encrypt('mapping_iuran'),
			'tombol' => array(
				'0' => array(
					'name' => '',
					'id' => 'iuran_tambah_mapping',
					'data-id' => '0',
					'class' => 'btn btn-outline-secondary tombol-2',
					'icon' => 'fas fa-plus-circle',
					'md_v' => 'modal-md'
				),
				'1' => array(
					'name' => '',
					'id' => 'iuran_hapus_mapping',
					'data-id' => '0',
					'class' => 'btn btn-outline-secondary tombol-2',
					'icon' => 'fas fa-trash',
					'md_v' => 'modal-md'
				)
			)
		);
		$this->load->view('templates', $data, FALSE);
	}

	public function detail_user()
	{
		$cara_bayar = $this->m_iuran->cara_bayar();
		$data = array(
			'title' => 'Keuangan Peserta Didik',
			'load' => $this->encryption->encrypt('detail_user'),
			'tombol' => array(
				'0' => array(
					'name' => '',
					'id' => 'iuran_tambah_pembayaran_rutin',
					'data-id' => '0',
					'class' => 'btn btn-outline-secondary tombol-2',
					'icon' => 'fa fa-shopping-cart',
					'md_v' => 'modal-md'
				),
				'1' => array(
					'name' => '',
					'id' => 'iuran_hapus_pembayaran_rutin',
					'data-id' => '0',
					'class' => 'btn btn-outline-secondary tombol-2',
					'icon' => 'fa fa-trash',
					'md_v' => 'modal-md'
				)
			),
			'select' => array(
				'0' => array(
					'name' => 'cara_bayar',
					'class' => 'form-select',
					'option' => $cara_bayar,
				),
			)
		);
		$this->load->view('templates', $data, FALSE);
	}

}

/* End of file Iuran.php */
/* Location: ./application/controllers/Iuran.php */