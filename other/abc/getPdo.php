<?php
	function getURL() {
		try {
			$conn = new PDO('mysql:host=localhost;dbname=dematco', 'root', '');
			$conn->query("SET NAMES 'utf8'");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sqlShow = $conn->prepare('select * from product');
			$sqlShow->execute();
			$sqlShow->setFetchMode(PDO::FETCH_ASSOC);
			$resultShow = $sqlShow->fetchAll();
			for($i=0; $i<count($resultShow); $i++) {
				echo 
				"<div class='col1'>
					<img src='image/product/" . $resultShow[$i]['url'] . "'>
					<p>" . $resultShow[$i]['name']. "</p>
				</div>";
			}
		}
		catch(PDOException $e) {
			echo "Error: " . $e->getMessage;
		}
	}
?>