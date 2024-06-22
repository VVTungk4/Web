<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/icon.png" type="image/x-icon">
	
	<style>
	.dialog {
		display: none;
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
	<i class='bx bxs-joystick bx-spin' ></i>
	<title>Trang Quản Trị</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-joystick bx-spin' ></i>
			<span class="text">Trang Quản Trị</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#tongquan">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Trang Chủ</span>
				</a>
			</li>
			<li>
				<a href="../index.html">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Cửa Hàng Của Tôi</span>
				</a>
			</li>
			<li>
				<a href="#report">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Thống Kê Báo Cáo</span>
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
		<ul class="side-menu">
			
			<li>
				<a href="../Login/Login.php" class="logout">
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
		<nav style="overflow:hidden">
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Tìm Kiếm</a>
			<form action="">
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
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell bx-tada' ></i>
				<span class="num">0</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main class="main" id ="tongquan">
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
			$sql = "SELECT COUNT(*) AS total_accounts FROM user WHERE role_id = 2";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
    			while ($row = $result->fetch_assoc()) {
       			$totalAccounts = $row["total_accounts"];     
  		      	echo "<h3>$totalAccounts</h3>";
   			 	}
			} else {
    			echo "Không có dữ liệu.";}
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
					$tt='Đang Giao';
				}
				else{$trangthai='status completed';
					$tt='Thành Công';}
				
				echo "<tr><td><img src=\"img/people.png\"><p>" . $row["fullname"] . "</p></td><td>" .
    		 $row["order_date"] . "</td><td><span class=\"$trangthai\">".$tt."</span></td><td>";
			}}
			 else {echo "0 results";}
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
				echo "<li class=\"top1\"\<p>" . $row["p.id"] .":". $row["p.title"]. "    " . $row["od.total_money"]."</p></li>";
			}} else {echo "0 results";}
					$conn->close();
?>										
					</ul>
				</div>
			</div>
		</main>



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
		
			  <script>
			  	$(document).ready(function() {
  				// Vô hiệu hóa tất cả các trường input trong container có id 'hihi'
 				$('#hihi .product-management-container input').prop('disabled', true);
				// Khi nút "Thêm Sản Phẩm" được nhấn, bỏ vô hiệu hóa các trường input
  				$('#hihi .product-management-container button[type="submit"]').click(function(e) {
    			e.preventDefault(); // Ngăn không cho form nộp ngay lập tức
    			$('#hihi .product-management-container input').prop('disabled', false);
 		 	});
		});
			  </script>
		
		</main>

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

		<main id="TaiKhoan" class="main">
			<!-- Các nút bấm -->
				<button id="btn" onclick="showContent('content1')">Xem Danh Sách Tài Khoản</button>
				<button id="btn" onclick="showContent('content2')">Thêm Tài Khoản</button>	
				<button id="btn" onclick="showContent('content3')">Sửa</button>		
	<!-- Các phần nội dung -->
			<div id="content1" class="content">
				<table id="users-table">
					<thead>
						<tr>
							<th width="1%">ID</th>
							<th width="15%">Họ Tên</th>
							<th width="18%">Email</th>
							<th width="10%">Số Điện Thoại</th>
							<th width="20%">Địa Chỉ</th>
							<th width="10%">Mật Khẩu</th>
							<th width="7%">ID Vai Trò</th>
							<th width="5%">Ngày Tạo</th>
							<th width="5%">Ngày Cập Nhật</th>
							<th width="5%">TT</th>
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
				echo "<tr class='data-row' ><td>" . $row["id"]. "</td><td>" . $row["fullname"]. "</td><td>" . $row["email"]. "</td><td>" . $row["phone_number"]."</td><td>" .  $row["address"]."</td><td>" .  $row["password"]. "</td><td>" . $row["role_id"]."</td><td>" .  $row["created_at"]."</td><td>" .  $row["updated_at"]. "</td><td>" . $row["deleted"]. "</td></tr>";
			}} else {echo "0 results";}
					$conn->close();
?>

					</tbody>
				</table>
		</div>

			<div id="content2" class="content" style="display:none;" >
				<form method="post" action="Taikhoan.php">
					<div class="user-container">
						<h2>Thông Tin Người Dùng</h2>
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
							  <option value="1">Admin</option>
							  <option value="2">Nhân Viên</option>
							  <option value="3">Khách Hàng</option>
						  </select>
						  </div> 	
						
						<button  type="submit" id="btn1" name="themtaikhoan">Xác Nhận</button>
						
					  </div>	
				</form>
    			
	</div>
			<div id="content3" class="content" style="display:none;">
			<form method="post" action="update.php">
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
							  <option value="1">Admin</option>
							  <option value="2">Khách Hàng</option>
							  <option value="3">Nhân Viên</option>
						  </select>
						  </div> 	
						
						<button  type="submit" id="btn1" name="suataikhoan">Xác Nhận</button>
						
					  </div>	
				</form>
	</div>
			<div id="content4" class="content" style="display:none;">
    			<p>Thông tin cho Nút 4</p>
	</div>

			
		</main>
	 	<!-- MAIN -->
		<main class="main" id="report"> 
			<div class="report-container">
				<h2>Báo Cáo Thống Kê Sản Phẩm</h2>
				<table id="bangbaocao">
				  <tr>
					<th width="23%">ID Sản Phẩm</th>
					<th width="29%">Tên Sản Phẩm</th>
					<th width="27%">Số Lượng Bán</th>
					<th width="21%">Doanh Thu</th>
				  </tr>
				  <!-- Dữ liệu sản phẩm sẽ được thêm vào đây -->
				</table>
			  </div>
		</main>
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


	<script>
		document.addEventListener('DOMContentLoaded', function() {
  var rows = document.querySelectorAll('#users-table .data-row');
  var dialog = document.getElementById('dialog');
  var editBtn = document.getElementById('edit_btn');
  var deleteBtn = document.getElementById('delete-btn');
  var cancelBtn = document.getElementById('cancel-btn');

  rows.forEach(function(row) {
    row.addEventListener('click', function(event) {
      // Làm nổi bật hàng được chọn
      rows.forEach(function(r) { r.style.backgroundColor = ''; }); // Xóa nổi bật trên các hàng khác
      this.style.backgroundColor = 'var(--blue)'; // Màu nền cho hàng được chọn

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
	<!-- Hộp thoại -->
<div id="dialog" class="dialog">
  <button id="edit_btn"  id="btn" onclick="showContent('content3')">Sửa</button>
  <button id="delete-btn">Xóa</button>
  <button id="cancel-btn">Hủy bỏ</button>
</div>
</body>
</html>