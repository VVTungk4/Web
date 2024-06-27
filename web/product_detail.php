<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

$is_logged_in = isset($_SESSION['user_info']);

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
	<link rel="icon" type="image/png" href="../sanpham/image/sp.ico" />
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
					<li><a href="../sanpham/Áo-Nữ .php">TRANG PHỤC NỮ-ÁO</a></li>
					<li><a href="../sanpham/Đầm-Nữ.php">TRANG PHỤC NỮ-ĐẦM
						</a></li>

				</ul>
			</div>
			<div style="height: 50px;"><a href="../sanpham/Sản-phẩm.php" style="text-decoration:none; color:#000;">
					<p>SẢN PHẨM </p>
			</div>
			<div><a href="../index.php" style="text-decoration:none; color:#000;">
					<p>TRANG CHỦ</p>
				</a></div>
			<div><a href="../sanpham/Giới-Thiệu.php" style="text-decoration:none; color:#000;">
					<p>GIỚI THIỆU</p>
				</a></div>
			<div><a href="../Cart/cart.php" style="text-decoration:none; color:#000;">
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
				<div class="discout">
					<img src="<?php echo $product['thumbnail'] ?>" alt="Ảnh váy" style="border: 2px solid pink;" class="img-fluid">
					<div class="discount-tag"> OFF <?php echo $product['discount'] ?> %</div>
					
				</div>
			</div>

			<div class="product-info">
				<h1><?php echo $product['title']; ?></h1>
				<p style="font-size: 20px;" class="price"><del>Giá cũ: <?php echo number_format($product['price']); ?> VND </del></p>
				<p class="price">Giá mới: <?php echo number_format($product['after_discount']); ?> VND</p>


				<form id="order-form" action="../Cart/cart.php" method="POST">
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
						<select name="color_id" id="color" class="form-control" style="width: 70px;">
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
							<input type="number" id="quantity-input" name="quantity" min="1" class="form-control" disabled style="width: 60px;">
							<button type="button" id="increment" class="btn btn-primary" disabled>+</button>
						</div>
					</div>

					<div class="button-group" style="margin-bottom: 20px;">
						<button type="submit" id="buy-now" class="btn btn-primary" disabled>Mua ngay</button>
						<button type="button" id="add-to-cart" class="btn-custom" disabled> <i class="bi bi-cart2"></i>&nbsp;Thêm vào giỏ hàng</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="mota">
		<p id="motasp">MÔ TẢ SẢN PHẨM</p>
		<p id="description"><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<scrip>
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
		if (quantity < maxQuantity) { $('#quantity-input').val(quantity + 1); } }); $('#decrement').click(function() { var quantity=parseInt($('#quantity-input').val()); if (quantity> 1) {
			$('#quantity-input').val(quantity - 1);
			}
			});

			$('#quantity-input').change(function() {
			var quantity = parseInt($(this).val());
			if (quantity < 1) { $(this).val(1); } else if (quantity> maxQuantity) {
				$(this).val(maxQuantity);
				}
				});
				$('#add-to-cart').click(function() {
				var isLoggedIn = <?php echo json_encode($is_logged_in); ?>;
				if (!isLoggedIn) {
				alert('Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
				return;
				}
				var formData = $('#order-form').serialize();

				$.ajax({
				url: '../php/addtocart.php',
				method: 'POST',
				data: formData,
				success: function(response) {
				// Hiển thị thông báo thành công
				alert('Sản phẩm đã được thêm vào giỏ hàng thành công!');
				}
				});
				});
				$('#buy-now').click(function() {
				var isLoggedIn = <?php echo json_encode($is_logged_in); ?>;
				if (!isLoggedIn) {

				event.preventDefault();


				alert('Bạn cần đăng nhập để mua sản phẩm.');
				return;
				}

				var formData = $('#order-form').serialize();

				$.ajax({
				url: '../php/addtocart.php',
				method: 'POST',
				data: formData,
				success: function(response) {
				// Thực hiện điều gì đó sau khi thêm vào giỏ hàng thành công
				window.location.href = '../Cart/cart.php';
				}
				});

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
</body>
<style>
	.discout {
		position: relative;
		display: inline-block;
	}

	.discount-tag {
		position: absolute;
		top: 10px;
		/* Điều chỉnh theo cần thiết */
		right: 10px;
		/* Điều chỉnh theo cần thiết */
		background-color: #FF3366;
		color: white;
		padding: 5px;
		font-size: 13px;
		/* Điều chỉnh theo cần thiết */
	}
</style>

</html>

<?php
$conn->close();
?>