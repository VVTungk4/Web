
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.ckeditor.com/4.24.0-lts/standard/ckeditor.js"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/icon.png" type="image/x-icon">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<link  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<style>
	 #btntable {
   
   
            padding: 20px 20px;
            cursor: pointer;
	
        }
	table {
		font-family: Arial;
	}
		.myListbox {
    width: 200px;
    height: 30px;

}

	.dialog {
		display: block;
		width: 600px;
  		height: 50px;
  		min-width: 500px;  			
  		z-index: 10;		
  		border-radius: 10px;
		background-color: rgba(255, 255, 255, 0.5);
			
}
	.dialog button {
		background-color: yellow;
		
		padding: 10px 20px; 
		border: none; 
		border-radius: 5px;
		cursor: pointer;
		text-align: left;
		color: black;
}

	
	</style>
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- Thêm CSS -->
	<link rel="stylesheet" href="style.css">
	<title>Trang Quản Trị</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-joystick bx-spin' ></i>
			<span class="text">Trang Quản Trị</span>
		</a>
		<ul class="side-menu top" style="padding-left: 0px;">
			<li class="active">
				<a href="#tongquan">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Trang Chủ</span>
				</a>
			</li>
			<li>
				<a href="../index.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Cửa Hàng Của Tôi</span>
				</a>
			</li>
			<li id="quanlycheck">
				<a href="#report" >
					<i class='bx bxs-cart-download' ></i>
					<span class="text">Quản Lý Đơn Hàng</span>
				</a>
			</li>
			<li>
				<a href="#Messangers">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Phản Hồi</span>
				</a>
			</li>
			
			<li>
				<a href="#hihi">
					<i class='bx bxs-cog' ></i>
					<span class="text">Quản Lý Sản Phẩm</span>
				</a>
			</li>
			<li>
				<a href="#TaiKhoan">
					<i class='bx bxs-group' ></i>
					<span class="text">Quản Lý Tài Khoản</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu" style="padding-left: 0px;">
			
			<li>
				<a href="../Login/logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Đăng Xuất</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content" >
		
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Tìm Kiếm</a>
			<form action="">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn">
						<i class='bx bx-search' ></i>
						 </button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell bx-tada' ></i>
				<span class="num">
		<?php
			$conn = mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
			mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
			$sql = "SELECT COUNT(*) as sl From orders Where status =0";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
    			while ($row = $result->fetch_assoc()) {
       			$new_orders = $row["sl"];     
  		      	echo "$new_orders";
   			 	}
			} else {
    			echo "0";}
				$conn->close();?></span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main class="main" id ="tongquan">
			<!-- Trang Chủ -->
			<div class="head-title">
				<div class="left">
					<h1>Trang Chủ</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Trang Chủ</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div></div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
			<?php
			$conn = mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
			mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
			$sql = "SELECT COUNT(*) AS total_orders	FROM orders WHERE status = 0";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
    			while ($row = $result->fetch_assoc()) {
       			$total_orders = $row["total_orders"];     
  		      	echo "<h3>$total_orders</h3>";
   			 	}
			} else {
    			echo "Không có dữ liệu.";}
				$conn->close();?>
						<p>Đơn Hàng Mới</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
		<?php
			$conn = mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
			mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
			$sql = "SELECT COUNT(*) AS total_accounts FROM orders GROUP BY fullname=fullname";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
    			while ($row = $result->fetch_assoc()) {
       			$totalAccounts = $row["total_accounts"];     
  		      	echo "<h3>$totalAccounts</h3>";
   			 	}
			} else {
    			echo "0";}
				$conn->close();?>
						<p>Số lượng Khách Hàng</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
		<?php
					$conn = mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
					mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
					$sql = "SELECT SUM(total_money) AS total_revenue FROM orders;";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
	   					$total_revenue = $row["total_revenue"];     
						echo "<h3>$total_revenue</h3>";
					}
					} else {
						echo "Không có dữ liệu.";}
						$conn->close();?>
						<p>Doanh Thu</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Đơn Hàng Gần Đây</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
								<th>Tài Khoản</th>
								<th>Ngày Mua</th>
								<th>Trạng Thái</th>
							</tr>
						</thead>
						<tbody>
						<?php
			// Kết nối cơ sở dữ liệu
			$conn =  mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
			mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
			// Truy vấn lấy dữ liệu
				$sql = "Select * From orders ORDER BY order_date DESC LIMIT 5; ";
				$result = $conn->query($sql);
			// Kiểm tra số lượng bản ghi trả về
				if ($result->num_rows > 0) {
 			// Xuất dữ liệu của mỗi hàng
 			while($row = $result->fetch_assoc()) {
				$status=$row["status"];
				if($status==0){
					$trangthai='status pending';
					$tt='Đang Chờ';
				}
				else if($status==1){
					$trangthai='status process';
					$tt='Đang Xử Lý';
				}
				else if($status==2){
					$trangthai='status ongoing';
					$tt='Đang Giao';
				}
				else if($status==3){
					$trangthai='status completed';
					$tt='Thành Công';;
				}
				else {$trangthai='status error';
					$tt='Đã Hủy';}
				
				echo "<tr><td><img src=\"img/people.png\"><p>" . $row["fullname"] . "</p></td><td>" .
    		 $row["order_date"] . "</td><td><span class=\"$trangthai\">".$tt."</span></td><td>";
			}}
			 else {echo "Chưa Có Đơn Hàng Nào!";}
					$conn->close();
