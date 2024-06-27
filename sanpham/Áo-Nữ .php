<!doctype html>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ÁO NỮ</title>
	<link rel="icon" type="image/png" href="../sanpham/image/ao.ico" />
	<a href="https://hocban.vn/web-development/hoc-html-co-ban"></a>
	<link rel="stylesheet" href="./themify-icons/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="../sanpham/style-css.css" />
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
			<div style="margin-left: 100px; width: 250px;" class="DanhMuc">
				<p style="margin-bottom: 0;"><i class="DanhMuc ti-menu-alt"></i>DANH SÁCH</p>
				<ul class="MeNu">
					<li><a href="../sanpham/Áo-Nữ .php">TRANG PHỤC NỮ-ÁO</a></li>
					<li><a href="../sanpham/Đầm-Nữ.php">TRANG PHỤC NỮ-ĐẦM
						</a></li>

				</ul>
			</div>
			<div style="height: 50px;"><a href="../sanpham/Sản-Phẩm.php" style="text-decoration:none; color:#000;">
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
					<li><a href="../QLTK/myOder.php">QL đơn hàng</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div id="logo">
		<img src="../Login/images/logo1.png" style="height: 90px; width: 110px;">
		<div style="margin-top: 10px;">
			<form method="post" action="../demoSearch/view_search.php" class="form">
				<p><input type="text" placeholder=" Tìm kiếm sản phẩm " name="tt_timkiem"></p>
				<button type="submit" class="btn btn-primary" data-mdb-ripple-init style="margin-top: 22px;height: 45px; width: 60px; " name="timkiem" id="search">
					<i class="fas fa-search"></i>
				</button>
			</form>
		</div>
	</div>


	<div class="container" style="background-color: antiquewhite; height: 550px; width: 1080px; margin-top: 30px;">
		<h5 style="padding-top: 10px;">SẢN PHẨM TIÊU BIỂU</h5>
		<div class="row">
			<div class="col">
				<div class="card" style="width: 240px;">
					<img src="image/8.jpg" alt="" class="card-img-top" style="width: 220px" height="260px">
					<div class="card-body">
						<h6 class="card-title" style="font-weight: bold;">Váy đầm voan Midi màu hồng</h6>

						<button type="button" class="btn btn-primary" style="padding: 4px 60px 3px 70px" onclick="redirectToDetailPage(1)">Mua Ngay</button>
					</div>
				</div>
			</div>


			<div class="col">
				<div class="card" style="width: 240px;">

					<img src="image/9.jpg" alt="" class="card-img-top" style="width: 220px" height="260px">
					<div class="card-body">
						<h6 class="card-title" style="font-weight: bold;">Black Leopard Midi Silk woman</h6>

						<button type="button" class="btn btn-primary" style="padding: 4px 60px 3px 70px" onclick="redirectToDetailPage(2)">Mua Ngay</button>
					</div>

				</div>
			</div>

			<div class="col">
				<div class="card" style="width: 240px;">

					<img src="image/10.jpg" alt="" class="card-img-top" style="width: 220px" height="260px">
					<div class="card-body">
						<h6 class="card-title" style="font-weight: bold;">Set Váy lụa màu bơ<br>&nbsp</h6>
						<button type="button" class="btn btn-primary" style="padding: 4px 60px 3px 70px" onclick="redirectToDetailPage(3)">Mua Ngay</button>
					</div>

				</div>
			</div>


			<div class="col">
				<div class="card" style="width: 240px; ">

					<img src="image/4.jpg" alt="" class="card-img-top" style="width: 220px" height="260px">
					<div class="card-body">
						<h6 class="card-title" style="font-weight: bold;">Đầm cam SAUVAGE <br>&nbsp</h6>
						<button type="button" class="btn btn-primary" style="padding: 4px 60px 3px 70px" onclick="redirectToDetailPage(4)">Mua Ngay</button>
					</div>

				</div>
			</div>

			<script>
				function redirectToDetailPage(productId) {
					// Chuyển hướng sang trang chi tiết sản phẩm với ID sản phẩm
					window.location.href = '../web/product_detail.php?id=' + productId;
				}
			</script>
		</div>

	</div>
	<table>
		<tr>
			<td>
				<img src="image/1.jpg" /></a>
			</td>
			<td>
				<img src="image/2.jpg" /></a>
			</td>
			<td>
				<img src="image/3.jpg" /></a>
			</td>
			<td>
				<img src="image/4.jpg" /></a>
			</td>
		</tr>

		<tr>
			<td>
				<p>Cream Leopard Midi Silk Dress</p>
				<p>THÀNH GIÁ: 2.496.000đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(5)"> ĐẶT HÀNG</button>
			</td>

			<td>
				<p>Chân váy phối nơ CV09-11</p>
				<p>THÀNH GIÁ: 1.696.000đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(6)">ĐẶT HÀNG</button>
			</td>

			<td>

				<p>Short Sleeves</p>
				<p>THÀNH GIÁ: 996.000 đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(7)">ĐẶT HÀNG</button>
			</td>

			<td>

				<p>Đầm công sở dáng suông tay phồng</p>
				<p>THÀNH GIÁ: 596.000 đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(8)">ĐẶT HÀNG</button>
			</td>
		</tr>

		<tr>
			<td>
				<img src="image/5.jpg" />
			</td>
			<td>
				<img src="image/6a.jpg">
			</td>
			<td>
				<img src="image/7a.jpg" />
			</td>
			<td>
				<img src="image/13.jpeg" />
			</td>

		</tr>

		<tr>
			<td>

				<p>Đầm đen</p>
				<p>THÀNH GIÁ: 2.296.000 đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(9)">ĐẶT HÀNG</button>
			</td>

			<td>

				<p>Đầm hồng</p>
				<p>THÀNH GIÁ: 196.000 đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(10)">ĐẶT HÀNG</button>
			</td>

			<td>

				<p>Đầm hồng đen</p>
				<p>THÀNH GIÁ: 400.000 đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(11)">ĐẶT HÀNG</button>
			</td>

			<td>

				<p>Atticus Blue Stripe </p>
				<p>THÀNH GIÁ: 423.000 đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(12)">ĐẶT HÀNG</button>
			</td>
		</tr>

		<tr>
			<td>
				<img src="image/1a.jpg" />
			</td>
			<td>
				<img src="image/2.jpg" />
			</td>
			<td>
				<img src="image/3c.jpg" />
			</td>
			<td>
				<img src="image/4a.jpg" />
			</td>
		</tr>

		<tr>
			<td>
				<p>Cream Leopard Midi Silk Dress</p>
				<p>THÀNH GIÁ: 2.496.000đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(13)">ĐẶT HÀNG</button>
			</td>

			<td>
				<p>Đầm đỏ</p>
				<p>THÀNH GIÁ:1.696.000đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(14)">ĐẶT HÀNG</button>
			</td>

			<td>

				<p>Đầm đen teen</p>
				<p>THÀNH GIÁ: 996.000 đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(15)">ĐẶT HÀNG</button>
			</td>

			<td>

				<p>Đầm đen</p>
				<p>THÀNH GIÁ: 596.000 đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(16)">ĐẶT HÀNG</button>
			</td>
		</tr>

		<tr>
			<td>
				<img src="image/12.jpg" />
			</td>
			<td>
				<img src="image/11.jpg">
			</td>
			<td>
				<img src="image/7.jpg" />
			</td>
			<td>
				<img src="image/13.jpeg" />
			</td>

		</tr>

		<tr>
			<td>

				<p>Đầm hồng 2</p>
				<p>THÀNH GIÁ: 2.296.000 đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(17)">ĐẶT HÀNG</button>
			</td>

			<td>

				<p>Đầm hồng 3</p>
				<p>THÀNH GIÁ: 196.000 đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(18)">ĐẶT HÀNG</button>
			</td>

			<td>

				<p>Đầm hồng 4</p>
				<p>THÀNH GIÁ: 400.000 đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(19)">ĐẶT HÀNG</button>
			</td>

			<td>

				<p>Atticus Blue Stripe </p>
				<p>THÀNH GIÁ: 423.000 đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(20)">ĐẶT HÀNG</button>
			</td>
		</tr>

		<tr>
			<td>
				<img src="image/1c.jpg" />
			</td>
			<td>
				<img src="image/2b.jpg" />
			</td>
			<td>
				<img src="image/3.jpg" />
			</td>
			<td>
				<img src="image/4.jpg" />
			</td>
		</tr>

		<tr>
			<td>
				<p>Cream Leopard Midi Silk Dress</p>
				<p>THÀNH GIÁ: 2.496.000đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(21)">ĐẶT HÀNG</button>
			</td>

			<td>
				<p>Chân váy phối nơ CV09-11</p>
				<p>THÀNH GIÁ:1.696.000đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(22)">ĐẶT HÀNG</button>
			</td>

			<td>

				<p>Đầm cam 2</p>
				<p>THÀNH GIÁ: 996.000 đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(23)">ĐẶT HÀNG</button>
			</td>

			<td>

				<p>Đầm cam 3</p>
				<p>THÀNH GIÁ: 596.000 đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(24)">ĐẶT HÀNG</button>
			</td>
		</tr>

		<tr>
			<td>
				<img src="image/5.jpg" />
			</td>
			<td>
				<img src="image/6.jpg"></a>
			</td>
			<td>
				<img src="image/7.jpg" />
			</td>
			<td>
				<img src="image/13.jpeg" />
			</td>

		</tr>

		<tr>
			<td>

				<p>Đầm đen </p>
				<p>THÀNH GIÁ: 2.296.000 đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(25)">ĐẶT HÀNG</button>
			</td>

			<td>

				<p>Đầm trắng 1</p>
				<p>THÀNH GIÁ: 196.000 đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(26)">ĐẶT HÀNG</button>
			</td>

			<td>

				<p>Đầm trắng 2</p>
				<p>THÀNH GIÁ: 400.000 đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(27)">ĐẶT HÀNG</button>
			</td>

			<td>

				<p>Atticus Blue Stripe</p>
				<p>THÀNH GIÁ: 423.000 đ</p>
				<button class="btn-custom" onclick="redirectToDetailPage(28)">ĐẶT HÀNG</button>
			</td>
		</tr>

	</table>



	<br /><br /><br />

	<!--footer----------------------------------------------------------->
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

</html>