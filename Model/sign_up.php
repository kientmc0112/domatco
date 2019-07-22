<?php 
	require_once "DBConfig.php";
	$db = new Database;
	$db->connect();
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$fullname = $_POST['firstName'] . " " . $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$telephone = $_POST['telephone'];
	$db->signUp($user, $pass, $fullname, $gender, $email, $telephone);
	echo $db->checkAccount($user);
 ?>