<?php

class Physical extends Table {

	public static $id = 'physical';
	public static $name = 'Hardness (Moh), Poisson ratios, point and space groups';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'physical';
		parent::__construct();
	}

}

?>