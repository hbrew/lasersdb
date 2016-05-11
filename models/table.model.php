<?php

class Table extends MySQL {
	
	protected $table_name;
	protected $columns = array(); // Database column names
	protected $data = array(); // Table data
	protected $column_names = array(); // Human readable version of database column names (excluding db only columns like id)

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

		$this->cleanFields();

	}

	protected function cleanFields() {
		# Remove db specific columns
		$junk_names = array(
			'uid',
			'_date',
			'_id',
			'file_'
		);
		foreach($junk_names as $junk_key => $name) {
			foreach($this->columns as $column_key => $column) {
				$junk = strpos($column, $name);
				if(!($junk === False)) {
					unset($this->columns[$column_key]);
					foreach($this->data as $key => $row) {
						unset($this->data[$key][$column_key]);
					}
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

	public function getTableColNames() {
		if (empty($this->column_names)) {
			return $this->columns;
		}
		return $this->column_names;
	}

}

?>
