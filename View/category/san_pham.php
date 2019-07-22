<?php 
	include "display/header.php";
?>
<style type="text/css">
	.div1 {
		width: 25%;
		float: left;
		overflow: auto;
		padding: 15px;
	}

	.col1 {
		border: 1px solid gray;
		width: 100%;
	}
</style>
<div class="row">
	<div class= "body">
		<div class="content">
			<div class="content-left">
				<?php  
					foreach ($data as $result) {
				?>
				<div class="div1">
					<div class='col1'>
						<img src="<?php echo 'image/product/' . $result['product_image'] ?>">
						<p style="text-align: center"><?php echo $result['product_name'] ?></p>
					</div>
				</div>
				<?php
					}
				?>
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
