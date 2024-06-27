<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_info'])) {
    echo "Bạn cần đăng nhập để sử dụng chức năng giỏ hàng.";
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

    $cart_query = "SELECT carts.id AS cart_id, cart_items.*, product.title, product.price, product.thumbnail
                   FROM carts
                   JOIN cart_items ON carts.id = cart_items.cart_id
                   JOIN product ON cart_items.product_id = product.id
                   WHERE carts.user_id = '$user_id'";
    $cart_result = $conn->query($cart_query);

    $nums_product = $cart_result->num_rows;
    $cart_query = "SELECT carts.id AS cart_id, cart_items.*, product.title, product.price, product.thumbnail, sizes.name AS size_name, colors.name AS color_name
               FROM carts
               JOIN cart_items ON carts.id = cart_items.cart_id
               JOIN product ON cart_items.product_id = product.id
               JOIN sizes ON cart_items.size_id = sizes.id
               JOIN colors ON cart_items.color_id = colors.id
               WHERE carts.user_id = '$user_id'";
    $cart_result = $conn->query($cart_query);
    ?>
    <div class="main-body">
        <!--------------------------------------------HEADER----------------------------------------------------->
        <div id="header" style="font-weight: bold;">
            <div id="khungdau">
                <div style="width: 250px;" id="TaiKhoan">
                    <p style="margin-bottom: 0;"><i class="bi bi-list-task"></i>&nbsp; DANH MỤC</p>
                    <ul class="MeNu">
                        <li style="font-weight: normal;"><a href="../sanpham/Áo-Nữ.php ">Sản phẩm Nữ: Áo</a></li>
                        <li style="font-weight: normal;"><a href="../sanpham/Đầm-Nữ.php ">Sản phẩm Nữ: Đầm</a></li>
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
                        <li style="font-weight: normal;"><a href="../Login/Login.php">Đăng nhập</a></li>
                        <li style="font-weight: normal;"><a href="../Login/email_dangki.php">Đăng kí</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="logo">
            <img src="images/logo1.png" style="height: 90px; width: 110px;">
            <label for="TaiKhoan" class="ttcn"> Giỏ hàng của bạn</label>
        </div>

        <!--------------------------------------------LAYOUT-CART----------------------------------------------------->
        <div class="layout-cart">
            <div class="container mt-5">
                <h2>Giỏ hàng của bạn</h2>
                <div class="row">
                    <div class="col-md-8">
                        <div class="cart">
                            <?php
                            if ($nums_product > 0) {
                                while ($row = $cart_result->fetch_assoc()) {
                                    $total_price += $row['price'] * $row['quantity'];
                            ?>
                                    <div class="cart-item">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <img src="../images/<?php echo $row['thumbnail']; ?>" class="img-fluid" alt="Product Image">
                                            </div>
                                            <div class="col-md-8">
                                                <h4><?php echo $row['title']; ?></h4>
                                                <p>Size: <?php echo $row['size_name']; ?></p>
                                                <p>Color: <?php echo $row['color_name']; ?></p>
                                                <p>Giá: <?php echo number_format($row['price'], 0, ',', '.'); ?> VND</p>
                                                <p>Số lượng: <?php echo $row['quantity']; ?></p>
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
                            <button class="btn btn-primary btn-block">Thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------------------FOOTER----------------------------------------------------->
        <footer>
            <p>&copy; 2023 Your Website. All rights reserved.</p>
        </footer>
    </div>
    <script>
        document.querySelectorAll('.remove-item').forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.getAttribute('data-item-id');
                const userId = '<?php echo $user_id; ?>'; // Lấy user_id từ PHP

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
                            location.reload(); // Tải lại trang để cập nhật giỏ hàng
                        } else {
                            console.error(response);
                        }
                    })
                    .catch(error => console.error('Lỗi:', error));
            });
        });
    </script>
</body>

</html>