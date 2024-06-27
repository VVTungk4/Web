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
                    <li style="font-weight: normal;"><a href="../web/Áo-Nữ.php ">Sản phẩm Nữ: Áo</a></li>
                    <li style="font-weight: normal;"><a href="../web/Đầm-Nữ.php ">Sản phẩm Nữ: Đầm</a></li>
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
        <img src="images/logo1.png" style="height: 90px; width: 110px;">

        <label for="TaiKhoan" class="ttcn">THÔNG TIN ĐƠN HÀNG</label>
    </div>
    <div class="container">
        <div class="myInfo">
            <label for="fullname">Khách hàng:</label>
            <input type="text" id="fullname" name="fullname" readonly>
            <br>
            <label for="fullname">Số điện thoại:</label>
            <input type="text" id="phone" name="phone" readonly>
            <br>
            <label for="fullname">Địa chỉ:</label>
            <input type="text" id="address" name="address" readonly>
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
                <div>
                    <form action="">
                        <select name="customers" onchange="showCustomer(this.value)">
                            <option value="5">Tất cả</option>
                            <option value="0">Chờ xác nhận</option>
                            <option value="1">Đang chuẩn bị hàng</option>
                            <option value="2">Đang giao</option>
                            <option value="3">Đã giao</option>
                            <option value="4">Đã hủy</option>
                        </select>
                    </form>
                    <br>
                    <script>
                        function showCustomer(str) {
                            var xhttp;
                            if (str == "") {
                                document.getElementById("txtHint").innerHTML = "";
                                return;
                            }
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("txtHint").innerHTML = this.responseText;
                                }
                            };
                            xhttp.open("GET", "oderData.php?q=" + Number(str), true);
                            xhttp.send();
                        }
                    </script>
                    <script>
                        function showCustomer(str) {
                            var xhttp;
                            if (str == "") {
                                document.getElementById("txtHint").innerHTML = "";
                                return;
                            }
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("txtHint").innerHTML = this.responseText;
                                }
                            };
                            xhttp.open("GET", "oderData.php?q=" + Number(str), true);
                            xhttp.send();
                        }
                    </script>
                    <script>
                        function huydon(button) {
                            var data_id = button.value;
                            var xhttp;
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    console.log('Yêu cầu đã gửi thành công');
                                    alert("Đã hủy đơn hàng");
                                    document.getElementById("txtHint").innerHTML = this.responseText;
                                }
                            }
                            xhttp.open("GET", "huyDon.php?q=" + Number(data_id), true);
                            xhttp.send();
                        }
                    </script>
                    <script src="http://code.jquery.com/jquery-3.6.0.js"></script>
                </div>
            </div>
            <table style="border: 1px solid #db7093; background: #FFDCE3;" id="txtHint">

            </table>
        </div>
    </div>


    <style>
        .ttct {
            margin-top: 40px;
        }

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
            margin-top: 100px;
            border: 1px solid #000000;
            padding: 10px;
        }

        .myInfo input {
            border: 0px;
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