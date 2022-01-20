<?php 
    session_start();
    include("../config.php");

    $id=$_GET['id'];
    $sql1 = "SELECT DISTINCT tbl_admin.admin_id FROM tbl_hoadon JOIN tbl_admin ON  tbl_hoadon.admin_id=tbl_admin.admin_id WHERE tbl_admin.admin_id='".$id."' ";
    $kq1 = mysqli_query($ket_noi, $sql1);
    $so_luong = mysqli_num_rows($kq1);
    if($so_luong==0)
    {
        $sql2 = "
             DELETE FROM `tbl_admin` WHERE `tbl_admin`.`admin_id` = '".$id."';
              ";
        $kq2 = mysqli_query($ket_noi, $sql2);
        echo "
            <script type='text/javascript'>
                window.alert('Bạn đã xoá quản trị viên thành công!');
                window.location.href='quantrivien.php';
            </script>
    ";
    }
    else
    {
        echo "
            <script type='text/javascript'>
                window.alert('Bạn không thể xoá quản trị viên này!');
                window.location.href='quantrivien.php';
            </script>";
    }
;?>