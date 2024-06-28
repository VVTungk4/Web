<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phâm</title>
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
                    <li><a href="../sanpham/DamNu.php">TRANG PHỤC NỮ-ĐẦM
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
        <form method="post" action="../demoSearch/view_search.php" class="form">
            <p><input type="text" placeholder=" Tìm kiếm sản phẩm " name="tt_timkiem"></p>
            <button type="submit" class="btn btn-primary" data-mdb-ripple-init style="margin-top: 22px;height: 45px; width: 60px; " name="timkiem" id="search">
                <i class="fas fa-search"></i>
            </button>
        </form>
        </form>
    </div>

    <div class="thongbaotimkiem">
        <?php
        $search = $_POST['tt_timkiem'];
        ?>
        <p>Kết quả tìm kiếm cho: <b> <?php echo $search ?></b> </p>

    </div>
    <?php
    // Kết nối database và lấy dữ liệu
    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli('localhost', 'root', '', 'webhangban');
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }


    if (isset($_POST['timkiem'])) { //neu ton tai $_post['search']

        $error = array();

        $search = $_POST['tt_timkiem'];

        //----------------------------
        if (isset($search)) {
            $stmt = $conn->prepare("SELECT * FROM product WHERE title LIKE ?");
            $search = "%" . $search . "%";
            $stmt->bind_param("s", $search);
            $stmt->execute();
            $result = $stmt->get_result();
    ?>
            <table style="margin: 50px; border: 2px solid pink; width: auto;">
                <?php if ($result->num_rows > 0) : ?>
                    <tr>
                        <?php
                        $count = 0; // Khởi tạo biến đếm
                        while ($row = $result->fetch_assoc()) :
                            $count++; // Tăng biến đếm với mỗi sản phẩm
                        ?>
                            <td>
                                <div class="discout">
                                    <img src="../<?php echo $row['thumbnail'] ?>" alt="Ảnh váy" style="width:250px; height: 300px;border: 2px solid pink;">
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
                            window.location.href = '../web/product_detail.php?id=' + id;
                        }
                    </script>
                <?php else : ?>

                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Your image goes here -->
                                <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/search/a60759ad1dabe909c46a.png" class="img-fluid" alt="Responsive image" style="width: 240px;margin-left: 200px;">
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

                <?php endif; ?>
            </table>




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
    /* CSS tổng hợp cho header, footer và chi tiết sản phẩm */
    @font-face {
        font-family: quicksand;
        src: url('../font-awesome/fonts/quicksand/Quicksand-Regular.ttf');
    }

    * {
        font-family: quicksand;
    }

    .mota {
        border: 2px solid pink;
        padding: 10px;
        margin-top: 10px;
        margin-bottom: 10px;
        margin-left: 30px;
        margin-right: 30px;
    }

    #description {
        padding-top: 5px;
        text-align: justify;
        font-style: italic;
        padding-left: 20px;
        padding-right: 20px;
    }

    #motasp {
        padding-top: 10px;
        padding-left: 20px;
        font-weight: 600;
        font-style: oblique;

    }

    .btn-custom {
        color: #2f2626;
        cursor: pointer;
        padding: 8px 10px;
        border-radius: 10px;
        border: 2px solid pink;
        font-weight: normal;
        transition: font-weight 0.2s ease;
        background: whitesmoke;
        margin: 10px;


    }

    .btn-custom:hover {
        font-weight: 500;
        background: -webkit-linear-gradient(bottom, #f0cfcf, #ffacc7);
        background: -o-linear-gradient(bottom, #f0cfcf, #ffacc7);
        background: -moz-linear-gradient(bottom, #f0cfcf, #ffacc7);
        background: linear-gradient(bottom, #f0cfcf, #ffacc7);
    }

    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        line-height: 1.6;
    }

    body {
        background-color: #f8f9fa;
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
        right: 20px;
        z-index: 1;
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
        font-weight: bold;

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


    img {
        height: 300px;
        /* Increase the height */
        width: 250px;
        /* Increase the width */
        margin: 30px 30px;
        border: white 2px solid;
        text-align: center;
        margin-top: 20px;
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

    /* discount */
    .discout {
        position: relative;
        display: inline-block;
    }

    .discount-tag {
        position: absolute;
        top: 50px;
        /* Điều chỉnh theo cần thiết */
        right: 50px;
        /* Điều chỉnh theo cần thiết */
        background-color: #FF3366;
        color: white;
        padding: 5px;
        font-size: 13px;
        /* Điều chỉnh theo cần thiết */
    }

    /* CSS cho chi tiết sản phẩm */
    .container-fluid {
        padding: 20px;
        margin-top: 5px;

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
        margin: 5px;
        border: 2px solid pink;

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

    .ttsp {
        text-align: center;
        background-color: #ffffff;
        width: 400px;
        height: 50px;
        line-height: 50px;
        font-size: 30px;
        font-weight: bold;
        margin-top: 25px;
        margin-left: 550px;
        border-radius: 30px;
    }

    .card img {
        margin: 20px auto;
        height: 300px;
        padding-top: 20px;
        width: 260px;

    }

    .emty {
        width: 1200px;
        height: 600px;
        margin: auto;
        background-color: antiquewhite;
        margin-bottom: 20px;
    }

    .card {
        height: 500px;
    }

    .sptb {
        margin: 20px;
        padding-top: 5px;
    }

    .tbao {
        width: auto;
        height: 200px;
        justify-content: 200px;
        text-align: center;
        margin-bottom: 10px;
    }

    img {
        height: 300px;
        width: 250px;
        float: left;
        margin: 50px 50px;
        text-align: center;
        margin-top: 50px;

    }

    tr {
        width: 1200px;
        height: 500px;
        text-align: center;
    }

    td {
        width: 300px;
        height: 500px;

    }

    .thongbaotimkiem p {

        font-size: 30px;
        margin: auto;
        text-align: center;
        margin-top: 20px;
    }
</style>

</html>
<?php
        }
    }
