<?php 
	session_start();
?>
<!doctype html>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 	<link rel="stylesheet" type="text/css" href="style/style.css">
	</head>

	<body>
		<div class="row">
			<img src="image\background.png" style="width: 100%">
		</div>
		 
		<div class="row">
			<ul class="nav">
				<li id="home"><a href="index.php"><span class="fa fa-home"></span> TRANG CHỦ</a></li>
				<li><a href="index.php?controller=category&name=gioi_thieu">GIỚI THIỆU</a></li>
				<li><a href="index.php?controller=category&name=san_pham">SẢN PHẨM</a></li>
				<li id="dropdown">
					<a id="dropdown-btn" href="index.php?controller=category&name=du_an">DỰ ÁN</a>
					<ul id="dropdown-menu">
						<li><a href="#">Dự án đã thực hiện</a></li>
						<li>
							<a>Dự án đang thực hiện</a>
						</li>
						<li><a href="#">Dự án sắp thực hiện</a></li>
					</ul>
				</li>
				<li><a href="index.php?controller=category&name=co_dong">QUAN HỆ CỔ ĐÔNG</a></li>
				<li><a href="index.php?controller=category&name=tin_tuc">TIN TỨC SỰ KIỆN</a></li>
				<li><a href="#">LIÊN HỆ</a></li>
				<!-- <li id="time"></li> -->
				<?php
					if(isset($_SESSION['user'])) {
				?>
				<div class="dropdown1">
					<button class="dropdown-btn1"><?php echo $_SESSION['fullname'] ?></button>
			        <div class="dropdown-content1">
			            <a href="index.php?controller=article&action=add_article" style="border-bottom: 1px solid gray">Tạo bài viết</a>
			            <a href="index.php?controller=article&action=list_article" style="border-bottom: 1px solid gray">Quản lí bài viết</a>
			            <a href="index.php?controller=account&action=logout">Log out</a>
			        </div>
				</div> 
				<?php
					}
					else {
				?>
				<a href="index.php?controller=account&action=login" class="acc">LOG IN</a>
				<?php
					}
				?>
			</ul>
			<script type="text/javascript">
				var i=0
				$(".dropdown-btn1").click(function() {
					i++;
					if(i%2==1) $(".dropdown-content1").css("display", "block");
					else $(".dropdown-content1").css("display", "none");
				});
			</script>
		</div>
		