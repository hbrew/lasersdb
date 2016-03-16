<?php

class SpecHeat extends Table {

	public static $id = 'specheat';
	public static $name = 'Specific heats (J/Kg*K)';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'specheat';
		parent::__construct();
	}

}

?>