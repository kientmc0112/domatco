<?php
	require_once 'mysqli.php';
	$conn->query("set names 'utf8'");
	$id = $_GET['id'];
	$sql_get_article = "SELECT * FROM dmc_article WHERE article_id = '$id'";
	$sql_process = mysqli_query($conn, $sql_get_article);
	if(mysqli_num_rows($sql_process) > 0) {
		while($result_get_tag = mysqli_fetch_assoc($sql_process)) {
			$result['id'] = $result_get_tag['article_id'];
			$result['title'] = $result_get_tag['article_name'];
			$result['image'] = $result_get_tag['article_image'];
			$result['summary'] = $result_get_tag['article_summary'];
			$result['content'] = $result_get_tag['article_content'];
			$result['author'] = $result_get_tag['article_author'];
			$result['createTime'] = $result_get_tag['article_create_day'];
		}
	}
?>