<?php
	require_once 'mysqli.php';
	$id = $_POST['id'];  
	$conn->query("set names 'utf8'");
	$sql_delete_tag1 = "DELETE FROM dmc_tag WHERE tag_id = '$id'";
	mysqli_query($conn, $sql_delete_tag1);
	// $sql_delete_tag2 = "DELETE FROM specification WHERE id='$id'";
	// mysqli_query($conn, $sql_delete_tag2);
	$sql_check_tag = "SELECT * FROM dmc_tag WHERE tag_id = '$id'";
	if(mysqli_num_rows(mysqli_query($conn, $sql_check_tag)) == 0) echo 1;
	else echo 0;