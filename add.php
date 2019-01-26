<?php

require_once 'init.php';

// ADD NEW ITEM

if (isset($_POST['new-item'])) {

	$newItem = trim($_POST['new-item']);
	$zero = 0;

	if (!empty($newItem)) {
		$stmt = $connection->prepare("INSERT INTO items (value, done) VALUES (?, ?)");
		$stmt->bind_param("si", $newItem, $zero);
		$stmt->execute();
	}

}

header('Location: index.php');