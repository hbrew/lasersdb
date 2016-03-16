<?php

require('views.php');
require('data.php');


# output formatted data
if (isset($_GET['data'])) {
	$data_req = $_GET['data'];
	if ($data_req == 'summary') {
		Data::getSummaries();
	}
	elseif ($data_req == 'sellmeier') {
		Data::plotSellmeier();
	}
}
# Or render a page
else {
	$view = new View;
	$view_req = '';
	if (isset($_GET['view'])) {
		$view_req = $_GET['view'];
	}
	$type_req = '';
	if (isset($_GET['type'])) {
		$type_req = $_GET['type'];
	}
	if($view_req == '' || $view_req == 'home') {
		$view->getHome();
	}
	elseif($view_req == 'chemname') {
		$view->getChemName($type_req);
	}
	elseif($view_req == 'conduct') {
		$view->getConduct($type_req);
	}
	elseif($view_req == 'damage') {
		$view->getDamage($type_req);
	}
	elseif($view_req == 'density') {
		$view->getDensity($type_req);
	}
	elseif($view_req == 'dndt') {
		$view->getDndt($type_req);
	}
	elseif($view_req == 'electopt') {
		$view->getElectOpt($type_req);
	}
	elseif($view_req == 'elevel') {
		$view->getElevel($type_req);
	}
	elseif($view_req == 'expand') {
		$view->getExpand($type_req);
	}
	elseif($view_req == 'lifetime') {
		$view->getLifetime($type_req);
	}
	elseif($view_req == 'manfold') {
		$view->getManfold($type_req);
	}
	elseif($view_req == 'nonline') {
		$view->getNonline($type_req);
	}
	elseif($view_req == 'optpump') {
		$view->getOptPump($type_req);
	}
	elseif($view_req == 'photo') {
		$view->getPhoto($type_req);
	}
	elseif($view_req == 'physical') {
		$view->getPhysical($type_req);
	}
	elseif($view_req == 'reldiel') {
		$view->getReldiel($type_req);
	}
	elseif($view_req == 'sellmeier') {
		$view->getSellmeier($type_req);
	}
	elseif($view_req == 'specheat') {
		$view->getSpecHeat($type_req);
	}
	elseif($view_req == 'vsound') {
		$view->getVSound($type_req);
	}
	elseif($view_req == 'yield') {
		$view->getYield($type_req);
	}
	elseif($view_req == 'young') {
		$view->getYoung($type_req);
	}
}
?>