?>		
						</tbody>
					</table>
				</div>



				<div class="banchay">
					<div class="head">
						<h3>Mặt Hàng Bán Chạy</h3>
						<i class='bx bx-plus' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<ul class="banchay-list">
							<?php
			// Kết nối cơ sở dữ liệu
			$conn =  mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
			mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
			// Truy vấn lấy dữ liệu
				$sql = "SELECT p.id, p.title, SUM(od.num) AS total_quantity, SUM(od.total_money) AS total_revenue
				FROM order_details od
				INNER JOIN product p ON od.product_id = p.id
				
				GROUP BY p.id, p.title
				ORDER BY total_revenue DESC, total_quantity DESC
				LIMIT 5;";
				$result = $conn->query($sql);
			// Kiểm tra số lượng bản ghi trả về
				if ($result->num_rows > 0) {
 			// Xuất dữ liệu của mỗi hàng
 			while($row = $result->fetch_assoc()) {
				echo "<li class=\"top1\"\<p>" . $row["id"] .":". $row["title"]. " &nbsp;&nbsp;   " . $row["total_revenue"]."</p></li>";
			}} else {echo "Không Có Mặt Hàng Nào Được Bán!";}
					$conn->close();
?>										
					</ul>
				</div>
			</div>
		</main>
			<!-- Trang Chủ -->

			<!-- Sản Phẩm -->
		<main class="main" id ="hihi">
			<button id="btn" onclick="showSanpham('sanpham1')">Xem Danh Sach Sản Phẩm</button>
			<button id="btn" onclick="showSanpham('sanpham2')">Thêm Sản Phẩm</button>
			<button id="btn" onclick="showSanpham('sanpham3')">Sửa Sản Phẩm</button>
			
			<!-- Các phần nội dung -->
			<div id="sanpham1" class="sanpham">
				
				
					<div class="form-input">
						<input type="search" list ="topics" placeholder="Search..." id ="topicInput">
						<datalist id = "topics">
							<option value ="Cửa Hàng Của Tôi">
							<option value ="Thống Kê Báo Cáo">
							<option value ="Tin Nhắn">
							<option value ="Quản Lý Tài Khoản">
							<option value ="Quản Lý Sản Phẩm">
						</datalist>
						<button type="submit" class="search-btn">
							<i class='bx bx-search' ></i>
							 </button>
					</div>
				
			</div>
			<div id="sanpham2" class="sanpham" style="display:none;">
						
				<div id="productForm">
					<label for="title">Tên Sản Phẩm:</label>
					<input type="text" id="title" name="title" maxlength="250" required><br><br>
				  
					<label for="price"><i class='bx bx-money' ></i></i>Giá:</label>
					<input type="number" id="price" name="price" required><br><br>
				  
					<label for="discount"><i class='bx bxs-discount'></i>Giảm giá (%):</label>
					<input type="number" id="discount" name="discount" min="0" max="100"><br><br>
				  
					<label for="thumbnail"><i class='bx bx-image-add' ></i>URL Ảnh:</label>
					<input type="text" id="thumbnail" name="thumbnail" maxlength="500"><br><br>
				  
					<label for="description"> <i class='bx bxs-comment-detail'></i>Mô tả:</label>
					<textarea id="description" name="description"></textarea><br><br>
				  
					<label for="category_id"><i class='bx bxs-category' ></i>ID Danh mục:</label>
					<input type="number" id="category_id" name="category_id" required><br><br>
				
					<input type="submit" value="Xác Nhận" id="btn1">
				</div>
			</div>
		
			<div id="sanpham3" class="sanpham" style="display:none;">
				<div>
					hhh
				</div>
			</div>	
		</main>
			<!-- Sản Phẩm -->

			<!-- Tin Nhắn -->
		<main id="Messangers" class="main">
			<div class="message-container">
				<div class="message-header">Người gửi: Sơn Sẽ</div>
				<div class="message-content">
				 Thèm bú lùn quá!!!!!
				</div>
				<div class="message-timestamp">09:00 AM</div>
			  </div>
			  <div class="message-container">
				<div class="message-header">Người gửi: Tùng Núi</div>
				<div class="message-content">
				 Chỉ biết ước!!!!!
				</div>
				<div class="message-timestamp">08:30 AM</div>
			  </div>
			  <div class="message-container">
				<div class="message-header">Người gửi: Văn Quán</div>
				<div class="message-content">
					Chào bạn, tôi hy vọng bạn có một ngày tốt lành! Bạn đã nhận được thông tin mới từ dự án chưa?
				</div>
				<div class="message-timestamp">09:00 AM</div>
			  </div>
		</main>
			<!-- Tin Nhắn -->

			<!-- Tai Khoan -->
		<main id="TaiKhoan" class="main">
				<!-- Các nút bấm -->
				<button id="btn" onclick="showContent('content1')">Xem Danh Sách Tài Khoản</button>
				<button id="btn" onclick="showContent('content2')">Thêm Tài Khoản</button>	
				<!-- <button id="btn" onclick="showContent('content3')">Sửa</button>		 -->
				<!-- Các phần nội dung -->
			<div id="content1" class="content">
				<table style="margin-top:50px ;" id="users-tab" class="table table-hover table-striped">
					<thead style="border-bottom: 1px solid var(--dark);" class="table-dark">
						<tr>
							<th width="3%" scope="col">ID</th>
							<th width="15%" scope="col">Họ Tên</th>
							<th width="18%" scope="col">Email</th>
							<th width="10%" scope="col">Số Điện Thoại</th>
							<th width="20%" scope="col">Địa Chỉ</th>
							<th width="8%" scope="col">MK</th>
							<th width="5%" scope="col">RID</th>
							<th width="10%" scope="col">Date</th>
							<th width="10%" scope="col">UDate</th>
							<th width="3%" scope="col">TT</th>
						</tr>
					</thead>
					<tbody>
			<?php
			// Kết nối cơ sở dữ liệu
			$conn =  mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
			mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
			// Truy vấn lấy dữ liệu
				$sql = "Select * From User";
				$result = $conn->query($sql);
			// Kiểm tra số lượng bản ghi trả về
				if ($result->num_rows > 0) {
 			// Xuất dữ liệu của mỗi hàng
 			while($row = $result->fetch_assoc()) {
				echo "<tr class='data-row' style='height: 50px;'><td>" . $row["id"]. "</td><td>" . $row["fullname"]. "</td><td>" . $row["email"]. "</td><td>" . $row["phone_number"]."</td><td>" .  $row["address"]."</td><td>" .  $row["password"]. "</td><td>" . $row["role_id"]."</td><td>" .  $row["created_at"]."</td><td>" .  $row["updated_at"]. "</td><td>" . $row["deleted"]. "</td></tr>";
			}} else {echo "Chưa có Tài Khoản Nào!";}
					$conn->close();?>
					</tbody>
				</table>
			</div>

			<div id="content2" class="content" style="display:none;" >
				<form method="post" action="ThemTaiKhoan.php">
					<div class="user-container">
						<h2 style="font-family:Arial">Thông Tin Người Dùng</h2>
						<div class="form-group">
						  <label for="fullname">Họ và Tên:</label>
						  <input type="text" id="fullname" name="fullname" maxlength="50" required>
						</div>
						<div class="form-group">
						  <label for="email">Email:</label>
						  <input type="email" id="email" name="email" maxlength="150" required>
						</div>

						<div class="form-group">
						  <label for="phone_number">Số Điện Thoại:</label>
						  <input type="text" id="phone_number" name="phone_number" maxlength="20" required>
						</div>		

						<div class="form-group">
						  <label for="address">Địa Chỉ:</label>
						  <input type="text" id="address" name="address" maxlength="200">
						</div>

						<div class="form-group">
						  <label for="password">Mật Khẩu:</label>
						  <input type="password" id="password" name="password" maxlength="32" required>
						</div>
						
						<div class="form-group">
							<label for="role_id">ID Vai Trò:</label>
							<select id="role_id" name="role_id" required>
							<?php 
					$conn = mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
					mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');			  
					$sql = "SELECT id ,name FROM role";			  
					$result = mysqli_query($conn, $sql);
					while($row=$result->fetch_assoc()) {
						echo "<option value='".$row['id']."'>".$row['name']."</option>";
					}
							  ?>
						 	 </select>
						</div> 				
							<button  type="submit" id="btn1" name="themtaikhoan">Xác Nhận</button>					
					</div>	
				</form>			
			</div>
			<div id="content3" class="content" style="display:none;">
				<form method="post" action="CapNhatTaiKhoan.php">
					<div class="user-container">
						<h2>Thông Tin Người Dùng</h2>
						<div class="form-group">
						  <label for="userid">ID:</label>
						  <input type="number" id="userid" name="userid" maxlength="500" required  readonly>
						</div>
						<div class="form-group">
						  <label for="fullname1">Họ và Tên:</label>
						  <input type="text" id="fullname1" name="fullname1" maxlength="50" required >
						</div>
						<div class="form-group">
						  <label for="email1">Email:</label>
						  <input type="email" id="email1" name="email1" maxlength="150" required readonly>
						</div>
						<div class="form-group">
						  <label for="phone_number1">Số Điện Thoại:</label>
						  <input type="text" id="phone_number1" name="phone_number1" maxlength="20" required>
						</div>					
						<div class="form-group">
						  <label for="address1">Địa Chỉ:</label>
						  <input type="text" id="address1" name="address1" maxlength="200" required>
						</div>
						<div class="form-group">
						  <label for="password1">Mật Khẩu:</label>
						  <input type="text" id="password1" name="password1" maxlength="32" required>
						</div>
						
						<div class="form-group">
							<label for="role_id1">ID Vai Trò:</label>
							<select id="role_id1" name="role_id1" required>
							<?php 
					$conn = mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
					mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');			  
					$sql = "SELECT id ,name FROM role";			  
					$result = mysqli_query($conn, $sql);
					while($row=$result->fetch_assoc()) {
						echo "<option value='".$row['id']."'>".$row['name']."</option>";
					}
							  ?>
						  </select>
						</div> 	
						<button  type="submit" id="btn1" name="suataikhoan">Xác Nhận</button>		
					</div>	
				</form>
			</div>	
		</main>
		<!-- Tài Khoản -->

	 	<!-- Đơn Hàng -->
		<main class="main" id="report" > 
				<button id="btn3" onclick="loadlaiform(this)" onclick="showReport('report1')" class="btn btn-outline-danger btn-lg" value="0">Các Đơn Hàng Mới</button>
				<button id="btn3" onclick="loadlaiform(this)" onclick="showReport('report4')" class="btn btn-outline-warning btn-lg" value="1">Chuẩn Bị Đơn Hàng</button>	
				<button id="btn3" onclick="loadlaiform(this)" onclick="showReport('report5')" class="btn btn-outline-success btn-lg" value="2">Vận Chuyển</button>
				<button id="btn3" onclick="loadlaiform(this)" onclick="showReport('report6')" class="btn btn-outline-info btn-lg" value ="3">Đơn Hàng Đã Hoàn Thành</button>
				<button id="btn3" onclick="loadlaiform(this)" onclick="showReport('report7')" class="btn btn-outline-secondary btn-lg" value ="4">Đơn Hàng Đã Hủy</button>		
		<script>
		function loadlaiform(button) {
  			const value = button.value;
   			const xhttp = new XMLHttpRequest();

    	if (value == 0) {
        showReport('report1');
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
    } else if (value == 1) {
        showReport('report4');    
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("txtHint1").innerHTML = this.responseText;
            }
        };
    } else if (value == 2) {
        showReport('report5');
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("txtHint2").innerHTML = this.responseText;
            }
        };
    } else if (value == 3) {
        showReport('report6');
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("txtHint3").innerHTML = this.responseText;
            }
        };
    }
	else if (value == 4) {
		showReport('report7');
		xhttp.onreadystatechange = function() {
			if (this.readyState === 4 && this.status === 200) {
				document.getElementById("txtHint4").innerHTML = this.responseText;
				}
			};
    }
    // Thay đổi URL của "Lammoitrangkhibam-btn3.php" thành đúng đường dẫn của bạn
    xhttp.open("GET", "Lammoitrangkhibam-btn3.php?q=" + value, true);
    xhttp.send();
}

		</script>		
			<div class="report" id="report1" >
			<h2 style="text-align: center;margin-top: 20px ;color:var(--dark)" >CÁC ĐƠN HÀNG MỚI</h2>
				<table class="table table-striped caption-top" style="margin-top:25px ;">
				<caption style="color:red">Các Đơn Hàng Mới Cần Duyệt</caption>
   				 <thead style="border-bottom: 1px solid var(--dark);" class="table-danger">
       				<tr><th width="5%">Mã</th>
            			<th width="15%">Họ Tên</th>
            			<th width="10%">Số Điện Thoại</th>
           		 		<th width="20%">Địa Chỉ</th>
            			<th width="10%">Ngày Đặt</th>
            			<th width="6%">Xem chi tiết</th>
            			<th width="6%">Chỉnh sửa</th>
            			<th width="4%">Duyệt</th>
            			<th width="4%">Xóa</th>
        			</tr>
   				 </thead>	
				<tbody id="txtHint">
		
	<?php
	
			// Kết nối cơ sở dữ liệu
			$conn =  mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
			mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
			// Truy vấn lấy dữ liệu
				$sql = "Select * From orders Where status = 0";
				$result = $conn->query($sql);
			// Kiểm tra số lượng bản ghi trả về
				if ($result->num_rows > 0) {
 			// Xuất dữ liệu của mỗi hàng
			 
 			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" .
				$row["id"]. "</td><td>" .
				$row["fullname"]. "</td><td>" . 
				$row["phone_number"]."</td><td>" . 
				$row["address"]."</td><td>" .  
				$row["order_date"]."</td>
				<td ><button onclick='showchitiet(this)' id='btntable' class='btn btn-outline-danger'><i class='bx bx-low-vision'></i></button></td> 
				<td><button onclick='suadonhang(this)' id='btntable' class='btn btn-outline-danger'><i class='bx bxs-pencil' style='color:#1cce55'  ></i></button></td>
				<td><button onclick='xacnhansanpham(this)' id='btntable' class='btn btn-outline-danger'><i class='bx bx-check' style='color:#189ad5'  ></i></button></td>
				<td><button onclick='deleteRow(this)' id='btntable' class='btn btn-outline-danger'><i class='bx bx-trash' style='color:#c63737'  ></i></button></td></tr>";
			}} 
					$conn->close();?>
      
  		  		</tbody> 
			</table>
		</div>
