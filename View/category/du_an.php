<?php 
	include "display/header.php";
?>
<div class="row">
	<div class= "body">
		<div class="content">
			<div class="content-left">
				<div class="tin">
					<div class="body-tin">
						<div class="col-left">
							<p>
								<img src="<?php echo 'image/avatar/' . $data[0]['article_image'] ?>">
								<p style="font-weight: bold"><?php echo $data[0]['article_name'] ?></p>
								<p><?php echo $data[0]['article_summary'] ?></p>
								<p style="text-align: right; color: red; font-style: italic"><a href="<?php echo 'index.php?controller=article&action=content_article&id=' . $data[0]['article_id'] ?>">Xem tiếp <span class="fa fa-arrow-right"></span></a></p>
							</p>
						</div>
						<div class="col-right">
							<?php
								for($i=1; $i<count($data); $i++) {
							?>
							<a href="<?php echo 'index.php?controller=article&action=content_article&id=' . $data[$i]['article_id'] ?>"><span class='fa fa-caret-right'></span><?php echo ' ' . $data[$i]['article_name'] ?></a><br>
							<?php		
								}
							?>
						</div>	
					</div>
				</div>
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
<script src="js/time.js"></script>
<script src="js/tooltip.js"></script>
<script src="js/color.js"></script>
<script src="js/dropdown.js"></script>
