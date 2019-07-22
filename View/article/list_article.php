<?php
	include "display/header.php";
?>
<link rel="stylesheet" type="text/css" href="style/style3.css">

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
						foreach($data as $result) {
					?>
						<div class='name2' id='<?php echo $result['article_id'] ?>'>
							<div class='column-left'>
								<img src="<?php echo 'image/avatar/' . $result['article_image'] ?>">
								<p style='font-weight: bold; font-size: 15px'><?php echo $result['article_name'] ?></p>
								<p style='font-style: italic; font-size: 13px'><?php echo $result['article_create_day'] ?></p>
								<p><?php echo $result['article_summary'] ?></p>
								<p style='font-weight: bold; font-size: 13px'><?php echo $result['article_author'] ?></p>
								<p style='float: right; color: red; font-style: italic; font-size: 13px; padding-left: 5px'><a href= "<?php echo 'index.php?controller=article&action=content_article&id=' . $result['article_id'] ?>">Xem</a></p>
								<p style='float: right; color: red; font-style: italic; font-size: 13px; border-right: 1px solid black; padding-right: 5px'><a href="<?php echo 'index.php?controller=article&action=edit_article&id=' . $result['article_id'] ?>">Sửa</a></p>
							</div>
							<div class='column-right'>
								<input type='checkbox' name='checkbox' value="<?php echo $result['article_id'] ?>">
							</div>
						</div>
					<?php
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
						$.post("Model/delete_article.php", {checkbox: id}, function() {
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
