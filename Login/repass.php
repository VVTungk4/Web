<!DOCTYPE html>
<html lang="en">

<head>
	<title>Quên mật khẩu</title>
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
		<div class="limiter">
            <form method="post" action="repass2.php" class="form">
			<div class="container-login100" style="background-image: url('images/back.jpg');">
				<div class="wrap-login100">
					<form class="login100-form validate-form">


						<span class="login100-form-title p-b-34 p-t-27" style="font-family: quicksand;">
							Lấy lại mật khẩu
						</span>

						<div class="wrap-input100 validate-input" data-validate="Enter username">
							<input class="input100" type="text" name="password" placeholder="Mật khẩu mới"
								style="font-family: quicksand;" required>
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>

                        <div class="wrap-input100 validate-input" data-validate="Enter username">
							<input class="input100" type="text" name="repass" placeholder="Nhập lại mật khẩu"
								style="font-family: quicksand;" required>
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>

                        <div class="wrap-input100 validate-input" data-validate="otp_n">
							<input class="input100" type="text" name="otp_n" placeholder="Nhập OTP"
								style="font-family: quicksand;" required>
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>

						<div class="container-login100-form-btn">
							<button class="login100-form-btn" type="submit" name="oce" style="font-family: quicksand;">
								Xác nhận
							</button>
						</div>

						<div id="error-message" style="display: none;
							background: rgb(216, 64, 18);
							color: rgb(244, 234, 234);
							height: 40px;
							width: 390px;
							text-align: center;
							margin-top: 20px;
							line-height: 46px;
							border-radius: 10px;">
						</div>
						<script>
							window.onload = function () {
								const urlParams = new URLSearchParams(window.location.search);
								const error = urlParams.get('error');
								if (error) {
									const errorMessageDiv = document.getElementById('error-message');
									errorMessageDiv.textContent = error;
									errorMessageDiv.style.display = 'block'; // Hiển thị thông báo

									// Tự động tắt thông báo sau 5 giây
									setTimeout(function () {
										errorMessageDiv.style.display = 'none';
									}, 5000);

									// Xóa tham số 'error' khỏi URL
									history.replaceState(null, null, window.location.pathname);
								}
							};
						</script>


						<div class="text-center p-t-90">
							<a class="txt1" href="Login.php">
								Đăng nhập
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