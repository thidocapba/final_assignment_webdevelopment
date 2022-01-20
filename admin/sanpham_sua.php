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
        <title>Thực phẩm Việt | Admin | Cập nhật sản phẩm</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
          function validateForm()
          {
            var tensanpham = document.forms["formsua"]["txttensanpham"].value;   
            var tenloaisanpham = document.forms["formsua"]["txttenloaisanpham"].value;     
            if(tenloaisanpham.trim()=="")
            {
                alert("Bạn phải chọn nhập tên loại sản phẩm.");
                document.forms["formsua"]["txttenloaisanpham"].focus();
                return false;
            }
            if(tensanpham.trim()=="")
            {
                alert("Bạn phải nhập tên sản phẩm.");
                document.forms["formsua"]["txttensanpham"].focus();
                return false;
            }
          }</script>
    </head>
    <body class="sb-nav-fixed">
        <?php
        include("slide.php");
        ?>
            <div id="layoutSidenav_content">
                <main>
                <?php 
                    $sanpham_id=$_GET["sanphamid"];
                    $loaisanphamid;
                    if(isset($_GET['loaisanphamid'])) $loaisanphamid=$_GET['loaisanphamid'];
                    $sql1 = "
                              SELECT *
                              FROM tbl_sanpham
                              Where sanpham_id='".$sanpham_id."'
                    ";
                    $kq1 = mysqli_query($ket_noi, $sql1);
                    $row1 = mysqli_fetch_array($kq1);   
                    $loaisanpham_id=$row1["loaisanpham_id"];
                    
                ?>
                <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Cập nhật sản phẩm</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="sanpham_xlsua.php<?php if(isset($_GET['loaisanphamid'])) echo"?id=$loaisanphamid";?>" enctype="multipart/form-data" id="formsua" onsubmit="return validateForm()">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="txttensanpham" type="text" placeholder="Tên sản phẩm" name="txttensanpham" value="<?php echo $row1["ten_sanpham"] ;?>" />
                                                <label for="txttensanpham">Tên sản phẩm</label>
                                            </div>
                                            
                                            <div class="form-floating mb-3">
                                                <select class="form-control" id="txttenloaisanpham" placeholder="Tên loại sản phẩm" name="txttenloaisanpham" >
                                                    <?php

                                                        $sql2 = "SELECT * FROM tbl_loaisanpham";
                                                        $kq2= mysqli_query($ket_noi,$sql2);
                                                        while ($row2=mysqli_fetch_array($kq2)) {
                                                    ;?> 
                                                    <option <?php if ($row2["loaisanpham_id"] == $loaisanpham_id) echo "selected=\"selected\""; ?> value="<?php echo $row2["ten_loaisanpham"];?>"><?php  echo $row2["ten_loaisanpham"] ;?></option>
                                                    <?php } ;?>
                                                </select>
                                                <label for="txttenloaisanpham">Tên loại sản phẩm</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="txtanh" type="file" placeholder="Ảnh" name="txtanh" value="<?php echo $row1["anh"] ;?>" />
                                                <label for="txtanh">Ảnh</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="txtgia" placeholder="Giá" name="txtgia" value="<?php echo $row1["gia"] ;?>"> </input>
                                                        <label for="txtgia">Giá</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" id="txtsoluong" placeholder="Số lượng" name="txtsoluong" value="<?php echo $row1["so_luong"] ;?>"> </input>
                                                        <label for="txtsoluong">Số lượng</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="txtghichu" placeholder="Ghi chú" name="txtghichu" value="<?php echo $row1["mo_ta"] ;?>"> </input>
                                                <label for="txtghichu">Ghi chú</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <input type="hidden" name="txtid" value ="<?php echo $row1["sanpham_id"];?>">
                                                <input type="submit" name="btnSubmit" value="Cập nhật">
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
