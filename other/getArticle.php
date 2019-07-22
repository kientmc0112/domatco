<?php
	require_once 'mysqli.php';
	$conn->query("set names 'utf8'");
	$sql_get_article = 'SELECT * FROM dmc_article';
	$sql_process = mysqli_query($conn, $sql_get_article);
	if(mysqli_num_rows($sql_process) > 0) {  
		$j = 0;
		while($result_get_tag = mysqli_fetch_assoc($sql_process)) {
			$result[$j]['id'] = $result_get_tag['article_id'];
			$result[$j]['title'] = $result_get_tag['article_name'];
			$result[$j]['image'] = $result_get_tag['article_image'];
			$result[$j]['summary'] = $result_get_tag['article_summary'];
			$result[$j]['content'] = $result_get_tag['article_content'];
			$result[$j]['author'] = $result_get_tag['article_author'];
			$result[$j]['createTime'] = $result_get_tag['article_create_day'];
			$j++;
		}
	}
?>