<?php
	require_once "DBConfig.php";
	$db = new Database;
	$db->connect();
	$id = $_POST["id"];
	$category = $_POST["category"];
    $title = $_POST["title"]; 
    $author = $_POST["author"]; 
    $image = $_POST["image"]; 
    $summary = $_POST["summary"]; 
    $content = $_POST["content"]; 
    $modifyTime = $_POST["modifyTime"];
    $db->editArticle($id, $title, $author, $image, $summary, $content, $modifyTime, $category);
	$tag = $_POST["tag"];
	$db->deleteRelation($id);
	for($i=0; $i<count($tag); $i++) {
		if($tag[$i] != 0) {
			$db->addRelation($id, $tag[$i]);
		}
	}
?>