<?php 
    include("../config.php");

    $loaisanpham_id=$_POST['txtID'];
    $ten_loaisanpham = $_POST['txtTenloaisanpham'];

    $sql = "UPDATE `tbl_loaisanpham` SET `ten_loaisanpham` = '".$ten_loaisanpham."' WHERE `tbl_loaisanpham`.`loaisanpham_id` = '".$loaisanpham_id."'
        ";

         
    $kq = mysqli_query($ket_noi, $sql);

    echo "
        <script type='text/javascript'>
            window.alert('Bạn đã cập nhập danh mục sản phẩm thành công');
            window.location.href='danhmuc.php';
        </script>
    ";
;?>



