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
        <title>Thực phẩm Việt | Admin | Cập nhập danh mục</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
          function validateForm()
          {
            var tenloai = document.forms["formsua"]["txtTenloaisanpham"].value;    
            if(tenloai.trim()=="")
            {
                alert("Bạn phải nhập tên loại sản phẩm.");
                document.forms["formsua"]["txtTenloaisanpham"].focus();
                return false;
            }
            
          }</script>
    </head>
    <body class="sb-nav-fixed">
        <?php
        include("slide.php");
        ?>
            <?php 
                $loaisanpham_id=$_GET["id"];
                $sql1 = "
                          SELECT * 
                          FROM tbl_loaisanpham
                          Where loaisanpham_id='".$loaisanpham_id."'
                ";
                $kq = mysqli_query($ket_noi, $sql1);
                $row1 = mysqli_fetch_array($kq);   
            ;?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Cập nhập danh mục sản phẩm</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="xldanhmucsua.php" enctype="multipart/form-data" id="formsua" onsubmit="return validateForm()">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="txtTenloaisanpham" type="text" placeholder="Tên loại sản phẩm" name="txtTenloaisanpham"  value="<?php echo $row1["ten_loaisanpham"]; ?>"/>
                                                <label for="txtTenloaisanpham">Tên loại sản phẩm</label>
                                            </div>
                                            
                                            <div class="mt-4 mb-0">
                                                <input type="hidden" name="txtID" value ="<?php echo $row1["loaisanpham_id"];?>">
                                                <input type="submit" name="btnSubmit" value="Cập nhập">
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
