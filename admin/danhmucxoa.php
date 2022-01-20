<?php 
    include("../config.php");

    $loaisanpham_id=$_GET['id'];
    $sql1 = "SELECT DISTINCT tbl_loaisanpham.loaisanpham_id FROM tbl_loaisanpham JOIN tbl_sanpham ON  tbl_loaisanpham.loaisanpham_id=tbl_sanpham.loaisanpham_id WHERE tbl_loaisanpham.loaisanpham_id = '".$loaisanpham_id."' ";
    $kq1 = mysqli_query($ket_noi, $sql1);
    $so_luong = mysqli_num_rows($kq1);
    if($so_luong==0)
    {
        $sql2 = "
             DELETE FROM `tbl_loaisanpham` WHERE `tbl_loaisanpham`.`loaisanpham_id` = '".$loaisanpham_id."';
              ";
        $kq2 = mysqli_query($ket_noi, $sql2);
        echo "
            <script type='text/javascript'>
                window.alert('Bạn đã xoá danh mục thành công!');
                window.location.href='danhmuc.php';
            </script>
    ";
    }
    else
    {
        echo "
            <script type='text/javascript'>
                window.alert('Bạn không thể xoá danh mục này!');
                window.location.href='danhmuc.php';
            </script>";
    }
;?>