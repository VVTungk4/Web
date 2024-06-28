<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_info'])) {
    echo "<h2>Bạn cần đăng nhập để sử dụng chức năng giỏ hàng.</h2>";
    echo "<a href='../index.php'><ins>Trở lại trang chủ</ins> </a>";
    echo "<br><br>";
    echo "<a href='../login/Login.php'><ins>Đến trang đăng nhập</ins> </a>";
    exit();
}

$user_id = $_SESSION['user_info']['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/39b6b90061.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="cart.css">
    <title>Giỏ hàng</title>
    <link rel="icon" type="image/png" href="icons/cart.ico" />
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
    <script src="./javascript/cart_function.js?v=<?php echo time() ?>"></script>
</head>

<body>
    <?php
    require_once "../php/database_function.php";

    $conn = connectDatabase();
    $total_price = 0;

    $cart_query = "SELECT carts.id AS cart_id, cart_items.*, product.title, product.after_discount, product.price, product.thumbnail, sizes.name AS size_name, colors.name AS color_name, product_size_color.quantity AS quantity_available
                   FROM carts
                   JOIN cart_items ON carts.id = cart_items.cart_id
                   JOIN product ON cart_items.product_id = product.id
                   JOIN sizes ON cart_items.size_id = sizes.id
                   JOIN colors ON cart_items.color_id = colors.id
                   JOIN product_size_color ON product.id = product_size_color.product_id AND sizes.id = product_size_color.size_id AND colors.id = product_size_color.color_id
                   WHERE carts.user_id = '$user_id'";
    $cart_result = $conn->query($cart_query);

    $nums_product = $cart_result->num_rows;
    ?>

    <div class="main-body">
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
                        <li><a href="../QLTK/myOder.php">QL đơn hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="logo">
            <img src="../image/logo1.png" style="height: 90px; width: 110px;">
            <label for="TaiKhoan" class="ttcn"> Giỏ hàng của bạn</label>
        </div>

        <div class="layout-cart">
            <div class="container mt-5">
                <h2 style="margin-bottom: 30px;">Giỏ hàng của bạn (<?php echo $nums_product; ?> sản phẩm)</h2>
                <div class="row">
                    <div class="col-md-8">
                        <div class="cart">
                            <?php
                            if ($nums_product > 0) {
                                while ($row = $cart_result->fetch_assoc()) {
                                    $total_price += $row['after_discount'] * $row['quantity'];
                            ?>
                                    <div class="cart-item" style=" border-bottom: 3px solid pink; padding-bottom: 20px; margin-bottom: 20px;">
                                        <div class="row">
                                            <div class="col-md-4" style="margin-bottom: 20px;">
                                                <img src="../<?php echo $row['thumbnail']; ?>" class="img-fluid" alt="Product Image" style="border: 1px solid pink;">
                                            </div>
                                            <div class="col-md-8">
                                                <h4><?php echo $row['title']; ?></h4>
                                                <p>Size: <?php echo $row['size_name']; ?></p>
                                                <p>Color: <?php echo $row['color_name']; ?></p>
                                                <p>Giá cũ: <del><?php echo number_format($row['price'], 0, ',', '.'); ?> VND </del></p>
                                                <p>Giá mới: <?php echo number_format($row['after_discount'], 0, ',', '.'); ?> VND</p>
                                                <p>Số lượng:
                                                    <button class="btn btn-sm btn-primary change-quantity" data-item-id="<?php echo $row['id']; ?>" data-change="decrease">-</button>
                                                    <input type="number" class="quantity-input" value="<?php echo $row['quantity']; ?>" min="1" max="<?php echo $row['quantity_available']; ?>" style="width: 60px;">
                                                    <button class="btn btn-sm btn-primary change-quantity" data-item-id="<?php echo $row['id']; ?>" data-change="increase">+</button>
                                                </p>
                                                <p>Thành tiền: <?php echo number_format($row['after_discount'] * $row['quantity'], 0, ',', '.'); ?> VNĐ</p>
                                                <button class="btn btn-danger remove-item" data-item-id="<?php echo $row['id']; ?>">Xóa</button>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "<p>Giỏ hàng của bạn trống.</p>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="summary">
                            <h3>Tổng cộng</h3>
                            <p>Tổng số tiền: <?php echo number_format($total_price, 0, ',', '.'); ?> VND</p>
                            <a href="orderinfo.php" class="btn btn-primary">Thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    </div>
    <script>
        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.getAttribute('data-item-id');
                const userId = '<?php echo $user_id; ?>';

                fetch('../php/remove_item.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: `user_id=${userId}&item_id=${itemId}`,
                    })
                    .then(response => response.text())
                    .then(response => {
                        if (response === 'success') {
                            location.reload();
                        } else {
                            console.error(response);
                        }
                    })
                    .catch(error => console.error('Lỗi:', error));
            });
        });

        document.querySelectorAll('.quantity-input').forEach(input => {
            input.addEventListener('change', function() {
                const maxQuantity = parseInt(input.getAttribute('max'));
                let newQuantity = parseInt(input.value);

                if (newQuantity > maxQuantity) {
                    newQuantity = maxQuantity;
                    alert(`Số lượng sản phẩm chỉ còn ${maxQuantity} sản phẩm!`);
                } else if (newQuantity < 1) {
                    newQuantity = 1;
                }

                input.value = newQuantity;
                updateQuantity(input);
            });
        });

        document.querySelectorAll('.change-quantity').forEach(button => {
            button.addEventListener('click', function() {
                const changeType = this.getAttribute('data-change');
                const inputElement = this.parentElement.querySelector('.quantity-input');
                let newQuantity = parseInt(inputElement.value);
                const maxQuantity = parseInt(inputElement.getAttribute('max'));

                if (changeType === 'increase') {
                    newQuantity++;
                } else if (changeType === 'decrease' && newQuantity > 1) {
                    newQuantity--;
                }

                if (newQuantity > maxQuantity) {
                    newQuantity = maxQuantity;
                    alert(`Số lượng sản phẩm chỉ còn ${maxQuantity} sản phẩm!`);
                } else if (newQuantity < 1) {
                    newQuantity = 1;
                }

                inputElement.value = newQuantity;
                updateQuantity(inputElement);
            });
        });

        function updateQuantity(inputElement) {
            const itemId = inputElement.parentElement.querySelector('.change-quantity').getAttribute('data-item-id');
            const newQuantity = parseInt(inputElement.value);
            const userId = '<?php echo $user_id; ?>';

            fetch('../php/update_quantity.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `user_id=${userId}&item_id=${itemId}&new_quantity=${newQuantity}`,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {

                    } else {
                        alert(data.message);;
                    }
                })
                .catch(error => console.error('Lỗi:', error));
        }
    </script>
</body>

</html>