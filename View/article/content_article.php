		<?php
			include "display/header.php";
		?>
		</style> 
		<div class="row">
			<div class= "body">
				<div class="content">
					<div class="content-left">	
					<?php 
						foreach($data as $result) {
					?>
						<h3><?php echo $result['article_name'] ?></h3>
						<p style='font-style: italic; padding-bottom: 10px'><?php echo $result['article_create_day'] ?></p>
						<p><?php echo $result['article_content'] ?></p>
						<p style='font-weight: bold; text-align: right; padding-top: 10px'><?php echo $result['article_author'] ?></p>
					</div>
					<?php
						}
					?>
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
