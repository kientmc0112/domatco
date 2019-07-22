<?php  
	require_once "DBConfig.php";
	$db = new Database;
	$db->connect();
	$id = $_POST['id'];
	$db->deleteTag($id);
	echo 1;
?>

