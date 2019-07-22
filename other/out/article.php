		<?php
			include "display/header.php";
		?>
		<?php
			require_once 'connect/getArticle.php';
			require_once 'connect/getSimilarArticle.php';
		?>
		</style> 
		<div class="row">
			<div class= "body">
				<div class="content">
					<div class="content-left">	
						<?php
							require_once "connect/getArticle.php";
							$conn->query("set names 'utf8'");
							$id = $_GET['id'];
							$sql_get_article = "SELECT * FROM dmc_article WHERE article_id = '$id'";
							$sql_process = mysqli_query($conn, $sql_get_article);
							if(mysqli_num_rows($sql_process) > 0) {
								while($result_get_article = mysqli_fetch_assoc($sql_process)) {
									echo 
									"<h3>" . $result_get_article['article_name'] ."</h3>
									<p style='font-style: italic; padding-bottom: 10px'>" . $result_get_article['article_create_day'] . "</p>
									<p>" . $result_get_article['article_content'] . "</p>
									<p style='font-weight: bold; text-align: right; padding-top: 10px'>" . $result_get_article['article_author'] . "</p>";
								}
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
		<script src="js/tooltip.js"></script>
		<script src="js/color.js"></script>
		<script src="js/dropdown.js"></script>
