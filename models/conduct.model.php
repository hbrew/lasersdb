<?php

class Conduct extends Table {

	public static $id = 'conduct';
	public static $name = 'Thermal conductivity coefficients (W/m*K)';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'conduct';
		parent::__construct();
	}

}

?>