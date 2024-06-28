<?php $conn = new mysqli('localhost', 'root', '', 'webhangban');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
} //
//Cbi câu lệnh sql
session_start();

$id =  $_SESSION['user_info']['id'];
$q = $_GET['q'];
if ($q == 5) {
    $sql = "SELECT thumbnail, title, color, size, num, order_details.total_money, orders.status, order_date, orders.id
                          FROM user
                          JOIN orders ON user.id = orders.user_id
                          JOIN order_details ON orders.id = order_details.order_id
                          JOIN product ON order_details.product_id = product.id
                        WHERE orders.user_id= $id
        ";
} else $sql = "SELECT thumbnail, title, color, size, num, order_details.total_money, orders.status, order_date, orders.id
                          FROM user
                          JOIN orders ON user.id = orders.user_id
                          JOIN order_details ON orders.id = order_details.order_id
                          JOIN product ON order_details.product_id = product.id
                        WHERE orders.user_id= $id && orders.status= $q";
$result = mysqli_query($conn, $sql);
// Lấy dữ liệu từ nhiều bảng
if (!empty($result) && $result->num_rows > 0) {
    // Kết nối database và lấy dữ liệu
    // Kết nối đến cơ sở dữ liệu
    //
    while ($row = $result->fetch_assoc()) {
        if ($row['status'] == 0) {
            $st = "Đang chờ xác nhận";
            echo
            '
                             <td>
                                    <p>Mã đơn hàng: ' . $row['id'] . ' </p>
                                    <div style="display: grid; margin:0 20px 30px;">
                                        <img src="../' . $row['thumbnail'] . '" style="height: 300px; width: 250px  ;border: 1px solid red;">
                                        <p>' . $row['title'] . '</p>
                                    </div>
    
                                    <div class="ttct">
                                        <p>Màu sắc: ' . $row['color'] . ' </p>
                                        <p>Size: ' . $row['size'] . ' </p>
                                        <p>Số lượng: ' . $row['num'] . '</p>
                                        <p>Thành tiền: ' . $row['total_money'] . '</p>
                                        <p>Trạng thái:
                                            ' . $st . ' 
                                        </p>
                                        <p>Ngày đặt hàng: ' . $row['order_date'] . '</p>
                                        <button class="btn-custom" name="huydon" value="' . $row['id'] . '" onClick="huydon(this)">Hủy đơn hàng </button>
                                    </div>
                            </td>
                                    ';
        }
        if ($row["status"] == 1) {
            $st = "Đang xử lý";
            echo
            '
                             <td>
                                    <p>Mã đơn hàng: ' . $row['id'] . ' </p>
                                    <div style="display: grid; margin:0 20px 30px;">
                                        <img src="../' . $row['thumbnail'] . '" style="height: 300px; width: 250px;  border: 1px solid red;">
                                        <p>' . $row['title'] . '</p>
                                    </div>
                                    <div class="ttct">
                                        <p>Màu sắc: ' . $row['color'] . ' </p>
                                        <p>Size: ' . $row['size'] . ' </p>
                                        <p>Số lượng: ' . $row['num'] . '</p>
                                        <p>Thành tiền: ' . $row['total_money'] . '</p>
                                        <p>Trạng thái:
                                            ' . $st . ' 
                                        </p>
                                        <p>Ngày đặt hàng: ' . $row['order_date'] . '</p>
                                        <button class="btn-custom" name="huydon" value="' . $row['id'] . '" onClick="huydon(this)">Hủy đơn hàng </button>
                                    </div>
                            </td>
                                    ';
        }
        if ($row["status"] == 2) {
            $st = "Đang giao";
            echo
            '
                             <td>
                                    <p>Mã đơn hàng: ' . $row['id'] . ' </p>
                                    <div style="display: grid; margin:0 20px 30px;">
                                        <img src=" ../' . $row['thumbnail'] . '" style="height: 300px; width: 250px;border: 1px solid red;">
                                        <p>' . $row['title'] . '</p>
                                    </div>
    
                                    <div class="ttct">
                                        <p>Màu sắc: ' . $row['color'] . ' </p>
                                        <p>Size: ' . $row['size'] . ' </p>
                                        <p>Số lượng: ' . $row['num'] . '</p>
                                        <p>Thành tiền: ' . $row['total_money'] . '</p>
                                        <p>Trạng thái:
                                            ' . $st . ' 
                                        </p>
                                        <p>Ngày đặt hàng: ' . $row['order_date'] . '</p>
                                       
                                    </div>
                            </td>
                                    ';
        }
        if ($row["status"] == 3) {
            $st = "Đã giao";
            echo
            '
                             <td>
                                    <p>Mã đơn hàng: ' . $row['id'] . ' </p>
                                    <div style="display: grid; margin:0 20px 30px;">
                                        <img src="../' . $row['thumbnail'] . '" style="height: 300px; width: 250px;border: 1px solid red;">
                                        <p>' . $row['title'] . '</p>
                                    </div>
                                    <div class="ttct">
                                        <p>Màu sắc: ' . $row['color'] . ' </p>
                                        <p>Size: ' . $row['size'] . ' </p>
                                        <p>Số lượng: ' . $row['num'] . '</p>
                                        <p>Thành tiền: ' . $row['total_money'] . '</p>
                                        <p>Trạng thái:
                                            ' . $st . ' 
                                        </p>
                                        <p>Ngày đặt hàng: ' . $row['order_date'] . '</p>
                                       
                                    </div>
                            </td>
                                    ';
        }
        if ($row["status"] == 4) {
            $st = "Đã hủy";
            echo
            '
            <td>
                <p>Mã đơn hàng: ' . $row['id'] . ' </p>
                <div style="display: grid; margin:0 20px 30px;">
                    <img src="../' . $row['thumbnail'] . '" style="height: 300px; width: 250px;border: 1px solid red;">
                     <p>' . $row['title'] . '</p>
                 </div>
                <div class="ttct">
                     <p>Màu sắc: ' . $row['color'] . ' </p>
                     <p>Size: ' . $row['size'] . ' </p>
                     <p>Số lượng: ' . $row['num'] . '</p>
                     <p>Thành tiền: ' . $row['total_money'] . '</p>
                     <p>Trạng thái:
                                ' . $st . ' 
                     </p>
                    <p>Ngày đặt hàng: ' . $row['order_date'] . '</p>
                    </div>
            </td>
            ';
        }
    }
}
