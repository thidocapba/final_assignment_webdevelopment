<?php 
    include("../config.php");

    $ho_ten = $_POST['txthoten'];
    $chuc_vu = $_POST['txtchucvu'];
    $dien_thoai = $_POST['txtdienthoai'];
    $email = $_POST['txtemail'];
    $mat_khau =1;
    $sql = "
        INSERT INTO `tbl_admin` (`admin_id`, `ten_admin`, `sdt`,`mat_khau`, `email`, `chuc_vu`) VALUES (NULL, '".$ho_ten."', '".$dien_thoai."', '".$mat_khau."', '".$email."', '".$chuc_vu."');
        ";

    $kq = mysqli_query($ket_noi, $sql);

    echo "
        <script type='text/javascript'>
            window.alert('Bạn đã thêm mới bài viết thành công');
            window.location.href='quantrivien.php';
        </script>
    ";
;?>