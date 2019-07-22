<?php
// ket noi csdl
$conn = mysqli_connect('localhost', 'root', '', 'dematco') or die('Error');

// lay ten file trong folder
$folder = 'C:\xampp\htdocs\damatco\image\award';
$file = scandir($folder);
$pattern = '#^.*\.(png|jpg)$#';

// kiem tra xem database co du lieu chua
$sqlCheck = mysqli_query($conn, "'select * from award'");
$resultCheck = mysqli_num_rows($sqlCheck);

foreach ($file as $file) {
    if(preg_match($pattern, $file) && $resultCheck < 1) {
    	echo $file . '<br>';
	    $sql = "insert into award(url) values('$file')";
	    mysqli_query($conn, $sql);
	}
}

mysqli_close($conn);
?>