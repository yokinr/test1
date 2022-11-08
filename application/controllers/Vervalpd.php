<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vervalpd extends CI_Controller {

	public function index()
	{
		if(isset($_POST)){
			if($this->input->post('nik')){
				foreach ($this->input->post('nik') as $key => $value) {
					$this->db->where('nik', $key);
					$this->db->update('vervalpd', array('nik1'=>'1','status'=>'1'));
				}
			}

			if($this->input->post('nisn')){
				foreach ($this->input->post('nisn') as $key => $value) {
					$this->db->where('nik', $key);
					$this->db->update('vervalpd', array('nisn'=>'1','status'=>'1'));
				}
			}

			if($this->input->post('nama')){
				foreach ($this->input->post('nama') as $key => $value) {
					$this->db->where('nik', $key);
					$this->db->update('vervalpd', array('nama'=>'1','status'=>'1'));
				}
			}

			if($this->input->post('tempat_lahir')){
				foreach ($this->input->post('tempat_lahir') as $key => $value) {
					$this->db->where('nik', $key);
					$this->db->update('vervalpd', array('tempat_lahir'=>'1','status'=>'1'));
				}
			}

			if($this->input->post('tanggal_lahir')){
				foreach ($this->input->post('tanggal_lahir') as $key => $value) {
					$this->db->where('nik', $key);
					$this->db->update('vervalpd', array('tanggal_lahir'=>'1','status'=>'1'));
				}
			}

			if($this->input->post('ibu_kandung')){
				foreach ($this->input->post('ibu_kandung') as $key => $value) {
					$this->db->where('nik', $key);
					$this->db->update('vervalpd', array('ibu_kandung'=>'1','status'=>'1'));
				}
			}

			if($this->input->post('jenis_kelamin')){
				foreach ($this->input->post('jenis_kelamin') as $key => $value) {
					$this->db->where('nik', $key);
					$this->db->update('vervalpd', array('jenis_kelamin'=>'1','status'=>'1'));
				}
			}

			if($this->input->post('ket')){
				foreach ($this->input->post('ket') as $key => $value) {
					foreach ($value as $key1 => $value1) {
						if($value1){
							$this->db->where('nik', $key);
							$this->db->update('vervalpd', array('ket'=>$value1));
						}
					}
				}
			}
		}
		$kurikulum_id = '';
		$tingkat_pendidikan_id = '';
		// $data['rombel'] = $this->db->query("SELECT DISTINCT(nama_rombel) from getpesertadidik where semester_id='20221' order by nama_rombel ASC")->result();
		$data['rombel'] = $this->db->query("SELECT DISTINCT(nama_rombel) from getpesertadidik where semester_id='20221' and nama_rombel!='SMKN 2 SUMBAR' and getpesertadidik.tingkat_pendidikan_id like'%$tingkat_pendidikan_id%' and getpesertadidik.kurikulum_id like'%$kurikulum_id%' order by nama_rombel ASC")->result();
		if($this->input->get('nama_rombel')){
			$rombel = $this->input->get('nama_rombel');
		}else{
			$rombel = 'XII BDP';
		}
		$pd = array();
		foreach ($data['rombel'] as $key => $value) {
			$pd[$value->nama_rombel] = $this->db->query("SELECT vervalpd.*,getpesertadidik.* from vervalpd,getpesertadidik where vervalpd.nik=getpesertadidik.nik and getpesertadidik.semester_id='20221' and getpesertadidik.nama_rombel='$value->nama_rombel' and vervalpd.ket!='OK' and vervalpd.ket!='1' and vervalpd.ket!='Gagal Memperbaharui Data' order by getpesertadidik.nama")->result();
		}
		$data['invalid'] = $pd;
		$this->load->view('app/vervalpd', $data, FALSE);
	}

	function satu()
	{
		if($this->input->post('ket')){
			foreach ($this->input->post('ket') as $key => $value) {
				foreach ($value as $key1 => $value1) {
					if($value1){
						$this->db->where('nik', $key);
						$this->db->update('vervalpd1', array('ket'=>$value1));
					}
				}
			}
		}
		$data['vervalpd1'] = $this->db->query("SELECT vervalpd1.*,getpesertadidik.* from vervalpd1,getpesertadidik where vervalpd1.nik = getpesertadidik.nik and getpesertadidik.semester_id='20221' order by nama_rombel asc")->result();
		$this->load->view('app/header', $data, FALSE);
		$this->load->view('app/vervalpd1', $data, FALSE);
		$this->load->view('app/footer', $data, FALSE);
	}

}

/* End of file Vervalpd.php */
/* Location: ./application/controllers/Vervalpd.php */