<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "../php/database_function.php";
$conn = connectDatabase();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/39b6b90061.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="checkout.css?v=<?php echo time(); ?>">
    <title>Thanh toán</title>
    <link rel="icon" type="image/x-icon" href="./img/footerLogo.webp">
    <script src="./javascript/showCheckOutMethods.js?v=<?php echo time(); ?>" defer></script>
    <script src="./javascript/orderinfo.js?v=<?php echo time(); ?>" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <!-- header -->
    <div id="header" style="font-weight: bold;">
        <div id="khungdau">
            <div style="width: 250px;" id="TaiKhoan">
                <p style="margin-bottom: 0;"><i class="bi bi-list-task"></i>&nbsp; DANH MỤC</p>
                <ul class="MeNu">
                    <li><a href="../sanpham/Áo-Nữ.php ">Sản phẩm Nữ: Áo</a></li>
                    <li><a href="../sanpham/Đầm-Nữ.php ">Sản phẩm Nữ: Đầm</a></li>
                </ul>
            </div>
            <div><a href="../sanpham/Sản-Phẩm.php" style="text-decoration:none; color:#000;">
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
        <img src="../image/logo1.png" style="height: 90px; width: 110px;">
        <label for="TaiKhoan" class="ttcn">Thanh Toán</label>
    </div>


    <!--------------------------------------------CHECKOUT-CONTENT----------------------------------------------------->
    <div class="checkout-wrap">
        <div class="checkout-main">
            <div class="main-header">
                <a href class="logo">
                    <h1 class="logo-text">Sonic shop</h1>
                </a>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="./cart.php">Giỏ hàng</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="./orderInfo.php">Thông tin giao hàng</a>
                    </li>
                    <li class="breadcrumb-item">
                        Phương thức thanh toán
                    </li>
                </ul>
            </div>
            <div class="main-content">
                <div class="step">
                    <div class="step-actions" step="2">
                        <div id="section-shipping-rate" class="section">
                            <div class="section-header">
                                <h2 class="section-title">Phương thức vận
                                    chuyển</h2>
                            </div>
                            <div class="section-content">
                                <div class="content-box">
                                    <div class="content-box-row">
                                        <div class="radio-wrapper">
                                            <label for>
                                                <div class="radio-input">
                                                    <input class="input-radio" type="radio" checked>
                                                </div>
                                                <span class="radio-label-primary">
                                                    Để phí vận chuyển được
                                                    chính xác nhất, tụi mình
                                                    sẽ liên hệ báo phí vận
                                                    chuyển sau khi xác nhận
                                                    đơn hàng ạ
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="section-payment-method" class="section">
                            <div class="section-header">
                                <h2 class="section-title">Phương thức thanh
                                    toán</h2>
                            </div>
                            <div class="section-content">
                                <div class="content-box">
                                    <div class="radio-wrapper content-box-row">
                                        <label for class="two-page">
                                            <div class="radio-input payment-method-checkbox">
                                                <input name="checkoutMethod" type="radio" class="input-radio" value="online" checked>
                                            </div>
                                            <div class="radio-content-input">
                                                <img src="../themify-icons/SVG/other.svg" alt class="main-img">
                                                <div class="content-wrapper">
                                                    <span class="radio-label-primary">Chuyển
                                                        khoản qua ngân
                                                        hàng</span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="radio-wrapper content-box-row content-box-row-secondary">
                                        <div class="blank-slate">STK của tụi
                                            mình:

                                            STK sehai262
                                            Nguyễn Ngọc Sơn
                                            Ngân hàng Tiên Phong
                                            NOTE: Phần nội dung bạn ghi tên
                                            đặt hàng của bạn để tụi mình dễ
                                            check nha. Bạn kiểm tra hàng
                                            trước khi nhận giúp tụi mình với
                                            nhé. Cảm ơn bạn ạ ❤️</div>
                                    </div>
                                    <div class="radio-wrapper content-box-row">
                                        <label for class="two-page">
                                            <div class="radio-input payment-method-checkbox">
                                                <input name="checkoutMethod" type="radio" class="input-radio" value="cod">
                                            </div>
                                            <div class="radio-content-input">
                                                <img src="../themify-icons/SVG/cod.svg" alt class="main-img">
                                                <div class="content-wrapper">
                                                    <span class="radio-label-primary">Thanh
                                                        toán khi giao hàng
                                                        (COD)</span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="radio-wrapper content-box-row content-box-row-secondary" style="display: none;">
                                        <div class="blank-slate">
                                            Tụi mình nhận ship cod với đơn
                                            hàng dưới 1tr và không có sản
                                            phẩm dễ vỡ.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="step-footer" id="step-footer-checkout">
                        <form id="checkout_complete" action="../php/complete_checkout.php" method="POST">
                            <button type="submit" class="step-footer-continue-btn btn">
                                <span class="btn-content">Hoàn tất đơn
                                    hàng</span>
                            </button>
                        </form>
                        <a href class="step-footer-previous-link">Thông tin
                            đặt hàng</a>
                    </div>
                </div>
            </div>
            <div class="main-footer footer-powered-by">
            </div>
        </div>
        <div class="checkout-sidebar">
            <?php
            require_once './template/sidebar-content.php';
            ?>
        </div>

    </div>
    <!-- footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted" style=" background: #ffdce3;
		padding: 10px;margin-top: 150px;
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
    <!-------------------STYLES---------------------->
    <style>
        .ttcn {
            text-align: center;
            background-color: #ffffff;
            width: 400px;
            height: 50px;
            line-height: 50px;
            font-size: 30px;
            font-weight: bold;
            margin-top: 25px;
            margin-left: 500px;
            border-radius: 30px;
        }

        @font-face {
            font-family: quicksand;
            src: url('font/quicksand/Quicksand-Regular.ttf');
        }

        * {
            padding: 0;
            box-sizing: border-box;
            font-family: quicksand;
        }

        #logo {
            height: 100px;
            margin-top: 50px;
            background: #f0cfcf;
            background: -webkit-linear-gradient(bottom, #f0cfcf, #ffacc7);
            background: -o-linear-gradient(bottom, #f0cfcf, #ffacc7);
            background: -moz-linear-gradient(bottom, #f0cfcf, #ffacc7);
            background: linear-gradient(bottom, #f0cfcf, #ffacc7);
        }

        #logo img {
            margin: 5px 5px 5px 0;
            height: 90px;
            float: right;
            position: absolute;
            right: 0;
        }

        #logo p {
            float: left;
            line-height: 88px;
            padding-left: 200px;
        }

        #logo p input {
            height: 50px;
            width: 350px;
        }

        #logo div {
            height: 49px;
            width: 53px;
            float: left;
            font-size: 20px;
            margin-top: 20px;
            background-color: darkgray;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            text-align: center;
            font-size: 20px;
            color: white;
            line-height: 50px;
        }

        #header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 50px;
            background-color: #FFDCE3;
            z-index: 3;
            display: flex;
            justify-content: center;

        }

        #khungdau div {
            float: left;
            line-height: 50px;
            width: 160px;
            text-align: center;
            height: 50px;
        }

        #khungdau div:hover {
            background: #f0cfcf;
            background: -webkit-linear-gradient(bottom, #f0cfcf, #ffacc7);
            background: -o-linear-gradient(bottom, #f0cfcf, #ffacc7);
            background: -moz-linear-gradient(bottom, #f0cfcf, #ffacc7);
            background: linear-gradient(bottom, #f0cfcf, #ffacc7);
            cursor: pointer;
            display: inline;
        }

        .MeNu {
            height: auto;
            background: #f0cfcf;
            background: -webkit-linear-gradient(bottom right, #e6d4ec, #ffacc7);
            background: -o-linear-gradient(bottom right, #e6d4ec, #ffacc7);
            background: -moz-linear-gradient(bottom right, #e6d4ec, #ffacc7);
            background: linear-gradient(bottom right, #e6d4ec, #ffacc7);
            padding-left: 10px;
            padding-right: 10px;
        }

        .MeNu ul {
            margin-top: 0;
        }

        .MeNu li {
            width: 100%;
        }

        #khungdau ul li {
            height: 45px;
            display: none;
            float: none;
            clear: both;
            text-decoration: none;
            text-align: left;
            padding-left: 20px;
            line-height: 40px;
            box-shadow: black;

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
            background: white;
            margin-bottom: 5px;

        }

        #TaiKhoan:hover ul li {
            display: block;
        }

        #TaiKhoan ul li:hover {
            background: rgb(255, 254, 254);
            margin-left: 5px;
            font-weight: bold;

        }

        #TaiKhoan ul {
            background: #f0cfcf;
            background: -webkit-linear-gradient(bottom right, #e6d4ec, #ffacc7);
            background: -o-linear-gradient(bottom right, #e6d4ec, #ffacc7);
            background: -moz-linear-gradient(bottom right, #e6d4ec, #ffacc7);
            background: linear-gradient(bottom right, #e6d4ec, #ffacc7);
            margin-left: 0;
            margin-top: 0;
        }
    </style>
</body>

</html>