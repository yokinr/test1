<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('peran_id_str')){
			$this->session->sess_destroy();
			exit('No direct script access allowed');
			redirect('','refresh');
		}
	}

	public function tombol_1()
	{
		if($this->input->post('halaman')){
			$folder = strtolower(str_replace(' ', '_', $this->session->userdata('peran_id_str')));
			$page = $this->input->post('halaman');
			if($this->input->post('data')){
				$decrypt = json_decode($this->encryption->decrypt($this->input->post('data')));
			}else{
				$decrypt = 0;
			}
			if($decrypt){
				$data['form'] = $decrypt;
				$this->load->view($folder.'/forms/'.$page, $data, FALSE);
			}else{
				$this->load->view($folder.'/forms/'.$page, FALSE);
				// echo "Data ID Kosong";
			}
		}
	}

	public function tombol_2()
	{
		$this->form_validation->set_rules('halaman', 'Halaman', 'trim|required');
		$this->form_validation->set_rules('data[]', 'Pilih Data', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			$page = $this->input->post('halaman');
			$data = $this->input->post('data');
			$folder = strtolower(str_replace(' ', '_', $this->session->userdata('peran_id_str')));
			$this->load->view($folder.'/forms/'.$page, $data, FALSE);
			// $this->$page();
		}
	}

	function post()
	{
		if($this->input->post('page')){
			$page = '_'.$this->input->post('page');
			$this->$page();
		}else{
			echo "Terjadi Kesalahan Sistem";
		}
	}

	function _insert($table, $object)
	{
		$this->db->insert($table, $object);
		if($this->db->affected_rows()>0){
			echo "Berhasil Menyimpan Data";
		}else{
			echo "Gagal Menyimpan Data";
		}
	}

	function _update($table, $object, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $object);
		if($this->db->affected_rows() > 0){
			echo "Berhasil Memperbaharui Data";
			// echo $this->db->last_query();
		}else{
			echo "Gagal Memperbaharui Data";
		}
	}

	function _delete($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
		if($this->db->affected_rows() > 0){
			echo "Berhasil Menghapus Data";
		}else{
			echo "Gagal Menghapus Data";
		}
	}

	function _hapus_ptk()
	{
		if($this->input->post('dataHapus')){
			$dataHapus = json_decode($this->encryption->decrypt($this->input->post('dataHapus')), true);
			foreach ($dataHapus as $key => $value) {
				$object = array(
					'status' => 0,
				);
				foreach ($value as $key1 => $value1) {
					$where = array(
						'ptk_id' => $value1['ptk_id'],
						'tahun_ajaran_id' => substr($this->session->userdata('semester_id'), 0,4)
					);
					$this->_update($key,$object,$where);
				}
			}
		}
	}

	private function _edit_koneksi()
	{
		$this->form_validation->set_rules('host', 'Host', 'trim|required');
		$this->form_validation->set_rules('token', 'Token', 'trim|required');
		$this->form_validation->set_rules('npsn', 'NPSN', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			$object = array(
				'url' => $this->input->post('host'),
				'token' => $this->input->post('token'),
				'npsn' => $this->input->post('npsn')
			);
			$this->db->update('webservice', $object);
			if($this->db->affected_rows() >> 0){
				echo "Berhasil Memperbaharui Data";
			}else{
				echo "Tidak ada data yang diperbaharui";
			}
		}
	}

	private function _update_dapodik()
	{
		$post = $this->input->post('data');
		$this->load->library('web_service');
		$conn = $this->web_service->conn();
		if($conn){
			$host = $conn['url'];
			$token = $conn['token'];
			$npsn = $conn['npsn'];
			$url = 'http://'.$host.':5774/WebService/'.$post.'?npsn='.$npsn;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_TIMEOUT , 0);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				'Authorization: Bearer '.$token
			));
			$json = curl_exec($ch);
			$substr = substr($json, 0,4);
			$array = json_decode($json, true);
			if($substr!=='HTTP'){
				$this->_inisialisasi($json,$post);
			}else{
				echo $json;
			}
		}else{
			echo "Tidak ada koneksi dengan dapodik";
		}
	}

	private function _inisialisasi($json, $post)
	{
		if(!$json){
			echo $json;
		}else{
			$dataArray = json_decode($json, true);
			if(array_keys($dataArray)[0]=='success'){
				echo $dataArray['message'];
			}else{
				$post = strtolower($post);
				$semester_id = $this->session->userdata('semester_id');
				if($post=='getsekolah'){
					$x = array('semester_id'=>$semester_id);
					$y = array_merge($dataArray['rows'],$x);
					$dataRows[] = $y;
				}else{
					$dataRows = $dataArray['rows'];
				}
				$id = array(
					'getsekolah' => 'sekolah_id',
					'getpesertadidik' => 'peserta_didik_id',
					'getgtk' => 'ptk_id',
					'rwy_pend_formal' => 'ptk_id',
					'rwy_kepangkatan' => 'ptk_id',
					'getrombonganbelajar' => 'rombongan_belajar_id',
					'anggota_rombel' => 'peserta_didik_id',
					'pembelajaran' => 'rombongan_belajar_id',
					'getpengguna' => 'pengguna_id',
				);
				foreach ($dataRows as $key => $value) {
					$keyID = $id[$post];
					$ID = $value[$keyID];
					$array = array($keyID=>$ID, 'semester_id'=> $this->session->userdata('semester_id'));
					foreach ($value as $key1 => $value1) {
						if(!is_array($value1)){
							$object[$post][$key][$key1] = $value1;
						}else{
							foreach ($value1 as $key2 => $value2) {
								$merge = array_merge($array, $value2);
								foreach ($merge as $key3 => $value3) {
									$object[$key1][$key][$key2][$key3] = $value3;
								}
							}
						}
					}
				}
				$this->_simpan_data_dapodik($object, $id);
			}
		}
	}

	private function _simpan_data_dapodik($object, $id)
	{
		foreach ($object as $key => $value) {
			$table = $key;
			$dataSukses = array();
			$dataError = array();
			if($table=='rwy_kepangkatan'||$table=='rwy_pend_formal'||$table=='anggota_rombel'||$table=='pembelajaran'){
				foreach ($value as $key1 => $value1) {
					foreach ($value1 as $key2 => $value2) {
						$ID = $value2[$id[$table]];
						$semester_id = $value2['semester_id'];
						$where = array($id[$table]=>$ID,'semester_id'=>$semester_id);
						$cekData = $this->db->get_where($table, $where)->row_array();
						// if($cekData){
						$this->db->delete($table, $where);
						// if($this->db->affected_rows()>0){
						// 	echo "<div class='alert alert-info'>".$this->db->last_query()."</div>";
						// }else{
						// 	echo "<div class='alert alert-warning'>".$this->db->last_query()."</div>";
						// }
						// }
					}
					$this->db->insert_batch($table, $value1);
					// if($this->db->affected_rows()>0){
					// 	echo "".$this->db->last_query()."</div>";
					// }else{
					// 	echo "".$this->db->last_query()."</div>";
					// }
				}
			}else{
				foreach ($value as $key1 => $value1) {
					$ID = $value1[$id[$table]];
					if($table=='getgtk'){
						$tahun_ajaran_id = $value1['tahun_ajaran_id'];
						$where = array($id[$table]=>$ID,'tahun_ajaran_id'=>$tahun_ajaran_id);
					}else
					if($table=='getpengguna'){
						$where = array($id[$table]=>$ID);
					}
					else{
						$semester_id = $value1['semester_id'];
						$where = array($id[$table]=>$ID,'semester_id'=>$semester_id);
					}
					$cekData = $this->db->get_where($table, $where)->row_array();
					if($cekData){
						$this->db->delete($table, $where);
						// if($this->db->affected_rows()>0){
						// 	echo "<div class='alert alert-info'>".$this->db->last_query()."</div>";
						// }else{
						// 	echo "".$this->db->last_query()."</div>";
						// }
					}
				}
				$insertBatch[] = $this->db->insert_batch($table, $value);
				if($this->db->affected_rows()>0){
					$dataSukses[] = +1;
					$dataError[] = -1;
				}else{
					$dataSukses[] = -1;
					$dataError[] = +1;
				}
			}
		}
		echo array_sum($dataSukses).' Sukses & '.array_sum($dataError)." Gagal";

	}

	private function _kosongkan_database()
	{
		$this->form_validation->set_rules('dataKirim', 'Data', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			$dataArray = json_decode($this->input->post('dataKirim'), true);
			$no = 0;
			$dataSukses = array();
			$dataError = array();
			foreach ($dataArray as $key => $value) {
				$no++;
				$table = $this->encryption->decrypt($key);
				foreach ($value as $key1 => $value1) {
					$decrypt = json_decode($this->encryption->decrypt($value1), true);
					$this->db->where($decrypt);
					$this->db->delete($table);
					if($this->db->affected_rows() > 0){
						$dataSukses[] = +1;
						$dataError[] = -1;
					}else{
						$dataSukses[] = -1;
						$dataError[] = +1;
					}
				}
			}
			echo array_sum($dataSukses).' Sukses & '.array_sum($dataError).' Gagal';
		}
	}

	function _import_siswa()
	{
		if(!empty($_FILES['file_import']['name'])){
			$this->load->library('Excel');
			$excel = PHPExcel_IOFactory::load($_FILES['file_import']['tmp_name']);
			$excel->setActiveSheetIndex(0);
			if($excel->getActiveSheet()->getCell('A1')->getValue() =='Daftar Peserta Didik'&&$excel->getActiveSheet()->getCell('A5')->getValue() =='No'){
				$this->__proses_import_siswa();
			}else{
				echo "<div class='alert-danger alert'>File import yang digunakan harus data siswa yang diunduh dari Dapodik !</div>";
			}
		}else{
			echo "Tidak ada berkas yang dipilih</div>";
		}
	}

	function __proses_import_siswa()
	{
		$this->load->library('Excel');
		$excel = PHPExcel_IOFactory::load($_FILES['file_import']['tmp_name']);
		$excel->setActiveSheetIndex(0);
		$i = 7;
		while ( $excel->getActiveSheet()->getCell('E'.$i)->getValue() !='' ) {
			$dataSiswaImport[$i] = array(
				'nama' 							=> strval($excel->getActiveSheet()->getCell('B'.$i)->getValue()),
				'nisn'							=> strval($excel->getActiveSheet()->getCell('E'.$i)->getValue()),
				'RT' 							=> strval($excel->getActiveSheet()->getCell('K'.$i)->getValue()),
				'RW'							=> strval($excel->getActiveSheet()->getCell('L'.$i)->getValue()),
				'Dusun'							=> strval($excel->getActiveSheet()->getCell('M'.$i)->getValue()),
				'Kelurahan'						=> strval($excel->getActiveSheet()->getCell('N'.$i)->getValue()),
				'Kecamatan'						=> strval($excel->getActiveSheet()->getCell('O'.$i)->getValue()),
				'Kode_Pos'						=> strval($excel->getActiveSheet()->getCell('P'.$i)->getValue()),
				'Jenis_Tinggal'					=> strval($excel->getActiveSheet()->getCell('Q'.$i)->getValue()),
				'Alat_Transportasi'				=> strval($excel->getActiveSheet()->getCell('R'.$i)->getValue()),
				
				'SKHUN'							=> strval($excel->getActiveSheet()->getCell('V'.$i)->getValue()),
				'Penerima_KPS'					=> strval($excel->getActiveSheet()->getCell('W'.$i)->getValue()),
				'No_KPS'						=> strval($excel->getActiveSheet()->getCell('X'.$i)->getValue()),

				'Tahun_Lahir_Ayah'				=> strval($excel->getActiveSheet()->getCell('Z'.$i)->getValue()),
				'Jenjang_Pendidikan_Ayah'		=> strval($excel->getActiveSheet()->getCell('AA'.$i)->getValue()),
				'Penghasilan_Ayah'				=> strval($excel->getActiveSheet()->getCell('AC'.$i)->getValue()),
				'NIK_Ayah'						=> strval($excel->getActiveSheet()->getCell('AD'.$i)->getValue()),

				'Tahun_Lahir_Ibu'				=> strval($excel->getActiveSheet()->getCell('AF'.$i)->getValue()),
				'Jenjang_Pendidikan_Ibu'		=> strval($excel->getActiveSheet()->getCell('AG'.$i)->getValue()),
				'Penghasilan_Ibu'				=> strval($excel->getActiveSheet()->getCell('AI'.$i)->getValue()),
				'NIK_Ibu'						=> strval($excel->getActiveSheet()->getCell('AJ'.$i)->getValue()),

				'Tahun_Lahir_Wali'				=> strval($excel->getActiveSheet()->getCell('AL'.$i)->getValue()),
				'Jenjang_Pendidikan_Wali'		=> strval($excel->getActiveSheet()->getCell('AM'.$i)->getValue()),
				'Penghasilan_Wali'				=> strval($excel->getActiveSheet()->getCell('AO'.$i)->getValue()),
				'NIK_Wali'						=> strval($excel->getActiveSheet()->getCell('AP'.$i)->getValue()),

				'No_Peserta_Ujian_Nasional'		=> strval($excel->getActiveSheet()->getCell('AR'.$i)->getValue()),
				'No_Seri_Ijazah'				=> strval($excel->getActiveSheet()->getCell('AS'.$i)->getValue()),
				'Penerima_KIP'					=> strval($excel->getActiveSheet()->getCell('AT'.$i)->getValue()),
				'Nomor_KIP'						=> strval($excel->getActiveSheet()->getCell('AU'.$i)->getValue()),
				'Nama_di_KIP'					=> strval($excel->getActiveSheet()->getCell('AV'.$i)->getValue()),
				'Nomor_KKS'						=> strval($excel->getActiveSheet()->getCell('AW'.$i)->getValue()),
				'No_Registrasi_Akta_Lahir'		=> strval($excel->getActiveSheet()->getCell('AX'.$i)->getValue()),
				'Bank' 							=> strval($excel->getActiveSheet()->getCell('AY'.$i)->getValue()),
				'Nomor_Rekening_Bank'			=> strval($excel->getActiveSheet()->getCell('AZ'.$i)->getValue()),
				'Rekening_Atas_Nama'			=> strval($excel->getActiveSheet()->getCell('BA'.$i)->getValue()),
				'Layak_PIP_usulan_dari_sekolah'	=> strval($excel->getActiveSheet()->getCell('BB'.$i)->getValue()),
				'Alasan_Layak_PIP'				=> strval($excel->getActiveSheet()->getCell('BC'.$i)->getValue()),
				'Kebutuhan_Khusus'				=> strval($excel->getActiveSheet()->getCell('BD'.$i)->getValue()),
				'Sekolah_Asal'					=> strval($excel->getActiveSheet()->getCell('BE'.$i)->getValue()),

				'lintang'						=> strval($excel->getActiveSheet()->getCell('BG'.$i)->getValue()),
				'bujur'							=> strval($excel->getActiveSheet()->getCell('BH'.$i)->getValue()),
				'no_kk' 						=> strval($excel->getActiveSheet()->getCell('BI'.$i)->getValue()),
				'lingkar_kepala'				=> strval($excel->getActiveSheet()->getCell('BL'.$i)->getValue()),
				'jml_saudara'					=> strval($excel->getActiveSheet()->getCell('BM'.$i)->getValue()),
			); 
			$this->_cekDataImportSiswa($dataSiswaImport[$i]); 
			$i++;
		}	
	}

	private function _cekDataImportSiswa($dataSiswaImport)
	{
		$dataCek = $this->db->get_where('getpesertadidik', array('nisn'=>$dataSiswaImport['nisn'],'semester_id'=>$this->session->userdata('semester_id')))->row_array();
		if($dataCek){
			$this->db->where(array('nisn'=> $dataSiswaImport['nisn'],'semester_id'=>$this->session->userdata('semester_id')));
			$this->db->update('getpesertadidik', $dataSiswaImport);
			if($this->db->trans_status()===TRUE){
				echo "Sukses diperbaharui: ".$dataSiswaImport['nama'].'<br>';
			}else{
				echo "Gagal diperbaharui: ".$dataSiswaImport['nama'].'<br>';
			}
		}else{
			$this->db->insert('siswa', $dataSiswaImport);
			if($this->db->affected_rows()>0){
				echo "Sukses Ditambahkan: ".$dataSiswaImport['nama'].'<br>';
			}else{
				echo "Gagal Ditambahkan:".$dataSiswaImport['nama'].'<br>';
			}
		}
	}

	private function _iuran_tambah_kategori()
	{
		$this->form_validation->set_rules('nama', 'Nama Iuran', 'trim|required');
		$this->form_validation->set_rules('jenis_iuran', 'Jenis Iuran', 'trim|required');
		$this->form_validation->set_rules('nominal', 'Nominal', 'trim|required|numeric');
		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			$object = array(
				'uniq' => uniqid(),
				'nama' => $this->input->post('nama'),
				'jenis_iuran' => $this->input->post('jenis_iuran'),
				'nominal' => $this->input->post('nominal'),
			// 'semester_id' => $this->session->userdata('semester_id')
			);
			$table = "iuran_kategori";
			$this->_insert($table, $object);
		}
	}

	private function _iuran_tambah_cara_bayar()
	{
		$this->form_validation->set_rules('nama', 'Nama Iuran', 'trim|required');
		$this->form_validation->set_rules('jenis_transaksi', 'Jenis Transaksi', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			$object = array(
				'uniq' => uniqid(),
				'nama' => $this->input->post('nama'),
				'jenis_transaksi' => $this->input->post('jenis_transaksi'),
				'semester_id' => $this->session->userdata('semester_id')
			);
			$table = "iuran_cara_bayar";
			$this->_insert($table, $object);
		}
	}

	private function _tambah_mapping_iuran()
	{
		if($this->input->post('kategori_iuran')){
			foreach ($this->input->post('kategori_iuran') as $key => $value) {
				$decrypt = $this->encryption->decrypt($value);
				$explode = explode(',', $decrypt);
				$table = $explode[0];
				$rombongan_belajar_id = $explode[1];
				$kategori_iuran = $explode[2];
				$object[$table][] = array(
					'uniq' => uniqid(),
					'rombongan_belajar_id' => $rombongan_belajar_id,
					'uniq_iuran' => $kategori_iuran,
					'semester_id' => $this->session->userdata('semester_id')
				);
			}
			foreach ($object as $key => $value) {
				foreach ($value as $key1 => $value1) {
					$this->_insert($key, $value1);
				}
			}
		}
	}

	private function _iuran_hapus_mapping()
	{
		if($this->input->post('dataHapus')){
			$decrypt = json_decode($this->encryption->decrypt($this->input->post('dataHapus')));
			foreach ($decrypt as $key => $value) {
				foreach ($value as $key1 => $value1) {
					$object = array(
						'rombongan_belajar_id' => $value1->rombongan_belajar_id,
						'semester_id' => $this->session->userdata('semester_id')
					);
					$this->_delete($key, $object);
				}
			}
		}
	}

	private function _iuran_tambah_pembayaran()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required|date');
		$this->form_validation->set_rules('nominal', 'Nominal', 'trim|required|numeric');
		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			$object = array(
				'peserta_didik_id' => $this->input->post('peserta_didik_id'),
				'uniq_iuran' => $this->input->post('uniq_iuran'),
				'nominal' => $this->input->post('nominal'),
				'tanggal' => $this->input->post('tanggal'),
				'semester_id' => $this->input->post('semester_id')
			);
			$table = 'iuran_pembayaran';
			$this->_insert($table, $object);
		}
	}

	private function _iuran_hapus_pembayaran_perItem()
	{
		if($this->input->post('dataHapus')){
			$decrypt = json_decode($this->encryption->decrypt($this->input->post('dataHapus')),true);
			$table = 'iuran_pembayaran';
			$this->_delete($table, $decrypt);
		}
	}

	private function _iuran_tambah_pembayaran_rutin()
	{
		if($this->input->post('peserta_didik_id')&&$this->input->post('nominal')){
			$this->form_validation->set_rules('nominal[]', 'Nominal', 'trim|required|numeric');
			if ($this->form_validation->run() == FALSE) {
				echo validation_errors();
			} else {
				foreach ($this->input->post('nominal') as $key => $value) {
					$semester_id = $this->input->post('semester_id')[$key];
					$uniq_iuran = $this->input->post('iuran')[$key];
					$bula_rutin = $this->input->post('bulan_rutin')[$key];
					$object[] = array(
						'tanggal' => $this->input->post('tanggal'),
						'peserta_didik_id' => $this->input->post('peserta_didik_id'),
						'uniq_iuran' => $uniq_iuran,
						'bulan_rutin' => $bula_rutin,
						'semester_id' => $semester_id,
						'nominal' => $value
					);
				}
				$this->db->insert_batch('iuran_pembayaran', $object);
				if($this->db->affected_rows() > 0){
					echo "Berhasil Menyimpan Data";
				}else{
					echo "Gagal Menyimpan Data";
				}
			}
		}
	}

	private function _iuran_hapus_pembeyaran_rutin()
	{
		if($this->input->post('dataHapus')){
			$decrypt = json_decode($this->encryption->decrypt($this->input->post('dataHapus')));
			foreach ($decrypt as $key => $value) {
				foreach ($value as $key1 => $value1) {
					$object = array(
						'peserta_didik_id' => $value1->peserta_didik_id,
						'uniq_iuran' => $value1->uniq_iuran,
						'bulan_rutin' => $value1->bulan_rutin,
						'semester_id' => $value1->semester_id
					);
					$this->_delete($key, $object);
				}
			}
		}
	}

	function kategori_penyimpanan()
	{
		if($this->input->post('peran')){
			$peran = $this->input->post('peran');
			$sql = $this->m_penyimpanan->kategori_penyimpanan_peran($peran);
			if($sql){
				echo "<ul class='list-group'>";
				foreach ($sql as $key => $value) {
					$idHapus = $this->encryption->encrypt(json_encode($value));
					echo "<li class='list-group-item d-flex justify-content-between align-items-center'>$value->nama <span class='badge btn btn-sm' id='hapus' data-id='$idHapus'><i class='fas fa-trash text-danger'></i></span></li>";
				}
				echo "</ul>";
			}
		}
	}

	private function _tambah_kategori_penyimpanan()
	{
		if($this->input->post('nama_kategori')){
			$table = 'kategori_penyimpanan';
			$object = array(
				'uniq' => uniqid(),
				'nama' => $this->input->post('nama_kategori')
			);
			$this->_insert($table, $object);
		}
	}

	private function _hapus_kategori_penyimanan()
	{
		if($this->input->post('dataHapus')){
			$decrypt = json_decode($this->encryption->decrypt($this->input->post('dataHapus')),true);
			foreach ($decrypt as $key => $value) {
				$table = $key;
				foreach ($value as $key1 => $value1) {
					$where = $value1;
					$this->_delete($table, $where);
				}
			}
		}
	}

	private function _tambah_mapping_kategori_penyimpanan()
	{
		$this->form_validation->set_rules('peran', 'Peran', 'trim|required');
		$this->form_validation->set_rules('kategori', 'Kategori Penyimpanan', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			$object = array(
				'uniq' => uniqid(),
				'uniq_kategori' => $this->input->post('kategori'),
				'peran_id_str' => $this->input->post('peran')
			);
			$table = 'kategori_penyimpanan_mapping';
			$this->_insert($table, $object);
		}
	}

	private function _hapus_kategori_penyimpanan_mapping()
	{
		if($this->input->post('dataHapus')){
			$decrypt = json_decode($this->encryption->decrypt($this->input->post('dataHapus')), true);
			foreach ($decrypt as $key => $value) {
				foreach ($value as $key1 => $value1) {
					$cekData = $this->db->get_where('upload_file', array('kategori_penyimpanan'=>$value1['uniq'],'peran_id_str'=>$value1['peran_id_str']))->result();
					if(!$cekData){
						$where = array('uniq'=>$value1['uniq'],'uniq_kategori'=>$value1['uniq_kategori'],'peran_id_str'=>$value1['peran_id_str']);
						$this->_delete($key, $where);
					}else{
						echo "Tidak bisa Menghapus data: ".$value1['nama'];
					}
				}
			}
		}
	}

	function _upload_file()
	{
		// $this->form_validation->set_rules('nama_file', 'Nama File', 'trim|required');
		$this->form_validation->set_rules('kategori_penyimpanan', 'Kategori Penyimpanan', 'trim|required');
		if(!$_FILES['fileToUpload']['tmp_name']){
			$this->form_validation->set_rules('fileToUpload', 'Berkas', 'trim|required');
		}
		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			if($this->session->userdata('peran_id_str')=='Peserta Didik'){
				$dir = 'upload/'.$this->session->userdata('peserta_didik_id');
				$user_id = $this->session->userdata('peserta_didik_id');
			}else{
				$dir = 'upload/'.$this->session->userdata('ptk_id');
				$user_id = $this->session->userdata('ptk_id');
			}
			$output_dir = $dir."/";
			if(isset($_FILES["fileToUpload"]))
			{
				$ret = array();
				$error = $_FILES["fileToUpload"]["error"];
				if(!is_array($_FILES["fileToUpload"]["name"]))
				{
					$strpos = strpos($_FILES['fileToUpload']['type'], '/');
					$type = substr($_FILES['fileToUpload']['type'], $strpos +1);
					// $fileName = $this->input->post('nama_file').'.'.$type;
					$fileName = $_FILES['fileToUpload']['name'];
					if (file_exists($output_dir.$fileName)) {
						$ret[] = "Sorry, filename ".$_FILES['fileToUpload']['name']." already exists.";
					}else{
						$object = array(
							'uniq' => uniqid(),
							'tanggal' => date('Y-m-d H:i:s'),
							'pengguna_id' => $user_id,
							'peran_id_str' => $this->session->userdata('peran_id_str'),
							'nama_file' => $fileName,
							'kategori_penyimpanan' => $this->input->post('kategori_penyimpanan'),
							'type' => $_FILES['fileToUpload']['type'],
							'ext' => $type,
							'size' => $_FILES['fileToUpload']['size']
						);
						$table = 'upload_file';
						if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$output_dir.$fileName)){
							$this->db->insert($table, $object);
							if($this->db->affected_rows() > 0){
								$ret[]= $fileName.' Berhasil di upload';
							}else{
								$ret[] = $fileName.' Gagal di upload';
							}
						}else{
							$ret[]= $fileName.' Gagal di upload';
						}

					}
				}
				// echo json_encode($ret);
				foreach ($ret as $key => $value) {
					echo $value."<br>";
				}
			}
		}
	}

	function _hapus_file_upload()
	{
		if($this->input->post('dataHapus')){
			if($this->session->userdata('peran_id_str')=="Peserta Didik"){
				$folder = $this->session->userdata('peserta_didik_id');
			}else{
				$folder = $this->session->userdata('ptk_id');
			}
			$dataHapus = json_decode($this->encryption->decrypt($this->input->post('dataHapus')));
			foreach ($dataHapus as $key => $value) {
				$table = $key;
				foreach ($value as $key1 => $value1) {
					$fileName = $value1->nama_file;
					$filePath = 'upload/'.$folder.'/'.$value1->nama_file;
					if (file_exists($filePath)) 
					{
						$this->db->where('uniq', $value1->uniq);
						$this->db->delete('upload_file');
						if($this->db->affected_rows() > 0 ){
							echo "Berhasil Menghapus File ".$fileName." <br>";
							unlink($filePath);
						}else{
							echo "Gagal Menghapus File ".$fileName."<br>";
						}
					}else{
						echo "Gagal";
					}
				}
			}
		}
	}

	function download_file_penyimpanan()
	{
		if(isset($_POST['filename']))
		{
			$json =  base64_decode($this->input->get('filename'));
			$dataArray = json_decode($json,  true);
			if($this->session->userdata('peran_id_str')=='Peserta Didik'){
				$dir = 'upload/'.$this->session->userdata('peserta_didik_id').'/';
				$user_id = $this->session->userdata('peserta_didik_id');
			}else{
				$dir = 'upload/'.$this->session->userdata('ptk_id').'/';
				$user_id = $this->session->userdata('ptk_id');
			}
			$strpos = strrpos($dataArray['type'], '/');
			$type = substr($dataArray['type'], $strpos + 1);
			$fileName = $dataArray['nama_file'].'.'.$type;
			$fileName=str_replace("..",".",$fileName);
			$file = $dir.$fileName;
			$file = str_replace("..","",$file);
			if (file_exists($file)) {
				echo $file;
			}else{
				echo "err";
			}
		}
	}

	private function _taindai_penyimpanan_user()
	{
		if($this->input->post('q')){
			$decrypt = json_decode($this->encryption->decrypt($this->input->post('q')));
			if($decrypt->peserta_didik_id){
				$pengguna_id = $decrypt->peserta_didik_id;
			}else{
				$pengguna_id = $decrypt->ptk_id;
			}
			$object = array('status' => $this->input->post('tanda'));
			$where = array(
				'pengguna_id' => $pengguna_id,
				'peran_id_str' => $decrypt->peran_id_str
			);
			$table = 'upload_file';
			$this->_update($table, $object, $where);
		}
	}

	private function _tambah_sertifikat_pendidik()
	{
		foreach ($this->input->post('nomor_sertifikat') as $key => $value) {
			if($value){
				$object = array(
					'ptk_id' => $this->input->post('ptk_id'),
					'nomor_sertifikat' => $value
				);
				$table = "sertifikat_pendidik";
				$this->db->where($object);
				$cek = $this->db->get('sertifikat_pendidik')->result();
				if(!$cek){
					$this->_insert($table, $object);
				}
				echo $this->db->last_query();
			}else{
				echo "Nomor Sertifikat Kosong";
			}
		}
	}

}