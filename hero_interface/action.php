<?php

$hero = $_POST['hero'];
$method = $_POST['method'];
$features = $_POST['features'];
$features = implode(',', $features);


if( $method == 0 ) {
	$line = 'py hero_jaccard_distance.py "' . $hero . '" "' . $features . '"';
} elseif ( $method == 1 ) {
	$line = 'py hero_dice_distance.py "' . $hero . '" "' . $features. '"';
} else {
	$line = 'py hero_sokalmichener_distance.py "' . $hero . '" "' . $features . '"';
}

$command = escapeshellcmd($line);
$output = shell_exec($command);

if ($output == 0) {
	header("Location: results.php");
}