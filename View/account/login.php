<?php  
	ob_start();
	include "display/header.php";
?>
<link rel="stylesheet" type="text/css" href="style/style2.css">
<div class='row' style="padding: 10px 200px; overflow: auto">
	<h1>Đăng nhập</h1>
	<form method="POST" id="signIn">
		<div class="left1">
			<p>Username</p>
			<input type="text" name="account" id="account" placeholder="Tên tài khoản" onblur="checkAccount(this.id)">
		</div>
		<div class="left1">
			<p>Password</p>
			<input type="password" name="pass" id="pass" placeholder="Mật khẩu">
		</div>
		<div class="right1">
			<p></p>
			<input type="submit" name="submitAcc" id="submitAcc" value="SUBMIT">
		</div>
	</form>
	<h1>Tạo tài khoản mới</h1>
	<h3>Luôn miễn phí</h3>
	<form method="POST" id="signUp">
		<div class="input1">
			<input type="text" name="lastName" id="lastName" placeholder="Tên" onblur="check(this.id)">
		</div>
		<div class="input2">
			<input type="text" name="firstName" id="firstName" placeholder="Họ" onblur="check(this.id)">
		</div>
		<input type="email" name="email" id="email" placeholder="Email" onblur="check(this.id)">
		<input type="text" name="telephone" id="telephone" placeholder="Số điện thoại" onblur="check(this.id)">
		<input type="text" name="username" id="username" placeholder="Tài khoản">
		<input type="password" name="password" id="password" placeholder="Mật khẩu" onblur="check(this.id)">
		<input type="password" name="vertifyPass" id="vertifyPass" placeholder="Xác nhận mật khẩu" onblur="checkPass(this.id)">
		<div id="borbox">
			<div class="borbox"> 
				<input type="radio" name="gender" value="male" checked>
				<p>Male</p>
			</div>
			<div class="borbox">
				<input type="radio" name="gender" value="female">
				<p>Female</p>
			</div>
			<div class="borbox">
				<input type="radio" name="gender" value="other">
				<p>Other</p>
			</div>
		</div>
		<input type="button" name="submit1" id="submit1" value="Đăng ký" onclick="checkAll()">
	</form>
	<!-- Cho đoạn code này vào đầu file PHP: ob_start(); // khởi động buffer --- header -->
	<!-- Cho đoạn code sau vào cuối file PHP: ob_flush(); // làm sạch buffer --- header -->
	
	<script type="text/javascript">
		function check(x) {
			var id = "#" + x;
			$.post("Model/function_check.php", {type: x, content: $(id).val().trim()}, function(result) {
				if(result == 0) {
					$(id).css("border", "2px solid red");
				} 
				else {
					$(id).css("border", " 1px solid gray");
				}
			});
		}
		function checkPass(x) {
			var id = "#" + x;
			if($(id).val().trim() == $("#password").val().trim()) {
				$(id).css("border", "1px solid gray");
			} 
			else {
				$(id).css("border", "2px solid red");
			}
		}
		function checkAll() {
			var gender;
			var checkbox = document.getElementsByName("gender");
            for (var i = 0; i < checkbox.length; i++){
                if (checkbox[i].checked === true){
                   gender = checkbox[i].value;
                }
            }
			if($("#lastName").css("border-color") == "rgb(128, 128, 128)" && $("#firstName").css("border-color") == "rgb(128, 128, 128)" && $("#username").css("border-color") == "rgb(128, 128, 128)" && $("#password").css("border-color") == "rgb(128, 128, 128)" && $("#email").css("border-color") == "rgb(128, 128, 128)" && $("#vertifyPass").css("border-color") == "rgb(128, 128, 128)" && $("#telephone").css("border-color") == "rgb(128, 128, 128)") {
				$.post("Model/sign_up.php", {firstName: $("#firstName").val(), lastName: $("#lastName").val(), user: $("#username").val(), pass: $("#password").val(), telephone: $("#telephone").val(), gender: gender, email: $("#email").val()} , function(result) {
						if(result == 1) alert("OK!");
						else alert("Thêm dữ liệu bị lỗi! Mời nhập lại.");
				});
			}
			else {
				alert("Nhập sai! Mời nhập lại.");
			}
		}
		function checkAccount(x) {
			var id = "#" + x;
			$.post("Model/check_account.php", {user: $("#account").val().trim()}, function(result) {
				if(result == 1) {
					$(id).css("border", " 1px solid gray");
				}
				else {
					$(id).css("border", "2px solid red");
				}
			});
		}
	</script>
</div>
<?php
	include 'display/footer.php';
?>