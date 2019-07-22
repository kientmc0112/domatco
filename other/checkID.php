<?php
	require_once 'mysqli.php';
	$conn->query("set names 'utf8'");
	$id = $_POST['id'];
	$sql6 = "select * from article where idA = '$id'";
	$sql6Result = mysqli_query($conn, $sql6);
	if(mysqli_num_rows($sql6Result) > 0) echo '1';
	else echo 0;
?>