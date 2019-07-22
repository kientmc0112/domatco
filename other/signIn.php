<?php 
	require_once "mysqli.php";
	$conn->query("set names 'utf8'");   
	if(isset($_POST['submitAcc'])) {
		$user = $_POST["account"];
		$pass = $_POST["pass"];
		if($user != "" && $pass != "") {
			$sql_sign_in = "SELECT * FROM dmc_account WHERE account_user = '$user' AND account_pass = '$pass'";
			$sql_go = mysqli_query($conn, $sql_sign_in);
			if($sql_result = mysqli_num_rows($sql_go) > 0) {
				while ($data = mysqli_fetch_assoc($sql_go)) {
		    		$_SESSION["user"] = $data["account_user"];
					$_SESSION["pass"] = $data["account_pass"];
					$_SESSION["email"] = $data["account_email"];
					$_SESSION["fullname"] = $data["account_fullname"];
					$_SESSION["telephone"] = $data["account_telephone"];
					$_SESSION["gender"] = $data["account_gender"];
		    	}
				header("Location: index.php");
			}
			else echo "Sai";
		}
		else {
			echo "Không được để trống";
		}
	}
?>