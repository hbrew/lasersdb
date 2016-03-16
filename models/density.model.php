<?php

class Density extends Table {

	public static $id = 'density';
	public static $name = 'Densities (Kg/m^3)';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'density';
		parent::__construct();
	}

}

?>