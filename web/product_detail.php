<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'webbanhang1');
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
	<link rel="icon" type="image/png" href="image/logo.ico" />
	<link rel="stylesheet" href="./themify-icons/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="style-detail-product.css" />
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
	<div id="header">
		<div id="khungdau">
			<div style="margin-left: 100px; width: 250px;" class="DanhMuc">
				<p style="margin-bottom: 0;"><i class="DanhMuc ti-menu-alt"></i>DANH SÁCH</p>
				<ul class="MeNu">
					<li><a href="Áo-Nữ.html">TRANG PHỤC NỮ-ÁO</a></li>
					<li><a href="Đầm-Nữ.html">TRANG PHỤC NỮ-ĐẦM</a></li>
				</ul>
			</div>
			<div style="height: 50px;"><a href="Sản-phẩm.html" style="text-decoration:none; color:#000;">
					<p>SẢN PHẨM </p>
				</a></div>
			<div><a href="../index.html" style="text-decoration:none; color:#000;">
					<p>TRANG CHỦ</p>
				</a></div>
			<div><a href="Giới-Thiệu.html" style="text-decoration:none; color:#000;">
					<p>GIỚI THIỆU</p>
				</a></div>
			<div><a href="../Cart/cart.html" style="text-decoration:none; color:#000;">
					<p>GIỎ HÀNG</p>
				</a></div>
			<div id="TaiKhoan">
				<p style="margin-bottom: 0;">TÀI KHOẢN</p>
				<ul class="MeNu">
					<li><a href="Login/Login.html">Đăng Nhập</a></li>
					<li><a href="Login/register.html">Đăng Ký</a></li>
				</ul>
			</div>
		</div>
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
						<select name="size_id" id="size" class="form-control">
							<?php while ($size = $sizes_result->fetch_assoc()) { ?>
								<option value="<?php echo $size['id']; ?>"><?php echo $size['name']; ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<label for="color">Chọn màu sắc:</label>
						<select name="color_id" id="color" class="form-control">
							<?php while ($color = $colors_result->fetch_assoc()) { ?>
								<option value="<?php echo $color['id']; ?>"><?php echo $color['name']; ?></option>
							<?php } ?>
						</select>
					</div>

					<p id="quantity" class="quantity-info"></p>

					<div class="form-group">
						<label for="quantity-input" id="soluong-label">Số lượng:</label>
						<div class="quantity-control">
							<button type="button" id="decrement" class="btn btn-secondary" disabled>-</button>
							<input type="number" id="quantity-input" name="quantity" min="1" class="form-control" disabled>
							<button type="button" id="increment" class="btn btn-secondary" disabled>+</button>
						</div>
					</div>

					<div class="button-group">
						<button type="submit" id="buy-now" class="btn btn-primary" disabled>Mua ngay</button>
						<button type="button" id="add-to-cart" class="btn btn-secondary" disabled>Thêm vào giỏ hàng</button>
					</div>
					<p id="motasp">Mô tả sản phẩm</p>
					<p id="description"><?php echo $product['description']; ?></p>
				</form>
			</div>
		</div>
	</div>
	<style>
		#main-content {
			margin-top: 58px;
			margin-bottom: 7px;
			margin-left: 5px;
			/* Cách lề 12px từng bên */
			padding: 20px;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			border-radius: 15px;
			/* Bo cong khung */
			overflow: hidden;
			/* Ngăn không cho nội dung tràn ra ngoài */
		}

		.product-detail {
			display: flex;
			align-items: flex-start;
			border-radius: 15px;
			/* Bo cong các góc của phần product-detail */
			overflow: hidden;
			/* Đảm bảo không bị tràn khung khi bo cong */
		}

		.image-container {
			flex: 1;
			padding-right: 20px;
		}

		.image-container img {
			display: block;
			margin-top: 6px;
			width: 310px;
			height: 484px;

			/* Bo cong góc dưới bên trái của ảnh */
		}

		.product-info {
			flex: 1;
			padding: 20px;
		}

		.product-info h1 {
			font-size: 30px;
			margin-top: -10px;
			margin-left: -491px;
		}

		.product-info .price {
			color: #e74c3c;
			font-size: 18px;
			margin: 26px -491px;
		}

		.product-info .description {
			margin: 20px 0;
			font-size: 16px;
		}

		.product-info form {
			margin: 20px 0;
		}

		.product-info .form-group {
			margin-bottom: 15px;
		}

		.product-info .form-control {
			width: 70px;
			padding: 10px;
			font-size: 16px;
			margin-left: -491px;
			margin-top: 10px;
		}

		.product-info .button-group {
			display: flex;
			gap: 10px;
		}

		.product-info .btn {
			width: 100%;
			padding: 10px;
			font-size: 16px;
			background-color: #3498db;
			color: #fff;
			border: none;
			cursor: pointer;
		}

		.product-info .btn:disabled {
			background-color: #bdc3c7;
			cursor: not-allowed;
		}



		.quantity-control button {
			width: 40px;
			height: 40px;
			font-size: 20px;
		}

		.quantity-control input {
			width: 60px;
			text-align: center;
			margin: 0 10px;
		}

		label {
			display: inline-block;
			margin-left: -491px;
			font-size: 19px;
		}

		#quantity-input {
			margin-top: -42px;
			margin-left: -445px;
		}

		#increment {
			margin-top: -75px;
			width: 40px;
			margin-left: -370px;
		}

		#decrement {
			margin-left: -491px;
			width: 40px;
		}

		#quantity {
			margin-left: -491px;
		}

		#soluong-label {
			margin-bottom: 10px;
		}

		#buy-now {
			width: 92px;
			margin-left: -491px;
		}

		#add-to-cart {
			width: 160px;
		}

		#description {
			font-size: 20px;
			margin-left: -908px;
			margin-top: 12px;
		}

		#motasp {
			font-size: 30px;
			margin-left: -908px;
			margin-top: 57px;
		}
	</style>
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
	<footer>
		<div class="container">
			<div class="noi-dung about">
				<h2 style="border-radius: 70px; text-align: center; background-color: pink; height: 45px;">Về Chúng Tôi</h2>
				<p>Website này được thiết kế và vận hành bởi nhóm admin: </br>
					1. Dương Đức Khôi </br>
					2. Mai Đình Dũng</br>
					3. Nguyễn Ngọc Sơn</br>
					4. Vũ Văn Tùng</br>
					5. Tăng Văn Tuấn</br>
				</p>
				<ul class="social-icon">
					<li><a href=""><i class="fa fa-facebook"></i></a></li>
					<li><a href=""><i class="fa fa-twitter"></i></a></li>
					<li><a href=""><i class="fa fa-instagram"></i></a></li>
					<li><a href=""><i class="fa fa-youtube"></i></a></li>
				</ul>
			</div>
			<div class="noi-dung links">
				<ul>
					<li><a href="#">Trang Chủ</a></li>
					<li><a href="web/Giới-Thiệu.html">Về Chúng Tôi</a></li>
					<li><a href="Login/Login.html">Tài khoản</a></li>
					<li><a href="web/product.html">Sản phẩm</a></li>
					<li><a href="web/Đầm-Nữ.html">Cửa hàng</a></li>
				</ul>
			</div>
			<div class="noi-dung contact">
				<h2 style="border-radius: 70px; text-align: center; background-color: pink; height: 45px;">Thông Tin Liên Hệ</h2>
				<ul class="info">
					<li>
						<span><i class="fa fa-map-marker"></i></span>
						<span>52 Triều Khúc<br />
							Quận Thanh Xuân, TP Hà Nội<br />
							Việt Nam</span>
					</li>
					<li>
						<span><i class="fa fa-phone"></i></span>
						<p><a href="">0373999999</a><br />
							<a href="">0373888888</a>
						</p>
					</li>
					<li>
						<span><i class="fa fa-envelope"></i></span>
						<p><a href="">sale@sonic.vn</a></p>
					</li>
					<li>
						<form class="form">
							<input type="email" class="form__field" placeholder="Đăng Ký Subscribe Email" />
							<button type="button" class="btn btn--primary  uppercase">Gửi</button>
						</form>
					</li>
				</ul>
			</div>
		</div>
	</footer>
</body>

</html>

<?php
$conn->close();
?>