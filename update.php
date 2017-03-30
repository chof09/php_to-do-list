<?php

require_once 'init.php';

if (isset($_POST['edit-item-field'], $_POST['id-to-edit'])) {

	$updatedItem = trim($_POST['edit-item-field']);
	$id = (int) $_POST['id-to-edit'];

	if (!empty($updatedItem)) {
		$stmt = $connection->prepare("UPDATE items SET value=? WHERE id=?");
		$stmt->bind_param("si", $updatedItem, $id);
		$stmt->execute();
	}

}

header('Location: index.php');