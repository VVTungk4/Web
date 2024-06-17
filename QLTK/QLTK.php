<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản cá nhân</title>
    <link rel="icon" type="image/png" href="images/icon.ico" />
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    
</head>

<body>
    <?php session_start(); // Bắt đầu phiên làm việc 
    ?>
    <form action="update.php" method="post">
        <div id="header" style="font-weight: bold;">
            <div id="khungdau">
                <div style="width: 250px;" id="TaiKhoan">
                    <p style="margin-bottom: 0;" ><i class="bi bi-list-task"></i>&nbsp; DANH MỤC</p>
                    <ul class="MeNu">
                        <li style="font-weight: normal;"><a href="../web/Áo-Nữ.html ">Sản phẩm Nữ: Áo</a></li>
                        <li style="font-weight: normal;"><a href="../web/Đầm-Nữ.html ">Sản phẩm Nữ: Đầm</a></li>
                    </ul>
                </div>
                <div><a href="../web/product.html" style="text-decoration:none; color:#000;">
                        <p>SẢN PHẨM </p>
                </div>
                <div><a href="../index.html" style="text-decoration:none; color:#000;">
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
                        <li style="font-weight: normal;"><a href="../Login/register.html">Tài khoản mới</a></li>
                        <li style="font-weight: normal;"><a href="../Login/Login.html">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="logo">
            <img src="images/logo1.png" style="height: 90px; width: 110px;">
            <label for="TaiKhoan" class="ttcn"> THÔNG TIN CÁ NHÂN</label>
        </div>

        <div class="container">
            <div class="imageInput">
                <img id="previewImage" src="../image/my.jpg" alt="Image preview">
                <input type="file" id="imageInput" accept="image/*">
            </div>
            <div class="thongtin">
                <div class="infor">
                    <label for="full-name">Khách hàng</label>
                    <input type="text" id="fullname" name="fullname" required>
                </div>

                <div class="infor">
                    <label for="dob">Ngày tạo</label>
                    <input type="text" id="dob" name="dob" readonly>
                </div>

                <div class="infor">
                    <label for="address">Địa chỉ</label>
                    <input type="text" id="address" name="address" required>

                </div>

                <div class="infor">
                    <label for="phone">Số điện thoại</label>
                    <input type="text" id="phone" name="phone" required>

                </div>

                <div class="infor">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" readonly>

                </div>

                <div class="infor">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" style="width: 200px;" required>
                    <script src="script.js"></script>
                    <button onclick="togglePassword()" style="border: 1px;" name="password">Show/Hide</button>
                </div>
                <div>
                    <button type="submit" class="btn-custom" style="margin-left: 250px; margin-top: 40px;" name="update">
                        Cập nhật
                    </button>
                </div>
            </div>

            <?php if (isset($_SESSION['user_info'])) : ?>

                <!-- Dùng PHP để điền thông tin vào các text box -->
                <?php if (isset($_SESSION['user_info'])) : ?>
                    <script type="text/javascript">
                        document.getElementById('fullname').value = "<?php echo addslashes($_SESSION['user_info']['fullname']); ?>";
                        document.getElementById('phone').value = "<?php echo addslashes($_SESSION['user_info']['phone_number']); ?>";
                        document.getElementById('address').value = "<?php echo addslashes($_SESSION['user_info']['address']); ?>";
                        document.getElementById('email').value = "<?php echo addslashes($_SESSION['user_info']['email']); ?>";
                        document.getElementById('password').value = "<?php echo addslashes($_SESSION['user_info']['password']); ?>";
                        document.getElementById('dob').value = "<?php echo addslashes($_SESSION['user_info']['created_at']); ?>";
                        // Thêm các dòng tương tự cho các text box khác
                    </script>
                <?php endif; ?>
            <?php endif; ?>
            <div class="anh">
                <img src="images/anh.jpg" alt="" style="height: 500px; width: 400px;">
            </div>
        </div>


</body>

</html>