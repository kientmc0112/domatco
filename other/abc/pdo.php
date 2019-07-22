<?php
try {
	// ket noi csdl
	$conn = new PDO('mysql:host=localhost;dbname=dematco', 'root', '');
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// lay ten file trong folder
	$folder = 'C:\xampp\htdocs\damatco\image\product';
	$file = scandir($folder);
	$pattern = '#^.*\.(jpg|png)$#';

	// kiem tra xem database da co du lieu chua
	$sqlCheck = $conn->prepare('select * from product');
	$sqlCheck->execute();
	$sqlCheck->setFetchMode(PDO::FETCH_ASSOC);
	$sqlResult = $sqlCheck->fetchAll();

	foreach($file as $file) {
		if(preg_match($pattern, $file) && count($sqlResult) < 1) {
			echo $file . '<br>';
			$sql = $conn->prepare("insert into product(url) values('$file')");
			$sql->execute();
		}
	}

	foreach ($sqlResult as $value) {
		echo $value['url'] . '<br>';
	}
}
catch(PDOException $e) {
	echo "Error" . $e->getMessage;
}	
?>