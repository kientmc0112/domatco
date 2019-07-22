<?php
	include 'display/header.php';
?>
<link rel="stylesheet" type="text/css" href="style/style1.css">
<script type="text/javascript" src="ckeditor\ckeditor.js"></script>
<div class="row">
	<div class= "body">
		<div class="content">
			<div class="content-left" style="padding: 10px 50px">
				<h2 style="text-align: center;">Chỉnh sửa bài viết</h2>
				<form method="POST" enctype="multipart/form-data">
					<?php
						foreach ($data as $result) {
					?>
					<div class="input">
						<p>Title</p>
						<input type="text" name="title" id="title" value="<?php echo $result['article_name']; ?>" onblur="checkTitle(this.value)">
						<p class="alert" id="titleAlert"></p>
					</div>
					<div class="input">
						<p>Summary</p>
						<textarea name="summary" rows="3" id="summary"><?php echo $result['article_summary']; ?></textarea>
					</div>
					<div class="input">
						<p>Avatar</p>
						<input type="button" name="file" id="file" onclick="document.getElementById('file1').click();" value="Upload">
						<input type="file" name="file1" id="file1" onchange="readURL(this)" style="visibility: hidden">
						<div style="float: left; margin-left: 10px">
							<img src="image/avatar/<?php echo $result['article_image']?>" id="image1" style="border-radius: 10px; width: 70%">
						</div>
					</div>
					<div class="input">
						<p>Content</p>
						<textarea name="content" rows="50" id="content"><?php echo $result['article_content']; ?></textarea>
					</div>
					<div class="input">
						<p>Tags</p>
						<input type='text' name='tag' id="tag">
						<button type='button' id="addTag">Add Tag</button>
					</div>
					<?php
						}
					?>
					<div class="input" id="a">
						<?php
							foreach($data1 as $result1) {
								$i = 0;
								foreach($data2 as $result2) {
									if($result1['tag_id'] == $result2['tag_id']) $i++;
								}
								if($i >= 1) {
						?>
						<div class='tag'>
							<button type='button' style='border-radius: 5px 0 0 5px; background-color: rgb(145, 145, 145)' id="<?php echo $result1['tag_id'] ?>" onclick='selectTag(this.id)'><?php echo $result1['tag_name'] ?></button>
							<button style='border-radius: 0 5px 5px 0; font-weight: bold' type='button' id="<?php echo $result1['tag_id'] ?>" onclick='remove(this.id)'>x</button>
						</div>
						<?php
								}
								else {
						?>
						<div class='tag'>
							<button type='button' style='border-radius: 5px 0 0 5px; background-color: rgb(221, 221, 221)' id="<?php echo $result1['tag_id'] ?>" onclick='selectTag(this.id)'><?php echo $result1['tag_name'] ?></button>
							<button style='border-radius: 0 5px 5px 0; font-weight: bold' type='button' id="<?php echo $result1['tag_id'] ?>" onclick='remove(this.id)'>x</button>
						</div>
						<?php	
								}
							}
						?>
					</div>
					<input type="submit" name="save" id="save" value="SAVE">
				</form>
				<?php
					$time = date("Y-m-d");
					if(isset($_SESSION["fullname"])) $author = $_SESSION["fullname"];
					else $author = null;
				?>
				<script type="text/javascript">
					var tag = [];
					
					<?php
						foreach($data2 as $result2) {
					?>
					tag["<?php echo $result2['tag_id'] ?>"] = "<?php echo $result2['tag_id'] ?>";
					<?php 
						}
					?>

					CKEDITOR.replace("content", {uiColor: '#d30c05', toolbar: [[ 'Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink' ],[ 'FontSize', 'TextColor', 'BGColor' ]]});

					$("#addTag").click(function() {
						$.post("Model/add_tag.php", {name: $("#tag").val()}, function(result) {
							if(result > 0) {
								var input = "<div class='tag'><button type='button' style='border-radius: 5px 0 0 5px; background-color: rgb(221, 221, 221)' id='" + result + "' onclick='selectTag(this.id)'>" + $("#tag").val() + "</button><button style='border-radius: 0 5px 5px 0; font-weight: bold' type='button' id='" +  result + "' onclick='remove(this.id)'>x</button></div>";
								$("#a").append(input);
							}
							else alert("error1");
						});
					});

					var id = '<?php echo $id ?>';
					var time = '<?php echo $time ?>';
					var author = '<?php echo $author ?>';
					var image = null;

					function handleFileSelect(event) {
					  	var files = event.target.files;
					  	image = files[0]['name'];
					}

					document.getElementById("file1").addEventListener('change', handleFileSelect, true);

					$("#save").click(function() {
						$.post("Model/edit_article.php", {id: id, category: $("#category").val(), title: $("#title").val(), summary: $("#summary").val(), content: CKEDITOR.instances.content.getData(), image: image, author: author, modifyTime: time, tag: tag}, function(result) {

						});
					});

					function readURL(input) {
						if(input.files && input.files[0]) {
							var reader 		= 	new FileReader();
							reader.onload 	= 	function(e) {
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
						$.post("Model/delete_tag.php", {id: x}, function(result) {
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
