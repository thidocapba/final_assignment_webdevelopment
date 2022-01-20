<?php 
    include("../config.php");
    $ten_khachhang = $_POST['txttenkhachhang'];
    $mat_khau = $_POST['txtmatkhau'];
    $dia_chi = $_POST['txtdiachi'];
    $email = $_POST['txtemail'];
    $s="SELECT * FROM `tbl_khachhang` WHERE tbl_khachhang.ten_khachhang = '".$ten_khachhang."'";
    $k = mysqli_query($ket_noi, $s);
    $so_luong = mysqli_num_rows($k);
    if($so_luong>0)
    {
        echo "
        <script type='text/javascript'>
            window.alert('Tên khách hàng đã tồn tại, không thể thêm mới.');
            window.location.href='khachhang_themmoi.php';
        </script>
    ";
    }else
    {
    $sql = "
        INSERT INTO `tbl_khachhang` (`khachhang_id`, `ten_khachhang`, `dia_chi`,`email`, `mat_khau`) VALUES (NULL, '".$ten_khachhang."', '".$dia_chi."', '".$email."', '".$mat_khau."')";

    $kq = mysqli_query($ket_noi, $sql);
    echo "
        <script type='text/javascript'>
            window.alert('Bạn đã thêm mới tài khoản khách hàng thành công');
            window.location.href='khachhang.php';
        </script>
    ";
    }
;?>