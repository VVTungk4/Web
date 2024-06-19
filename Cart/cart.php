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
    <link rel="icon" type="image/png" href="icons/cart.ico"/>
    <script src="./javascript/cart_function.js?v=<?php echo time()?>"></script>
</head>

<body>
    <?php
    require_once "../php/database_function.php";

    $conn = connectDatabase();
    $total_price = 0;

    ?>
    <div class="main-body">
        <!--------------------------------------------HEADER----------------------------------------------------->
        <div id="header">
            <div id="khungdau">
                <div style="margin-left: 100px; width: 250px;" class="DanhMuc">
                    <p><i class="DanhMuc ti-menu-alt"></i>DANH SÁCH</p>
                    <ul class="MeNu">
                        <li><a href="../web/">TRANG PHỤC NỮ-ÁO</a></li>
                        <li><a href="../web/Đầm-Nữ.html">TRANG PHỤC NỮ-VÁY</a></li>

                    </ul>
                </div>
                <div><a href="../web/Sản-phẩm.html" style="text-decoration:none; color:#000;">
                        <p>SẢN PHẨM </p>
                </div>
                <div><a href="../index.html" style="text-decoration:none; color:#000;">
                        <p>TRANG CHỦ</p>
                    </a></div>
                <div><a href="../web/Giới-Thiệu.html" style="text-decoration:none; color:#000;">
                        <p>GIỚI THIỆU</p>
                    </a></div>
                <div><a href="cart.html" style="text-decoration:none; color:#000;">
                        <p>GIỎ HÀNG</p>
                    </a></div>
                <div id="TaiKhoan">
                    <p>TÀI KHOẢN</p>
                    <ul class="MeNu">
                        <li><a href="../Login/Login.html">Đăng Nhập</a></li>
                        <li><a href="../Login/register.html">Đăng Ký</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="logo">
            <img src="image/logo.png">
            <p><input type="text" placeholder=" Tìm kiếm sản phẩm "></p>
            <div class="ti-arrow-right">
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
                                    <span>Giỏ hàng (0)</span>
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
                                Có <span>0 sản phẩm</span> trong giỏ hàng
                            </p>
                        </div>
                    </div>
                    <div class="cart-content-wrap">
                        <div class="notifications">
                            Giỏ hàng của bạn đang trống
                            <p class="link-continue">
                                <a href="" class="button dark">
                                    <button>
                                        <i class="fa fa-reply"></i>
                                        TIẾP TỤC MUA HÀNG
                                    </button>
                                </a>
                            </p>

                        </div>
                        <div class="cart-container">
                            <div class="main-content-cart">
                                <form action="../php/get_bill_note.php" id="cartformpage" method="POST">
                                    <div class="display-items">
                                        <table class="table-cart">
                                            <tbody>
                                                <?php
                                                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                                    foreach ($_SESSION['cart'] as $product_id => $quantity) {
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
                                                                        echo '<p>';
                                                                            echo '<span>' . number_format($row['price'], 0, ',', '.') . '₫</span>';
                                                                        echo '</p>';
                                                                        echo '<div class="qty-click">';
                                                                            echo '<button type="button" class="qtyminus qty-btn" data-product-id="' . $row['id'] . '">-</button>';
                                                                            echo '<input type="text" size="4" min="1" data-price="' . $row['price'] . '" value="' . $quantity . '" class="item-quantity" data-product-id="' . $row['id'] . '"> ';
                                                                            echo '<button type="button" class="qtyplys qty-btn" data-product-id="' . $row['id'] . '">+</button>';
                                                                        echo '</div>';
                                                                        echo '<p class="price">';
                                                                            echo '<span class="text">Thành tiền</span>';
                                                                            echo '<span class="line-iem-total">' . number_format($row['price'] * $quantity, 0, ',', '.') . '₫</span>';
                                                                        echo '</p>';
                                                                    echo '</td>';
                                                                    echo '<td class="remove">';
                                                                        echo '<a href="#" class="remove-from-cart" data-product-id="' . $row['id'] . '">';
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
                                            $(document).ready(function(){
                                            // Xử lý sự kiện click cho nút "Xóa"
                                    $('.remove-from-cart').click(function(e){
                                        e.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

                                        var productId = $(this).data('product-id');

                                        // Gửi yêu cầu xóa sản phẩm thông qua Ajax
                                        $.ajax({
                                            url: '../php/remove_from_cart.php',
                                            type: 'post',
                                            data: {product_id: productId},
                                            success:function(response){
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
                                                        <b id="total-cart">'. number_format($total_price, 0, ',', '.').'₫</b>
                                                    </span>
                                                </p>
                                                <div class="cart-buttons">
                                                    <a href="./collections.php">
                                                        <button>
                                                            <i class="fa fa-reply"></i>
                                                            TIẾP TỤC MUA HÀNG
                                                        </button>
                                                    </a>
                                                    <button type="button" id="update-cart" class="btn-update" name="update">
                                                        Cập nhật
                                                    </button>
                                                
                                                    <button type="submit" id="checkout" class="btn-checkout" name="checkout">
                                                        Thanh toán
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
        <footer>
            <div class="container" style="background-color: lavender;">
                <!--Bắt Đầu Nội Dung Giới Thiệu-->
                <div class="noi-dung about">
                    <h2 style="border-radius: 70px; text-align: center; background-color: pink;">Về Chúng Tôi</h2>
                    <p>Website này được thiết kế và vận hành bởi nhóm admin: </br>
                        1. Mai Đình Dũng</br>
                        2. Dương Đức Khôi</br>
                        3. Nguyễn Ngọc Sơn</br>
                        4. Vũ Văn Tùng</br>
                        5. Tăng Văn Tuấn</br>
                    </p>
                    <ul class="social-icon">
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-instagram"></i></a></li>
                        <li><a href=""><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
                <!--Kết Thúc Nội Dung Giới Thiệu-->
                <!--Bắt Đầu Nội Dung Đường Dẫn-->
                <div class="noi-dung links">
                    <h2><br></h2>
                    <ul>
                        <li><a href="#">Trang Chủ</a></li>
                        <li><a href="./Giới-Thiệu.html">Về Chúng Tôi</a></li>
                        <li><a href="Login/Login.html">Tài khoản</a></li>
                        <li><a href="./">Sản phẩm</a></li>
                        <li><a href="./Đầm-Nữ.html">Cửa hàng</a></li>
                    </ul>
                </div>
                <!--Kết Thúc Nội Dung Đường Dẫn-->
                <!--Bắt Đâu Nội Dung Liên Hệ-->
                <div class="noi-dung contact">
                    <h2 style="border-radius: 70px; text-align: center; background-color: pink;">Thông Tin Liên Hệ</h2>
                    <ul class="info">
                        <li>
                            <span><i class="fa fa-map-marker"></i></span>
                            <span>52 Triều Khúc<br />
                                Quận Thanh Xuân, TP Hà Nội<br />
                                Việt Nam</span>
                        </li>
                        <li>
                            <span><i class="fa fa-phone"></i></span>
                            <p><a href="">0373999999</a>
                                <br />
                                <a href="">0373888888</a>
                            </p>
                        </li>
                        <li>
                            <span><i class="fa fa-envelope"></i></span>
                            <p><a href="">sale@sonic.vn</a></p>
                        </li>
                        <li>
                            <form class="form">
                                <input type="email" class="form__field" placeholder="Đăng Ký Subscribe Email" />
                                <button type="button" class="btn btn--primary  uppercase">Gửi</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <!--Kết Thúc Nội Dung Liên Hệ-->
            </div>
        </footer>

</body>

</html>