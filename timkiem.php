<!doctype html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANG CHỦ</title>
    <!-- <link rel="stylesheet" href="./themify-icons/themify-icons.css"> -->
    <link rel="stylesheet" type="text/css" href="style-css.css"/>
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css" /> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<style>
			/* CSS phân trang */
		/* CSS cho phân trang */
.pagination {
    text-align: center; /* căn giữa các liên kết */
    margin: 20px 0; /* khoảng cách trên và dưới */
}

.pagination a {
    display: inline-block; /* hiển thị liên tiếp nhau */
    margin-right: 5px; /* khoảng cách giữa các liên kết */
    padding: 5px 10px; /* đệm trong */
    border: 1px solid #ddd; /* viền */
    color: black; /* màu chữ */
    text-decoration: none; /* không gạch chân */
}

.pagination a:hover,
.pagination a.active {
    background-color: #337ab7; /* màu nền khi di chuột qua hoặc trang hiện tại */
    color: white; /* màu chữ */
}

		
		.page-link {
			display: inline-block; /* hiển thị liên tiếp nhau */
			margin-right: 5px; /* khoảng cách giữa các link */
			padding: 5px 10px; /* đệm trong */
			border: 1px solid #ddd; /* viền */
			color: black; /* màu chữ */
			text-decoration: none; /* không gạch chân */
		}
		
		.page-link:hover {
			background-color: #f7f7f7; /* màu nền khi di chuột qua */
		}
		
		/* Định dạng cho trang hiện tại */
		.page-link.active {
			background-color: #337ab7; /* màu nền */
			color: white; /* màu chữ */
		}
		
		/* CSS cho bảng sản phẩm */
		table {
			width: 100%; /* chiều rộng bảng */
			border-collapse: collapse; /* loại bỏ khoảng cách giữa các ô */
			margin-bottom: 20px; /* khoảng cách dưới bảng */
		}
		
		th, td {
			border: 1px solid #ddd; /* viền cho ô */
			padding: 8px; /* đệm trong cho ô */
			text-align: left; /* căn trái nội dung ô */
		}
		
		tr:nth-child(even) {
			background-color: #f2f2f2; /* màu nền cho hàng chẵn */
		}
		
		tr:hover {
			background-color: #eaeaea; /* màu nền khi di chuột qua hàng */
		}
		
		img {
			width: auto; /* chiều rộng tự động theo tỉ lệ của hình */
			height: auto; /* chiều cao tự động theo tỉ lệ của hình */
			max-width: 100%; /* giới hạn chiều rộng tối đa của hình */
			max-height: 100px; /* giới hạn chiều cao tối đa của hình */
		}
		
    .flex-container {
    display: flex;
    flex-wrap: wrap;
    }

    .flex-container td {
    flex: 1 0 150px; /* Chỉ định rằng mỗi td không nên nhỏ hơn 150px */
    }
	</style>
</head>
<body>
    <div id="header">
		<div id="header">
			<div id="khungdau">
				<div style="margin-left: 100px; width: 250px;" class="DanhMuc">
				<p><i class="DanhMuc ti-menu-alt"></i>DANH SÁCH</p>
					<ul class="MeNu">
						<li><a href="Áo-Nữ.html">TRANG PHỤC NỮ-ÁO</a></li>
						<li><a href="Đầm-Nữ.html">TRANG PHỤC NỮ-VÁY</a></li>
						
				  </ul>
				</div>
				<div><a href="Sản-phẩm.html" style="text-decoration:none; color:#000;"><p>SẢN PHẨM </p></div>
				<div><a href="../index.html" style="text-decoration:none; color:#000;"><p>TRANG CHỦ</p></a></div>
				<div><a href="Giới-Thiệu.html" style="text-decoration:none; color:#000;"><p>GIỚI THIỆU</p></a></div>
				<div><a href="../Cart/cart.html" style="text-decoration:none; color:#000;"><p>GIỎ HÀNG</p></a></div>
				<div id="TaiKhoan"><p>TÀI KHOẢN</p>
					<ul class="MeNu">
						<li><a href="../Login/Login.html">Đăng Nhập</a></li>
						<li><a href="../Login/register.html">Đăng Ký</a></li>
					</ul>
				</div>
			</div>
    </div>
	
</div>
	
	<div class="header-with-search">
		<div class="header__logo">
		  <img class="header__logo-img" src="image/logo.png"  />
		</div>
		<div class="header__search">
		  <div class="header__search-input-wrap">
          <form method="POST" action="view_sanpham.php">
				<input  type="text"  name="noidung"  class="header__search-input" placeholder="Tìm kiếm sản phẩm"/>
                <button name="btn" class="header__search-btn">
              <link
                href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
                rel="stylesheet"
              />
              <i class="header__search-btn-icon bx bx-search-alt-2 bx-tada"></i>
            </button>
			</form>
			<div class="header__search-history">
			  <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
			  <ul class="header__search-history-list">
				<li class="header__search-history-item">
				  <a href="">đầm trắng</a>
				</li>
				<li class="header__search-history-item">
				  <a href="">đầm xanh</a>
				</li>
				<li class="header__search-history-item">
				  <a href="">đầm vàng</a>
				</li>
			  </ul>
			</div>
		</div>
        
    </div>		
    </div>

	<?php
// Kết nối database và lấy dữ liệu
    include "connect.php";

// Xác định số lượng sản phẩm trên mỗi trang
    $productsPerPage = 4;

// Lấy số trang hiện tại từ URL hoặc mặc định là 1 nếu không có
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Tính số sản phẩm bỏ qua dựa trên trang hiện tại
    $offset = ($page - 1) * $productsPerPage;

// Lấy tổng số sản phẩm
    $result = $conn->query("SELECT COUNT(*) AS total FROM sanpham");
    $row = $result->fetch_assoc();
    $totalProducts = $row['total'];

// Tính tổng số trang
    $totalPages = ceil(($totalProducts / $productsPerPage)-1);

// Lấy sản phẩm cho trang hiện tại
    $stmt = $conn->prepare("SELECT * FROM sanpham LIMIT ? OFFSET ?");
    $stmt->bind_param("ii", $productsPerPage, $offset);
    $stmt->execute();
    $result = $stmt->get_result();
?>
<table>
    <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['thutusp']; ?></td>
            <td><?php echo $row['tensanpham']; ?></td>
            <td><img width="250" height="330" src="image/<?php echo $row['anh']; ?>" alt=""></td>
            <td><?php echo $row['xuatxu']; ?></td>
            <td><?php echo $row['giá']; ?></td>
        </tr>
    <?php endwhile; ?>
</table>

<!-- Hiển thị liên kết đến các trang -->
<div class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
    <?php endfor; ?>
	<a class ="page-link <?php if($page == $i) echo 'active'; ?>" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
</div>


	   
 </body>
</html>
