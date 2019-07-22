<?php
	require_once 'mysqli.php';
	$sql2 = "select * from product";
	$conn->query("SET NAMES 'utf8'");
	$sql2Result = mysqli_query($conn, $sql2);
	if(mysqli_num_rows($sql2Result) > 0) {
		$i = 0;
		while($resultShow2 = mysqli_fetch_assoc($sql2Result)) {
			$result2[$i]['image'] = $resultShow2['image'];
			$result2[$i]['name'] = $resultShow2['name'];
			$i++;
		}
	}
?>