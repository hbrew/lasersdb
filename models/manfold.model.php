<?php

class Manfold extends Table {

	public static $id = 'manfold';
	public static $name = 'Energy levels by manifold';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'manfold';
		parent::__construct();
	}

}

?>