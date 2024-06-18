<!DOCTYPE html>
<html lang="en">

<head>
	<title>Đăng kí</title>
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
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

	<div class="limiter">
		<form method="post" action="register_sql.php" class="form">
			<div class="container-login100" style="background-image: url('images/back.jpg');">
				<div class="wrap-login100">
					<form class="login100-form validate-form">


						<span class="login100-form-title " style=" color:#0f3030; height: 70px;">
							Sign Up
						</span>

						<div class="wrap-input100 validate-input" data-validate="fullname">
							<input class="input100" type="text" name="fullname" placeholder="Full Name" style="font-family: montserrat;" required>
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="phone">
							<input class="input100" type="text" name="phone" placeholder="Số điện thoại" style="font-family: montserrat;" type="text" pattern="(\+84|0)\d{9,10}" required>
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>
						<div class="wrap-input100 validate-input" data-validate="address">
							<input class="input100" type="text" name="address" placeholder="Địa chỉ" style="font-family: montserrat;" required>
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="password">
							<input class="input100" type="password" name="password" placeholder="Password" style="font-family: montserrat;" required>
							<span class="focus-input100" data-placeholder="&#xf191;"></span>
						</div>
						<div class="wrap-input100 validate-input" data-validate="repeat">
							<input class="input100" type="password" name="repeat" placeholder="Repeat Password" style="font-family: montserrat;" required>
							<span class="focus-input100" data-placeholder="&#xf191;"></span>
						</div>
						<div class="wrap-input100 validate-input" data-validate="otp_n">
							<input class="input100" type="text" name="otp_n" placeholder="Nhập OTP"
								style="font-family: quicksand;" required>
							<span class="focus-input100" data-placeholder="&#xf207;"></span>
						</div>

						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name=" I Agree to terms of user " required>
							<label class="label-checkbox100" for="ckb1" style="font-family: montserrat;">
								Tôi đồng ý với các <b>điều khoản sử dụng</b>
							</label>
						</div>

						<div class="container-login100-form-btn">
							<button class="login100-form-btn" type="submit" name="signup">
								Sign Up
							</button>
						</div>
						<div class="text-center" style="margin-top: 30px;">
							<a class="txt1" href="../Login/Login.php">
								SING IN
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