<?php

class YieldStrength extends Table {

	public static $id = 'yield';
	public static $name = 'Yield strengths (N/m^2)';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'yield';
		parent::__construct();
	}

}

?>