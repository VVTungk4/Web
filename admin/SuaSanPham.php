<?php
    $conn = mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");

    mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');

        $id=$_GET['q'];

        $sanpham ="SELECT * From product Where id=$id";
        $result = mysqli_query($conn, $sanpham);
        $row = mysqli_fetch_array($result);
        $name = $row['title'];
        $price = $row['price'];
        $discount=$row['discount'];
        $image = $row['thumbnail'];
        $description = $row['description'];

      

    echo '<form method="POST" action="CapNhatSuaSanPham.php" enctype="multipart/form-data">			
        <div id="productForm">
            <label for="masp">Mã Sản Phẩm:</label>
            <input type="text" id="masp" name="masp" value="'.$id.'" style="width:50px"><br>
            <img src="../'.$image.'" style="height:200px;width:150px">
            <label for="title">Tên Sản Phẩm:</label>
            <input type="text" id="title" name="title" maxlength="250" value="'.$name.'" required><br><br>	
            <label for="price"><i class="bx bx-money" ></i></i>Giá:</label>
            <input type="number" id="price" name="price" value="'.$price.'" required><br><br>
          
            <label for="discount"><i class="bx bxs-discount"></i>Giảm giá (%):</label>
            <input type="number" id="discount" name="discount" value="'.$discount.'" min="0" max="100"><br><br>
                                     
            <input type="file" id="image" name="image" >
            
          
            <label for="description"><i class="bx bxs-comment-detail"></i>Mô tả:</label>
            <textarea id="description" name="description">'.$description.'</textarea>
            <label for="trangthai"><i class="bx bxs-status"></i>Trạng Thái</label>
            <select name="trangthai" id="trangthai" required>
            <option value="0">Còn hàng</option>
            <option value="2">Ngừng Bán</option>
            </select><br><br>
    
                     
            <input type="submit" value="Cập Nhật" name="capnhatsanpham" id="btn1">
        </div>
</form>';
        
            ?>