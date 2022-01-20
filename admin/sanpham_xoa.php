
<?php 
    include("../config.php");

    $sanpham_id=$_GET['sanphamid'];
    $sql1 = "SELECT DISTINCT tbl_sanpham.sanpham_id FROM tbl_giohang JOIN tbl_sanpham ON  tbl_giohang.sanpham_id=tbl_sanpham.sanpham_id WHERE tbl_sanpham.sanpham_id = '".$sanpham_id."' ";
    $kq1 = mysqli_query($ket_noi, $sql1);
    $so_luong = mysqli_num_rows($kq1);
    if($so_luong==0)
    {   
        $sql2 = "
             DELETE FROM `tbl_sanpham` WHERE `tbl_sanpham`.`sanpham_id` = '".$sanpham_id."';
              ";
        $kq2 = mysqli_query($ket_noi, $sql2);

        if(isset($_GET['loaisanphamid']))
        {
            $loaisanphamid=$_GET['loaisanphamid'];
            echo "
            <script type='text/javascript'>
                window.alert('Bạn đã xoá sản phẩm thành công!');
                window.location.href='sanpham.php?id=$loaisanphamid';
            </script>";
        }
        else
        {
        echo "
            <script type='text/javascript'>
                window.alert('Bạn đã xoá sản phẩm thành công!');
                window.location.href='toanbosanpham.php';
            </script>
    ";
        }
    }
    else
    {
        if(isset($_GET['loaisanphamid']))
        {
            $loaisanphamid=$_GET['loaisanphamid'];
            echo "
            <script type='text/javascript'>
                window.alert('Bạn không thể xoá sản phẩm  này!');
                window.location.href='sanpham.php?id=$loaisanphamid';
            </script>";
        }
        else
        {
        echo "
            <script type='text/javascript'>
                window.alert('Bạn không thể xoá sản phẩm này!');
                window.location.href='toanbosanpham.php';
            </script>
    ";
        }
    }

;?>
