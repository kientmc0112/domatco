<!doctype html>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<style>
			body {
				padding: 0;
				font-size: 15px;
				line-height: 1.4;
				margin: 0 150px;
				border: 1px solid #dedede;
				font-family: Arial;
				font-weight: 400;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 12px 0 rgba(0, 0, 0, 0.2);
			}
			* {
				box-sizing: border-box;
			}
			.header {
				width: 100%;
				overflow: auto;
			}
			.logo {
				width: 15%;
				float: left;
			}
			.logo img {
				width: 100%;
			}
			.name {
				width: 85%;
				float: left;
				padding: 20px 5px;
			}
			.name p {
				font-weight: bold;
				margin: 5px;
			}
			.nav {
				background-color: #d30c05; 
				color: white;
				width: 100%;
				overflow: auto;
				padding: 0;
				margin: 0;
			}
			li {
				display: inline-table;
			}
			.nav a {
				padding: 10px;
				display: block;
				color: white;
			}
			a {
				text-decoration: none;
			}
			.flag {
				float: right;
				padding: 7px;
				display: block;
			}
			.flag a {
				padding: 0;
				float: left;
			}
			.flag img {
				height: 16px;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 12px 0 rgba(0, 0, 0, 0.2);
			}
			.body {
				background-color: white;
				padding: 15px;
				width: 100%;
				overflow: auto;
			}
			.body a:hover {
				color: blue;
			}
			.slide img {
				width: 100%;
			}
			.content {
				width: 100%;
				padding-top: 15px;
			}
			.content-left {
				width: 75%;
				float: left;
				padding-right: 15px;
			}
			.content-right {
				width: 25%;
				float: left;
			}
			.tin {
				border: 1px solid #dedede;
				overflow: auto;
				margin-bottom: 25px;
			}
			.head-tin {
				width: 100%;
				color: white;
				background-color: #d30c05;
				padding: 15px;
			}
			.body-tin {
				width: 100%;
				padding: 20px;
				overflow: auto;
			}
			.body-tin img {
				width: 100%;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 12px 0 rgba(0, 0, 0, 0.2);
			}
			.col-left {
				width: 66.66%;
				float: left;
				margin: 0;
			}
			.col-right {
				width: 33.33%;
				float: left;
				margin: 0;
				padding-left: 20px; 
				color: #124188;
			}
			.col-left img {
				width: 50%;
				float: left;
				margin-right: 20px;
			}	
			p {
				margin: 0;
			}
			.col1 {
				width: 20%;
				float: left;
				padding: 10px;
			}
			.prev, .next {
				width: 10%;
				float: left;
				font-size: 30px;
				text-align: center;
				margin-top: 50px;
			}
			.col1 p {
				padding: 10px 0px;
			}
			.left, .right {
				width: 50%;
				float: left;
			}
			.left {
				padding-right: 10px;
			}
			.right {
				padding-left: 10px;
			}
			.left img, .right img {
				padding: 10px;
				width: 100%;
				height: 95px;
				object-fit: contain;
				margin-bottom: 20px;
			}
			.footer {
				background-color: #313131;
				color: #9d9d9d;
				text-align: center;
				padding: 50px 0;
			}
			@media screen and (max-width: 1000px) {
				body {
					margin: 0px;
				}
			}
			@media screen and (max-width: 600px) {
				body {
					margin: 0px;
				}
				.content-left, .content-right {
					width: 100%;
				}
			}
			#dropdown-menu a {
				color: white;
				text-decoration: none;
				background-color: #d30c05;
			}
			#dropdown-btn {
				position: relative;
			}
			#dropdown-menu {
				position: absolute;
				display: none;
			}
			#dropdown-menu li {
				display: block;
			}
			#time {
				background-color: black;
				border-radius: 5px;
				color: white;
				font-weight: bold;
				float: right; 
				padding: 5px;
				margin: 5px;			 
				display: block;
			}
			.next:hover, .prev:hover {
				color: red;
			}
			.fade {
				animation-name: fade;
				animation-duration: 2s;
			}
			@-webkit-keyframes fade {
				from {opacity: .4} 
				to {opacity: 1}
			}
			@keyframes fade {
				from {opacity: .4} 
				to {opacity: 1}
			}
			.chervon {
				text-align: center;
				margin: 0;
				background-color: gray;
			}
			<!-- #dropdown:hover #dropdown-menu { -->
				<!-- display: block; -->
			<!-- } -->
			
			<!-- .row ul li ul{ -->
				<!-- display:none; -->
			<!-- } -->
			<!-- .row>ul>li:hover ul{ -->
				<!-- display:block; -->
			<!-- } -->
		</style>
	</head>
	<body>
		<?php
			require_once 'connect/getProduct.php';
			require_once 'connect/getArticle.php';
			require_once 'connect/getSimilarArticle.php';
		?>
		<div class="row">
			<img src="image\background.png" style="width: 100%">
		</div>
		
		<div class="row">
			<ul class="nav">
				<li id="home" onmouseover="convert(this.id)" onmouseout="convert1(this.id)"><a><span class="fa fa-home"></span> TRANG CHỦ</a></li>
				<li><a href="#">GIỚI THIỆU</a></li>
				<li><a href="#">SẢN PHẨM</a></li>
				<li id="dropdown">
					<a href="#" id="dropdown-btn">DỰ ÁN</a>
					<ul id="dropdown-menu">
						<li><a href="#">Dự án đã thực hiện</a></li>
						<li>
							<a>Dự án đang thực hiện</a>
							<!-- <ul> -->
								<!-- <li><a>Cao tốc trên cao</a></li> -->
								<!-- <li><a>Sông Tô Lịch</a></li> -->
								<!-- <li><a>Chùa Ba Vàng</a></li> -->
							<!-- </ul> -->
						</li>
						<li><a href="#">Dự án sắp thực hiện</a></li>
					</ul>
				</li>
				<li><a href="#">QUAN HỆ CỔ ĐÔNG</a></li>
				<li><a href="#">TIN TỨC SỰ KIỆN</a></li>
				<li><a href="#">LIÊN HỆ</a></li>
				<li id="time"></li>
			</ul>
		</div>
		
		<div class="row">
			<div class= "body">
				<div class="slide">
					<img class="slide1 fade" src="image/slide1.jpg">
					<img class="slide1 fade" src="image/slide2.jpg">
					<ul class="chervon">
						<li><span class="fa fa-circle" onclick="currentSlide(0)"></span></li>
						<li><span class="fa fa-circle" onclick="currentSlide(1)"></span></li>
					</ul>
				</div>
				
				<div class="content">
					<div class="content-left">
						<div class="tin">
							<div class="head-tin">
								<p>TIN TỨC & SỰ KIỆN</p>
							</div>
							<div class="body-tin">
								<div class="col-left">
									<a href="#">
										<img src="image/avatar/tin1.png">
										<p style="font-weight: bold">Domatco phát hành 925.000 cp thưởng</p>
										<p>Được biết, Domatco tiền thân đơn vị là xí nghiệp cung ứng vật tư vận tải - Trực thuộc Liên hiệp các xí nghiệp thi công</p>
										<p style="text-align: right; color: red; font-style: italic"><a>Xem tiếp <span class="fa fa-arrow-right"></span></a></p>
									</a>
								</div>
								<div class="col-right">
									<a href="#"><span class="fa fa-caret-right"></span> "Tấm lợp Đông Anh": Nỗ lực đổi mới để phát triển</a>
									<hr>
									<a href="#"><span class="fa fa-caret-right"></span> Quận Thanh Xuân tổng kết công tác</a>
									<hr>
									<a href="#"><span class="fa fa-caret-right"></span> Hoàng Mai hoàn thành chỉ tiêu phát triển kinh tế</a>
									<hr>
									<a href="#"><span class="fa fa-caret-right"></span> Thưởng tín tổng kết công tác</a>
								</div>
							</div>
						</div>
						
						<div class="tin">
							<div class="head-tin">
								<p>BẢN TIN CÔNG TI</p>
							</div>
							<div class="body-tin">
								<div class="col-left">
									<a href="#">
										<img src="image/avatar/tin2.png">
										<p style="font-weight: bold">Domatco phát hành 925.000 cp thưởng</p>
										<p>Được biết, Domatco tiền thân đơn vị là xí nghiệp cung ứng vật tư vận tải - Trực thuộc Liên hiệp các xí nghiệp thi công</p>
										<p style="text-align: right; color: red; font-style: italic"><a>Xem tiếp <span class="fa fa-arrow-right"></span></a></p>
									</a>
								</div>
								<div class="col-right">
									<a href="#"><span class="fa fa-caret-right"></span> "Tấm lợp Đông Anh": Nỗ lực đổi mới để phát triển</a>
									<hr>
									<a href="#"><span class="fa fa-caret-right"></span> Quận Thanh Xuân tổng kết công tác</a>
									<hr>
									<a href="#"><span class="fa fa-caret-right"></span> Hoàng Mai hoàn thành chỉ tiêu phát triển kinh tế</a>
									<hr>
									<a href="#"><span class="fa fa-caret-right"></span> Thưởng tín tổng kết công tác</a>
								</div>
							</div>
						</div>
						
						<div class="tin">
							<div class="head-tin">
								<p>KẾT QUẢ SX KINH DOANH</p>
							</div>
							<div class="body-tin">
								<div class="col-left">
									<a href="#">
										<img src="image/avatar/tin3.png">
										<p style="font-weight: bold">Domatco phát hành 925.000 cp thưởng</p>
										<p>Được biết, Domatco tiền thân đơn vị là xí nghiệp cung ứng vật tư vận tải - Trực thuộc Liên hiệp các xí nghiệp thi công</p>
										<p style="text-align: right; color: red; font-style: italic"><a>Xem tiếp <span class="fa fa-arrow-right"></span></a></p>
									</a>
								</div>
								<div class="col-right">
									<a href="#"><span class="fa fa-caret-right"></span> "Tấm lợp Đông Anh": Nỗ lực đổi mới để phát triển</a>
									<hr>
									<a href="#"><span class="fa fa-caret-right"></span> Quận Thanh Xuân tổng kết công tác</a>
									<hr>
									<a href="#"><span class="fa fa-caret-right"></span> Hoàng Mai hoàn thành chỉ tiêu phát triển kinh tế</a>
									<hr>
									<a href="#"><span class="fa fa-caret-right"></span> Thưởng tín tổng kết công tác</a>
								</div>
							</div>
						</div>
						
						<div class="tin">
							<div class="head-tin">
								<p>SẢN PHẨM</p>
							</div>
							<div class="body-tin" style="border: 1px solid red">
								<div class="prev" onclick="prevSlide()"><span class="fa fa-chevron-circle-left"></span></div>
								<div class="slide2 fade">
									<?php 
										for($j = 0; $j < $i; $j++) {
											echo
											"<div class='col1'>
												<img src='image/product/" . $result[$j]['image'] . "'>
												<p>" . $result[$j]['name']. "</p>
											</div>";
										};
									?>
								</div>
								<div class="slide2 fade">
									<?php 
										for($j = $i-1; $j >=0; $j--) {
											echo
											"<div class='col1'>
												<img src='image/product/" . $result[$j]['image'] . "'>
												<p>" . $result[$j]['name']. "</p>
											</div>";
										};
									?>
								</div>
								<div class="slide2 fade">
									<?php 
										for($j = 0; $j < $i; $j++) {
											echo
											"<div class='col1'>
												<img src='image/product/" . $result[$j]['image'] . "'>
												<p>" . $result[$j]['name']. "</p>
											</div>";
										};
									?>
								</div>
								<div class="slide2 fade">
									<?php 
										for($j = $i-1; $j >=0; $j--) {
											echo
											"<div class='col1'>
												<img src='image/product/" . $result[$j]['image'] . "'>
												<p>" . $result[$j]['name']. "</p>
											</div>";
										};
									?>
								</div>
								<div class="next" onclick="nextSlide()"><span class="fa fa-chevron-circle-right"></span></div>
							</div>
						</div>
					</div>
					<div class="content-right">
						<div class="tin">
							<div class="head-tin">
								<p>VIDEO</p>
							</div>
							<div class="body-tin" style="padding: 0px 0px 15px 0px;">
								<iframe width="100%" src="https://www.youtube.com/embed/tgbNymZ7vqY?autoplay=0&controls=1"></iframe>
								<div style="width: 100%; border-bottom: 1px solid #dedede; overflow: auto; padding-bottom: 5px">
									<div style="float: left; width: 10%; color: red; padding: 5px"><span class="fa fa-play-circle"></span></div>
									<div style="float: left; width: 90%; color: #124188">
										<a href="#">Chương trình truyền hình tấm lợp</a>
										<a href="#">16.06.2016</a>
									</div>
								</div>
								<div style="width: 100%; padding-top: 5px;">
									<div style="float: left; width: 10%; color: red; padding: 5px"><span class="fa fa-play-circle"></span></div>
									<div style="float: left; width: 90%; color: #124188">
										<a href="#">Chương trình truyền hình tấm lợp</a>
										<a href="#">14.04.2014</a>
									</div>
								</div>
							</div>
						</div>
						
						<div class="tin">
							<div class="head-tin">
								<p>DỰ ÁN ĐÃ THỰC HIỆN</p>
							</div>
							<div class="body-tin" style="padding: 10px">
								<img src="image/tin8.png" style="width: 100%">
							</div>
						</div>
						
						<div class="tin">
							<div class="head-tin">
								<p>DANH HIỆU ĐẠT ĐƯỢC</p>
							</div>
							<div class="body-tin" style="padding-bottom: 0">
								<div class="left">
									<img src="image/award/hc1.png">
									<img src="image/award/hc2.png">
									<img src="image/award/hc3.png">
								</div>
								<div class="right">
									<img src="image/award/hc4.png">
									<img src="image/award/hc5.png">
									<img src="image/award/hc6.png">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="footer">
				<p>© Copyright 2019, Dong Anh Investment, Construction and Material Joint Stock Company. All rights reserved</p>
				<p>Address: Group 8 - Dong Anh Town - Dong Anh District - Hanoi - 0243.883.2378</p>
			</div>
		</div>
		
		
		<!-- Tạo slide -->
		<script>
		
			<!-- Slide2 -->
			var u;
			function showSlide2() {
				var slide2 = document.getElementsByClassName("slide2");
				for(var i=0; i<slide2.length; i++) {
					slide2[i].style.display = "none";
				}
				slide2[u].style.display = "block";
				u++;
				if(u > slide2.length-1) {
					u = 0;
				}
				setTimeout(showSlide2, 3000);
			}
			showSlide2(u = 0);
			
			<!-- Lấy slide sau -->
			function nextSlide() {
				var slide2 = document.getElementsByClassName("slide2");
				for(var i=0; i<slide2.length; i++) {
					slide2[i].style.display = "none";
				}
				u++;
				if(u > slide2.length-1) u = 0;
				slide2[u].style.display = "block";
			}
			
			<!-- Lấy slide trước -->
			function prevSlide() {
				var slide2 = document.getElementsByClassName("slide2");
				for(var i=0; i<slide2.length; i++) {
					slide2[i].style.display = "none";
				}
				u--;
				if(u < 0) u = slide2.length-1;
				slide2[u].style.display = "block";
			}
			
			
			<!-- Slide1 -->
			var t;
			function showSlide1() {
				var slide1 = document.getElementsByClassName("slide1");
					
				for(var i=0; i<slide1.length; i++) {
					slide1[i].style.display = "none";
				}
				slide1[t].style.display = "block";
				t++;
				if(t > slide1.length-1) {
					t = 0;
				}
				setTimeout(showSlide1, 3000);
			}
			showSlide1(t = 0);
			
			<!-- Lấy slide hiện tại -->
			function currentSlide(n) {
				var slide1 = document.getElementsByClassName("slide1");
				for(var i=0; i<slide1.length; i++) {
					slide1[i].style.display = "none";
				}
				slide1[n].style.display = "block";
			}
			</script>		
		
		<!-- Lấy thời gian hệ thống -->
		<script>
			function time() {
				var date = new Date();
				var h = date.getHours();
				var m = date.getMinutes();
				var s = date.getSeconds();
				h = checkTime(h);
				s = checkTime(s);
				m = checkTime(m);
				document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
				var t = setTimeout(time, 500);
			}
			function checkTime(t) {
				if(t<10) t = "0" + t;
				return t;
			}
			time();
		</script>
		
		<!-- Chỉnh màu 1 đối tượng khi hover -->
		<script>
			function convert(id) {
				document.getElementById(id).style.backgroundColor = "#a60000";
			}
			function convert1(id) {
				document.getElementById(id).style.backgroundColor = "#d30c05";
			}
		</script>
		
		
		<!-- Dropdown -->
		<script>
			document.getElementById("dropdown").onmouseover = dropdown;
			document.getElementById("dropdown").onmouseout = dropup;
			function dropdown() {
				document.getElementById("dropdown-menu").style.display = "block";
			}
			function dropup() {
				document.getElementById("dropdown-menu").style.display = "none";
			}
		</script>
		
		
		<!-- Tạo tooltip -->
		<script>
			$(".col-right a").mouseover (function() {
				$(this).attr("title", $(this).text());
			});
		</script>
		
		
		<!-- Chỉnh màu nhiều đối tượng khi hover -->
		<script>
			$(".nav a").hover(function() {
				$(this).css("background-color", "#a60000");
			}, function() {
				$(this).css("background-color", "#d30c05");
			});
		</script>
		
		<!-- <script> -->
			<!-- $("#dropdown2").hover( function() { -->
				<!-- $("#dropdown-menu2").css("display", "block"); -->
			<!-- }, function() { -->
				<!-- $("#dropdown-menu2").css("display", "none"); -->
			<!-- }); -->
 		<!-- </script> -->
	</body>
</html>