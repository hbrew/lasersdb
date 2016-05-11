<?php

class Footnote extends Table {

	public static $id = 'footnote';
	public static $name = 'LasersDB references';
	public static $types = array('table'); # Supported ways of viewing data

	function __construct() {
		$this->table_name = 'footnote_lasers';
		$this->column_names = array('Footnote', 'Reference');
		parent::__construct();
	}

}

?>