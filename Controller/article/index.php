<?php  
	require_once "Model/DBConfig.php";
	$db = new Database();
	$db->connect();

	if(isset($_GET['action'])) {
		$action = $_GET['action'];
	}
	else {
		$action = '';
	}

	switch ($action) {
		case 'add_article': {
			# code...
			$tblname = 'dmc_tag';
			$data = $db->getAllData($tblname);
			require_once 'View/article/add_article.php';
			/*if(isset($_POST["submit"])) {
				$category = $_POST["category"];
			    $title = $_POST["title"]; 
			    $author = $_SESSION["fullname"]; 
			    $image = $_FILES["file1"]["name"]; 
			    $summary = $_POST["summary"]; 
			    $content = $_POST["content"]; 
			    $createTime = date("Y-m-d");
			    $db->addArticle($title, $author, $image, $summary, $content, $createTime, $category);
			}*/
			break;
		}
		case 'edit_article': {
			if(isset($_GET["id"])) {
				$id = $_GET["id"];
				$tblname = 'dmc_article';
				$data = $db->getData($id, $tblname);
				$tblname1 = 'dmc_tag';
				$data1 = $db->getAllData($tblname1);
				$tblname2 = 'dmc_relation';
				$data2 = $db->getData($id, $tblname2);
				require_once 'View/article/edit_article.php';
				// if (isset($_POST["save"])) {
				//     $title 			= 	$_POST["title"]; 
				//     $author 		= 	$_SESSION["fullname"]; 
				//     $image 			= 	$_FILES["file1"]["name"]; 
				//     $summary 		= 	$_POST["summary"]; 
				//     $content 		= 	$_POST["content"]; 
				//     $modifyTime 	= 	date("Y-m-d");
				//    	$db->editArticle($id, $title, $author, $image, $summary, $content, $modifyTime);
				// }
			}
			else {
				require_once 'View/index.php';
			}
			break; 
		}

		case 'list_article': {
			$tblname = 'dmc_article';
			$data = $db->getAllData($tblname);
			require_once 'View/article/list_article.php';
			break;
		}

		case 'content_article': {
			if(isset($_GET['id'])) {
				$id = $_GET['id'];
				$tblname = 'dmc_article';
				$data = $db->getData($id, $tblname);
				require_once 'View/article/content_article.php';
			}
			else {
				require_once 'View/index.php';
			}
			break;
		}

		default: {
			# code...
			require_once 'View/index.php';
			break;
		}
	}
?>