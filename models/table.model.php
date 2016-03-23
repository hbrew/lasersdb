<?php

class Table extends MySQL {
	
	protected $table_name;
	private $columns = array();
	private $data = array();

	function __construct() {
		$this->connect();
	}

	public function loadTable() {
		$q = 'SELECT * FROM '. $this->table_name;
		$result = $this->query($q);
		while($col = $result->fetch_field()) {
			$this->columns[] = $col->name;
		}

		// Requres native mysql driver
		//$this->data = $result->fetch_all(MYSQLI_NUM);
		while($row = $result->fetch_array(MYSQLI_NUM)) {
			$this->data[] = $row;
		}

		# Remove db specific columns
		$junk_names = array(
			'footnote',
			'uid'
		);
		foreach($junk_names as $key => $name) {
			$junk = array_search($name, $this->columns);
			if($junk) {
				unset($this->columns[$junk]);
				foreach($this->data as $key => $row) {
					unset($this->data[$key][$junk]);
				}
			}
		}

	}

	public function getTableCols() {
		return $this->columns;
	}

	public function getTableData() {
		return $this->data;
	}

}

?>
