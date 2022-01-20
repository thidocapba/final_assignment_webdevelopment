<?php 
    include("../config.php");

    $khachhang_id=$_GET['id'];
    $sql1 = "SELECT DISTINCT tbl_khachhang.khachhang_id FROM tbl_khachhang JOIN tbl_hoadon ON  tbl_khachhang.khachhang_id=tbl_hoadon.khachhang_id WHERE tbl_khachhang.khachhang_id = '".$khachhang_id."' ";
    $kq1 = mysqli_query($ket_noi, $sql1);
    $so_luong = mysqli_num_rows($kq1);
    if($so_luong==0)
    {
        $sql2 = "
             DELETE FROM `tbl_khachhang` WHERE `tbl_khachhang`.`khachhang_id` = '".$khachhang_id."';
              ";
        $kq2 = mysqli_query($ket_noi, $sql2);
        echo "
            <script type='text/javascript'>
                window.alert('Bạn đã xoá tài khoản khách hàng thành công!');
                window.location.href='khachhang.php';
            </script>
    ";
    }
    else
    {
        echo "
            <script type='text/javascript'>
                window.alert('Bạn không thể tài khoản khách hàng này!');
                window.location.href='khachhang.php';
            </script>";
    }
;?>