<?php

class VSound extends Table {

	public static $id = 'vsound';
	public static $name = 'Velocity of sound (m/s)';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'vsound';
		parent::__construct();
	}

}

?>