<?php  
	require_once "Model/DBConfig.php";
	$db = new Database();
	$db->connect();

	if(isset($_GET['name'])) {
		$name = $_GET['name'];
	}
	else {
		$name = '';
	}

	switch ($name) {
		case 'gioi_thieu': {
			# code...
			$category = 'Giới thiệu';
			$data = $db->getArticle($category);
			require_once 'View/category/gioi_thieu.php';
			break;
		}
		case 'tin_tuc': {
			$category = 'Tin tức sự kiện';
			$data = $db->getArticle($category);
			require_once 'View/category/tin_tuc.php';
			break; 
		}

		case 'san_pham': {
			$data = $db->getProduct();
			require_once 'View/category/san_pham.php';
			break;
		}

		case 'du_an': {
			$category = 'Dự án';
			$data = $db->getArticle($category);
			require_once 'View/category/du_an.php';
			break;
		}

		case 'co_dong': {
			$category = 'Quan hệ cổ đông';
			$data = $db->getArticle($category);
			require_once 'View/category/co_dong.php';
			break;
		}

		default: {
			# code...
			require_once 'index.php';
			break;
		}
	}
?>