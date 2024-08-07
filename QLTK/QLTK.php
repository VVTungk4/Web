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
                    <p style="margin-bottom: 0;"><i class="bi bi-list-task"></i>&nbsp; DANH MỤC</p>
                    <ul class="MeNu">
                        <li style="font-weight: normal;"><a href="../sanpham/AoNu.php ">Sản phẩm Nữ: Áo</a></li>
                        <li style="font-weight: normal;"><a href="../sanpham/DamNu.php ">Sản phẩm Nữ: Đầm</a></li>
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
                        <li><a href="../QLTK/LS_muahang.php">QL đơn hàng</a></li>
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
                <p style="margin-left: 50px;">Ảnh đại diện</p>
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
                    <label for="pass">Password</label>
                    <input type="password" id="pass" name="pass" style="width: 260px;" required>
                    <button class="btn btn-primary" type="button" id="btn_pass" style="border: #000; width: 40px;">
                        <i class="bi bi-eye-fill"></i>
                    </button>
                </div>
                <?php
                // Kiểm tra xem có thông báo thành công không
                if (isset($_SESSION['success_message'])) {
                    echo '<div class="success-message" style="margin-left: 220px;">' . $_SESSION['success_message'] . '</div>';
                    // Xóa thông báo sau khi hiển thị
                    unset($_SESSION['success_message']);
                }
                ?>

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
                        document.getElementById('dob').value = "<?php echo addslashes($_SESSION['user_info']['created_at']); ?>";
                        document.getElementById('pass').value = "<?php echo addslashes($_SESSION['user_info']['password']); ?>";
                        // Thêm các dòng tương tự cho các text box khác
                    </script>
                <?php endif; ?>
            <?php endif; ?>
            <div class="anh">
                <img src="images/anh.jpg" alt="" style="height: 500px; width: 400px;">
            </div>
        </div>
        <style>
            .btn-custom {
                background: #f0cfcf;
                background: -webkit-linear-gradient(bottom, #f0cfcf, #ffacc7);
                background: -o-linear-gradient(bottom, #f0cfcf, #ffacc7);
                background: -moz-linear-gradient(bottom, #f0cfcf, #ffacc7);
                background: linear-gradient(bottom, #f0cfcf, #ffacc7);
            }

            .btn-primary {
                background: #f0cfcf;
                background: -webkit-linear-gradient(bottom, #f0cfcf, #ffacc7);
                background: -o-linear-gradient(bottom, #f0cfcf, #ffacc7);
                background: -moz-linear-gradient(bottom, #f0cfcf, #ffacc7);
                background: linear-gradient(bottom, #f0cfcf, #ffacc7);
            }
        </style>
        <script>
            // step 1
            const ipnElement = document.querySelector('#pass')
            const btnElement = document.querySelector('#btn_pass')

            // step 2
            btnElement.addEventListener('click', function() {
                // step 3
                const currentType = ipnElement.getAttribute('type')
                // step 4
                ipnElement.setAttribute(
                    'type',
                    currentType === 'password' ? 'text' : 'password'
                )
            })
        </script>
</body>

</html>