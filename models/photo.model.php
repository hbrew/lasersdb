<?php

class Photo extends Table {

	public static $id = 'photo';
	public static $name = 'Photo-elastic coefficient';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'photo';
		parent::__construct();
	}

}

?>