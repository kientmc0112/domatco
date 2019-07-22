<?php  
	require_once 'Model/DBConfig.php';
	$db = new Database;
	$db->connect();

	if(isset($_GET['action'])) {
		$action = $_GET['action'];
	}
	else {
		$action = '';
	} 

	switch ($action) {
		case 'login':
			# code...
			require_once 'View/account/login.php';
			if(isset($_POST['submitAcc'])) {
				$user = $_POST["account"];
				$pass = $_POST["pass"];
				if($user != "" && $pass != "") {
					$data = $db->signIn($user, $pass);
					if($data == 0) {
						echo "Sai!";
					}
					else {
			    		$_SESSION["user"] = $data["account_user"];
						$_SESSION["pass"] = $data["account_pass"];
						$_SESSION["email"] = $data["account_email"];
						$_SESSION["fullname"] = $data["account_fullname"];
						$_SESSION["telephone"] = $data["account_telephone"];
						$_SESSION["gender"] = $data["account_gender"];
						header("Location: index.php");
					}
				}
				else {
					echo "Không được để trống";
				}
			}
			break;  
		
		case 'logout':
			# code...
			require_once 'View/account/logout.php';
			break;

		default:
			# code...
			require_once 'index.php';
			break;
	}
?>