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
				<a href="#" class="logout">
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
						<h3>823</h3>
						<p>Đơn Hàng Mới</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>362</h3>
						<p>Số lượng Khách Hàng</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>$1 tỷ gói mè</h3>
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
							<tr>
								<td>
									<img src="img/people.png">
									<p>Sơn sẽ</p>
								</td>
								<td>09-06-2024</td>
								<td><span class="status completed">Thành Công</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>Đức cớp</p>
								</td>
								<td>08-06-2024</td>
								<td><span class="status pending">Đang chờ</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>Dũng Đìn</p>
								</td>
								<td>08-06-2024</td>
								<td><span class="status process">Đang giao</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>Tăng Tún</p>
								</td>
								<td>01-06-2024</td>
								<td><span class="status pending">Đang chờ</span></td>
							</tr>
							<tr>
								<td>
									<img src="img/people.png">
									<p>Vũ Tùn</p>
								</td>
								<td>01-06-2024</td>
								<td><span class="status completed">Thành công</span></td>
							</tr>
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
						<li class="top1">
							<p>Liệt kê top 1 ra đây</p>							
						</li>
						<li class="top2">
							<p>Liệt kê top 1 ra đây</p>							
						</li>
						<li class="top2">
							<p>Liệt kê top 1 ra đây</p>							
						</li>
						<li class="top3">
							<p>Liệt kê top 1 ra đây</p>							
						</li>
						<li class="top3">
							<p>Liệt kê top 1 ra đây</p>						
						</li>
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
				<button id="btn" onclick="showContent('content3')">Sửa Tài Khoản</button>
				<button id="btn" onclick="showContent('content4')">Xóa Tài Khoản</button>

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
			<form method="post" action="Capnhattk.php">
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
  var editBtn = document.getElementById('edit-btn');
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

      cancelBtn.onclick = function() {
        dialog.style.display = 'none';
        row.style.backgroundColor = ''; // Xóa nổi bật khi hủy
      };
    });
  });
});

// Đoạn mã này giúp đóng dialog khi click ngoài khu vực của nó
window.addEventListener('click', function(event) {
  if (dialog.style.display === 'block') {
    var dialogRect = dialog.getBoundingClientRect();
    if (!(event.clientX >= dialogRect.left && event.clientX <= dialogRect.right &&
          event.clientY >= dialogRect.top && event.clientY <= dialogRect.bottom)) {
      dialog.style.display = 'none';
      row.style.backgroundColor = ''; // Xóa nổi bật trên tất cả các hàng
    }
  }
});
	</script>
	<!-- Hộp thoại -->
<div id="dialog" class="dialog">
  <button id="edit-btn">Sửa</button>
  <button id="delete-btn">Xóa</button>
  <button id="cancel-btn">Hủy bỏ</button>
</div>
</body>
</html>