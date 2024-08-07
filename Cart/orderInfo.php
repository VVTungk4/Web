<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "../php/database_function.php";
$conn = connectDatabase();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://kit.fontawesome.com/39b6b90061.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="checkout.css?v=<?php echo time(); ?>">

    <title>Thanh toán</title>
    <link rel="icon" type="image/x-icon" href="./img/footerLogo.webp">
    <script src="./javascript/showCheckOutMethods.js?v=<?php echo time(); ?>" defer></script>
    <script src="./javascript/orderinfo.js?v=<?php echo time(); ?>" defer></script>
</head>

<body>
    <!--------------------------------------------CHECKOUT-CONTENT----------------------------------------------------->
    <div class="checkout-wrap">
        <div class="checkout-main">
            <div class="main-header">
                <a href="" class="logo">
                    <h1 class="logo-text">Sonic shop</h1>
                </a>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="./cart.php">Giỏ hàng</a>
                    </li>
                    <li class="breadcrumb-item">
                        Thông tin giao hàng
                    </li>
                    <li class="breadcrumb-item">
                        <a href="./checkout.php">Phương thức thanh toán</a>
                    </li>
                </ul>
            </div>
            <div class="main-content">
                <div class="step">
                    <div class="step-actions" step="1">
                        <div id="section-shipping-rate" class="section">
                            <div class="section-header">
                                <h2 class="section-title">Thông tin giao hàng</h2>
                            </div>
                            <div class="section-content section-customer-information no-mb">
                                <div class="logged-in-customer-information">
                                    <div class="logged-in-customer-information-avatar-wrapper">
                                        <div class="logged-in-customer-information-avatar gravatar" style="background-image: url(//www.gravatar.com/avatar/0b5f1cba1f77d746ad0f059ff7061a5e.jpg?s=100&d=blank);filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='//www.gravatar.com/avatar/0b5f1cba1f77d746ad0f059ff7061a5e.jpg?s=100&d=blank', sizingMethod='scale')"></div>
                                    </div>
                                    <p class="logged-in-customer-information-paragraph">
                                        <?php
                                        if (isset($_SESSION['fullname']) && isset($_SESSION['email'])) {
                                            echo $_SESSION['fullname'] . ' (' . $_SESSION['email'] . ')';
                                            echo '<br>';
                                            echo '<a href="">Đăng xuất</a>';
                                        }

                                        ?>
                                    </p>
                                </div>
                                <div class="fieldset">
                                    <div class="field field-show-floating-label">
                                        <div class="field-input-wrapper field-input-wrapper-select">
                                            <select id="stored_addresses" class="field-input">
                                                <option value="add" selected>Thêm địa chỉ mới ...</option>
                                                <?php
                                                if (isset($_SESSION['user_info']['id'])) {
                                                    $user_id = $_SESSION['user_info']['id'];
                                                    $query = "SELECT id, fullname, address FROM `user` WHERE id = ?";
                                                    $stmt = $conn->prepare($query);
                                                    $stmt->bind_param("i", $user_id);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();

                                                    if ($result && $result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo '<option value="' . $row['id'] . '">' . $row['fullname'] . ' - ' . $row['address'] . '</option>';
                                                        }
                                                    }
                                                    $stmt->close();
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <form id="checkout_complete" action="../php/get_order_info.php" method="post" onsubmit="return checkInput()">
                                        <div class="field field-required field-show-floating-label">
                                            <div class="field-input-wrapper">
                                                <label for="billing_address_full_name" class="field-label">Họ và Tên</label>
                                                <input type="text" placeholder="Họ và tên" class="field-input" size="30" id="billing_address_full_name" name="billing_address_full_name">
                                                <p id="fullname_error" class="error-show"></p>
                                            </div>
                                        </div>
                                        <div class="field field-required field-show-floating-label">
                                            <div class="field-input-wrapper">
                                                <label for="billing_address_phone" class="field-label">Số điện thoại</label>
                                                <input type="tel" placeholder="Số điện thoại" class="field-input" size="30" maxlength="11" id="billing_address_phone" name="billing_address_phone">
                                                <p id="phone_error" class="error-show"></p>
                                            </div>
                                        </div>
                                        <div class="field field-required field-show-floating-label">
                                            <div class="field-input-wrapper">
                                                <label for="billing_address_address">Địa chỉ</label>
                                                <input type="text" size="30" placeholder="Địa chỉ" id="billing_address_address" name="billing_address_address">
                                                <p id="address_error" class="error-show"></p>
                                            </div>
                                        </div>
                                        <div class="field field-required   field-show-floating-label">
                                            <div class="field-input-wrapper">
                                                <label for="">Ghi chú</label>
                                                <input type="text" size="50" placeholder="Ghi chú" id="billing_address_note" name="billing_address_note" style="height: 50px;">
                                            </div>
                                        </div>
                                        <div class="step-footer" id="step-footer-checkout">
                                            <button type="submit" class="step-footer-continue-btn btn">
                                                <span class="btn-content">Tiếp tục đến phương thức thanh toán</span>
                                            </button>
                                            <a href="./cart.php" class="step-footer-previous-link">Giỏ hàng</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-footer footer-powered-by">Powered by aesiunhan</div>
        </div>
        <div class="checkout-sidebar">
            <?php require_once './template/sidebar-content.php'; ?>
        </div>
    </div>
</body>
</html>