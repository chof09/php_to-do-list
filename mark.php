<?php

require_once 'init.php';

if (isset($_GET['as'], $_GET['item'])) {

	$as 	= $_GET['as'];
	$item 	= filter_var ($_GET['item'], FILTER_SANITIZE_NUMBER_INT);
	$one = 1;
	$zero = 0;

	$stmt = $connection->prepare("UPDATE items SET done=? WHERE id=?");
	$del = $connection->prepare("DELETE FROM items WHERE id=?");

	switch($as) {
		case 'done':
			$stmt->bind_param("ii", $one, $item);
			$stmt->execute();
			break;

		case 'notdone':
			$stmt->bind_param("ii", $zero, $item);
			$stmt->execute();
			break;

		case 'remove':
			$del->bind_param("i", $item);
			$del->execute();
	}

}

header('Location: index.php');