<?php
	require_once "DBConfig.php";
	$db = new Database;
	$db->connect();
	$category = $_POST["category"];
    $title = $_POST["title"]; 
    $author = $_POST["author"]; 
    $image = $_POST["image"]; 
    $summary = $_POST["summary"]; 
    $content = $_POST["content"]; 
    $createTime = $_POST["createTime"];
    $db->addArticle($title, $author, $image, $summary, $content, $createTime, $category);
	$article_id = $db->getArticleByName($title);
	$tag = $_POST["tag"];
	for($i=0; $i<count($tag); $i++) {
		if($tag[$i] != 0) $db->addRelation($article_id, $tag[$i]);
	}
?>