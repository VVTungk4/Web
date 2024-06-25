<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $total_price = 0;
?>
<div class="sidebar-content">
                    <div class="order-summary-sections">
                        <!--------------------------------------------LIST-PRODUCTS----------------------------------------------------->
                        <div class="order-summary-section order-summary-section-product-list">
                            <table class="product-table">
                                <tbody>
                                <?php
                            if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0 ) {
                                echo '<tr>Hiện chưa có sản phẩm nào</tr>';
                            }
                            else {
                                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                    foreach ($_SESSION['cart'] as $product_key => $item) {

                                        $product_id = @$item['product_id'];
                                        $size_id = @$item['size_id'];
                                        $color_id = @$item['color_id'];
                                        $quantity = @$item['quantity'];

                                        $query = "SELECT * FROM Product WHERE id = '$product_id'";
                                        $result = mysqli_query($conn, $query);

                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $total_price += $row['price'] * $quantity;
                                                echo '<tr class="product">';
                                                    echo '<td class="product-image">';
                                                        echo '<div class="product-thumbnail">';
                                                                echo '<div class="product-thumbnail-wrapper">';
                                                                echo '<img src="../image/' . $row['thumbnail'] . '" alt="' . $row['title'] . '">';
                                                                echo '</div>';
                                                        echo '</div>';
                                                    echo '</td>';
                                                    echo '<td class="product-description">';
                                                        echo '<span class="product-description-name order-summary-emphasis">'. $row['title'] .'</span>';
                                                    echo '</td>';
                                                    echo '<td class="product-quantity">'. $quantity .'</td>';
                                                    echo '<td class="product-price">';
                                                        echo '<span class="order-summary-emphasis">' . number_format($row['price'], 0, ',', '.') . '₫</span>';
                                                    echo '</td>';
                                                echo '</tr>';                                       
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                                </tbody>
                            </table>
                        </div>
                        <!--------------------------------------------TOTAL-LINES----------------------------------------------------->
                        <div class="order-summary-section order-summary-section-total-lines payment-line">
                            <table class="total-line-table">
                                <tbody>
                                    <tr class="total-line total-line-subtotal">
                                        <td class="total-line-name">Tạm tính</td>
                                        <td class="total-line-price">
                                            <span class="order-summary-emphasis"><?php echo number_format($total_price, 0, ',', '.').'₫'; ?></span>
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
                                            <span class="payment-due-price"><?php echo number_format($total_price, 0, ',', '.').'₫'; ?></span>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>