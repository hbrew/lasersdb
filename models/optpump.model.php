<?php

class OptPump extends Table {

	public static $id = 'optpump';
	public static $name = 'Optical pump types';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'opt_pump';
		parent::__construct();
	}

}

?>