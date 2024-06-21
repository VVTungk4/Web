<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>
    <link rel="stylesheet" href="style-css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
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
		<div id="header">
			<div id="khungdau">
				<div style="margin-left: 100px; width: 250px;" class="DanhMuc">
				<p><i class="DanhMuc ti-menu-alt"></i>DANH SÁCH</p>
					<ul class="MeNu">
						<li><a href="Áo-Nữ.html">TRANG PHỤC NỮ-ÁO</a></li>
						<li><a href="Đầm-Nữ.html">TRANG PHỤC NỮ-VÁY</a></li>
						
				  </ul>
				</div>
				<div><a href="Sản-phẩm.html" style="text-decoration:none; color:#000;"><p>SẢN PHẨM </p></div>
				<div><a href="../index.html" style="text-decoration:none; color:#000;"><p>TRANG CHỦ</p></a></div>
				<div><a href="Giới-Thiệu.html" style="text-decoration:none; color:#000;"><p>GIỚI THIỆU</p></a></div>
				<div><a href="../Cart/cart.html" style="text-decoration:none; color:#000;"><p>GIỎ HÀNG</p></a></div>
				<div id="TaiKhoan"><p>TÀI KHOẢN</p>
					<ul class="MeNu">
						<li><a href="../Login/Login.html">Đăng Nhập</a></li>
						<li><a href="../Login/register.html">Đăng Ký</a></li>
					</ul>
				</div>
			</div>
    </div>
	
</div>
<div class="header-with-search">
		<div class="header__logo">
		  <img class="header__logo-img" src="image/logo.png"  />
		</div>
		<div class="header__search">
		  <div class="header__search-input-wrap">
          <form method="POST" action="view_sanpham.php">
				<input  type="text"  name="noidung"  class="header__search-input" placeholder="Tìm kiếm sản phẩm"/>
                <button name="btn" class="header__search-btn">
              <link
                href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
                rel="stylesheet"
              />
              <i class="header__search-btn-icon bx bx-search-alt-2 bx-tada"></i>
            </button>
			</form>
			<div class="header__search-history">
			  <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
			  <ul class="header__search-history-list">
				<li class="header__search-history-item">
				  <a href="">đầm trắng</a>
				</li>
				<li class="header__search-history-item">
				  <a href="">đầm xanh</a>
				</li>
				<li class="header__search-history-item">
				  <a href="">đầm vàng</a>
				</li>
			  </ul>
			</div>
		</div>
        
    </div>		
    </div>
<?php       
include "connect.php";

if (isset($_POST['btn'])) {
    $noidung = $_POST['noidung'];
    $stmt = $conn->prepare("SELECT * FROM sanpham WHERE tensanpham LIKE ?");
    $like_noidung = "%".$noidung."%";
    $stmt->bind_param("s", $like_noidung);
    $stmt->execute();
    $result = $stmt->get_result();
?>
  <table>
    <?php if ($result->num_rows > 0): ?>
        <tr>
        <?php 
        $counter = 0; // Khởi tạo biến đếm
        while($row = $result->fetch_assoc()): 
            $counter++; // Tăng biến đếm với mỗi sản phẩm
        ?>
            <td>
                <img src="image/<?php echo $row['anh'] ?>" alt="">
                <p><?php echo $row["tensanpham"]; ?></p> 
                <p><?php echo $row["giá"]; ?></p>
                <p><button>ĐẶT HÀNG</button></p>
            </td>
            <?php 
            if ($counter % 4 == 0): // Nếu đếm đến 4 sản phẩm
                echo '</tr><tr>'; // Kết thúc hàng hiện tại và bắt đầu hàng mới
            endif;
        endwhile; 
        ?>
        </tr>
    <?php else: ?>
        
            <div class="no-products">Không tìm thấy sản phẩm</div>
        
    <?php endif; ?>
</table>


<?php
}
?>
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
                <!--Kết Thúc Nội Dung Liên Hệ-->
                <!-- Grid container -->
                <!-- Right -->
                <!-- Copyright -->
            </div>
        </footer>


</body>
</html>

