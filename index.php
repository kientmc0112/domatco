<?php 
	require_once 'Model/DBConfig.php';
	$db = new Database;
	$db->connect();

	if(isset($_GET['controller'])) {
		$controller = $_GET['controller'];
	}
	else {
		$controller = '';
	}

	switch ($controller) {
		case 'article': {
			# code...
			require_once 'Controller/article/index.php';
			break;
		}

		case 'account': {
			require_once 'Controller/account/index.php';
			break;
		}

		case 'category': {
			require_once 'Controller/category/index.php';
			break;
		}

		default: {
			# code...
			$category1 = 'Giới thiệu';
			$data1 = $db->getArticle($category1);
			$category2 = 'Tin tức sự kiện';
			$data2 = $db->getArticle($category2);
			$category3 = 'Quan hệ cổ đông';
			$data3 = $db->getArticle($category3);
			$data4 = $db->getProduct();
			require_once 'View/index.php';
			break;
		}
	}
?>