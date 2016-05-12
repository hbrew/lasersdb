<?php

class Spectra extends Table {

	public static $id = 'spectra';
	public static $name = 'Absorption and Emission Spectra';
	public static $types = array('table', 'chart'); # Supported ways of viewing data
	protected $file_table = 'spectra_files';
	protected $data_table = 'spectra';
	private $options = array();
	private $wavelengths = array();
	private $signals = array();

	function __construct() {
		$this->table_name = 'spectra_files';
		$this->column_names = array('Name', 'Axis', 'Type', 'Wavelength Start (nm)', 'Wavelength End (nm)');
		parent::__construct();
	}

	public function loadOptions() {
		$q = 'SELECT file_id,cat_name,axis,sig_type,wavelength_start,wavelength_end FROM '.$this->file_table;
		$result = $this->query($q);
		while($row = $result->fetch_assoc()) {
			$wavelength_range = strval($row['wavelength_start'])." - ".strval($row['wavelength_end']);
			$types = array('abs'=>'Absorption', 'emi'=>'Emission');
			$type = $types[$row['sig_type']];
			$axis = $row['axis'];
			if (is_null($axis)) { $axis = "iso"; }
			$this->options[$type][$row['cat_name']][$row['axis']][$wavelength_range] = $row['file_id']; 
		}
	}

	public function getJson() {
		return json_encode($this->options);
	}

	public function selectOptions($type, $name, $axis, $range) {
		if (array_key_exists($type, $this->options)) {
			if (array_key_exists($name, $this->options[$type])) {
				if (array_key_exists($axis, $this->options[$type][$name])) {
					if (array_key_exists($range, $this->options[$type][$name][$axis])) {
						$q = 'SELECT wavelength,sig FROM '.$this->data_table.' WHERE file_id = '.$this->options[$type][$name][$axis][$range];
						$result = $this->query($q);
						while($row = $result->fetch_array(MYSQLI_ASSOC)) {
							// print_r($row);
							$this->wavelengths[] = $row['wavelength'] - 0;
							$this->signals[] = $row['sig'] - 0;
						}
						return True;
					}
				}
			}
		}
		return False;
	}

	public function getWavelengths() {
		return $this->wavelengths;
	}

	public function getSignals() {
		return $this->signals;
	}

	public function clearSelection() {
		$this->wavelengths = array();
		$this->signals = array();
	}

}

?>
