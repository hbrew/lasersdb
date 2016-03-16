<?php

class Elevel extends Table {

	public static $id = 'elevel';
	public static $name = 'Energy levels and degeneracies';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'elevel';
		parent::__construct();
	}

}

?>