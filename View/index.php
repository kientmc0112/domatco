<?php 
	include "display/header.php";
?>
<div class="row">
	<div class= "body">
		<div class="slide">
			<img class="slide1 fade" src="image/slide1.jpg">
		</div>		
		<div class="content">
			<div class="content-left">
				<div class="tin">
					<div class="head-tin">
						<p>GIỚI THIỆU</p>
					</div>
					<div class="body-tin">
						<div class="col-left">
							<p>
								<img src="<?php echo 'image/avatar/' . $data1[0]['article_image'] ?>">
								<p style="font-weight: bold"><?php echo $data1[0]['article_name'] ?></p>
								<p><?php echo $data1[0]['article_summary'] ?></p>
								<p style="text-align: right; color: red; font-style: italic"><a href="<?php echo 'index.php?controller=article&action=content_article&id=' . $data1[0]['article_id'] ?>">Xem tiếp <span class="fa fa-arrow-right"></span></a></p>
							</p>
						</div>
						<div class="col-right">
							<?php
								for($i=1; $i<count($data1); $i++) {
							?>
							<a href="<?php echo 'index.php?controller=article&action=content_article&id=' . $data1[$i]['article_id'] ?>"><span class='fa fa-caret-right'></span><?php echo ' ' . $data1[$i]['article_name'] ?></a><br>
							<?php		
								}
							?>
						</div>
					</div>
				</div>
				
				<div class="tin">
					<div class="head-tin">
						<p>TIN TỨC SỰ KIỆN</p>
					</div>
					<div class="body-tin">
						<div class="col-left">
							<p>
								<img src="<?php echo 'image/avatar/' . $data2[0]['article_image'] ?>">
								<p style="font-weight: bold"><?php echo $data2[0]['article_name'] ?></p>
								<p><?php echo $data2[0]['article_summary'] ?></p>
								<p style="text-align: right; color: red; font-style: italic"><a href="<?php echo 'index.php?controller=article&action=content_article&id=' . $data2[0]['article_id'] ?>">Xem tiếp <span class="fa fa-arrow-right"></span></a></p>
							</p>
						</div>
						<div class="col-right">
							<?php
								for($i=1; $i<count($data2); $i++) {
							?>
							<a href="<?php echo 'index.php?controller=article&action=content_article&id=' . $data2[$i]['article_id'] ?>"><span class='fa fa-caret-right'></span><?php echo ' ' . $data2[$i]['article_name'] ?></a><br>
							<?php		
								}
							?>
						</div>
					</div>
				</div>
				
				<div class="tin">
					<div class="head-tin">
						<p>QUAN HỆ CỔ ĐÔNG</p>
					</div>
					<div class="body-tin">
						<div class="col-left">
							<p>
								<img src="<?php echo 'image/avatar/' . $data3[0]['article_image'] ?>">
								<p style="font-weight: bold"><?php echo $data3[0]['article_name'] ?></p>
								<p><?php echo $data3[0]['article_summary'] ?></p>
								<p style="text-align: right; color: red; font-style: italic"><a href="<?php echo 'index.php?controller=article&action=content_article&id=' .  $data3[0]['article_id'] ?>">Xem tiếp <span class="fa fa-arrow-right"></span></a></p>
							</p>
						</div>
						<div class="col-right">
							<?php
								for($i=1; $i<count($data3); $i++) {
							?>
							<a href="<?php echo 'index.php?controller=article&action=content_article&id=' . $data3[$i]['article_id'] ?>"><span class='fa fa-caret-right'></span><?php echo ' ' . $data3[$i]['article_name'] ?></a><br>
							<?php		
								}
							?>
						</div>
					</div>
				</div>
				
				<div class="tin">
					<div class="head-tin">
						<p>SẢN PHẨM</p>
					</div>
					<div class="body-tin" style="border: 1px solid red">
						<div class="prev" onclick="prevSlide()"><span class="fa fa-chevron-circle-left"></span></div>
						<?php
							for($i=0; $i<2; $i++) {
						?>
						<div class="slide2 fade">
							<?php 
								foreach($data4 as $data) {
							?>
							<div class='col1'>
								<img src="<?php echo 'image/product/' . $data['product_image'] ?>">
								<p><?php echo $data['product_name'] ?></p>
							</div>
							<?php
								}
							?>
						</div>
						<?php
							}
						?>
						<div class="next" onclick="nextSlide()"><span class="fa fa-chevron-circle-right"></span></div>
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
<script src="js/slide.js"></script>
<script src="js/time.js"></script>
<script src="js/tooltip.js"></script>
<script src="js/color.js"></script>
<script src="js/dropdown.js"></script>
