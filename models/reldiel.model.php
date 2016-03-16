<?php

class Reldiel extends Table {

	public static $id = 'reldiel';
	public static $name = 'Relative dielectric coefficients';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'reldiel';
		parent::__construct();
	}

}

?>