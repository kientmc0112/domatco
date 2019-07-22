<?php 
	require_once "DBConfig.php";
	$db = new Database;
	$db->connect();
	$user = $_POST['user'];
	echo $db->checkAccount($user);
 ?>