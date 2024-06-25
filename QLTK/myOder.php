<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng của tôi</title>
    <link rel="icon" type="image/png" href="images/icon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">


</head>

<body>
    <?php session_start(); // Bắt đầu phiên làm việc 
    ?>
    <div id="header" style="font-weight: bold;">
        <div id="khungdau">
            <div style="width: 250px;" id="TaiKhoan">
                <p style="margin-bottom: 0;"><i class="bi bi-list-task"></i>&nbsp; DANH MỤC</p>
                <ul class="MeNu">
                    <li style="font-weight: normal;"><a href="../web/Áo-Nữ.html ">Sản phẩm Nữ: Áo</a></li>
                    <li style="font-weight: normal;"><a href="../web/Đầm-Nữ.html ">Sản phẩm Nữ: Đầm</a></li>
                </ul>
            </div>
            <div><a href="../web/product.html" style="text-decoration:none; color:#000;">
                    <p>SẢN PHẨM </p>
            </div>
            <div><a href="../index.php" style="text-decoration:none; color:#000;">
                    <p>TRANG CHỦ</p>
                </a></div>
            <div><a href="../web/Giới-Thiệu.html" style="text-decoration:none; color:#000;">
                    <p>GIỚI THIỆU</p>
                </a></div>
            <div><a href="../Cart/cart.html" style="text-decoration:none; color:#000;">
                    <p>GIỎ HÀNG</p>
                </a></div>
            <div id="TaiKhoan">
                <p style="margin-bottom: 0;">TÀI KHOẢN</p>
                <ul class="MeNu">
                    <li style="font-weight: normal;"><a href="../Login/email_dangki.php">Tài khoản mới</a></li>
                    <li style="font-weight: normal;"><a href="../Login/logout.php">Đăng xuất</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div id="logo">
        <img src="images/logo1.png" style="height: 90px; width: 110px;">

        <label for="TaiKhoan" class="ttcn">THÔNG TIN ĐƠN HÀNG</label>
    </div>
    <div class="container">
        <div class="myInfo">
            <label for="fullname">Khách hàng:</label>
            <input type="text" id="fullname" name="fullname">
            <br>
            <label for="fullname">Số điện thoại:</label>
            <input type="text" id="phone" name="phone">
            <br>
            <label for="fullname">Địa chỉ:</label>
            <input type="text" id="address" name="address">
        </div>
        <?php if (isset($_SESSION['user_info'])) : ?>
            <script type="text/javascript">
                document.getElementById('fullname').value = "<?php echo addslashes($_SESSION['user_info']['fullname']); ?>";
                document.getElementById('phone').value = "<?php echo addslashes($_SESSION['user_info']['phone_number']); ?>";
                document.getElementById('address').value = "<?php echo addslashes($_SESSION['user_info']['address']); ?>";
            </script>
        <?php endif; ?>


        <div class="lsdonhang" style="width: 900px;">
            <div>
                <h2>Lịch sử đơn hàng</h2>
                <div class="navbar">
                    <ul class="navbar">
                        <li><a href="">Tất cả</a></li>
                        <li><a href="">Chờ xác nhận</a></li>
                        <li><a href="">Đang vận chuyển</a></li>
                        <li><a href="">Đã giao</a></li>
                        <li><a href="">Đã hủy</a></li>
                    </ul>
                </div>
            </div>
            <table style="border: 1px solid #db7093">
                <?php $conn = new mysqli('localhost', 'root', '', 'webhangban');
                if ($conn->connect_error) {
                    die("Kết nối thất bại: " . $conn->connect_error);
                }
                // Lấy dữ liệu từ nhiều bảng
                $id = $_SESSION['user_info']['id'];
                $sql = "SELECT *
        FROM user
         JOIN orders ON user.id = orders.user_id
         JOIN order_details ON orders.id = order_details.order_id
         JOIN product ON order_details.product_id = product.id
         WHERE orders.user_id= $id
        ";
                $result = $conn->query($sql);
                ?>
                <?php if ($result->num_rows > 0) : ?>
                    <tr>


                        <?php
                        // Kết nối database và lấy dữ liệu
                        // Kết nối đến cơ sở dữ liệu
                        //
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if ($row['status'] == 1) {
                                    $st = "Đã giao";
                                } else {
                                    $st = "Chưa giao";
                                }
                                echo
                                '
                         <td>
                                <p>Mã người dùng: ' . $id . ' </p>
                                <div style="display: grid; margin:0 20px 30px;">
                                    <img src=" ' . $row['thumbnail'] . '" style="height: 300px; width: 250px">
                                    <p>' . $row['title'] . '</p>
                                </div>

                                <div class="ttct">
                                    <p>Màu sắc:' . $row['color'] . ' </p>
                                    <p>Size: ' . $row['size'] . ' </p>
                                    <p>Số lượng: ' . $row['num'] . '</p>
                                    <p>Thành tiền: ' . $row['total_money'] . '</p>
                                    <p>Trạng thái:
                                        ' . $st . ' 
                                    </p>
                                </div>
                        </td>
                                ';
                            }
                        }
                        ?>
                        </td>

                    <?php endif; ?>
                    </tr>
            </table>
        </div>
    </div>

    <style>
        table {
            width: 900px;
            margin-bottom: 20px;
        }

        table tr {
            display: grid;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        table tr td {
            display: flex;
            margin-bottom: 50px;
            margin-left: 30px;

        }

        .ttdonhang {
            display: flex;
            padding: 5px;
        }

        .ttdonhang div {
            margin-right: 40px;
        }

        .container {
            display: flex;
            margin-left: 10px;
        }

        .myInfo {
            display: grid;
            margin: 10px;
            height: 250px;
            margin-left: 50px;
            width: 300px;
            margin-top: 80px;
            border: 1px solid #000000;
            padding: 10px;
        }

        .myInfo input {
            border: 0px;
        }

        .navbar {
            width: 900px;
            justify-content: space-between;
            display: flex;
        }

        .navbar h2 {
            color: #58257b
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #e9d8f4;
        }

        .navbar ul li {
            float: left;
        }

        .navbar ul li a {
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar ul li a:hover {
            color: white;
            background-color: #db7093;
            font-weight: bold;
        }

        .lsdonhang {
            margin-left: 50px;
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


        #content {
            width: 80%;
            margin-left: 0 auto;
        }


        tr {
            text-align: center;
        }

        #content a {
            text-decoration: none;
            color: black;
            list-style-type: none;
        }

        #mini {
            text-align: center;
            font-weight: bold;
            background-color: rgba(255, 192, 203, 1.00);
            height: 180px;
            bottom: 10px;
            text-transform: uppercase;
        }

        .btn-custom {
            color: #2f2626;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 50px;
            background: #ffffff;
            border: 2px solid #f0cfcf;

        }

        .btn-custom:hover {
            font-weight: bold;
            border: 2px solid pink;
            transition: font-weight ease;
            background: #f0cfcf;
            background: -webkit-linear-gradient(bottom, #f0cfcf, #ffacc7);
            background: -o-linear-gradient(bottom, #f0cfcf, #ffacc7);
            background: -moz-linear-gradient(bottom, #f0cfcf, #ffacc7);
            background: linear-gradient(bottom, #f0cfcf, #ffacc7);
        }

        .btn:hover {
            background-color: #000000;
        }

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
    </style>

</body>

</html>