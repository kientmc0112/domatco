<?php
	require_once 'mysqli.php';
	$conn->query("set names 'utf8'");
	$name = $_POST['name'];
	$sql_add_tag = "INSERT INTO dmc_tag(tag_name) VALUES('$name')";
	mysqli_query($conn, $sql_add_tag);

	$sql_check_tag = "SELECT tag_id FROM dmc_tag WHERE tag_name = '$name'";
	mysqli_query($conn, $sql_check_tag);


	// echo mysqli_num_rows(mysqli_query($conn, $sql_check_tag));
	if(mysqli_num_rows(mysqli_query($conn, $sql_check_tag)) > 0) {
		$data = mysqli_fetch_array(mysqli_query($conn, $sql_check_tag));
		echo $data['tag_id'];
	}
	else echo 0;  
	