<?php

class ElectOpt extends Table {

	public static $id = 'electopt';
	public static $name = 'Electro-optical coefficients (pm/V)';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'elect_opt';
		parent::__construct();
	}

}

?>