<script>
	//hủy đơn
        function deleteRow(button) {
            const row = button.parentNode.parentNode;
            const firstCellContent = row.cells[0].textContent; // Lấy nội dung ô đầu tiên
            console.log("Nội dung ô đầu tiên:", firstCellContent);
			var xhttp;    
  				xhttp = new XMLHttpRequest();
  				xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
					console.log('Yêu cầu đã gửi thành công');
					document.getElementById("txtHint").innerHTML = this.responseText;
					alert("Đã hủy đơn hàng");
   			 }
  			};
  				xhttp.open("GET", "Huydon-Donghangmoi.php?q="+Number(firstCellContent), true);
  				xhttp.send();
			}
        
//xác nhận đơn
			function xacnhansanpham(button) {
				const row = button.parentNode.parentNode;
            	const firstCellContent = row.cells[0].textContent;
  				var xhttp;    
  				xhttp = new XMLHttpRequest();
  				xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
					console.log('Yêu cầu đã gửi thành công');
					alert("Đã xác nhận đơn hàng");
					document.getElementById("txtHint").innerHTML = this.responseText;
   			 }
  			};
  				xhttp.open("GET", "Xacnhan-Donhangmoi.php?q="+Number(firstCellContent), true);
  				xhttp.send();
			}

//xem chi tiết sản phẩm			
			function showchitiet(button) {
				const row = button.parentNode.parentNode;
            	const firstCellContent = row.cells[0].textContent;
  				var xhttp;    
  				xhttp = new XMLHttpRequest();
  				xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
					console.log('Yêu cầu đã gửi thành công');
					document.getElementById("chitietdon").innerHTML = this.responseText;
   			 }
  			};
  				xhttp.open("GET", "Xemdonhangchitiet.php?q="+Number(firstCellContent), true);
  				xhttp.send();
				document.getElementById('btntable').onclick=showReport('report2');
				
			}
