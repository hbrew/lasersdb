<?php

class Expand extends Table {

	public static $id = 'expand';
	public static $name = 'Thermal expansion coefficients (1/K)';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'expand';
		parent::__construct();
	}

}

?>