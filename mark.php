<?php

require_once 'init.php';

if (isset($_GET['as'], $_GET['item'])) {

	$as 	= $_GET['as'];
	$item 	= filter_var ($_GET['item'], FILTER_SANITIZE_NUMBER_INT);
	$one = 1;
	$zero = 0;

	$stmt = $connection->prepare("UPDATE items SET done=? WHERE id=?");

	switch($as) {
		case 'done':
			$stmt->bind_param("ii", $one, $item);
			$stmt->execute();
			break;

		case 'notdone':
			$stmt->bind_param("ii", $zero, $item);
			$stmt->execute();
			break;
	}

}

header('Location: index.php');