<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('max_execution_time', '300');
include APPPATH."third_party/PHPExcel/Classes/PHPExcel.php";
include APPPATH."third_party/PHPExcel/Classes/PHPExcel/IOFactory.php";

class Excel extends PHPExcel {
	public function __construct() {
		parent::__construct();
	}
}
?>