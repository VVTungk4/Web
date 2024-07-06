<?php
$target_dir = "../image/";
$target_file = $target_dir . basename($_FILES["upFile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// kiểm tra file tải lên là ảnh hay fake
if(isset($_POST["data"])) {
  $check = getimagesize($_FILES["upFile"]["tmp_name"]);
  if($check !== false) {
    echo "File là ảnh - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File tải lên không phải là ảnh.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Xin lỗi, ảnh đã tồn tại.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["upFile"]["size"] > 5000000) {
  echo "Xin lỗi , Ảnh tải lên quá nặng.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Xin lỗi, chỉ JPG, JPEG, PNG & GIF files là được cho phép.";
  $uploadOk = 0;
}

// kiểm tra xem lỗi ko
if ($uploadOk == 0) {
  echo "Xin lỗi, file chưa được upload.";
// nếu ok thì chạy
} else {
  if (move_uploaded_file($_FILES["upFile"]["tmp_name"], $target_file)) {
    echo "Ảnh ". htmlspecialchars( basename( $_FILES["upFile"]["name"])). " đã được tải lên.";
  } else {
    echo "Xin lỗi, gặp lỗi trong quá trình up ảnh.";
  }
}
?>