//sua đơn hàng			
			function suadonhang(button) {
				const row = button.parentNode.parentNode;
            	const firstCellContent = row.cells[0].textContent;
  				var xhttp;    
  				xhttp = new XMLHttpRequest();
  				xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
					console.log('Yêu cầu đã gửi thành công');
					document.getElementById("suadonhang").innerHTML = this.responseText;
   			 }
  			};
  				xhttp.open("GET", "chinhsuadonhang.php?q="+Number(firstCellContent), true);
  				xhttp.send();
				document.getElementById('btntable').onclick=showReport('report3');
				
			}
			
    </script>
			 
<!-- Bảng chi tiết đơn hàng -->
			<div class="report" id="report2" style="display:none">
			<h3 style="text-align: center;margin-top: 20px;" >CHI TIẾT ĐƠN</h3>
			  <table class="table table-sm caption-top" style="margin-top:25px ;">
			  <caption style="color:var(--dark)">Bảng Hóa Đơn Chi Tiết</caption>
   				 <thead style="border-bottom: 1px solid var(--dark);" class="table-danger">
       				<tr"><th width="5%">STT</th>
            			<th width="10%">Mã Sản Phẩm</th>
            			<th width="15%">Tên Sản Phẩm</th>
						<th width="9%">Màu Sắc</th>
						<th width="9%">Size</th>
           		 		<th width="10%">Số Lượng</th>
            			<th width="20%">Tổng Tiền</th>
						       			
        			</tr>
   				 </thead>
    			<tbody id="chitietdon">
		   <!-- fill từ Xemdonhangchitiet.php -->
  		  		</tbody>
			</table>
			  </div>

