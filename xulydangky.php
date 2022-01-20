<meta charset="UTF-8">
<?php
include('./config.php');

if (isset($_POST['dangki']))
{
	$ten_khachhang = $_POST['ten_khachhang'];
	$email = $_POST['email'];
	$mat_khau = $_POST['mat_khau'];
	$dia_chi = $_POST['dia_chi'];

// Kiểm tra tên người dùng hoặc email trong CSDL có trùng không
$sql = "
		SELECT * FROM tbl_khachhang 
		WHERE email = '$email'
	";

$noi_dung_khach_hang= mysqli_query($ket_noi, $sql);

// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
if (mysqli_num_rows($noi_dung_khach_hang) > 0)
{
	echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="index.php";</script>';

// Dừng chương trình
die ();
}
else {
$sql1 = "INSERT INTO tbl_khachhang (ten_khachhang, email, mat_khau, dia_chi) VALUES ('$ten_khachhang', '$email', '$mat_khau', '$dia_chi')";

if (mysqli_query($ket_noi, $sql1)){
	echo '<script language="javascript">alert("Đăng kí thành công"); window.location="index.php"; </script>';
}
else {
	echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="index.php";</script>';
}
}
}
?>