<?php

# Manually include classes required by others
include_once('db.model.php');
include_once('table.model.php');
include_once('plot.model.php');

# Now bring in the rest
foreach (glob("models/*.model.php") as $filename) {
	$parts = explode("/", $filename);
	$filename = $parts[1];
	include_once($filename);
}


?>
