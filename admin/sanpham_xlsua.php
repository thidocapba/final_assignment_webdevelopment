<?php 
    include("../config.php");
    $sanpham_id=$_POST['txtid'];
    $ten_sanpham=$_POST['txttensanpham'];
    $ten_loaisanpham=0;
    if(isset($_POST['txttenloaisanpham'])) 
        $ten_loaisanpham=$_POST['txttenloaisanpham'];
    $sql1 = "SELECT loaisanpham_id FROM tbl_loaisanpham WHERE ten_loaisanpham = '".$ten_loaisanpham."' ";
    $kq1 = mysqli_query($ket_noi, $sql1);
    $r=mysqli_fetch_array($kq1);
    $loaisanpham_id=1;
    if(isset( $r["loaisanpham_id"]))
        $loaisanpham_id=$r["loaisanpham_id"];

    $gia = $_POST['txtgia'];
    $so_luong = $_POST['txtsoluong'];
    $ghi_chu = $_POST['txtghichu'];
    $noi_luu_anh ="img/".basename($_FILES["txtanh"]["name"]);
    $luu_file_anh_tam=$_FILES["txtanh"]["tmp_name"];
    $ket_qua_up_anh = move_uploaded_file($luu_file_anh_tam, $noi_luu_anh);

    if (!$ket_qua_up_anh) {
        $anh=null;
    }else{$anh = basename($_FILES["txtanh"]["name"]);}
    if($anh==null)
    {
        $sql = "
        UPDATE `tbl_sanpham` SET `loaisanpham_id` = '".$loaisanpham_id."', `ten_sanpham` = '".$ten_sanpham."', `gia`='".$gia."', `so_luong`='".$so_luong."', `mo_ta` = '".$ghi_chu."' WHERE `tbl_sanpham`.`sanpham_id` = '".$sanpham_id."'
        ";
    }
    else
    {
        $sql = "
        UPDATE `tbl_sanpham` SET `loaisanpham_id` = '".$loaisanpham_id."', `ten_sanpham` = '".$ten_sanpham."', `anh` = '".$anh."', `gia`='".$gia."', `so_luong`='".$so_luong."', `mo_ta` = '".$ghi_chu."' WHERE `tbl_sanpham`.`sanpham_id` = '".$sanpham_id."'
        ";
    }
    $kq = mysqli_query($ket_noi, $sql);
    if(isset($_GET['id']))
        {
            $loaisanphamid=$_GET['id'];
            echo "
            <script type='text/javascript'>
                window.alert('Bạn đã cập nhật sản phẩm thành công');
                window.location.href='sanpham.php?id=$loaisanphamid';
            </script>";
        }
        else
        {
        echo "
            <script type='text/javascript'>
                window.alert('Bạn đã cập nhật sản phẩm thành công');
                window.location.href='toanbosanpham.php';
            </script>
    ";
        }
        
;?>