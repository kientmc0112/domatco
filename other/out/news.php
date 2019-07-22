		<?php
			include "display/header.php";
		?>
		<?php
			require_once 'connect/getProduct.php';
			require_once 'connect/getArticle.php';
			require_once 'connect/getSimilarArticle.php';
		?>
		<style type="text/css">
			* {
				box-sizing: border-box;
				overflow: auto;
			}
			.content-left {
				overflow: auto;
			}
			.column-left {
				width: 90%;
				float: left;
				border: 1px solid #dedede;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 12px 0 rgba(0, 0, 0, 0.2);
				padding: 10px;
			}
			.column-right {
				float: right;
				position: absolute;
				top: 50%; 
				right: 5%;
				transform: translateY(-50%);
			}
			.column-left img {
				width: 20%;
				float: left;
				margin-right: 20px;
			}
			.column-right input {
				margin: 0 auto;
			}
			.name1 {
				width: 100%;
				padding: 5px;
			}
			.name2 {
				width: 100%;
				padding: 10px;
				position: relative;
			}
			.name1 p {
				float: left;
				width: 90%;
				padding: 5px;
				font-weight: bold;
			}
			.name1 input {
				float: left;
				width: 10%;
				font-weight: bold;
				padding: 8px;
				border: none;
				background-color: #d30c05;
				color: white;
			}
			.name1 input:hover {
				background-color: #a60000; 
			}
		</style> 
		<div class="row">
			<div class= "body">
				<div class="content">
					<div class="content-left">	
						<form method="POST">
							<div class="name1">
								<p>Danh sách bài viết</p>
								<input id="delete" type="button" name="delete" value="DELETE">
							</div>
							<?php
							require_once "connect/getArticle.php";
							for($i=0; $i < count($result); $i++) {
								echo 
								"<div class='name2' id='" . $result[$i]["id"] . "''>
									<div class='column-left'>
										<img src='image/avatar/" . $result[$i]["image"] . "'>
										<p style='font-weight: bold; font-size: 15px'>" . $result[$i]["title"] . "</p>
										<p style='font-style: italic; font-size: 13px'>" . $result[$i]["createTime"] . "</p><p>" . $result[$i]["summary"] . "</p>
										<p style='font-weight: bold; font-size: 13px'>" . $result[$i]["author"] ."</p>
										<p style='float: right; color: red; font-style: italic; font-size: 13px; padding-left: 5px'><a href='article.php?id=" . $result[$i]["id"] . "'>Xem</a></p>
										<p style='float: right; color: red; font-style: italic; font-size: 13px; border-right: 1px solid black; padding-right: 5px'><a href='modifyArticle.php?id=" . $result[$i]["id"] . "'>Sửa</a></p>
									</div>
									<div class='column-right'>
										<input type='checkbox' name='checkbox' value='" . $result[$i]["id"] ."'>
									</div>
								</div>";
							}
							?>
						</form>
						<script>
							$("#delete").click(function() {
								var checkbox = document.getElementsByName("checkbox"), j = 0, id = [];
								for(var i=0; i < checkbox.length; i++) {
									if (checkbox[i].checked === true){
					                	id[j++] = checkbox[i].value;
					                }
								}
								$.post("connect/deleteArticle.php", {checkbox: id}, function() {
									for(var i=0; i < id.length; i++) {
										var x = "#" + id[i];
										$(x).empty();
									}
								});
							});
						</script>
					</div>
			
					<?php
						include 'display/contentRight.php';
					?>
				</div>
			</div>
		</div>
		<?php
			include 'display/footer.php';
		?>
		<script src="js/tooltip.js"></script>
		<script src="js/color.js"></script>
		<script src="js/dropdown.js"></script>
