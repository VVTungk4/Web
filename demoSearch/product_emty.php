<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phâm</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="../sanpham/image/sp.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
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
                <p style="margin-bottom: 0;"><i class="bi bi-list-task"></i>&nbsp;DANH SÁCH</p>
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
    <!-------------------------------------------------->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <!-- Your image goes here -->
                <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/search/a60759ad1dabe909c46a.png"
                    class="img-fluid" alt="Responsive image" style="width: 240px;margin-left: 200px;">
            </div>
            <div class="col-md-6" style="margin-top: 120px; font-size: 20px;">
                <!-- Other content or text can go here -->
                <p>Không tìm thấy kết quả nào</p>
                <p>Hãy thử sử dụng các từ khóa cụ thể hơn</p>
            </div>
        </div>
    </div>
    <!-------------------------------------------------->
    <div class="emty">
        <div class="sptb">
            <h5 style=" margin-top: 10px; margin-bottom:20px;">CÓ THỂ BẠN CŨNG THÍCH</h5>
            <div class="row">
                <div class="col">
                    <div class="card" style="width: 240px;">
                        <img src="image/8.jpg" alt="" class="card-img-top" style="width: 220px" height="260px">
                        <div class="card-body">
                            <h6 class="card-title" style="font-weight: bold;">Váy đầm voan Midi màu hồng</h6>

                            <button type="button" class="btn btn-primary" style="padding: 4px 60px 3px 70px"
                                onclick="redirectToDetailPage(1)">Mua Ngay</button>
                        </div>
                    </div>
                </div>


                <div class="col">
                    <div class="card" style="width: 240px;">

                        <img src="image/9.jpg" alt="" class="card-img-top" style="width: 220px" height="260px">
                        <div class="card-body">
                            <h6 class="card-title" style="font-weight: bold;">Black Leopard Midi Silk woman</h6>

                            <button type="button" class="btn btn-primary" style="padding: 4px 60px 3px 70px"
                                onclick="redirectToDetailPage(2)">Mua Ngay</button>
                        </div>

                    </div>
                </div>

                <div class="col">
                    <div class="card" style="width: 240px;">

                        <img src="image/10.jpg" alt="" class="card-img-top" style="width: 220px" height="260px">
                        <div class="card-body">
                            <h6 class="card-title" style="font-weight: bold;">Set Váy lụa màu bơ kiểu Pháp</h6>
                            <button type="button" class="btn btn-primary" style="padding: 4px 60px 3px 70px"
                                onclick="redirectToDetailPage(3)">Mua Ngay</button>
                        </div>

                    </div>
                </div>


                <div class="col">
                    <div class="card" style="width: 240px;">

                        <img src="image/4.jpg" alt="" class="card-img-top" style="width: 220px" height="260px">
                        <div class="card-body">
                            <h6 class="card-title" style="font-weight: bold;">Đầm cam SAUVAGE <br>&nbsp</h6>
                            <button type="button" class="btn btn-primary" style="padding: 4px 60px 3px 70px"
                                onclick="redirectToDetailPage(4)">Mua Ngay</button>
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
        <script>
            function redirectToDetailPage(productId) {
                // Chuyển hướng sang trang chi tiết sản phẩm với ID sản phẩm
                window.location.href = '../web/product_detail.php?id=' + productId;
            }
        </script>
    </div>

    <!---------------------------------------------------->

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
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4"
                        style="text-align: justify; font-weight: bold;">
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
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #3b5998;"
                        href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #55acee;"
                        href="#!" role="button"><i class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #dd4b39;"
                        href="#!" role="button"><i class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #ac2bac;"
                        href="#!" role="button"><i class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #0082ca;"
                        href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                    <!-- Github -->
                    <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #333333;"
                        href="#!" role="button"><i class="fab fa-github"></i></a>
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