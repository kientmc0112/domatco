<?php
	$content = $_POST['content'];
	$type = $_POST['type'];
	function test($content, $type) {
		switch($type) {
			case 'email':
				$pattern = "#^[A-z][A-z0-9_\.]{4,31}@[a-z0-9]{2,21}(\.[a-z]{2,4}){1,2}$#";
				break;
			case 'password':
				$pattern = "#^[A-z0-9]{8,15}$#";
				break;
			case 'firstName':
				$pattern = "#^[A-z]{1,31}$#";
				break;
			case 'lastName':
				$pattern = "#^[A-z]{1,31}$#";
				break;
			case 'telephone':
				$pattern = "#^[0-9]{10,11}$#";
				break;
		}
		$result = preg_match($pattern, $content);
    	return $result;
	}
	echo test($content, $type);
?>