<!-- Bảng Chỉnh sửa Đơn Hàng -->
	<div class="report" id="report3" style="display:none">
	<h2 style="text-align: center;margin-top: 20px;color:var(--dark)" >THAY ĐỔI ĐƠN HÀNG</h2>
			<table class="table table-striped" style="margin-top:25px ;">
			  	<thead style="border-bottom: 1px solid var(--dark);" class="table-danger">
       				<tr"><th width="5%">STT</th>
            			<th width="10%">Mã Sản Phẩm</th>
            			<th width="10%">Tên Sản Phẩm</th>
						<th width="10%">Màu Sắc</th>
						<th width="10%">Size</th>
           		 		<th width="20%">Số Lượng</th>
						<th width="4%">Xóa</th>          			
        			</tr>
   				</thead>
        			<tbody id="suadonhang">
<!-- fill từ chỉnh sửa đơn hàng -->
       				 </tbody>
			</table>
<!-- kiểm tra input số lượng -->
<script>
    function validateInput(input) {
        const value = parseInt(input.value);
        const inputElement = input.getAttribute("max"); // Sử dụng getAttribute để lấy giá trị thuộc tính max
        const errorText = input.nextElementSibling; // Lấy phần tử kế tiếp (p) để hiển thị thông báo lỗi
		 if (value > inputElement) {
			input.value = inputElement;
            errorText.textContent = "Nhập quá số lượng trong kho";
			if(input.value==inputElement){
				errorText.textContent = "";
			}
        }
    }
</script>

<!-- listbox lấy ra danh sách đồ còn hàng để thêm vào đơn -->
<h3 style="font:Arial">Thêm sản phẩm vào giỏ</h3>
<select classs="myListbox" id="myListbox" onchange="themvaodon()">
<?php 
include('timkiem.php');
?>
</select>

