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
	<title>TRANG CHỦ</title>
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

	<h1><?php echo $product['title']; ?></h1>
	<img src="<?php echo $product['thumbnail']; ?>" alt="<?php echo $product['title']; ?>">
	<p>Giá: <?php echo number_format($product['price']); ?> VND</p>
	<p><?php echo $product['description']; ?></p>

	<form id="order-form" action="order.php" method="POST">
		<input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">

		<label for="size">Chọn size:</label>
		<select name="size_id" id="size">
			<?php while ($size = $sizes_result->fetch_assoc()) { ?>
				<option value="<?php echo $size['id']; ?>"><?php echo $size['name']; ?></option>
			<?php } ?>
		</select>

		<label for="color">Chọn màu sắc:</label>
		<select name="color_id" id="color">
			<?php while ($color = $colors_result->fetch_assoc()) { ?>
				<option value="<?php echo $color['id']; ?>"><?php echo $color['name']; ?></option>
			<?php } ?>
		</select>

		<p id="quantity"></p>

		<label for="quantity-input">Số lượng:</label>
		<input type="number" id="quantity-input" name="quantity" min="1" disabled>

		<button type="submit" id="buy-now" disabled>Mua ngay</button>
	</form>

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
						$('#quantity').text('Số lượng còn lại: ' + maxQuantity);
						$('#buy-now').prop('disabled', false);
						$('#quantity-input').prop('disabled', false).val(1).attr('max', maxQuantity);
					} else {
						$('#quantity').text('Hết hàng');
						$('#buy-now').prop('disabled', true);
						$('#quantity-input').prop('disabled', true).val(0);
					}
				}
			});
		}

		$('#size, #color').change(updateQuantity);

		$('#quantity-input').on('input', function() {
			var quantity = parseInt($(this).val());
			if (quantity > maxQuantity) {
				$(this).val(maxQuantity);
			} else if (quantity < 1) {
				$(this).val(1);
			}
		});

		$(document).ready(updateQuantity);
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