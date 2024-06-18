const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})




if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})
//show content
function showContent(contentId) {
    // Ẩn tất cả các phần nội dung
    var contents = document.getElementsByClassName('content');
    for (var i = 0; i < contents.length; i++) {
        contents[i].style.display = 'none';
    }

    // Hiển thị phần nội dung được chọn
    document.getElementById(contentId).style.display = 'block';
}
function showSanpham(sanphamId) {
    // Ẩn tất cả các phần nội dung
    var sanpham = document.getElementsByClassName('sanpham');
    for (var i = 0; i < sanpham.length; i++) {
        sanpham[i].style.display = 'none';
    }

    // Hiển thị phần nội dung được chọn
    document.getElementById(sanphamId).style.display = 'block';
}

// Giả sử bạn đã có một hàm để hiển thị dialog khi click vào hàng
function showDialog(row) {
	// Hiển thị dialog với các nút chỉnh sửa, xóa, hủy
	// ...
	var editButton = document.getElementById('edit-btn');
	editButton.onclick = function() {
	  transferDataToDiv(row);
	};
  }
  
  // Lấy tất cả các hàng trong bảng
var rows = document.querySelectorAll('table tr');

// Thêm event listener cho mỗi hàng
rows.forEach(function(row) {
  row.addEventListener('click', function() {
    // 'this' trong context này sẽ là hàng được click
    var rowData = this.querySelectorAll('td');

    // Bây giờ bạn có thể sử dụng 'rowData' để làm gì đó
    // Ví dụ: in ra console hoặc gọi hàm fillFormWithRowData(rowData)
    console.log(rowData);
    // fillFormWithRowData(rowData);
  });
});

  function transferDataToDiv(row) {
	var data = row.querySelectorAll('td'); // Lấy tất cả các cell trong hàng
	
	function fillFormWithRowData(data) {
		var fullname = data[0].textContent; // Giả sử fullname nằm ở cell đầu tiên
		var email = data[1].textContent; // Giả sử email nằm ở cell thứ hai
		var phone_number = data[2].textContent; // và cứ thế...
		var address = data[3].textContent;
		var password = data[4].textContent;
		var role_id = data[5].textContent; 
		// Gán giá trị cho các phần tử input
		document.getElementById('fullname').value=fullname;
  		document.getElementById('email').value=email;
  		document.getElementById('phone_number').value=phone_number;
  		document.getElementById('address').value=address;
  		document.getElementById('password').value=password;
  		document.getElementById('role_id').value=role_id;
		
		// Đối với select, chúng ta cần tìm và chọn option tương ứng
		Array.from(roleIdSelect.options).forEach(function(optionElement) {
		  if(optionElement.value === data[5]) {
			optionElement.selected = true;
		  }
		});
	  
		// Hiển thị div chứa form
		document.getElementById('content3').style.display = 'block';
	  }
	  document.getElementById('myElement').click();

	  // Bạn cần gọi hàm này và truyền vào dữ liệu từ hàng khi người dùng chọn một hàng nào đó.
	  
  }
  