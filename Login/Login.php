<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>
	<form method="post" action="Login_sql.php" class="form">

		<div class="limiter">
			<div class="container-login100" style="background-image: url('images/back.jpg'); ">

				<div class="wrap-login100">

					<form class="login100-form validate-form">
						<span class="login100-form-logo">
							<img src="images/logo1.png" alt="" style="width: 80px;height: 80px;">
						</span>

						<span class="login100-form-title p-b-34 p-t-27" style=" color:#0f3030;">
							SIGN IN
						</span>

						<div class="wrap-input100 validate-input" data-validate="Enter username" style="font-family: quicksand;" required>
							<input class="input100" type="email" name="email" placeholder="Email">
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Enter password">
							<input class="input100" type="password" name="password" placeholder="Password" style="font-family: quicksand;" required>
							<span class="focus-input100" data-placeholder="&#xf191;"></span>

						</div>
						<div id="error-message" style="display: none;
							background: rgb(216, 64, 18);
							color: rgb(244, 234, 234);
							height: 40px;
							width: 390px;
							text-align: center;
							margin: auto;
							line-height: 46px;
							border-radius: 10px;"></div>

						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1" style="font-family: quicksand;">
								Nhớ mật khẩu
							</label>
						</div>

						<div class="container-login100-form-btn">
							<button class="login100-form-btn" type="submit" name="xacnhan">
								Login
							</button>
						</div>
						<script>
							window.onload = function() {
								const urlParams = new URLSearchParams(window.location.search);
								const error = urlParams.get('error');
								if (error) {
									const errorMessageDiv = document.getElementById('error-message');
									errorMessageDiv.textContent = error;
									errorMessageDiv.style.display = 'block'; // Hiển thị thông báo
									// Tự động tắt thông báo sau 5 giây
									setTimeout(function() {
										errorMessageDiv.style.display = 'none';
									}, 5000);

									// Xóa tham số 'error' khỏi URL
									history.replaceState(null, null, window.location.pathname);
								}
							};
						</script>


						<div class="text-center p-t-90">
							<a class="txt1" href="resetpassword.php" style=" color:#0f3030;">
								Quên mật khẩu?
							</a>
							<a class="txt1" href="email_dangki.php" style=" color:#0f3030;">
								&nbsp;&nbsp;&nbsp;Đăng kí?
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>


		<div id="dropDownSelect1"></div>

		<!--===============================================================================================-->
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/animsition/js/animsition.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/bootstrap/js/popper.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/select2/select2.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/daterangepicker/moment.min.js"></script>
		<script src="vendor/daterangepicker/daterangepicker.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/countdowntime/countdowntime.js"></script>
		<!--===============================================================================================-->
		<script src="js/main.js"></script>

</body>

</html>