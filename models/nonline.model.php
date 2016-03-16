<?php

class Nonline extends Table {

	public static $id = 'nonline';
	public static $name = 'Nonlinear Coefficients (pm/V)';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'nonline';
		parent::__construct();
	}

}

?>