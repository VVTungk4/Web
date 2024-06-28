<!doctype html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANG CHỦ</title>
    <link rel="icon" type="image/png" href="image/logo.ico" />
    <a href="https://hocban.vn/web-development/hoc-html-co-ban"></a>
    <link rel="stylesheet" href="./themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="style-css.css" />
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
                    <li><a href="../SonicShop/sanpham/AoNu .php">TRANG PHỤC NỮ-ÁO</a></li>
                    <li><a href="../SonicShop/sanpham/DamNu.php">TRANG PHỤC NỮ-ĐẦM
                        </a></li>

                </ul>
            </div>
            <div style="height: 50px;"><a href="sanpham/Sản-phẩm.php" style="text-decoration:none; color:#000;">
                    <p>SẢN PHẨM </p>
            </div>
            <div><a href="index.php" style="text-decoration:none; color:#000;">
                    <p>TRANG CHỦ</p>
                </a></div>
            <div><a href="../SonicShop/sanpham/Giới-Thiệu.php" style="text-decoration:none; color:#000;">
                    <p>GIỚI THIỆU</p>
                </a></div>
            <div><a href="../SonicShop/Cart/cart.php" style="text-decoration:none; color:#000;">
                    <p>GIỎ HÀNG</p>
                </a></div>
            <div id="TaiKhoan">
                <p style="margin-bottom: 0;">TÀI KHOẢN</p>
                <ul class="MeNu">
                    <li><a href="../SonicShop/Login/Login.php">Đăng Nhập</a></li>
                    <li><a href="../SonicShop/Login/email_dangki.php">Đăng Ký</a></li>
                    <li><a href="../SonicShop/QLTK/QLTK.php">QL Tài Khoản</a></li>
                    <li><a href="../SonicShop/QLTK/myOder.php">Đơn hàng của tôi</a></li>
                    <li><a href="../SonicShop/Login/logout.php">Đăng xuất</a></li>

                </ul>
            </div>
        </div>
    </div>

    <div id="logo">
        <form method="post" action="../SonicShop/demoSearch/view_search.php" class="form">
            <img src="Login/images/logo1.png" style="height: 90px; width: 110px;">
            <p><input type="text" placeholder=" Tìm kiếm sản phẩm " name="tt_timkiem"></p>
            <button type="submit" class="btn btn-primary" data-mdb-ripple-init style="margin-top: 22px;" name="timkiem" id="search">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <center style="margin: 10px;">
        <div id="banner-1" class="banner">
            <img src="image/chuyen5.jpg" class="active">
            <img src="image/chuyen1.png" class="inactive">
            <img src="image/chuyen2.jpeg" class="inactive">
            <img src="image/chuyen3.jpeg" class="inactive">
            <img src="image/chuyen4.png" class="inactive">

        </div>
        <script src="slide.js"></script>
        </div>
    </center>

    <div class="container" style="background-color: antiquewhite; height: 550px; width: 1080px; margin-top: 20px;">
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
                        <h6 class="card-title" style="font-weight: bold;">Set Váy lụa màu bơ kiểu Pháp</h6>
                        <button type="button" class="btn btn-primary" style="padding: 4px 60px 3px 70px" onclick="redirectToDetailPage(3)">Mua Ngay</button>
                    </div>

                </div>
            </div>


            <div class="col">
                <div class="card" style="width: 240px;">

                    <img src="image/4.jpg" alt="" class="card-img-top" style="width: 220px" height="260px">
                    <div class="card-body">
                        <h6 class="card-title" style="font-weight: bold;">Đầm cam SAUVAGE <br>&nbsp</h6>
                        <button type="button" class="btn btn-primary" style="padding: 4px 60px 3px 70px" onclick="redirectToDetailPage(4)">Mua Ngay</button>
                    </div>

                </div>
            </div>
            <script>
                function redirectToDetailPage(id) {
                    // Chuyển hướng sang trang chi tiết sản phẩm với ID sản phẩm
                    window.location.href = 'web/product_detail.php?id=' + id;
                }
            </script>
        </div>

    </div>
    <?php
    // Kết nối database và lấy dữ liệu
    $conn = new mysqli('localhost', 'root', '', 'webhangban');
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Xác định số lượng sản phẩm trên mỗi trang
    $productsPerPage = 16;

    // Lấy số trang hiện tại từ URL hoặc mặc định là 1 nếu không có
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Tính số sản phẩm bỏ qua dựa trên trang hiện tại
    $offset = ($page - 1) * $productsPerPage;

    // Lấy tổng số sản phẩm
    $result = $conn->query("SELECT COUNT(*) AS total FROM product");
    $row = $result->fetch_assoc();
    $totalProducts = $row['total'];

    // Tính tổng số trang
    $totalPages = ceil(($totalProducts / $productsPerPage) - 1);

    // Lấy sản phẩm cho trang hiện tại
    $stmt = $conn->prepare("SELECT * FROM product LIMIT ? OFFSET ?");
    $stmt->bind_param("ss", $productsPerPage, $offset);
    $stmt->execute();
    $result = $stmt->get_result();
    ?>
    <style>
        .dsTrang {
            text-align: center;
            margin: auto;
            width: auto;
            color: black;
        }

        .dsTrang a {
            display: inline-block;
            margin-right: 5px;
            padding: 5px 10px;
            border: 2px solid #ddd;
        }

        .dsTrang a:hover,
        .dsTrang a.active {
            background: #f0cfcf;
            background: -webkit-linear-gradient(bottom, #f0cfcf, #ffacc7);
            background: -o-linear-gradient(bottom, #f0cfcf, #ffacc7);
            background: -moz-linear-gradient(bottom, #f0cfcf, #ffacc7);
            background: linear-gradient(bottom, #f0cfcf, #ffacc7);

        }


        .dsTrang a {
            display: inline-block;
            margin-right: 5px;
            padding: 5px 10px;
            border: 1px solid #ddd;
            color: black;
            text-align: center;
        }

        .dsTrang a:hover {
            background: #f0cfcf;
            background: -webkit-linear-gradient(bottom, #f0cfcf, #ffacc7);
            background: -o-linear-gradient(bottom, #f0cfcf, #ffacc7);
            background: -moz-linear-gradient(bottom, #f0cfcf, #ffacc7);
            background: linear-gradient(bottom, #f0cfcf, #ffacc7);

        }

        table {
            width: auto;
            margin-bottom: 20px;

        }

        td {

            padding: 20px;
            text-align: center;
            height: 500px;
            width: 400px;
        }

        .thumbnail img {
            height: 300px;
            width: 250px;
            transition-duration: 0.3s;
        }

        .thumbnail img:hover {
            transform: scale(1.1);
        }

        .discout {
            position: relative;
            display: inline-block;
        }

        .discount-tag {
            position: absolute;
            top: 50px;
            /* Điều chỉnh theo cần thiết */
            right: 30px;
            /* Điều chỉnh theo cần thiết */
            background-color: #FF3366;
            color: white;
            padding: 5px;
            font-size: 13px;
            /* Điều chỉnh theo cần thiết */
        }
    </style>
    <table style="margin: 50px;width: auto;" class="thumbnail">
        <?php if ($result->num_rows > 0) : ?>
            <tr>
                <?php
                $count = 0; // Khởi tạo biến đếm
                while ($row = $result->fetch_assoc()) :
                    $count++; // Tăng biến đếm với mỗi sản phẩm
                ?>
                    <td>
                        <div class="discout">
                            <img src="<?php echo $row['thumbnail'] ?>" alt="Ảnh váy" style="width:250px; height: 300px;border: 2px solid pink;">
                            <div class="discount-tag"> OFF <?php echo $row['discount'] ?> %</div>
                        </div>
                        <p>
                            <?php echo $row["title"]; ?>
                        </p>
                        <p>Giá:
                            <?php echo $row["price"]; ?> VNĐ
                        </p>
                        <button type="submit" class="btn-custom" onclick="redirectToDetailPage(<?php echo $row['id'] ?>)">Mua Ngay</button>
                    </td>
                <?php
                    if ($count % 4 == 0) : // Nếu đếm đến 4 sản phẩm
                        echo '</tr><tr>'; // Kết thúc hàng hiện tại và bắt đầu hàng mới
                    endif;
                endwhile;
                ?>
            </tr>
            <script>
                function redirectToDetailPage(id) {
                    // Chuyển hướng sang trang chi tiết sản phẩm với ID sản phẩm
                    window.location.href = '../sonicshop/web/product_detail.php?id=' + id;
                }
            </script>
        <?php endif; ?>
    </table>
    <div style="margin:auto; text-align:center">
        <p> Có <?php echo $totalProducts ?> sản phẩm</p>
    </div>
    <!-- Hiển thị liên kết đến các trang -->
    <div class="dsTrang">
        <div>
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <a href="?page=<?php echo $i; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>
            <a <?php if ($page == $i) echo 'active'; ?> href="?page=<?php echo $i; ?>">
                <?php echo $i; ?>
            </a>
        </div>

    </div>

    <div class="tintuc">
        <h2>TIN TỨC</h2>
        <div class="news">
            <div class="news1">
                <img src="image/news1.jpg" alt="">
                <a href="https://thoitrang4.giaodienwebmau.com/4-kieu-vay-dam-di-dam-cuoi-xinh-lung-linh-cho-phai-dep.php">
                    <p>4 Kiểu váy đầm đi đám cưới xinh lung linh cho phái đẹp</p>
                </a>
                <div class="line"></div>
                <div class="des">
                    <p>Khi nhận được lời mời dự tiệc cưới, bên cạnh việc bạn phải dành nhiều thời gian cho khâu trang
                        điểm, làm tóc thì khâu chọn trang phục cũng rất quan...</p>
                </div>
            </div>
            <div class="news1">
                <img src="image/news2.jpg" alt="">
                <a href="https://thoitrang4.giaodienwebmau.com/4-kieu-vay-dam-di-dam-cuoi-xinh-lung-linh-cho-phai-dep.php">
                    <p>5 công thức phối “áo sơ mi + chân váy” xinh cho nàng</p>
                </a>
                <div class="line"></div>
                <div class="des">
                    <p>Có thể nói, áo sơ mi và chân váy là 2 item quen thuộc mà có lẽ không có cô nàng công sở nào có
                        thể thiếu trong tủ đồ đi làm của mình, thế nhưng việc kết hợp hai món đồ này sao cho...</p>
                </div>
            </div>
            <div class="news1">
                <img src="image/chuyen5.jpg" alt="">
                <a href="https://thoitrang4.giaodienwebmau.com/bst-christmas-colors-bua-tiec-da-sac-mau-cho-mua-le-hoi.php">
                    <p>Christmas Colors – Bữa tiệc đa sắc màu cho mùa lễ hội</p>
                </a>
                <div class="line"></div>
                <div class="des">
                    <p>Mùa đông luôn là quãng thời gian thật kỳ diệu, khi mà đi cùng cái lạnh se người, tiết trời ảm đạm
                        lại là những cảm xúc ấm áp, tưng bừng và rực rỡ của mùa lễ hội. Thế nên...</p>
                </div>
            </div>
        </div>
    </div>


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