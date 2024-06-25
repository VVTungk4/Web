<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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

    $nums_product = 0;

    foreach ($_SESSION['cart'] as $product_key => $item) {
        $nums_product+=1;
    }

    ?>
    <div class="main-body">
        <!--------------------------------------------HEADER----------------------------------------------------->
        <div id="header" style="font-weight: bold;">
            <div id="khungdau">
                <div style="width: 250px;" id="TaiKhoan">
                    <p style="margin-bottom: 0;"><i class="bi bi-list-task"></i>&nbsp; DANH MỤC</p>
                    <ul class="MeNu">
                        <li style="font-weight: normal;"><a href="../sanpham/Áo-Nữ.html ">Sản phẩm Nữ: Áo</a></li>
                        <li style="font-weight: normal;"><a href="../sanpham/Đầm-Nữ.html ">Sản phẩm Nữ: Đầm</a></li>
                    </ul>
                </div>
                <div><a href="../sanpham/Sản-Phẩm.html" style="text-decoration:none; color:#000;">
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
            <div class="container-fluid">
                <div class="nav-header-wrap">
                    <div class="nav-header">
                        <ol>
                            <li>
                                <a href="./home.php">
                                    <span>Trang chủ</span>
                                </a>
                                <meta itemprop="position" content="1">
                            </li>
                            <li class="active">
                                <span>
                                    <span>Giỏ hàng (<?php echo $nums_product ?>)</span>
                                </span>
                                <meta itemprop="position" content="2">
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="cart-page">
                    <div class="heading-page">
                        <div class="header-page">
                            <h1>Giỏ hàng của bạn</h1>
                            <p class="count-cart">
                                Có <span><?php echo $nums_product ?> sản phẩm</span> trong giỏ hàng
                            </p>
                        </div>
                    </div>
                    <div class="cart-content-wrap">
                    <?php
                        if ($nums_product == 0) {
                            echo '<div class="notifications">
                            Giỏ hàng của bạn đang trống
                            <p class="link-continue">
                                <a href="" class="button dark">
                                    <button>
                                        <i class="fa fa-reply"></i>
                                        TIẾP TỤC MUA HÀNG
                                    </button>
                                </a>
                            </p>
                        </div>';
                        }
                    ?>
                        <div class="cart-container">
                            <div class="main-content-cart">
                                <form action="../php/get_bill_note.php" id="cartformpage" method="POST">
                                    <div class="display-items">
                                        <table class="table-cart">
                                            <tbody>
                                                <?php
                                                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                                    foreach ($_SESSION['cart'] as $product_key => $item) {

                                                        $product_id = @$item['product_id'];
                                                        $size_id = @$item['size_id'];
                                                        $color_id = @$item['color_id'];
                                                        $quantity = @$item['quantity'];

                                                        // Truy vấn cơ sở dữ liệu để lấy thông tin sản phẩm dựa trên product_id
                                                        $query = "SELECT * FROM Product WHERE id = '$product_id'";

                                                        $result = mysqli_query($conn, $query);

                                                        if ($result) {
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                $total_price += $row['price'] * $quantity;
                                                                // Hiển thị thông tin sản phẩm trong giỏ hàng
                                                                echo '<tr class="line-item-container">';
                                                                echo '<td class="image">';
                                                                echo '<div class="product-img">';
                                                                echo '<a href="">';
                                                                echo '<img src="../image/' . $row['thumbnail'] . '" alt="' . $row['title'] . '">';
                                                                echo '</a>';
                                                                echo '</div>';
                                                                echo '</td>';
                                                                echo '<td class="item">';
                                                                echo '<a href="./product.php?product_id=' . $row['id'] . '">' . $row['title'] . '</a>';
                                                                echo '<p class="variant">';
                                                                    echo '<span class="variant-title">';
                                                                        $size_name = '';
                                                                        switch ($size_id) {
                                                                            case 1:
                                                                                $size_name = 'S';
                                                                                break;
                                                                            case 2:
                                                                                $size_name = 'M';
                                                                                break;
                                                                            case 3:
                                                                                $size_name = 'L';
                                                                                break;
                                                                            case 4:
                                                                                $size_name = 'XL';
                                                                                break;
                                                                            default:
                                                                                $size_name = '';
                                                                                break;
                                                                        }
                                                                        
                                                                        $color_name = '';
                                                                        switch ($color_id) {
                                                                            case 1:
                                                                                $color_name = 'Red';
                                                                                break;
                                                                            case 2:
                                                                                $color_name = 'Blue';
                                                                                break;
                                                                            case 3:
                                                                                $color_name = 'Black';
                                                                                break;
                                                                            default:
                                                                                $color_name = '';
                                                                                break;
                                                                        }
                                                                        echo $size_name . ' - ' . $color_name;
                                                                    echo '</span>';
                                                                echo '</p>';
                                                                echo '<p>';
                                                                echo '<span>' . number_format($row['price'], 0, ',', '.') . '₫</span>';
                                                                echo '</p>';
                                                                echo '<div class="qty-click">';
                                                                echo '<button type="button" class="qtyminus qty-btn" data-product-id="' . $row['id'] . '" data-size-id="' . $size_id . '" data-color-id="' . $color_id . '">-</button>';
                                                                echo '<input type="text" size="4" min="1" data-price="' . $row['price'] . '" value="' . $quantity . '" class="item-quantity" data-product-id="' . $row['id'] . '" data-size-id="' . $size_id . '" data-color-id="' . $color_id . '"> ';
                                                                echo '<button type="button" class="qtyplys qty-btn" data-product-id="' . $row['id'] . '" data-size-id="' . $size_id . '" data-color-id="' . $color_id . '">+</button>';
                                                                echo '</div>';
                                                                echo '<p class="price">';
                                                                echo '<span class="text">Thành tiền</span>';
                                                                echo '<span class="line-iem-total">' . number_format($row['price'] * $quantity, 0, ',', '.') . '₫</span>';
                                                                echo '</p>';
                                                                echo '</td>';
                                                                echo '<td class="remove">';
                                                                echo '<a href="#" class="remove-from-cart" data-product-key="' . $product_key . '">';
                                                                echo '<ion-icon name="close-outline"></ion-icon>';
                                                                echo '</a>';
                                                                echo '</td>';
                                                                echo '</tr>';
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                        <script>
                                            $(document).ready(function() {
                                                // Xử lý sự kiện click cho nút "Xóa"
                                                $('.remove-from-cart').click(function(e) {
                                                    e.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

                                                    var productKey = $(this).data('product-key');

                                                    // Gửi yêu cầu xóa sản phẩm thông qua Ajax
                                                    $.ajax({
                                                        url: '../php/remove_from_cart.php',
                                                        type: 'post',
                                                        data: {
                                                            product_key: productKey
                                                        },
                                                        success: function(response) {
                                                            // Cập nhật lại tổng tiền sau khi xóa sản phẩm
                                                            $('#total-cart').html(response);
                                                            location.reload();
                                                        }
                                                    });
                                                });
                                            });
                                        </script>
                                    </div>
                                    <?php
                                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                        echo '<div class="cart-others">
                                            <div class="note-wrap">
                                                <div class="checkout-note">
                                                    <textarea name="bill_note" id="note" cols="50" rows="8" placeholder="Ghi chú"></textarea>
                                                </div>
                                            </div>
                                            <div class="order-actions-wrap">
                                                <p class="order-infor">
                                                    Tổng tiền
                                                    <span class="total-price">
                                                        <b id="total-cart">' . number_format($total_price, 0, ',', '.') . '₫</b>
                                                    </span>
                                                </p>
                                                <div class="cart-buttons">
                                                    <a href="./collections.php">
                                                        <button>
                                                            <i class="fa fa-reply"></i>
                                                            TIẾP TỤC MUA HÀNG
                                                        </button>
                                                    </a>
                                                    <button type="submit" id="checkout" class="btn-checkout" name="checkout">
                                                        THANH TOÁN
                                                    </button>
                                                    
                                                </div>
                                            </div>
                                        </div>';
                                    }
                                    $_SESSION['total_price'] = $total_price;
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------------------FOOTER----------------------------------------------------->
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