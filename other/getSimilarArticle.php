<?php
	function getTag($i) {
		$conn = mysqli_connect('localhost', 'root', '', 'damatco') or die('Error');
		$sql1 = " 	SELECT article.title
					FROM (	SELECT
							    specification.idT as idT
							FROM
							    article, specification
							WHERE
							    specification.idA = article.idA AND article.idA = '$i') as A, specification, article
					WHERE specification.idT = A.idT AND specification.idA = article.idA AND NOT article.idA = '$i' ";
		$conn->query("set names 'utf8'");
		$sql1Result = mysqli_query($conn, $sql1);
		if(mysqli_num_rows($sql1Result) > 0) {
			$k = 0;
			while($resultShow1 = mysqli_fetch_array($sql1Result)) {
				$result1[$k]['title'] = $resultShow1[0];
				$k++;
			}
		}
		for($p = 0; $p < $k; $p++) {
			echo '<a href="#"><span class="fa fa-caret-right"></span> ' . $result1[$p]['title'] . '</a>';
			if($p < $k-1) echo '<hr>';
		}	
	}
			
