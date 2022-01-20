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
        <title>Thực phẩm Việt | Admin | Danh sách quản trị viên</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php
        include("slide.php");
        ?>
            <div id="layoutSidenav_content">
            <?php
                include("../config.php");
                $sql="SELECT * FROM tbl_admin where ten_admin = '".$_SESSION['ten_admin']."'";
                $kq = mysqli_query($ket_noi, $sql);
                $row = mysqli_fetch_array($kq);
                $check=($row["chuc_vu"]=='Quản lý')?1:0;
            ;?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Danh sách quản trị viên</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Quản trị hệ thống</a></li>
                            <li class="breadcrumb-item active">Danh sách quản trị viên</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Danh sách quản trị viên | <a href="<?php if($check==1) echo "quantrivien_themmoi.php" ;?>" onclick="<?php if($check==0) echo" return alert('Bạn không có quyền thêm mới quản trị viên')";?>">Thêm mới</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Họ tên</th>
                                            <th>Email</th>
                                            <th>Điện thoại</th>
                                            <th>Chức vụ</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Họ tên</th>
                                            <th>Email</th>
                                            <th>Điện thoại</th>
                                            <th>Chức vụ</th>
                                            <th>Sửa</th>
                                            <th>Xóa</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                        $sql1 = "
                                                  SELECT * FROM tbl_admin
                                        ";
                                        $ket_qua = mysqli_query($ket_noi, $sql1);
                                        $i=0;
                                        while ($row1 = mysqli_fetch_array($ket_qua)) {
                                            $i++;

                                            if($row1["chuc_vu"]=='Quản lý') $kiem_tra=1;
                                            else $kiem_tra=0;
                                    ;?>
                                        <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $row1["ten_admin"];?></td>
                                            <td><?php echo $row1["email"];?></td>
                                            <td><?php echo $row1["sdt"];?></td>
                                            <td><?php echo $row1["chuc_vu"];?></td>
                                            <?php
                                                if($check==1 && $kiem_tra!=1)
                                                {
                                            ;?>
                                                <td><a  class="btn btn-success" href="quantrivien_sua.php?id=<?php echo $row1["admin_id"]; ?>">Sửa</a></td>
                                            <?php }
                                                else
                                                {
                                            ;?>
                                                 <td><a  class="btn btn-success" href="" onclick="alert('Bạn không có quyền sửa thông tin quản trị viên')" >Sửa</a></td>
                                            <?php
                                                }
                                            ;?>
                                            <?php
                                                if($check==1 && $kiem_tra!=1)
                                                {
                                            ;?>
                                                <td><a  class="btn btn-danger" href="quantrivien_xoa.php?id=<?php echo $row1["admin_id"]; ?>" onclick="return confirm('Bạn có muốn xoá?')">Xoá</a></td>
                                            <?php }
                                                else
                                                {
                                            ;?>
                                                 <td><a  class="btn btn-danger" href="" onclick="alert('Bạn không có quyền xoá quản trị viên')" >Xoá</a></td>
                                            <?php
                                                }
                                            ;?>
                                        </tr>
                                    <?php
                                        }
                                    ;?>
                                    </tbody>
                                </table>
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
