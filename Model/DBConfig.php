<?php 
	class Database {
		private $localhost = 'localhost';
		private $username = 'root';
		private $password = '';
		private $dbname = 'damatco';

		private $conn = NULL;
		private $result = NULL;

		public function connect() {
			$this->conn = mysqli_connect($this->localhost, $this->username, $this->password, $this->dbname) or die("Error!");
			$this->conn->query("set names 'utf8'");
			return $this->conn;
		}

		public function execute($sql) {
			$this->result = mysqli_query($this->conn, $sql);
			return $this->result;
		}

		public function getAllData($tblname) {
			$sql = "SELECT * FROM $tblname";
			$this->execute($sql);
			if($this->getRow() == 0) {
				$data = 0;
			}	
			else {
				while($datas = mysqli_fetch_array($this->result)) {
					$data[] = $datas;
				}
			}
			return $data;
		}

		public function getRow() {
			if(!$this->result) {
				$num = 0;
			}
			else {
				$num = mysqli_num_rows($this->result);
			}
			return $num;
		}

		public function getData($id, $tblname) {
			$sql = "SELECT * FROM $tblname WHERE article_id = '$id'";
			$this->execute($sql);
			if($this->getRow() == 0) {
				$data = [0];
			}	
			else {
				while($datas = mysqli_fetch_array($this->result)) {
					$data[] = $datas;    
					/* Chu y ket qua tra ve la mang doi tuong hay chi tra ve mot doi tuong */
				}
			}
			return $data;
		}

		public function getArticleByName($name) {
			$sql = "SELECT * FROM dmc_article WHERE article_name = '$name'";
			$this->execute($sql);
			if($this->getRow() == 0) {
				$data['article_id'] = 0;
			}
			else {
				$data = mysqli_fetch_array($this->result);
			}
			return $data['article_id'];
		}

		public function addArticle($title, $author, $image, $summary, $content, $createTime, $category) {
		    $sql = "INSERT INTO dmc_article(article_name, article_author, article_image, article_summary, article_create_day, article_content, article_category) VALUES('$title', '$author', '$image', '$summary', '$createTime', '$content', '$category')";
			return $this->execute($sql);
		}

		public function addRelation($article_id, $tag_id) {
			$sql = "INSERT INTO dmc_relation(article_id, tag_id) VALUES('$article_id', '$tag_id')";
			return $this->execute($sql);
		}

		public function editArticle($id, $title, $author, $image, $summary, $content, $modifyTime, $category) {
		    $sql = "UPDATE dmc_article SET article_name = '$title', article_image = '$image', article_summary = '$summary', article_modify_day = '$modifyTime', article_content = '$content', article_category = '$category' WHERE article_id = '$id'";
			return $this->execute($sql);
		}

		public function deleteRelation($article_id) {
			$sql = "DELETE FROM dmc_relation WHERE article_id = '$article_id'";
			return $this->execute($sql);
		}

		public function deleteArticle($id) {
		    $sql = "DELETE FROM dmc_article WHERE article_id = '$id'";
			return $this->execute($sql);
		}

		public function deleteTag($id) {
			$sql = "DELETE FROM dmc_tag WHERE tag_id = '$id'";
			return $this->execute($sql);
		}

		public function addTag($name) {
			$sql = "INSERT INTO dmc_tag(tag_name) VALUES('$name')";
			return $this->execute($sql);
		}

		public function getTag($name) {
			$sql = "SELECT tag_id FROM dmc_tag WHERE tag_name = '$name'";
			$this->execute($sql);
			if($this->getRow() == 1) {
				$data = mysqli_fetch_array($this->result);
			}	
			else {
				$data['tag_id'] = 0;	
			}
			return $data['tag_id'];
		}

		public function signIn($user, $pass) {
			$sql = "SELECT * FROM dmc_account WHERE account_user = '$user' AND account_pass = '$pass'";
			$this->execute($sql);
			if($this->getRow() == 1) {
				$data = mysqli_fetch_array($this->result);
			}
			else {
				$data = 0;
			}
			return $data; 
		}

		public function getArticle($category) {
			$sql = "SELECT * FROM dmc_article WHERE article_category = '$category'";
			$this->execute($sql);
			if($this->getRow() == 0) {
				$data = 0;
			}
			else {
				while($datas = mysqli_fetch_array($this->result)) {
					$data[] = $datas;
				}
			}
			return $data;
		}

		public function getProduct() {
			$sql = "SELECT * FROM dmc_product";
			$this->execute($sql);
			if($this->getRow() > 0) {
				while($datas = mysqli_fetch_array($this->result)) {
					$data[] = $datas;
				}
			}
			else $data = 0;
			return $data;
		}

		public function checkAccount($user) {
			$sql = "SELECT * FROM dmc_account WHERE account_user = '$user'";
			$this->execute($sql);
			if($this->getRow() > 0) return 1;
			else return 0;
		}

		public function signUp($user, $pass, $fullname, $gender, $email, $telephone) {
			$sql = "INSERT INTO dmc_account(account_user, account_pass, account_fullname, account_gender, account_telephone, account_email) VALUES('$user', '$pass', '$fullname', '$gender', '$telephone', '$email')";	
			return $this->execute($sql);
		}
		// public function getSimilarArticle($id) {
		// 	$sql = "SELECT *
		// 		    FROM (	SELECT
		// 		                dmc_relation.tag_id as tag_id
		// 		            FROM
		// 		                dmc_relation
		// 		            WHERE
		// 		                dmc_relation.article_id = '$id') as A, dmc_article, dmc_relation
		// 			WHERE dmc_relation.tag_id = A.tag_id AND dmc_article.article_id = dmc_relation.article_id AND NOT dmc_article.article_id = '$id'";
		// 	$this->execute($sql);
		// 	if($this->getRow() > 0) {
		// 		while($datas = mysqli_fetch_array($this->result)) {
		// 			$data[] = $datas;
		// 		}
		// 	}
		// 	else $data = 0;
		// 	return $data;
		// }
	}
 ?>