<?php

require_once 'init.php';

if (isset($_GET['item'])) {

	$id = $_GET['item'];

	$del = $connection->prepare("DELETE FROM items WHERE id=?");
	$del->bind_param("i", $id);
	$del->execute();

}

header('Location: index.php');