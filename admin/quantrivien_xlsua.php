<?php 
    include("../config.php");
    $admin_id=$_POST['txtid'];
    $ho_ten = $_POST['txthoten'];
    $chuc_vu = $_POST['txtchucvu'];
    $dien_thoai = $_POST['txtdienthoai'];
    $email = $_POST['txtemail'];
    $sql = "
    UPDATE `tbl_admin` SET `ten_admin` = '".$ho_ten."', `sdt` = '".$dien_thoai."', `email` = '".$email."', `chuc_vu` = '".$chuc_vu."' WHERE `tbl_admin`.`admin_id` = '".$admin_id."'
        ";

    $kq = mysqli_query($ket_noi, $sql);

    echo "
        <script type='text/javascript'>
            window.alert('Bạn đã chỉnh sửa thông tin quản trị viên thành công');
            window.location.href='quantrivien.php';
        </script>
    ";
;?>