<!-- button thêm đồ hàng vào đơn hàng -->
<div id="banghanghoaconlai"></div>
<script>
			function themsanphamvaodonhang(button) {
				const row = button.parentNode.parentNode;
            	const idsanpham = row.cells[1].textContent;
				const mausanpham = row.cells[3].textContent;
				const sizesanpham = row.cells[4].textContent;
				const input = row.querySelector('.toimuonsonay');
           		const soluong = 1;
				const toimuoncainay=document.getElementById("toimuoncainay");
				const dayroi =toimuoncainay.className;
  				var xhttp;    
  				xhttp = new XMLHttpRequest();
  				xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
					console.log('Yêu cầu đã gửi thành công');
					document.getElementById("suadonhang").innerHTML = this.responseText;
   			 }
  			};
  				xhttp.open("GET", "Themsanpham-SuaDonHang.php?idsanpham="+Number(idsanpham)+"&mausanpham=" + mausanpham + "&sizesanpham=" + sizesanpham + "&iddonhang=" + Number(dayroi)+"&soluong=" + Number(soluong), true);
  				xhttp.send();
			}
			function xoasanphamkhoidonhang(button) {
				const row = button.parentNode.parentNode;
            	const idsanpham = row.cells[1].textContent;
				const mausanpham = row.cells[3].textContent;
				const sizesanpham = row.cells[4].textContent;
				const toimuoncainay=document.getElementById("toimuoncainay");
				const dayroi =toimuoncainay.className;
  				var xhttp;    
  				xhttp = new XMLHttpRequest();
  				xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
					console.log('Yêu cầu đã gửi thành công');
					alert("Đã xóa sản phẩm");
					document.getElementById("suadonhang").innerHTML = this.responseText;
   			 }
  			};
  				xhttp.open("GET", "Xoasanpham-SuaDonHang.php?idsanpham="+Number(idsanpham)+"&mausanpham=" + mausanpham + "&sizesanpham=" + sizesanpham + "&iddonhang=" + Number(dayroi), true);
  				xhttp.send();
			}
			
			function themvaodon() {
				const selectElement = document.getElementById("myListbox");
   				 const selectedValue = selectElement.value;
  				var xhttp;    
  				xhttp = new XMLHttpRequest();
  				xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
					console.log('Yêu cầu thêm đã gửi thành công');
					document.getElementById("banghanghoaconlai").innerHTML = this.responseText;	
   			 }
  			};
  				xhttp.open("GET", "ThemVaoLISTBOX.php?s="+selectedValue, true);

  				xhttp.send();
			}
</script>
<script>
	 function sendData(rowId) {
		var data = {
  				'iddonhang':Number(productId),
				'productID':productID,
				'productSize':productSize,
				'productColor':productColor,
				'productQuantity':productQuantity,
				
};
				const xhr = new XMLHttpRequest();
				
                xhr.open("POST", "Capnhatchinhsuadonhang.php", true);
				xhr.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
				xhr.onreadystatechange = function() {
   				if (xhr.readyState === 4 && xhr.status === 200) {
        // Yêu cầu đã gửi thành công
       			console.log('Yêu cầu đã gửi thành công');
			
				 window.location.href = 'Capnhatchinhsuadonhang.php';
    }
};
                xhr.send(JSON.stringify(data));
				
			}

</script>
			  </div>

<!-- Bảng chuẩn bị đơn hàng -->

	<div class="report" id="report4" style="display:none;">
	<h2 style="text-align: center;margin-top: 20px;color:var(--dark)" >CHUẨN BỊ HÀNG</h2>
				<table class="table table-striped caption-top" style="margin-top:25px ;">
				<caption style="color:var(--dark)">Bảng Chuẩn Bị Đơn Hàng</caption>
   				 <thead style="border-bottom: 1px solid var(--dark);" class="table-warning">
       				<tr><th width="5%">Mã</th>
            			<th width="15%">Họ Tên</th>
            			<th width="10%">Số Điện Thoại</th>
           		 		<th width="20%">Địa Chỉ</th>
            			<th width="10%">Ngày Đặt</th>
            			<th width="6%">Xem chi tiết</th>
						<th width="8%">Đã Xong</th>
        			</tr>
		<script>
		function chuyensanggiaohang(button) {
				const row = button.parentNode.parentNode;
            	const firstCellContent = row.cells[0].textContent;
  				var xhttp;    
  				xhttp = new XMLHttpRequest();
  				xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
					console.log('Yêu cầu đã gửi thành công');
					alert("Đã Xong Và Chuyển Cho Bên Giao Hàng");
					document.getElementById("txtHint1").innerHTML = this.responseText;
   			 }
  			};
  				xhttp.open("GET", "Chuanbidon-Chuyenquagiaohang.php?q="+Number(firstCellContent), true);
  				xhttp.send();
			}
		</script>
   				 </thead>	
				<tbody id="txtHint1">
		
	<?php
	
			// Kết nối cơ sở dữ liệu
			$conn =  mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
			mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
			// Truy vấn lấy dữ liệu
				$sql = "Select * From orders Where status = 1";
				$result = $conn->query($sql);
			// Kiểm tra số lượng bản ghi trả về
				if ($result->num_rows > 0) {
 			// Xuất dữ liệu của mỗi hàng
 			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" .
				$row["id"]. "</td><td>" .
				$row["fullname"]. "</td><td>" . 
				$row["phone_number"]."</td><td>" . 
				$row["address"]."</td><td>" .  
				$row["order_date"]."</td>
				<td ><button onclick='showchitiet(this)' id='btntable' class='btn btn-outline-warning'><i class='bx bx-low-vision'></i></button></td>
				<td><button onclick='chuyensanggiaohang(this)' id='btntable' class='btn btn-outline-warning'><i class='bx bx-check' style='color:#189ad5'  ></i></button></td></tr>";
			}}
					$conn->close();?>
      
  		  		</tbody> 
			</table>
		</div>

