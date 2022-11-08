<?php
/**
 * 
 */
class Peran_id_str
{


	public function pembelajaran()
	{
		return $peran = array(
			'Operator Sekolah' => 'semua_pembelajaran',
			'Kepala Sekolah' => 'semua_pembelajaran',
			'Bendahara BOS' => 'pembelajaran_ptk',
			'PTK' => 'pembelajaran_ptk',
			'Peserta Didik' => 'pembelajaran_pd'
		);
	}
}