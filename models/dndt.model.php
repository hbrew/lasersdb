<?php

class Dndt extends Table {

	public static $id = 'dndt';
	public static $name = 'Index of refraction vs temperature';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'dndt';
		parent::__construct();
	}

}

?>