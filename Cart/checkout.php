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
    <link rel="stylesheet" href="checkout.css?v=<?php echo time();?>">
    <title>Thanh toán</title>
    <link rel="icon" type="image/x-icon" href="./img/footerLogo.webp">
    <script src="./javascript/showCheckOutMethods.js?v=<?php echo time();?>" defer></script>
    <script src="./javascript/orderinfo.js?v=<?php echo time();?>" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <!-- header -->
    <div id="header">
        <div id="khungdau">
            <div style="margin-left: 100px; width: 250px;" class="DanhMuc">
                <p><i class="DanhMuc ti-menu-alt"></i>DANH SÁCH</p>
                <ul class="MeNu">
                    <li><a href="web/Áo-Nữ.html">TRANG PHỤC NỮ-ÁO</a></li>
                    <li><a href="web/Đầm-Nữ.html">TRANG PHỤC NỮ-VÁY</a></li>

                </ul>
            </div>
            <div><a href="web/Sản-phẩm.html" style="text-decoration:none; color:#000;">
                    <p>SẢN PHẨM </p>
            </div>
            <div><a href="index.html" style="text-decoration:none; color:#000;">
                    <p>TRANG CHỦ</p>
                </a></div>
            <div><a href="web/Giới-Thiệu.html" style="text-decoration:none; color:#000;">
                    <p>GIỚI THIỆU</p>
                </a></div>
            <div><a href="https://sixdo.vn/san-pham" style="text-decoration:none; color:#000;">
                    <p>CỬA HÀNG</p>
                </a></div>
            <div id="TaiKhoan">
                <p>TÀI KHOẢN</p>
                <ul class="MeNu">
                    <li><a href="web/Đăng-Nhập.html">Đăng Nhập</a></li>
                    <li><a href="web/Đăng-ký.html">Đăng Ký</a></li>
                </ul>
            </div>
        </div>
    </div>



    <div id="logo">
        <img src="image/logo.png">
        <p><input type="text" placeholder=" Tìm kiếm sản phẩm "></p>
        <div class="ti-arrow-right">
        </div>

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
    <footer>
        <div class="container">
            <!--Bắt Đầu Nội Dung Giới Thiệu-->
            <div class="noi-dung about">
                <h2>Về Chúng Tôi</h2>
                <p>Website này được thiết kế và vận hành bởi nhóm admin: </br>
                    1. Mai Đình Dũng</br>
                    2. Dương Đức Khôi</br>
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
            <!--Kết Thúc Nội Dung Giới Thiệu-->
            <!--Bắt Đầu Nội Dung Đường Dẫn-->
            <div class="noi-dung links">
                <h2>Đường Dẫn</h2>
                <ul>
                    <li><a href="#">Trang Chủ</a></li>
                    <li><a href="./Giới-Thiệu.html">Về Chúng Tôi</a></li>
                    <li><a href="./Đăng-Nhập.html">Tài khoản</a></li>
                    <li><a href="./Sản-phẩm.html">Sản phẩm</a></li>
                    <li><a href="./Đầm-Nữ.html">Cửa hàng</a></li>
                </ul>
            </div>
            <!--Kết Thúc Nội Dung Đường Dẫn-->
            <!--Bắt Đâu Nội Dung Liên Hệ-->
            <div class="noi-dung contact">
                <h2>Thông Tin Liên Hệ</h2>
                <ul class="info">
                    <li>
                        <span><i class="fa fa-map-marker"></i></span>
                        <span>52 Triều Khúc<br />
                            Quận Thanh Xuân, TP Hà Nội<br />
                            Việt Nam</span>
                    </li>
                    <li>
                        <span><i class="fa fa-phone"></i></span>
                        <p><a href="">0373999999</a>
                            <br />
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
            <!--Kết Thúc Nội Dung Liên Hệ-->
        </div>
    </footer>
</body>

</html>