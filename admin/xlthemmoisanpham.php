<?php 
    include("../config.php");
    $ten_sanpham=$_POST['txttensanpham'];
    if(isset($_POST['txttenloaisanpham'])) 
        $ten_loaisanpham=$_POST['txttenloaisanpham'];
    $sql1 = "SELECT loaisanpham_id FROM tbl_loaisanpham WHERE ten_loaisanpham= '".$ten_loaisanpham."' ";
    $kq1 = mysqli_query($ket_noi, $sql1);
    $r=mysqli_fetch_array($kq1);
    // $loaisanpham_id=1;
    if(isset( $r["loaisanpham_id"]))
        $loaisanpham_id=$r["loaisanpham_id"];

    $gia= $_POST['txtGiaban'];
    $so_luong = $_POST['txtSoluong'];
    $mo_ta = $_POST['txtGhichu'];

    $noi_luu_anh ="../thucpham/".basename($_FILES["txtHinhanh"]["name"]);
    $luu_file_anh_tam=$_FILES["txtHinhanh"]["tmp_name"];
    $ket_qua_up_anh = move_uploaded_file($luu_file_anh_tam, $noi_luu_anh);

    if (!$ket_qua_up_anh) {
        $anh=null;
    }else{$anh = basename($_FILES["txtHinhanh"]["name"]);}
    $sql = "
        INSERT INTO `tbl_sanpham` (`loaisanpham_id`, `ten_sanpham`,  `anh`, `gia`, `so_luong`, `mo_ta`) VALUES ('".$loaisanpham_id."', '".$ten_sanpham."', '".$anh."', '".$gia."', '".$so_luong."', '".$mo_ta."');
        ";
    $kq = mysqli_query($ket_noi, $sql);

    if(isset($_GET['id']))
        {
            $loia=$_GET['id'];
            echo "
            <script type='text/javascript'>
                window.alert('Bạn đã thêm mới sản phẩm thành công');
                window.location.href='sanpham.php?id=$loaisanpham_id';
            </script>";
        }
        else
        {
        echo "
            <script type='text/javascript'>
                window.alert('Bạn đã thêm mới sản phẩm thành công');
                window.location.href='toanbosanpham.php';
            </script>
    ";
        }
;?>