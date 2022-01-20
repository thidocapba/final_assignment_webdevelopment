<?php 
    include("../config.php");
    $ten_dang_nhap=$_POST["txttendangnhap"];
    $mat_khau=$_POST["txtpassword"];
    $sql = "
            SELECT * 
            FROM tbl_admin where ten_admin='".$ten_dang_nhap."' and mat_khau='".$mat_khau."'
    ";
    $kq = mysqli_query($ket_noi, $sql);
    $so_luong = mysqli_num_rows($kq);
    $tbl_admin= mysqli_fetch_array($kq);
    if ($so_luong==1) {
        session_start();
        $_SESSION['login']=1;
        $_SESSION['ten_admin']=$ten_dang_nhap;
        $_SESSION['mat_khau']=$mat_khau;
        $_SESSION['admin_id']=$tbl_admin["admin_id"];
        echo "
                <script type='text/javascript'>
                    window.alert('Đăng nhập thành công');
                    window.location.href='index.php';
                </script>
            ";
    }
    else{
        echo "
                <script type='text/javascript'>
                    window.alert('Đăng nhập thất bại');
                    window.location.href='dangnhap.php';
                </script>
            ";
        }
;?>