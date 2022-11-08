<?php
/**
 * 
 */
class Web_service
{
	function conn()
	{
		$CI =& get_instance();
		return $CI->db->get('webservice')->row_array();
	}
}