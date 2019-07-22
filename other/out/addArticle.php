		<?php
			include "display/header.php";
		?>
		<?php
		?>
		<link rel="stylesheet" type="text/css" href="style/style1.css">
		<script type="text/javascript" src="ckeditor\ckeditor.js"></script>
		<div class="row">
			<div class= "body">
				<div class="content">
					<div class="content-left" style="padding: 10px 50px">
						<h2 style="text-align: center;">Tạo bài viết</h2>
						<form method="POST" enctype="multipart/form-data">
							<div class="input">
								<p>Title</p>
								<input type="text"  name="title" id="title" onblur="checkTitle(this.value)">
								<p class="alert" id="titleAlert"></p>
							</div>
							<div class="input">
								<p>Summary</p>
								<textarea name="summary" rows="3" id="summary"></textarea>
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
								<textarea name="content" rows="50" id="content"></textarea>
							</div>
							<div class="input">
								<p>Tags</p>
								<input type='text' name='tag' id="tag">
								<button type='button' id="addTag">Add Tag</button>
							</div>
							<div class="input" id="a">
								<?php
									foreach($data as $result) {
								?>
								<div class='tag'>
									<button type='button' style='border-radius: 5px 0 0 5px;' id='<?php echo $result['tag_id'] ?>' onclick='selectTag(this.id)'><?php echo $result['tag_name'] ?></button>
									<button style='border-radius: 0 5px 5px 0; font-weight: bold' type='button' id='<?php echo $result['tag_id'] ?>' onclick='remove(this.id)'>x</button>
								</div>
								<?php
									}
								?>
							</div>
							<input type="submit" name="submit" id="submit" value="SUBMIT">
						</form>
						<script type="text/javascript">
							CKEDITOR.replace("content", {uiColor: '#d30c05', toolbar: [[ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],[ 'FontSize', 'TextColor', 'BGColor' ]]});
						

							$("#addTag").click(function() {
								$.post("View/article/addTag.php", {name: $("#tag").val()}, function(result) {
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