<!-- Bảng Giao Hàng -->
		<div class="report" id="report5" style="display:none;">
		<h2 style="text-align: center;margin-top: 20px;color:var(--dark)" >ĐANG VẬN CHUYỂN</h2>
				<table class="table table-striped caption-top" style="margin-top:25px ;">
				<caption style="color:var(--dark)">Các Đơn Hàng Đang Giao</caption>
   				 <thead style="border-bottom: 1px solid var(--dark);" class="table-success">
       				<tr><th width="5%">Mã</th>
            			<th width="15%">Họ Tên</th>
            			<th width="10%">Số Điện Thoại</th>
           		 		<th width="20%">Địa Chỉ</th>
            			<th width="10%">Ngày Đặt</th>
            			<th width="6%">Xem chi tiết</th>
						<th width="8%">Đã Xong</th>
        			</tr>
		<script>
		function Thanhcong(button) {
				const row = button.parentNode.parentNode;
            	const firstCellContent = row.cells[0].textContent;
  				var xhttp;    
  				xhttp = new XMLHttpRequest();
  				xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
					console.log('Yêu cầu đã gửi thành công');
					alert("Chúc Mừng Đơn Hàng Đã Hoàn Tất !");
					document.getElementById("txtHint2").innerHTML = this.responseText;
   			 }
  			};
  				xhttp.open("GET", "Vanchuyen-Donhangthanhcong.php?q="+Number(firstCellContent), true);
  				xhttp.send();
			}
		</script>
   				 </thead>	
				<tbody id="txtHint2">
		
	<?php
	
			// Kết nối cơ sở dữ liệu
			$conn =  mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
			mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
			// Truy vấn lấy dữ liệu
				$sql = "Select * From orders Where status = 2";
				$result = $conn->query($sql);
			// Kiểm tra số lượng bản ghi trả về
				if ($result->num_rows > 0) {
 			// Xuất dữ liệu của mỗi hàng
 			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" .
				$row["id"]. "</td><td>" .
				$row["fullname"]. "</td><td>" . 
				$row["phone_number"]."</td><td>" . 
				$row["address"]."</td><td>" .  
				$row["order_date"]."</td>
				<td ><button onclick='showchitiet(this)' id='btntable' class='btn btn-outline-success'><i class='bx bx-low-vision'></i></button></td>
				<td><button onclick='Thanhcong(this)' id='btntable' class='btn btn-outline-success'><i class='bx bx-check' style='color:#189ad5'  ></i></button></td></tr>";
			}}
					$conn->close();?>
      
  		  		</tbody> 
			</table>
		</div>
