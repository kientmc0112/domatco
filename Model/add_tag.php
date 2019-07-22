<?php  
	require_once "DBConfig.php";
	$db = new Database;
	$db->connect();
	$name = $_POST['name'];
	$db->addTag($name);
	$data = $db->getTag($name);
	echo $data;

