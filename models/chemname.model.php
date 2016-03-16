<?php

class ChemName extends Table {

	public static $id = 'chemname';
	public static $name = 'Chemical names and formulas';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'chem_name';
		parent::__construct();
	}

}

?>