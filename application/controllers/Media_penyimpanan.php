<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media_penyimpanan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('username')&&!$this->session->userdata('password')){
			$this->session->sess_destroy();
			redirect('','refresh');
		}
	}

	public function index()
	{
		if($this->session->userdata('peran_id_str')=='Peserta Didik'){
			$dir = 'upload/'.$this->session->userdata('peserta_didik_id');
			$user_id = $this->session->userdata('peserta_didik_id');
		}else{
			$dir = 'upload/'.$this->session->userdata('ptk_id');
			$user_id = $this->session->userdata('ptk_id');
		}
		if(!is_dir($dir)){
			mkdir($dir);
		}

		$peran = $this->session->userdata('peran_id_str');
		$kategori_users = $this->encryption->encrypt(json_encode($this->m_penyimpanan->kategori_penyimpanan_peran($peran)));
		$variable = $this->m_penyimpanan->kategori_penyimpanan_peran($peran);
		$data = array(
			'title' => 'Media Penyimpanan',
			'load' => $this->encryption->encrypt('media_penyimpanan'),
			'tombol' => array(
				'0' => array(
					'name' => '',
					'id' => 'upload_file',
					'data-id' => $kategori_users,
					'class' => 'btn btn-outline-secondary tombol-1 text-primary',
					'icon' => 'fas fa-upload',
					'md_v' => 'modal-md'
				),
				'1' => array(
					'name' => '',
					'id' => 'hapus_file_upload',
					'data-id' => '0',
					'class' => 'btn btn-outline-secondary tombol-2 text-danger',
					'icon' => 'fas fa-trash',
					'md_v' => 'modal-md'
				)
			)
		);
		$this->load->view('templates', $data, FALSE);
	}

	function kategori_penyimpanan()
	{
		$kategori = $this->encryption->encrypt(json_encode($this->m_penyimpanan->kategori_penyimpanan()));
		$data = array(
			'title' => 'Kategori Penyimpanan',
			'load' => $this->encryption->encrypt('kategori_penyimpanan'),
			'tombol' => array(
				'0' => array(
					'name' => '',
					'id' => 'tambah_kategori_penyimpanan',
					'data-id' => $kategori,
					'class' => 'btn btn-outline-secondary tombol-1 text-dark',
					'icon' => 'fas fa-plus',
					'md_v' => 'modal-md'
				),
				'1' => array(
					'name' => '',
					'id' => 'hapus_kategori_penyimpanan',
					'data-id' => $kategori,
					'class' => 'btn btn-outline-secondary tombol-2 text-dark',
					'icon' => 'fas fa-trash',
					'md_v' => 'modal-md'
				),
			)
		);
		$this->load->view('templates', $data, FALSE);
	}

	function mapping_kategori_penyimpanan()
	{
		$kategori = $this->encryption->encrypt(json_encode($this->m_penyimpanan->kategori_penyimpanan()));
		$data = array(
			'title' => 'Mapping Kategori Penyimpanan',
			'load' => $this->encryption->encrypt('mapping_kategori_penyimpanan'),
			'tombol' => array(
				'0' => array(
					'name' => '',
					'id' => 'tambah_mapping_kategori_penyimpanan',
					'data-id' => $kategori,
					'class' => 'btn btn-outline-secondary tombol-1 text-dark',
					'icon' => 'fas fa-plus',
					'md_v' => 'modal-md'
				),
				'1' => array(
					'name' => '',
					'id' => 'hapus_mapping_kategori_penyimpanan',
					'data-id' => $kategori,
					'class' => 'btn btn-outline-secondary tombol-2 text-dark',
					'icon' => 'fas fa-trash',
					'md_v' => 'modal-md'
				),
			)
		);
		$this->load->view('templates', $data, FALSE);
	}

	function penyimpanan_users()
	{
		$data = array(
			'title' => 'Penyimpanan Users',
			'load' => $this->encryption->encrypt('penyimpanan_users'),
			'tombol' => ''
		);
		$this->load->view('templates', $data, FALSE);
	}

	function tampil_penyimpanan_user()
	{
		if($this->input->post('data')){
			$data['dt'] = $this->input->post('data');
			$decrypt = json_decode($this->encryption->decrypt($this->input->post('data')));
			$folder = base_url('upload/').$decrypt->pengguna_id;
			$file = $decrypt->nama_file;
			$link = $folder.'/'.$file;
			if($file){
			// if(file_exists($link)){
			// echo "<h4>".$file."</h4>";
				$size = number_format(round($decrypt->size / 1024),0,',','.');
				if($decrypt->ext=='pdf'){
					?>
					<div id="example1"></div>
					<script>
						var options = {
							height: "36rem",
							pdfOpenParams: { view: 'FitV', page: '1' }
						};
						PDFObject.embed("<?= $link ?>", "#example1", options);
					</script>
					<?php
				}else{
					?>
					<div class="text-center">
						<object data="<?= $link ?>" type="<?= $decrypt->type ?>" style="max-width: 70%;"></object>
					</div>
					<?php
				}
			// }else{
			// 	echo "<div class='alert alert-danger'>File tidak ditemukan!</div>";
			// }
			}
		}
	}

}

/* End of file Arsip_file.php */
/* Location: ./application/controllers/Arsip_file.php */