<!-- Bảng Đơn Hàng Thành Công-->
<div class="report" id="report6" style="display:none;">
	<h2 style="text-align: center;margin-top: 20px;color:var(--dark)" >CÁC ĐƠN HÀNG THÀNH CÔNG</h2>
				<table class="table table-striped caption-top" style="margin-top:25px ;">
				<caption style="color:var(--dark)">Các Đơn Hàng Thành Công</caption>
   				 <thead style="border-bottom: 1px solid var(--dark);" class="table-info">
       				<tr><th width="5%">Mã</th>
            			<th width="15%">Họ Tên</th>
            			<th width="10%">Số Điện Thoại</th>
           		 		<th width="20%">Địa Chỉ</th>
            			<th width="10%">Ngày Đặt</th>
            			<th width="6%">Xem chi tiết</th>
						<th width="8%">In Hóa Đơn</th>
        			</tr>
		<script>
		function Inhoadon(button) {
				const row = button.parentNode.parentNode;
            	const firstCellContent = row.cells[0].textContent;
  				var xhttp;    
  				xhttp = new XMLHttpRequest();
  				xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
					console.log('Yêu cầu đã gửi thành công');
   			 }
  			};
  				xhttp.open("GET", "Inhoadon.php?q="+Number(firstCellContent), true);
  				xhttp.send();
			}
		</script>
   				 </thead>	
				<tbody id="txtHint3">
		
	<?php
	
			// Kết nối cơ sở dữ liệu
			$conn =  mysqli_connect('localhost', 'root', '') or die("Lỗi kết nối");
			mysqli_select_db($conn, 'webhangban') or die('Not find DataBase');
			// Truy vấn lấy dữ liệu
				$sql = "Select * From orders Where status = 3";
				$result = $conn->query($sql);
			// Kiểm tra số lượng bản ghi trả về
				if ($result->num_rows > 0) {
 			// Xuất dữ liệu của mỗi hàng
 			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" .
				$row["id"]. "</td><td>" .
				$row["fullname"]. "</td><td>" . 
				$row["phone_number"]."</td><td>" . 
				$row["address"]."</td><td>" .  
				$row["order_date"]."</td>
				<td ><button onclick='showchitiet(this)' id='btntable' class='btn btn-outline-info'><i class='bx bx-low-vision'></i></button></td>
				<td><button onclick='Inhoadon(this)' id='btntable' class='btn btn-outline-info'><i class='bx bx-check' style='color:#189ad5'  ></i></button></td></tr>";
			}}
					$conn->close();?>
      
  		  		</tbody> 
			</table>
		</div>
		</main>
		<!-- Đơn Hàng -->
	</section>
	<!-- CONTENT -->
	
	

	<script src="script.js"></script>
	<script src ="http://code.jquery.com/jquery-3.6.0.js"></script>
	
	<script>
		$(document).ready(function(){
		$('.main').hide();
		$('#tongquan.main').fadeIn();
		$('.side-menu.top li').click(function(){
			id_tab =$(this).children('a').attr('href');
		//alert(id_tab);
		$('.main').hide();
		$(id_tab).fadeIn();
			return false;
		})
})
	</script>	

		<!-- Sự kiện khi click vào hàng -->
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			<?php 
			include('xoahetyeuthuong.php');
				?>
  		var rows = document.querySelectorAll('#users-tab .data-row');
		
  		var dialog = document.getElementById('dialog');
  		var editBtn = document.getElementById('edit_btn');
  		var deleteBtn = document.getElementById('delete-btn');
  		var cancelBtn = document.getElementById('cancel-btn');
		

  		rows.forEach(function(row) {
    		row.addEventListener('click', function(event) {
      			rows.forEach(function(r) { r.style.backgroundColor = ''; }); // Xóa nổi bật trên các hàng khác
      			this.style.backgroundColor = 'var(--blue)'; // Màu nền cho hàng được chọn
//nút sửa (khi click vào thì hiện thông tin hàng đc chọn và chuyển hướng khi bấm vào sửa)
      			var userId = this.firstChild.textContent;
     			var rect = this.getBoundingClientRect();
      			dialog.style.position = 'absolute';
      			dialog.style.width = rect.width + 'px'; // Chiều rộng của dialog bằng với hàng
      			dialog.style.height = rect.height + 'px'; // Chiều cao của dialog bằng với hàng
      			dialog.style.top = rect.top + window.scrollY + 'px'; // Đặt vị trí top dựa trên hàng
      			dialog.style.left = rect.left + window.scrollX + 'px'; // Đặt vị trí left dựa trên hàng
      			dialog.style.display = 'block';
	  			const fullname = document.getElementById('fullname1');
   				const email = document.getElementById('email1');
				const phone_number = document.getElementById('phone_number1');
    			const address = document.getElementById('address1');
				const password = document.getElementById('password1');
				const role_id = document.getElementById('role_id1');
				const id = document.getElementById('userid');
				fullname.value = row.cells[1].textContent; // Lấy giá trị từ cột Họ Tên
           		email.value = row.cells[2].textContent; // Lấy giá trị từ cột Email
				phone_number.value = row.cells[3].textContent;
				address.value = row.cells[4].textContent;
				password.value = row.cells[5].textContent;
				role_id.value = row.cells[6].textContent;
				id.value =row.cells[0].textContent;
//nút hủy			
      			cancelBtn.onclick = function() {
       		 	dialog.style.display = 'none';
        		row.style.backgroundColor = ''; // Xóa nổi bật khi hủy
      		};
   		});
  	});
});

// Đoạn mã này giúp đóng dialog khi click ngoài khu vực của nó
		window.addEventListener('mousemove', function(event) {
 		var dialogRect = dialog.getBoundingClientRect();
// Kiểm tra xem chuột có nằm ngoài phạm vi của dialog cộng thêm 5px không
 		if (event.clientX < dialogRect.left - 5 || event.clientX > dialogRect.right + 5 ||
      	event.clientY < dialogRect.top - 5 || event.clientY > dialogRect.bottom + 5) {
// Nếu có, ẩn dialog
    	dialog.style.display = 'none';
		row.style.backgroundColor = '';
 	}
});
	</script>
	<!-- Sự kiện khi click vào hàng -->
	<script>
		function showReport(report) {
    // Ẩn tất cả các phần nội dung
    var baocao = document.getElementsByClassName('report');
    for (var i = 0; i < baocao.length; i++) {
        baocao[i].style.display = 'none';
    }
    document.getElementById(report).style.display = 'block';
}
	</script>

	
	<!-- Hộp thoại -->
	<div id="dialog" class="dialog" >
  			<button id="edit_btn" onclick="showContent('content3')">Sửa</button>
			<button id="delete-btn">Xóa</button>
 			<button id="cancel-btn">Hủy bỏ</button>
	</div>
	<!-- Hộp thoại -->
</body>
</html>