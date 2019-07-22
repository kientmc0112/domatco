<?php
function show($a, $b) {
	$conn = mysqli_connect('localhost', 'root', '', 'dematco') or die('Error');
	$sql = "select * from award";
	$sqlShow = mysqli_query($conn, $sql);
	if(mysqli_num_rows($sqlShow) > 0) {
		$i = 0;
		while($resultShow = mysqli_fetch_assoc($sqlShow)) {
			$result[$i]['id'] = $resultShow['id'];
			$result[$i]['url'] = $resultShow['url'];
			$i++;
		}
	}

	for($i = $a; $i < $b; $i++) {
		echo "<img src='image/award/" . $result[$i]['url'] . "'>";
	}
}
?>