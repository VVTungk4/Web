<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once "../php/database_function.php";
$conn = connectDatabase();
$total_price = 0;

if (isset($_SESSION['user_info'])) {
    $user_id = $_SESSION['user_info']['id'];

    $cart_query = "SELECT cart_items.*, product.title, product.after_discount, product.thumbnail, sizes.name AS size_name, colors.name AS color_name
                   FROM carts
                   JOIN cart_items ON carts.id = cart_items.cart_id
                   JOIN product ON cart_items.product_id = product.id
                   JOIN sizes ON cart_items.size_id = sizes.id
                   JOIN colors ON cart_items.color_id = colors.id
                   WHERE carts.user_id = '$user_id'";
    $cart_result = $conn->query($cart_query);
?>
<div class="sidebar-content">
    <div class="order-summary-sections">
        <div class="order-summary-section order-summary-section-product-list">
            <table class="product-table">
                <tbody>
                <?php
                if ($cart_result->num_rows > 0) {
                    while ($row = $cart_result->fetch_assoc()) {
                        $total_price += $row['after_discount'] * $row['quantity'];
                ?>
                    <tr class="product">
                        <td class="product-image">
                            <div class="product-thumbnail">
                                <div class="product-thumbnail-wrapper">
                                    <img src="../<?php echo $row['thumbnail']; ?>" alt="<?php echo $row['title']; ?>">
                                </div>
                            </div>
                        </td>
                        <td class="product-description">
                            <span class="product-description-name order-summary-emphasis"><?php echo $row['title']; ?></span>
                            <br>
                            <small>Size: <?php echo $row['size_name']; ?>, Màu: <?php echo $row['color_name']; ?></small>
                        </td>
                        <td class="product-quantity"><?php echo $row['quantity']; ?></td>
                        <td class="product-price">
                            <span class="order-summary-emphasis"><?php echo number_format($row['after_discount'], 0, ',', '.'); ?>₫</span>
                        </td>
                    </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="4">Hiện chưa có sản phẩm nào</td></tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="order-summary-section order-summary-section-total-lines payment-line">
            <table class="total-line-table">
                <tbody>
                    <tr class="total-line total-line-subtotal">
                        <td class="total-line-name">Tạm tính</td>
                        <td class="total-line-price">
                            <span class="order-summary-emphasis"><?php echo number_format($total_price, 0, ',', '.'); ?>₫</span>
                        </td>
                    </tr>
                    <tr class="total-line total-line-shipping">
                        <td class="total-line-name">Phí vận chuyển</td>
                        <td class="total-line-price">
                            <span class="order-summary-emphasis">Miễn phí</span>
                        </td>
                    </tr>
                </tbody>
                <tfoot class="total-line-table-footer">
                    <tr class="total-line">
                        <td class="total-line-name payment-due-label">
                            <span class="payment-due-label-total">Tổng cộng</span>
                        </td>
                        <td class="total-line-name payment-due">
                            <span class="payment-due-currency">VND</span>
                            <span class="payment-due-price"><?php echo number_format($total_price, 0, ',', '.'); ?>₫</span>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php
} else {
    echo "<p>Vui lòng đăng nhập để xem giỏ hàng của bạn.</p>";
}
?>