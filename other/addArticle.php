<?php
	require_once 'mysqli.php';
	$conn->query("set names 'utf8'");
	$idA = $_POST["idA"];
	$title = $_POST["title"];
	$author = $_POST["author"];
	$avatar = $_POST["avatar"];
	$description = $_POST["description"];
	$content = $_POST["content"];
	$createTime = date("Y-m-d");
	$idT = $_POST["tag"];
	for($i = 0; $i < count($idT); $i++) {
		if($idT[$i] != 0) {
			$sql11 = "INSERT INTO specification(idA, idT) VALUES('$idA', '$idT[$i]')";
			mysqli_query($conn, $sql11);
		}
	}
	$sql = "insert into article (idA, title, author, avatar, description, createTime, content) values ('$idA', '$title', '$author', '$avatar', '$description', '$createTime', '$content')";
	mysqli_query($conn, $sql);
	if (mysqli_query($conn, $sql)) {
        alert("Thêm dữ liệu thành công");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }