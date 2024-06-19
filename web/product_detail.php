<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'webhangban');
if ($conn->connect_error) {
	die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy thông tin sản phẩm
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$sql = "SELECT * FROM product WHERE id = $product_id";
$product_result = $conn->query($sql);
$product = $product_result->fetch_assoc();

// Lấy danh sách size và màu sắc
$sizes_result = $conn->query("SELECT * FROM sizes");
$colors_result = $conn->query("SELECT * FROM colors");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chi tiết sản phâm</title>
	<link rel="stylesheet" href="style-detail-product.css">
	<link rel="icon" type="image/png" href="../images/logo1image/logo.ico" />
	<link rel="stylesheet" href="./themify-icons/themify-icons.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
	<!-- Google Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css">

</head>

<body>
	<div id="header">
		<div id="khungdau">
			<div style="margin-left: 100px; width: 250px;" id="TaiKhoan">
				<p style="margin-bottom: 0;"><i class="ti-menu-alt"></i>&nbsp;DANH SÁCH</p>
				<ul class="MeNu">
					<li><a href="../sanpham/Áo-Nữ .html">TRANG PHỤC NỮ-ÁO</a></li>
					<li><a href="../sanpham/Đầm-Nữ.html">TRANG PHỤC NỮ-ĐẦM
						</a></li>

				</ul>
			</div>
			<div style="height: 50px;"><a href="../sanpham/Sản-phẩm.html" style="text-decoration:none; color:#000;">
					<p>SẢN PHẨM </p>
			</div>
			<div><a href="../index.html" style="text-decoration:none; color:#000;">
					<p>TRANG CHỦ</p>
				</a></div>
			<div><a href="../sanpham/Giới-Thiệu.html" style="text-decoration:none; color:#000;">
					<p>GIỚI THIỆU</p>
				</a></div>
			<div><a href="../Cart/cart.html" style="text-decoration:none; color:#000;">
					<p>GIỎ HÀNG</p>
				</a></div>
			<div id="TaiKhoan">
				<p style="margin-bottom: 0;">TÀI KHOẢN</p>
				<ul class="MeNu">
					<li><a href="../Login/Login.php">Đăng Nhập</a></li>
					<li><a href="../Login/email_dangki.php">Đăng Ký</a></li>
					<li><a href="../QLTK/QLTK.php">QL Tài Khoản</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="logo">
		<label for="TaiKhoan" class="ttsp"> THÔNG TIN SẢN PHẨM</label>
	</div>

	<div id="main-content" class="container-fluid">
		<div class="product-detail">
			<div class="image-container">
				<img src="<?php echo $product['thumbnail']; ?>" alt="<?php echo $product['title']; ?>" class="img-fluid">
			</div>

			<div class="product-info">
				<h1><?php echo $product['title']; ?></h1>
				<p class="price">Giá: <?php echo number_format($product['price']); ?> VND</p>


				<form id="order-form" action="order.php" method="POST">
					<input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">

					<div class="form-group">
						<label for="size">Chọn size:</label>
						<select name="size_id" id="size" class="form-control" style="width: 60px;">
							<?php while ($size = $sizes_result->fetch_assoc()) { ?>
								<option value="<?php echo $size['id']; ?>"><?php echo $size['name']; ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<label for="color">Chọn màu sắc:</label>
						<select name="color_id" id="color" class="form-control" style="width: 60px;">
							<?php while ($color = $colors_result->fetch_assoc()) { ?>
								<option value="<?php echo $color['id']; ?>"><?php echo $color['name']; ?></option>
							<?php } ?>
						</select>
					</div>

					<p id="quantity" class="quantity-info"></p>

					<div class="form-group">
						<label for="quantity-input" id="soluong-label">Số lượng:</label>
						<div class="quantity-control">
							<button type="button" id="decrement" class="btn btn-primary" disabled>-</button>
							<input type="number" id="quantity-input" name="quantity" min="1" class="form-control" disabled>
							<button type="button" id="increment" class="btn btn-primary" disabled>+</button>
						</div>
					</div>

					<div class="button-group" style="margin-bottom: 20px;">
						<button type="submit" id="buy-now" class="btn btn-primary" disabled>Mua ngay</button>
						<button type="button" id="add-to-cart" class="btn-custom" disabled> <i class="bi bi-cart2"></i>&nbsp;Thêm vào giỏ hàng</button>
					</div>
<<<<<<< HEAD
=======



>>>>>>> 4f25c9b2a282a7b934237aee1e77eec276e9dd1e
				</form>
			</div>

		</div>
		<div class="dcpt">
			<p id="motasp" style="font-size: 1.25em;">MÔ TẢ SẢN PHẨM</p>
			<p id="description" style="font-size: 1em;"><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
		</div>
	</div>
	<div class="mota">
		<p id="motasp">MÔ TẢ SẢN PHẨM</p>
		<p id="description"><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		var maxQuantity = 0;

		function updateQuantity() {
			var productId = <?php echo $product['id']; ?>;
			var sizeId = $('#size').val();
			var colorId = $('#color').val();

			$.ajax({
				url: 'get_quantity.php',
				method: 'GET',
				data: {
					product_id: productId,
					size_id: sizeId,
					color_id: colorId
				},
				success: function(data) {
					maxQuantity = parseInt(data);
					if (maxQuantity > 0) {
						$('#quantity').text(maxQuantity + ' sản phẩm có sẵn');
						$('#buy-now, #add-to-cart').prop('disabled', false);
						$('#quantity-input').prop('disabled', false).val(1).attr('max', maxQuantity);
						$('#increment').prop('disabled', false);
						$('#decrement').prop('disabled', false);
					} else {
						$('#quantity').text('Hết hàng');
						$('#buy-now, #add-to-cart').prop('disabled', true);
						$('#quantity-input').prop('disabled', true).val(0);
						$('#increment').prop('disabled', true);
						$('#decrement').prop('disabled', true);
					}
				}
			});
		}

		$('#size, #color').change(updateQuantity);

		$('#increment').click(function() {
			var quantity = parseInt($('#quantity-input').val());
			if (quantity < maxQuantity) {
				$('#quantity-input').val(quantity + 1);
			}
		});

		$('#decrement').click(function() {
			var quantity = parseInt($('#quantity-input').val());
			if (quantity > 1) {
				$('#quantity-input').val(quantity - 1);
			}
		});

		$('#quantity-input').change(function() {
			var quantity = parseInt($(this).val());
			if (quantity < 1) {
				$(this).val(1);
			} else if (quantity > maxQuantity) {
				$(this).val(maxQuantity);
			}
		});

		$(document).ready(function() {
			updateQuantity();
		});
	</script>
	<!--footer----------------------------------------------------------->
	<!-- Footer -->
	<footer class="text-center text-lg-start bg-body-tertiary text-muted" style=" background: #ffdce3;
		padding: 10px;
		color: #000;">
		<!-- Section: Social media -->
		<!-- Section: Social media -->

		<!-- Section: Links  -->
		<section class="" style="margin-top: 0px; height: 240px;">
			<div class="container text-center text-md-start mt-5" style="margin-top: 1rem !important ;">
				<!-- Grid row -->
				<div class="row mt-3">
					<!-- Grid column -->
					<div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
						<!-- Content -->
						<h6 class="text-uppercase fw-bold mb-4" style="font-size: 25px;">
							<i class="fas fa-gem me-3"></i>&nbsp;SONIC SHOP
						</h6>
						<p style="text-align: justify; font-weight: bold;">
							Website này được thiết kế và vận hành bởi nhóm admin: </br>
							1. Dương Đức Khôi </br>
							2. Mai Đình Dũng</br>
							3. Nguyễn Ngọc Sơn</br>
							4. Vũ Văn Tùng</br>
							5. Tăng Văn Tuấn</br>
						</p>
					</div>
					<!-- Grid column -->

					<!-- Grid column -->
					<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4" style=" font-weight: bold;">
						<!-- Links -->
						<h6 class="text-uppercase fw-bold mb-4" style="font-size: 25px;">
							SẢN PHẨM
						</h6>
						<p>
							<a href="#!" class="text-reset">Váy nữ xinh </a>
						</p>
						<p>
							<a href="#!" class="text-reset">Đầm nữ xinh</a>
						</p>
					</div>
					<!-- Grid column -->

					<!-- Grid column -->
					<div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
						<!-- Links -->
						<h6 class="text-uppercase fw-bold mb-4" style="font-size: 25px;">
							ĐƯỜNG DẪN
						</h6>
						<p>
							<a href="#!" class="text-reset">Trang chủ</a>
						</p>
						<p>
							<a href="#!" class="text-reset">Sản phẩm</a>
						</p>
						<p>
							<a href="#!" class="text-reset">Giới thiệu</a>
						</p>
						<p>
							<a href="#!" class="text-reset">Tài khoản cá nhân</a>
						</p>
					</div>
					<!-- Grid column -->

					<!-- Grid column -->
					<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4" style="text-align: justify; font-weight: bold;">
						<!-- Links -->
						<h6 class="text-uppercase fw-bold mb-4" style="font-size: 25px;">Contact</h6>
						<p><i class="fas fa-home me-3"></i> 54, Triều Khúc, Thanh Xuân, Hà Nội</p>
						<p>
							<i class="fas fa-envelope me-3"></i>
							sonicshopxinh@gmail.com
						</p>
						<p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
						<p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
					</div>
					<!-- Grid column -->
				</div>
				<!-- Grid row -->
			</div>
		</section>
		<!-- Section: Links  -->

		<!-- Copyright -->
		<!-- Right -->
		<div class="bg-body-tertiary text-center" style="padding: 0;">
			<!-- Grid container -->
			<div class="container p-4 pb-0" style="padding: 0;">
				<!-- Section: Social media -->
				<section class="mb-4">
					<!-- Facebook -->
					<a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

					<!-- Twitter -->
					<a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter"></i></a>

					<!-- Google -->
					<a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #dd4b39;" href="#!" role="button"><i class="fab fa-google"></i></a>

					<!-- Instagram -->
					<a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram"></i></a>

					<!-- Linkedin -->
					<a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
					<!-- Github -->
					<a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #333333;" href="#!" role="button"><i class="fab fa-github"></i></a>
				</section>
				<!-- Section: Social media -->
			</div>
			<!-- Grid container -->
			<!-- Right -->
			<!-- Copyright -->
		</div>
	</footer>
<<<<<<< HEAD
=======
	<style>
		/* CSS tổng hợp cho header, footer và chi tiết sản phẩm */
		html,
		body {
			height: 100%;
			margin: 0;
			padding: 0;
			overflow-x: hidden;
			font-family: Arial, sans-serif;
			line-height: 1.6;
		}

		body {
			background-color: #f8f9fa;
		}

		#header {
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			height: 50px;
			background-color: lavender;
			z-index: 3;
		}

		#khungdau div {
			float: left;
			line-height: 50px;
			width: 160px;
			text-align: center;
			height: 50px;
		}

		#khungdau div:hover {
			background-color: white;
			cursor: pointer;
		}

		.MeNu {
			background-color: whitesmoke;
		}

		#khungdau .DanhMuc:hover li {
			display: block;
		}

		#khungdau ul li {
			height: 40px;
			display: none;
			float: none;
			clear: both;
			text-decoration: none;
			text-align: left;
			padding-left: 20px;
			line-height: 40px;
		}

		.MeNu li {
			width: 100%;
		}

		.MeNu ul {
			margin-top: 0;
			background: 0%;
		}

		ul li a {
			text-decoration: none;
			color: black;
		}

		.MeNu li:hover {
			background-color: rgb(150, 142, 142);
		}

		.DanhMuc i {
			margin: 10px;
			line-height: 0px;
			font-size: 13px;
		}

		.DanhMuc ul li {
			display: inline-block;
		}

		#TaiKhoan:hover ul li {
			display: block;
		}

		#TaiKhoan ul li:hover {
			background-color: rgb(150, 142, 142);
		}

		#TaiKhoan ul {
			background-color: whitesmoke;
		}

		#content {
			width: 80%;
			margin-left: auto;
			margin-right: auto;
		}

		.MeNu2 {
			display: none;
			position: relative;
			left: 230px;
			top: -40px;
		}

		li:hover .MeNu2 {
			display: block;
			background-color: rgb(241, 212, 212);
		}

		img {
			height: 400px;
			/* Increase the height */
			width: 350px;
			/* Increase the width */
			float: left;
			margin: 30px 30px;
			border: white 2px solid;
			text-align: center;
			margin-top: 50px;
		}

		tr {
			text-align: center;
		}

		#content a {
			text-decoration: none;
			color: black;
			list-style-type: none;
		}

		#mini {
			text-align: center;
			font-weight: bold;
			background-color: rgba(255, 192, 203, 1);
			height: 180px;
			bottom: 10px;
			text-transform: uppercase;
		}

		#footer {
			float: both;
			background-color: rgb(241, 212, 212);
			clear: both;
		}

		/* Footer */
		footer {
			background-color: #e6e6fa;
			padding: 20px 0;
			position: relative;
			width: 100%;
			padding: 50px 100px;
			display: flex;
			justify-content: space-between;
			flex-wrap: wrap;
			margin-top: auto;
		}

		footer .container {
			display: flex;
			justify-content: space-between;
			flex-wrap: wrap;
			width: 100%;
		}

		footer .noi-dung {
			margin-right: 30px;
		}

		footer .noi-dung.about {
			flex: 1;
			min-width: 250px;
		}

		footer .noi-dung.about h2 {
			position: relative;
			color: #fff;
			font-weight: 500;
			margin-bottom: 15px;
		}

		footer .noi-dung.about h2:before {
			content: "";
			position: absolute;
			bottom: -5px;
			left: 0;
			width: 50px;
			height: 2px;
		}

		footer .noi-dung.about p {
			color: black;
		}

		.social-icon {
			margin-top: 20px;
			display: flex;
		}

		.social-icon li {
			list-style: none;
		}

		.social-icon li a {
			display: inline-block;
			width: 40px;
			height: 40px;
			background: pink;
			display: flex;
			justify-content: center;
			align-items: center;
			margin-right: 10px;
			text-decoration: none;
			border-radius: 4px;
		}

		.social-icon li a:hover {
			background: #f00;
		}

		.social-icon li a .fa {
			color: #fff;
			font-size: 20px;
		}

		.links {
			flex: 1;
			min-width: 150px;
		}

		.links h2 {
			position: relative;
			color: #fff;
			font-weight: 500;
			margin-bottom: 15px;
		}

		.links h2:before {
			content: "";
			position: absolute;
			bottom: -5px;
			left: 0;
			width: 50px;
			height: 2px;
			background: #f00;
		}

		.links ul li {
			list-style: none;
		}

		.links ul li a {
			color: #999;
			text-decoration: none;
			margin-bottom: 10px;
			display: inline-block;
		}

		.links ul li a:hover {
			color: #fff;
		}

		.contact {
			flex: 1;
			min-width: 250px;
		}

		.contact h2 {
			position: relative;
			color: #fff;
			font-weight: 500;
			margin-bottom: 15px;
		}

		.contact h2:before {
			content: "";
			position: absolute;
			bottom: -5px;
			left: 0;
			width: 50px;
			height: 2px;
		}

		.info li {
			display: flex;
			align-items: center;
			margin-bottom: 10px;
		}

		.info li span {
			margin-right: 10px;
			color: #666;
		}

		.form {
			display: flex;
		}

		.form__field {
			flex: 1;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 3px 0 0 3px;
			outline: none;
		}

		.btn {
			padding: 10px 20px;
			border: none;
			background-color: #333;
			color: #fff;
			cursor: pointer;
			border-radius: 0 3px 3px 0;
		}

		.btn:hover {
			background-color: #000;
		}

		/* CSS cho chi tiết sản phẩm */
		.container-fluid {
			padding: 20px;
			margin-top: 50px;
		}

		.product-detail {
			display: flex;
			flex-wrap: wrap;
			background-color: #ffffff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			border-radius: 8px;
			overflow: hidden;
		}

		.image-container {
			flex: 1;
			min-width: 400px;
			/* Increase the min-width */
			padding: 20px;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.image-container img {
			max-width: 100%;
			height: auto;
			border-radius: 8px;
		}

		.product-info {
			flex: 2;
			min-width: 300px;
			padding: 20px;
		}

		.product-info h1 {
			font-size: 2em;
			margin-bottom: 10px;
			color: #333;
		}

		.product-info .price {
			font-size: 1.5em;
			color: #e74c3c;
			margin-bottom: 20px;
		}

		.product-info form {
			margin-top: 20px;
		}

		.form-group {
			margin-bottom: 15px;
		}

		.form-group label {
			font-weight: bold;
			display: block;
			margin-bottom: 5px;
		}

		.form-control {
			width: 8%;
			/* Decrease the width */
			padding: 5px;
			/* Decrease the padding */
			border: 1px solid #ccc;
			border-radius: 4px;
			font-size: 0.9em;
			/* Decrease the font size */
		}

		.quantity-control {
			display: flex;
			align-items: center;
		}

		.quantity-control input {
			width: 50px;
			text-align: center;
		}

		.quantity-control button {
			padding: 5px 10px;
			/* Decrease the padding */
			border: 1px solid #ccc;
			background-color: #007bff;
			cursor: pointer;
		}

		.quantity-control button:hover {
			background-color: #0056b3;
		}

		.btn-primary {
			background-color: #007bff;
			color: #fff;
			border: none;
			padding: 10px 15px;
			/* Decrease the padding */
			font-size: 0.9em;
			/* Decrease the font size */
			border-radius: 4px;
			cursor: pointer;
		}

		.btn-primary:hover {
			background-color: #0056b3;
		}

		.btn-secondary {
			background-color: #6c757d;
			color: #fff;
			border: none;
			padding: 10px 15px;
			/* Decrease the padding */
			font-size: 0.9em;
			/* Decrease the font size */
			border-radius: 4px;
			cursor: pointer;
		}

		.btn-secondary:hover {
			background-color: #545b62;
		}

		.dcpt {

			clear: both;
			margin-top: 20px;

			color: #333;
			background-color: #ffffff;

			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

			border-radius: 8px;

			padding: 20px;


		}
	</style>
>>>>>>> 4f25c9b2a282a7b934237aee1e77eec276e9dd1e
</body>

</html>

<?php
$conn->close();
?>