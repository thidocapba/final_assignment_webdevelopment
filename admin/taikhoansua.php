<?php
session_start();
if(!isset($_SESSION['login']))
{
    echo "
                <script type='text/javascript'>
                    window.alert('Không có quyền truy cập');
                    window.location.href='dangnhap.php';
                </script>
            ";
}
;?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Thực phẩm Việt | Admin | Tài khoản</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
          function validateForm()
          {
              
            var tendangnhap = document.forms["form"]["txtTendangnhap"].value;
            var matkhau = document.forms["form"]["txtMatkhau"].value;   
            var sdt = document.forms["form"]["txtDienthoai"].value;     
            var email = document.forms["form"]["txtEmail"].value;
           
            if(tendangnhap.trim()=="")
            {
                alert("Bạn phải nhập tên đăng nhập.");
                document.forms["form"]["txtTendangnhap"].focus();
                return false;
            }
            if(matkhau.trim()=="")
            {
                alert("Bạn phải nhập mật khẩu.");
                document.forms["form"]["txtMatkhau"].focus();
                return false;
            }
            if(sdt.trim()=="")
            {
                alert("Bạn phải nhập số điện thoại.");
                document.forms["form"]["txtDienthoai"].focus();
                return false;
            }
            if(email.trim()=="")
            {
                alert("Bạn phải nhập địa chỉ email.");
                document.forms["form"]["txtEmail"].focus();
                return false;
            }

          }</script>
    </head>
    <body class="sb-nav-fixed">
        <?php
        include("slide.php");
        ?>
            <?php
                $sql1="SELECT * FROM tbl_admin where ten_admin = '".$_SESSION['ten_admin']."'";
                $kq1 = mysqli_query($ket_noi, $sql1);
                $row1 = mysqli_fetch_array($kq1);
            ;?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Chỉnh sửa thông tin tài khoản</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="xltaikhoansua.php" enctype="multipart/form-data" id="form" onsubmit="return validateForm()">
                                           
                                            <div class="form-floating mb-3">
                                                <input  class="form-control" id="txtTendangnhap" type="text" placeholder="Tên đăng nhập" name="txtTendangnhap" value ="<?php echo $row1["ten_admin"];?>"/>
                                                <label for="txtTendangnhap">Tên admin</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input  class="form-control" id="txtMatkhau" type="password" placeholder="Mật khẩu" name="txtMatkhau" value ="<?php echo $row1["mat_khau"];?>"/>
                                                <label for="txtMatkhau">Mật khẩu</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input disabled class="form-control" id="txtChucvu" type="text" placeholder="Chức vụ" name="txtChucvu" value ="<?php echo $row1["chuc_vu"];?>"/>
                                                <label for="txtChucvu">Chức vụ</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input  class="form-control" id="txtDienthoai" type="text" placeholder="Số điện thoại" name="txtDienthoai" value ="<?php echo $row1["sdt"];?>"/>
                                                <label for="txtKhoa">Số điện thoại</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input  class="form-control" id="txtEmail" type="email" placeholder="name@example.com" name="txtEmail" value ="<?php echo $row1["email"];?>"/>
                                                <label for="txtEmail">Email</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <input type="hidden" name="txtID" value ="<?php echo $row1["admin_id"];?>">
                                                <button style="color: #0D6EFD; outline:none; background-color: white; border-radius: 8px;" type="submit" name="btnSubmit" onclick="return confirm('Bạn có muốn chỉnh sửa thông tin tài khoản?')">Chỉnh sửa</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Banking Academy</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
