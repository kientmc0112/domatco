<?php
	require_once "mysqli.php";
	$conn->query("set names 'utf8'");
	$checkbox = $_POST["checkbox"];
	for($i=0; $i < count($checkbox); $i++) {
	   $sql_delete_tag = "DELETE FROM dmc_article WHERE article_id = '$checkbox[$i]'";
	   mysqli_query($conn, $sql_delete_tag);
	}
	echo 1;
?>