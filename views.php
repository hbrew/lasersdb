<?php

class View {
	private $context = array();

	function __construct() {
		$this->cleanArgs();
		$this->context['STATIC'] = $GLOBALS['static_dir'];
	}
	
	## Functions which compile the view in context ##

	public function getHome() {
		$this->render('index.html');
	}

	public function getTable($model) {
		$this->context['CONTENT'] = $this->getStaticContent('table.html');
		$this->context['JS'] = '<script src="js/table.js"></script>';
		$model->loadTable();
		$columns = $model->getTableCols();
		$data = $model->getTableData();
		$tbody = '<thead><tr>';
		foreach($columns as $key => $col) {
			$tbody = $tbody . '<th>' . $col . '</th>';
		}
		$tbody = $tbody . '</tr></thead><tbody>';
		foreach($data as $key => $row) {
			$tbody = $tbody . '<tr>';
			foreach($row as $key => $col) {
				$tbody = $tbody . '<td>' . $col . '</td>';
			}
			$tbody = $tbody . '</tr>';
		}
		$tbody = $tbody . '</tbody>';
		$this->context['TBODY'] = $tbody;
		$this->render('index.html');
	}

	public function getChart($content, $scripts) {
		$this->context['CONTENT'] = $this->getStaticContent($content);
		$this->context['CHART'] = $this->getStaticContent('chart.html');
		$js = '<script src="js/chart.js"></script>';
		foreach($scripts as $key => $file) {
			$js = $js . "\n" . '<script src="js/'.$file.'"></script>';
		}
		$this->context['JS'] = $js;
		$this->render('index.html');
	}

	## Connections between models and views ##

	public function getChemName($type) {
		$this->context['TITLE'] = ChemName::$name;
		if ($type == 'table') {
			$this->getTable(new ChemName);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}

	public function getConduct($type) {
		$this->context['TITLE'] = Conduct::$name;
		if ($type == 'table') {
			$this->getTable(new Conduct);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}

	public function getDamage($type) {
		$this->context['TITLE'] = Damage::$name;
		if ($type == 'table') {
			$this->getTable(new Damage);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}

	public function getDensity($type) {
		$this->context['TITLE'] = Density::$name;
		if ($type == 'table') {
			$this->getTable(new Density);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}

	public function getDndt($type) {
		$this->context['TITLE'] = Dndt::$name;
		if ($type == 'table') {
			$this->getTable(new Dndt);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}

	public function getElectOpt($type) {
		$this->context['TITLE'] = ElectOpt::$name;
		if ($type == 'table') {
			$this->getTable(new ElectOpt);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}


	public function getElevel($type) {
		$this->context['TITLE'] = Elevel::$name;
		if ($type == 'table') {
			$this->getTable(new Elevel);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}


	public function getExpand($type) {
		$this->context['TITLE'] = Expand::$name;
		if ($type == 'table') {
			$this->getTable(new Expand);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}


	public function getLifetime($type) {
		$this->context['TITLE'] = Lifetime::$name;
		if ($type == 'table') {
			$this->getTable(new Lifetime);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}


	public function getManfold($type) {
		$this->context['TITLE'] = Manfold::$name;
		if ($type == 'table') {
			$this->getTable(new Manfold);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}


	public function getNonline($type) {
		$this->context['TITLE'] = Nonline::$name;
		if ($type == 'table') {
			$this->getTable(new Nonline);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}


	public function getOptPump($type) {
		$this->context['TITLE'] = OptPump::$name;
		if ($type == 'table') {
			$this->getTable(new OptPump);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}


	public function getPhoto($type) {
		$this->context['TITLE'] = Photo::$name;
		if ($type == 'table') {
			$this->getTable(new Photo);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}


	public function getPhysical($type) {
		$this->context['TITLE'] = Physical::$name;
		if ($type == 'table') {
			$this->getTable(new Physical);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}


	public function getReldiel($type) {
		$this->context['TITLE'] = Reldiel::$name;
		if ($type == 'table') {
			$this->getTable(new Reldiel);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}


	public function getSellmeier($type) {
		$this->context['TITLE'] = Sellmeier::$name;
		if ($type == 'table') {
			$this->getTable(new Sellmeier);
		}
		elseif ($type == 'chart') {
			$content = 'sellmeier.html';
			$scripts = array('sellmeier.js');
			$this->getChart($content, $scripts);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}

	public function getSpecHeat($type) {
		$this->context['TITLE'] = SpecHeat::$name;
		if ($type == 'table') {
			$this->getTable(new SpecHeat);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}


	public function getVSound($type) {
		$this->context['TITLE'] = VSound::$name;
		if ($type == 'table') {
			$this->getTable(new VSound);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}


	public function getYield($type) {
		$this->context['TITLE'] = YieldStrength::$name;
		if ($type == 'table') {
			$this->getTable(new YieldStrength);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}

	public function getYoung($type) {
		$this->context['TITLE'] = Young::$name;
		if ($type == 'table') {
			$this->getTable(new Young);
		}
		else {
			$GLOBALS['errors'][] = new Error('Unsupported type');
			$this->render('index.html');
		}
	}

	## Private helper functions ##
	private function cleanArgs() {

	}

	private function getStaticContent($page) {
		$content_path = $GLOBALS['content_dir'] . $page;
		return file_get_contents($content_path);
	}

	private function render($page) {
		$template_path = $GLOBALS['template_dir'] . $page;
		$template = file_get_contents($template_path);
		$this->context['ERRORS'] = Error::format();
		foreach($this->context as $var => $value) {
			$template = str_replace("{{ $var }}", $value, $template);
		}
		$output = preg_replace('/\{\{.+?\}\}/', '', $template);
		echo $output;
	}

}

?>