<?php
    $conn = mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");

    mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');

        $id=$_GET['q'];

        $sanpham ="SELECT * From product Where id=$id";
        $result = mysqli_query($conn, $sanpham);
        $row = mysqli_fetch_array($result);
        $name = $row['title'];
        $image=$row['thumbnail'];
      

    echo '<form method="POST" action="NhaphangSanPham.php" enctype="multipart/form-data">			
        <div id="productForm">
            <label for="masp">Mã Sản Phẩm:</label>
            <input type="text" id="masp" name="masp1" value="'.$id.'" style="width:50px" readonly><br>
            <img src="../'.$image.'" style="height:200px;width:150px">
            <label for="title">Tên Sản Phẩm:</label>
            <input type="text" id="title" name="title" maxlength="250" value="'.$name.'" readonly><br><br> <label for="soluong"><i class="bx bxs-control" ></i>Số lượng:</label>';	
           
					$sql = "SELECT c.id as cid,s.id as sid,c.name as cname,s.name as sname	FROM colors c ,sizes s ";
					$result = $conn->query($sql);
					$stt=0;
					echo "<div style='display:flex;'>";
					while($row=$result->fetch_assoc()) {
					echo "<div style='width:100px'>".$row['cname']."-".$row['sname']."<input type='number' name='".$row['cname']."-".$row['sname']."' min=0 style='width:80px' value='0' required></div>";
					$stt++;
					}
					echo "</div>";                                
                    
        echo ' <input type="submit" value="Nhập Hàng" name="nhaphang" id="btn1">
        </div>
</form>';
        
            ?>