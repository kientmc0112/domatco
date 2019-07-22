		<?php
			session_start();
			include "display/header.php";
			require_once "connect/mysqli.php";
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
		<link rel="stylesheet" type="text/css" href="style/style1.css">
		<script type="text/javascript" src="ckeditor\ckeditor.js"></script>
		<div class="row">
			<div class= "body">
				<div class="content">
					<div class="content-left" style="padding: 10px 50px">
						<h2 style="text-align: center;">Chỉnh sửa bài viết</h2>
						<form method="POST" enctype="multipart/form-data">
							<div class="input">
								<p>Title</p>
								<input type="text" name="title" id="title" value="<?php echo $result['title']; ?>" onblur="checkTitle(this.value)">
								<p class="alert" id="titleAlert"></p>
							</div>
							<div class="input">
								<p>Summary</p>
								<textarea name="summary" rows="3" id="summary"><?php echo $result['summary']; ?></textarea>
							</div>
							<div class="input">
								<p>Avatar</p>
								<input type="button" name="file" id="file" onclick="document.getElementById('file1').click();" value="Upload">
								<input type="file" name="file1" id="file1" onchange="readURL(this)" style="visibility: hidden">
								<div style="float: left; margin-left: 10px">
									<img src="image/avatar/<?php echo $result['image']?>" id="image1" style="border-radius: 10px; width: 70%">
								</div>
							</div>
							<div class="input">
								<p>Content</p>
								<textarea name="content" rows="50" id="content"><?php echo $result['content']; ?></textarea>
							</div>
							<div class="input">
								<p>Tags</p>
								<input type='text' name='tag' id="tag">
								<button type='button' id="addTag">Add Tag</button>
							</div>
							<div class="input" id="a">
								<?php
									require_once 'connect/mysqli.php';
									$conn->query("set names 'utf8'");
									$sql_get_tag = 'SELECT * FROM dmc_tag';
									$sql_result_tag = mysqli_query($conn, $sql_get_tag);
									if(mysqli_num_rows($sql_result_tag) > 0) {
										while($result_get_tag = mysqli_fetch_assoc($sql_result_tag)) {
											echo 
											"<div class='tag'>
												<button type='button' style='border-radius: 5px 0 0 5px;' id='" . $result_get_tag['tag_id'] . "' onclick='selectTag(this.id)'>" . $result_get_tag['tag_name'] . "</button>
												<button style='border-radius: 0 5px 5px 0; font-weight: bold' type='button' id='" . $result_get_tag['tag_id'] . "' onclick='remove(this.id)'>x</button>
											</div>";
										}
									}
								?>
							</div>
							<input type="submit" name="save" id="save" value="SAVE">
						</form>
						<?php
							if (isset($_POST["save"])) {
							    $title = $_POST["title"]; 
							    $author = $_SESSION["fullname"]; 
							    $image = $_FILES["file1"]["name"]; 
							    $summary = $_POST["summary"]; 
							    $content = $_POST["content"]; 
							    $modifyTime = date("Y-m-d");
							    $sql_modify_article = "UPDATE dmc_article SET article_name = '$title', article_image = '$image', article_summary = '$summary', article_modify_day = '$modifyTime', article_content = '$content' WHERE article_id = '$id'";
								mysqli_query($conn, $sql_modify_article);
							}
						?>
						<script type="text/javascript">
							CKEDITOR.replace("content", {uiColor: '#d30c05', toolbar: [[ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],[ 'FontSize', 'TextColor', 'BGColor' ]]});

							$("#addTag").click(function() {
								$.post("connect/addTag.php", {name: $("#tag").val()}, function(result) {
									if(result > 0) {
										var input = "<div class='tag'><button type='button' style='border-radius: 5px 0 0 5px;' id='" + result + "' onclick='selectTag(this.id)'>" + $("#tag").val() + "</button><button style='border-radius: 0 5px 5px 0; font-weight: bold' type='button' id='" +  result + "' onclick='remove(this.id)'>x</button></div>";
										$("#a").append(input);
									}
									else alert("error1");
								});
							});

							function readURL(input) {
								if(input.files && input.files[0]) {
									var reader = new FileReader();
									reader.onload = function(e) {
										$("#image1").attr("src", e.target.result);
									};
									reader.readAsDataURL(input.files[0]);
								}
							}

							function selectTag(id) {
								var idx = "#" + id;
								if($(idx).css("background-color") == "rgb(221, 221, 221)") {
									$(idx).css("background-color", "rgb(145, 145, 145)");
									tag[id] = $(idx).attr("id");
								}
								else {
									$(idx).css("background-color", "rgb(221, 221, 221)");
									tag[id] = 0;
								}
							}

							function remove(x) {
								var idd = "#" + x;
								$.post("connect/deleteTag.php", {id: x}, function(result) {
									if(result == 1) $(idd).parent().empty();
									else alert("error2");
								});
							}

							function checkTitle(input) {
								if(input.trim() == "") {
									$("#titleAlert").html("Không được để trống!");
								}
								else {
									$("#titleAlert").html("");
								}
							}
							
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
