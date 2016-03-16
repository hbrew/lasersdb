<?php

class Young extends Table {

	public static $id = 'young';
	public static $name = 'Young\'s modulus (N/m^2 *1e9)';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'young';
		parent::__construct();
	}

}

?>