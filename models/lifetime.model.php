<?php

class Lifetime extends Table {

	public static $id = 'lifetime';
	public static $name = 'Host lifetimes';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'lifetime';
		parent::__construct();
	}

}

?>