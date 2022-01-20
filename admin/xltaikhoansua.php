<?php 
    include("../config.php");
    $admin_id=$_POST['txtID'];
    $ten_admin = $_POST['txtTendangnhap'];
    $sdt = $_POST['txtDienthoai'];
    $email = $_POST['txtEmail'];
    $mat_khau = $_POST['txtMatkhau'];
    $sql = "
        UPDATE `tbl_admin` SET  `sdt` = '".$sdt."', `email` = '".$email."',`ten_admin` = '".$ten_admin."',`mat_khau` = '".$mat_khau."' WHERE `tbl_admin`.`admin_id` = '".$admin_id."'
        ";

    $kq = mysqli_query($ket_noi, $sql);

    echo "
        <script type='text/javascript'>
            window.alert('Bạn đã chỉnh sửa thông tin quản trị viên thành công');
            window.location.href='taikhoan.php';
        </script>
    ";
;?>