<?php

session_start();

if (isset($_POST['sort-items'])) {
	$_SESSION['sorty'] = $_POST['sort-items'];
}

header('Location:index.php');