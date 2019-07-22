<?php
	require_once "DBConfig.php";
	$db = new Database; 
	$db->connect();
	$checkbox = $_POST["checkbox"];
	for($i=0; $i < count($checkbox); $i++) {
		$db->deleteArticle($checkbox[$i]);   
		$db->deleteRelation($checkbox[$i]);
	}
	echo 1;
?>