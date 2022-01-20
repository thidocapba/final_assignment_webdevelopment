<?php
include("../config.php");
if(isset($_GET['idadmin']))
{
$idhd = $_GET['idhd'];
$idadmin = $_GET['idadmin'];
$sql = "UPDATE `tbl_hoadon` SET `tinh_trang` = '1',`admin_id` = '".$idadmin."' WHERE hoadon_id = " .$idhd;
$kq = mysqli_query($ket_noi, $sql);
    echo "
        <script type='text/javascript'>
            window.alert('Cập nhập thành công');
            window.location.href='hoadon.php';
        </script>
    ";
}
else
{
	$idhd = $_GET['idhd'];
	$sql = "UPDATE `tbl_hoadon` SET `tinh_trang` = '2' WHERE hoadon_id = " .$idhd;
	$kq = mysqli_query($ket_noi, $sql);
	    echo "
	        <script type='text/javascript'>
	            window.alert('Cập nhập thành công');
	            window.location.href='../lichsumuahang.php';
	        </script>
	    ";
}
