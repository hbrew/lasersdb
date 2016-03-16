<?php

class Damage extends Table {

	public static $id = 'damage';
	public static $name = 'Damage Thresholds (J/m)';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'damage';
		parent::__construct();
	}

}

?>