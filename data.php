<?php

class Data {

	public static function getSummaries() {

		$summaries = array();
		foreach(get_declared_classes() as $model) {
			if(is_subclass_of($model, 'Table')) {
				$summaries[$model::$id] = array(
					'name' => $model::$name,
					'types' => $model::$types
				);
			}
		}
		# Sort by name
		$names = array();
		foreach($summaries as $key => $row) {
			$names[$key] = $row['name'];
		}
		array_multisort($names, $summaries);
		echo json_encode($summaries);
	}

	public static function plotSellmeier() {
		$plot = new Plot();
		$plot->title("N Vs. Wavelength");
		$plot->xlabel("Wavelength (micrometers)");
		$plot->ylabel("Index of Refraction");
		$sell = new Sellmeier();
		$sell->loadMaterialsData();

		// Make material selection if it exists
		if(isset($_GET['selection'])) {
			// Parse selection
			$selection = json_decode(urldecode($_GET['selection']));
			//print_r($selection);
			if(!$sell->selectMaterials($selection)) {
				$errors[] = new Error("Materials do not exist", 1);
			}
			// Parse legend
			$legend = array();
			if(isset($_GET['legend']) && is_array($_GET['legend']) && count($_GET['legend']) == count($selection)) {
				$legend = $_GET['legend'];
			} else {
				foreach($selection as $material => $array) {
					foreach($array as $key => $axis) {
						$legend[] = $material . " (axis " . $axis . ")";
					}
				}
			}
			$plot->legend($legend);

			// Parse title
			if(isset($_GET['title'])) {
				$title = $_GET['title'];
				$sell->title($title);
			}

			// Parse domain
			$xmin = .4;
			$xmax = 1;
			$step = .001;
			if(isset($_GET['xmin']) && isset($_GET['xmax']) && isset($_GET['step'])) {
				if(is_numeric($_GET['xmin']) && is_numeric($_GET['xmax']) && is_numeric($_GET['step'])) {
					$xmin = $_GET['xmin'] + 0;
					$xmax = $_GET['xmax'] + 0;
					$step = $_GET['step'] + 0;
				} else {
					$errors[] = new Error("Wavelength range must be a number", 1);
				}
			}
			$plot->setX(range($xmin, $xmax, $step));
			$ydata = array();
			foreach($sell->getSelection() as $name => $axis_array) {
				foreach($axis_array as $axis => $coeffs) {
					$legend = $name.'.'.$axis;
					$ydata[$legend] = array();
					foreach($plot->getX() as $x) {	
						$ydata[$legend][] = $sell->calcSellmeier($x, 
							$coeffs['a'],
							$coeffs['b'],
							$coeffs['c'],
							$coeffs['d'],
							$coeffs['e']
						);
					}
				}
			}
			$plot->setY($ydata);
			// Output plot data
			echo $plot->getJson();
		} else {
			// Output materials list
			echo $sell->getMaterialsJson();
		}
	}

}

?>