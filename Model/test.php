<?php
require_once "DBConfig.php";
$db = new Database;
$db->connect();
$user = "kientran0112";
// $db->editArticle($id, $title, $author, $image, $summary, $content, $modifyTime, $category);
echo $db->checkAccount($user);