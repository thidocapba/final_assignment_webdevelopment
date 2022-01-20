
<?php 
    include("../config.php");

    $hoadon_id=$_GET['id'];
    $sql1 = "
             DELETE FROM `tbl_giohang` WHERE `tbl_giohang`.`hoadon_id` = '".$hoadon_id."';
              ";

    $kq1 = mysqli_query($ket_noi, $sql1);
    $sql2 = "
             DELETE FROM `tbl_hoadon` WHERE `tbl_hoadon`.`hoadon_id` ='".$hoadon_id."';
              ";
            
    $kq2 = mysqli_query($ket_noi, $sql2);
    echo "
            <script type='text/javascript'>
                window.alert('Bạn đã xoá hoá đơn thành công!');
                window.location.href='hoadon.php';
            </script>
    ";
    
;?>
